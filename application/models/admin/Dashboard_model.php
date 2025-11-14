<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public $v_fields = array('vco_id', 'user_id', 'vcart_id', 'vco_discount', 'vco_subtotal', 'vco_total', 'vco_status', 'created_at', 'vco_paid_dt');

    function __construct() {
        parent::__construct();
    }

    
    function get_resume() {
        $param = array();
        $result = array();
        $result['today'] = 0;
        $result['yesterday'] = 0;
        $result['month'] = 0;
        $result['lastmonth'] = 0;
        $result['year'] = 0;
        $result['lastyear'] = 0;
        $result['average'] = 0;

        $query = "
      SELECT sum(1) total
      FROM menfess 
      WHERE status = 'success'
      AND YEAR(created) = date(NOW())";
        $rs = $this->db->query($query, $param)->row();
        if ($rs) {
            $result['today'] = intval($rs->total);
        }

        $query = "
        SELECT sum(1) total
      FROM menfess 
      WHERE status = 'success'
      AND date(created) = date(NOW() - INTERVAL 1 DAY)";
        $rs = $this->db->query($query, $param)->row();
        if ($rs) {
            $result['yesterday'] = intval($rs->total);
        }

        $query = "
      SELECT sum(1) total
      FROM menfess 
      WHERE status = 'success'
      AND MONTH(created) = MONTH(NOW())
      AND YEAR(created) = YEAR(NOW()) ";
        $rs = $this->db->query($query, $param)->row();
        if ($rs) {
            $result['month'] = intval($rs->total);
        }

        $query = "
       SELECT sum(1) total
      FROM menfess 
      WHERE status = 'success'
      AND MONTH(created) = MONTH(NOW() - INTERVAL 1 MONTH)
      AND YEAR(created) = YEAR(NOW() - INTERVAL 1 MONTH); ";
        $rs = $this->db->query($query, $param)->row();
        if ($rs) {
            $result['lastmonth'] = intval($rs->total);
        }

        $query = "
       SELECT sum(1) total
      FROM menfess 
      WHERE status = 'success'
      AND YEAR(created) = YEAR(NOW()) ";
        $rs = $this->db->query($query, $param)->row();
        if ($rs) {
            $result['year'] = intval($rs->total);
        }

        $query = "
       SELECT sum(1) total
      FROM menfess 
      WHERE status = 'success'
      AND YEAR(created) = YEAR(NOW() - INTERVAL 1 YEAR); ";
        $rs = $this->db->query($query, $param)->row();
        if ($rs) {
            $result['lastyear'] = intval($rs->total);
        }

        /*

        $query = "
      SELECT sum(1)/count(1) total FROM FROM menfess 
      WHERE status = 'success' ";
        $rs = $this->db->query($query, $param)->row();
        if ($rs) {
            $result['average'] = intval($rs->total);
        }
            */
            $result['average'] = 0;

        return $result;
    }
    function get_graph_topuser($date_from = "", $date_to = "") {

        $param = array();
        $result = array();

        //default
        if ($date_from == "") {
            $date_from = date('Y-m-d', strtotime("-1 month"));
        }
        if ($date_to == "") {
            $date_to = date("Y-m-d");
        }

        $q_add = "";
        if ($date_from != "") {
            $q_add .= " and date(created) >= '" . $date_from . "' ";
        }
        if ($date_to != "") {
            $q_add .= " and date(created) <= '" . $date_to . "' ";
        }        $list_nm = array();
        $list_total = array();
        $query = "
    SELECT base_id , max(base_id) user_name, sum(1) total from menfess where 1 = 1 " . $q_add . "
    group by base_id order by total DESC limit 0,5 ";
        $rs = $this->db->query($query, $param)->result();
        if ($rs) {
            foreach ($rs as $row) {
                array_push($list_nm, $row->user_name);
                array_push($list_total, $row->total);
            }
        }

        $result['name'] = $list_nm;
        $result['total'] = $list_total;        return $result;
    }

    function get_graph_transaction($date_from = "", $date_to = "") {

        $param = array();
        $result = array();

        if ($date_from == "") {
            $date_from = date('Y-m-d', strtotime("-1 month"));
        }
        if ($date_to == "") {
            $date_to = date("Y-m-d");
        }

        $list_nm = array();
        $list_total = array();
        $query = "
    select a.w_start_dt , a.w_end_dt, coalesce(sum(b.total),0) total from (
    
      
      
      SELECT CONCAT('W', @row_number:=@row_number+1) AS `w_numb`, 
        MIN(start_date) AS `w_start_dt`, MAX(start_date) AS `w_end_dt`
      FROM (
        SELECT ADDDATE('1970-01-01', t4 * 10000 + t3 * 1000 + t2 * 100 + t1 * 10 + t0) AS start_date
        FROM
          (SELECT 0 t0 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t0,
          (SELECT 0 t1 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t1,
          (SELECT 0 t2 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t2,
          (SELECT 0 t3 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t3,
          (SELECT 0 t4 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t4
        ORDER BY start_date
      ) v, (SELECT @row_number:=0) rn
      WHERE start_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'
      GROUP BY WEEK(start_date)
      ORDER BY WEEK(start_date)
      
      
      ) a left join ( select date(created) created, sum(1) total from menfess st where date(created) BETWEEN '" . $date_from . "' AND '" . $date_to . "' GROUP by created ) b on b.created BETWEEN a.w_start_dt and a.w_end_dt
      group by a.w_start_dt , a.w_end_dt;";
        $rs = $this->db->query($query, $param)->result();
        if ($rs) {
            foreach ($rs as $row) {
                array_push($list_nm, $row->w_start_dt . "~" . $row->w_end_dt);
                array_push($list_total, $row->total);
            }
        }        $result['name'] = $list_nm;
        $result['total'] = $list_total;        return $result;
    }
    function get_graph_daily_trans($date_from = "", $date_to = "") {

        $param = array();
        $result = array();

        if ($date_from == "") {
            $date_from = date('Y-m-d', strtotime("-7 days"));
        }
        if ($date_to == "") {
            $date_to = date("Y-m-d");
        }

        $list_nm = array();
        $list_total = array();

        
    $query = "
    select v.selected_date, coalesce(b.total,0) total from 
    (select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from
    (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
    (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
    (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
    (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
    (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v 
    left join ( select date(created) created, sum(1) total from menfess st where date(created) between '".$date_from."' and '".$date_to."' GROUP by created ) b 
    on v.selected_date = b.created
    where selected_date between '".$date_from."' and '".$date_to."' ";
    $rs = $this->db->query($query, $param)->result();
    if($rs){
      foreach($rs as $row){
        array_push($list_nm, $row->selected_date);
        array_push($list_total, $row->total);
      }
    }
    

        $result['name'] = $list_nm;
        $result['total'] = $list_total;        return $result;
    }

    function sum_total($vco_id) {
        $this->db->select_sum('vcop_price');
        $this->db->from('v_co_prd');
        $this->db->where('vco_id', $vco_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_resuma_role() {
        $sql = "SELECT base_id, count(1) as cnt FROM menfess GROUP BY base_id";
        $query = $this->db->query($sql, array());
        return $query->result();
    }
}
