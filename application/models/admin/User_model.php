<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

  public $v_fields = array('user_id', 'user_name', 'user_role', 'user_email', 'user_phone', 'user_verified', 'user_email_token');
  function __construct() {

    parent::__construct();
  }
  function getList($table, $pagination = array()) {
    //  PAGINATION START

    if ((isset($pagination['cur_page'])) and !empty($pagination['per_page'])) {

      $this->db->limit($pagination['per_page'], $pagination['cur_page']);
    }

    //  PAGINATION END
    // sort

    $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields) ? $_GET['sortBy'] : '';

    $order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

    if ($order_by != '') {

      $this->db->order_by($order_by, $order);
    }
    // end sort
    // SEARCH START

    if (!empty($_GET['searchValue']) && $_GET['searchValue'] != "" && !empty($_GET['searchBy']) && $_GET['searchBy'] != "" && in_array($_GET['searchBy'], $this->v_fields)) {

      $this->db->like($_GET['searchBy'], $_GET['searchValue']);
    }

    // SEARCH END
    $this->db->select("$table.* ");

    $this->db->from($table);
    $this->db->order_by("user_id", "desc");

    $query = $this->db->get();

    return $result = $query->result();
  }
  function getListTable($table) {

    $this->db->select("*");

    $this->db->from($table);

    $query = $this->db->get();

    return $result = $query->result();
  }
  function getRow($table, $id) {

    $this->db->select('*');

    $query = $this->db->get_where($table, array('user_id' => $id));

    $data = $query->result();

    return $data[0];
  }

  function getByToken($dvc_key, $token) {

    $this->db->select('*');
    $query = $this->db->get_where('users', array('device_key' => $dvc_key, 'token' => $token));
    $data = $query->result();

    if($data!= null){
      return $data[0];
    }else{
      return null;
    }

    
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
  function getCount($table, $key = '', $value = '') {

    $this->db->select("$table.*");

    if (isset($key) && isset($value) && !empty($key) && !empty($value)) {

      $this->db->where($key, $value);
    }

    $this->db->from($table);
    $query = $this->db->get();

    return $query->num_rows();
  }
  function insert($table, $data) {

    $this->db->insert($table, $data);

    return 1;
  }
  function multiSelectInsert($r_table, $field1, $value1, $field2, $value2 = array()) {

    $this->db->query("delete from $r_table where $field1='$value1'");

    if ($r_table != "" && $field1 != "" && $value1 != "" && $field2 != "" && count($value2) > 0) {

      for ($i = 0; $i < count($value2); $i++) {

        $data[] = array(

          $field1 => $value1,

          $field2 => $value2[$i],

        );
      }

      $this->db->insert_batch($r_table, $data);
    }
  }

  function getActiveMenu($user_id) {
    /*
	  $query = "
    select m.menu_id, m.menu_name, m.menu_icon, m.menu_url, m.menu_path, m.menu_parent, null parent_order, m.menu_order 
    from admin a
    inner join role_menu rm on a.role_id = rm.role_id 
    inner join menu m on rm.menu_id = m.menu_id 
    where a.id = '$user_id'
    union 
    select mc.menu_id, mc.menu_name, mc.menu_icon, mc.menu_url, mc.menu_path, mc.menu_parent, m.menu_order parent_order, mc.menu_order
    from admin a
    inner join role_menu rm on a.role_id = rm.role_id 
    inner join menu m on rm.menu_id = m.menu_id 
    inner join menu mc on m.menu_id = mc.menu_parent 
    where a.id = '$user_id'
    order by coalesce(parent_order, menu_order)
      , case when parent_order is null then 0 else menu_order end

    ";

    return $this->db->query($query)->result(); */ 
	  return true;
  }  function getSelectedIds($table, $id, $select_field, $where_field) {

    $arr = array();

    $this->db->select("$select_field");

    $this->db->from($table);

    $this->db->where("$where_field", $id);

    $query = $this->db->get();

    $data = $query->result();

    foreach ($data as $key => $value) {

      $arr[] = $value->$select_field;
    }

    return $arr;
  }
  function updateData($table, $data, $id) {

    $this->db->where("user_id", $id);

    $this->db->update($table, $data);
  }
  function delete($table, $key = '', $value = '') {

    if (isset($key) && isset($value) && !empty($key) && !empty($value)) {

      $this->db->where($key, $value);
    }

    $this->db->delete($table);
  }

  public function uploadData(&$data, $file_name, $file_path, $postfix = '', $allowedTypes='') {

    $config = NULL;

    $config['upload_path'] = $this->config->item($file_path);

    $config['allowed_types'] = $allowedTypes;

    if (isset($_FILES[$file_name]['name']) && !empty($_FILES[$file_name]['name'])) {

      $this->load->library('upload', $config);

      $this->upload->initialize($config);

      $exts = explode(".", $_FILES[$file_name]['name']);

      $_FILES[$file_name]['name'] = $exts[0] . $postfix . "." . end($exts);

      if (!$this->upload->do_upload($file_name)) {

        $data[$file_name . '_err'] = array('error' => $this->upload->display_errors());
      } else {

        $uploadImg = $this->upload->data();

        if ($uploadImg['file_name'] != '') {

          if (isset($_POST['old_' . $file_name]) && !empty($_POST['old_' . $file_name])) {

            @unlink($this->config->item($file_path) . $_POST['old_' . $file_name]);
          }

          $data[$file_name] = $uploadImg['file_name'];
        }
      }
    } elseif (isset($_POST['old_' . $file_name]) && !empty($_POST['old_' . $file_name])) {

      $data[$file_name] = $_POST['old_' . $file_name];
    }
  }
}
