<?php
/**
 * Created by PhpStorm.
 * User: Taufik
 * Date: 7/24/2021
 * Time: 11:02 AM
 */
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class V1_mdl extends CI_Model
{
    public $v_fields=array();

    function __construct()
    {
        parent::__construct();
    }

    function getList($table, $pagination=array()) {

        //  PAGINATION START
        if((isset($pagination['cur_page'])) and !empty($pagination['per_page']))
        {
            $this->db->limit($pagination['per_page'],$pagination['cur_page']);
        }
        //  PAGINATION END

        // sort
        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)?$_GET['sortBy']:'';
        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';
        if($order_by!=''){
            $this->db->order_by($order_by, $order);
        }

        // end sort

        // SEARCH START
        if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" && in_array($_GET['searchBy'],$this->v_fields) ) {
            $this->db->like($_GET['searchBy'],$_GET['searchValue']);
        }
        // SEARCH END

        $this->db->select("$table.*  , base.username as base_username ");
        $this->db->from($table);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        return $result = $query->result();
    }

    function getListTable($table, $arr_filter = array(), $order = array(), $limit = 0, $offset = 0) {
        $this->db->select("*");
        $this->db->from($table);
        foreach($arr_filter as $by => $val) {
            $this->db->where($by,$val);
        }
        foreach($order as $by => $val) {
            $this->db->order_by($by,$val);
        }
        if($limit != 0){
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get();
        return $result = $query->result();
    }

    function getRow($table, $id,$field = 'id') {
        $this->db->select('*');
        $query = $this->db->get_where($table, array($field => $id));
        $data = $query->result();
        if($data){
            return $data[0];
        }else{
            return null;
        }

    }

    function getRow2($table, $arr_filter = array(), $order = array()) {
        $this->db->select('*');
        $this->db->from($table);
        foreach($arr_filter as $by => $val) {
            $this->db->where($by,$val);
        }
        foreach($order as $by => $val) {
            $this->db->order_by($by,$val);
        }
        $query = $this->db->get();
        $data = $query->row();
        return $data;

    }

    function countRow2($table, $arr_filter = array(), $order = array()) {
        $this->db->select('*');
        $this->db->from($table);
        foreach($arr_filter as $by => $val) {
            $this->db->where($by,$val);
        }
        foreach($order as $by => $val) {
            $this->db->order_by($by,$val);
        }
        $query = $this->db->get();
        return $query->num_rows();

    }

    function getSelectedData($table, $field, $idArr) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where_in('id', $idArr);
        $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key => $value) {
            $arr[] = $value->$field;
        }
        return $arr;
    }

    function getCount($table, $key='', $value='') {
        $this->db->select("$table.*");
        if(isset($key) && isset($value) && !empty($key) && !empty($value))
        {
            $this->db->where($key,$value);
        }
        $this->db->from($table);
        $this->db->join("base", "vip.base_username = base.username", "left");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function insertBatch($table, $data){
        $this->db->insert_batch($table, $data);
        return $this->db->insert_id();
    }

    function multiSelectInsert($r_table, $field1, $value1, $field2, $value2=array())
    {
        $this->db->query("delete from $r_table where $field1='$value1'");
        if ($r_table!="" && $field1!="" && $value1!="" && $field2!="" && count($value2)>0) {
            for ($i=0; $i < count($value2); $i++) {
                $data[] = array(
                    $field1 => $value1,
                    $field2 => $value2[$i],
                );
            }
            $this->db->insert_batch($r_table, $data);
        }
    }

    function getSelectedIds($table, $id, $select_field, $where_field)
    {
        $arr=array();
        $this->db->select("$select_field");
        $this->db->from($table);
        $this->db->where("$where_field",$id);
        $query = $this->db->get();
        $data = $query->result();
        foreach ($data as $key => $value) {
            $arr[] = $value->$select_field;
        }
        return $arr;
    }

    function updateData($table, $data, $id, $field = "id")
    {
        $this->db->trans_start();
        $this->db->where($field,$id);
        $this->db->update($table,$data);

        $this->db->trans_complete();
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            // any trans error?
            if ($this->db->trans_status() === FALSE) {
                return false;
            }
            return true;
        }
    }

    function update($table, $data,$arr_filter )
    {
        $this->db->trans_start();
        foreach($arr_filter as $by => $val) {
            $this->db->where($by,$val);
        }
        $this->db->update($table,$data);
        $this->db->trans_complete();

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            // any trans error?
            if ($this->db->trans_status() === FALSE) {
                return false;
            }
            return true;
        }
    }

    function delete($table, $arr_filter)
    {
        foreach($arr_filter as $by => $val) {
            $this->db->where($by,$val);
        }
        $this->db->delete($table);
    }    function execQuery($query,$param = array(), $needs_return = false){

        if($needs_return){
            return $this->db->query($query, $param)->result();
        }else{
            $this->db->query($query, $param);
            return true;
        }
    }    public function uploadData(&$data, $file_name, $file_path, $postfix='', $allowedTypes='')
    {
        $config = NULL;
        $config['upload_path'] = $this->config->item($file_path);
        $config['allowed_types'] = $allowedTypes;
        if (isset($_FILES[$file_name]['name']) && !empty($_FILES[$file_name]['name']))
        {
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $exts = explode(".",$_FILES[$file_name]['name']);
            $_FILES[$file_name]['name'] = uniqid("imgGMI_").".".end($exts);
            if ( ! $this->upload->do_upload($file_name))
            {
                $data[$file_name.'_err'] = array('error' => $this->upload->display_errors());
            }
            else
            {
                $uploadImg = $this->upload->data();
                if($uploadImg['file_name'] != '')
                {
                    if (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))
                    {
                        @unlink($this->config->item($file_path).$_POST['old_'.$file_name]);
                    }
                    $data[$file_name] = $uploadImg['file_name'];
                }
            }
        }
        elseif (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))
        {
            $data[$file_name] = $_POST['old_'.$file_name];
        }
    }    public function isAccessible($role_id, $controller_name)
    {
        $query = "
          select rm.role_id, m.menu_id, m.menu_name, m.menu_url, m.menu_path 
          from role_menu rm 
          inner join menu m on rm.menu_id = m.menu_id 
          where rm.role_id = '$role_id'
            and menu_path = '$controller_name'
        ";
  
        $result = $this->db->query($query)->result();
  
        return isset($result) && count($result);
    }
  
    public function isNotAccessible($role_id, $controller_name)
    {
      //return !$this->isAccessible($role_id, $controller_name);
      return false;
    }

}