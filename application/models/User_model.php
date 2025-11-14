<?php 
class User_model extends CI_Model {

    public $user_id;
    public $level_id;
    public $user_name;
    public $user_bio;
    public $user_password;
    public $user_email;
    public $user_phone;
    public $user_username;
    public $user_cnt_redcard;
    public $created_dt;

    public function get_same_username($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("username", $username);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_email($user_email, $user_id = "")
    {
        $this->db->select('count(1) as count');
        $this->db->from('users');
        $this->db->where("email", $user_email);
        if ($user_id != ""){
            $this->db->where("user_id !=", $user_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->count;
    }

    public function count_username($user_username, $user_id = "")
    {
        $this->db->select('count(1) as count');
        $this->db->from('users');
        $this->db->where("username", $user_username);
        if ($user_id != ""){
            $this->db->where("user_id !=", $user_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->count;
    }

    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    
    public function cek_login($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("email", $username);
        $this->db->or_where("phone", $username);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        } else {
            return null;
        }
    }
    public function cek_email($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("email", $username);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        } else {
            return null;
        }
    }

    public function cek_phone($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("phone", $username);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        } else {
            return null;
        }
    }

    public function auto_login($dvc , $token)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('level', 'user.level_id = level.level_id');
        $this->db->where("device_key", $dvc);
        $this->db->where("token", $token);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        } else {
            return array();
        }
    }

    public function get_by_id($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("user_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function updatebio($user_id, $data)
    {
        return $this->db->update('users', $data, array('user_id' => $user_id));
    }

    public function updatepass($user_id, $data)
    {
        return $this->db->update('users', $data, array('user_id' => $user_id));
    }

    public function update($user_id, $data)
    {
        return $this->db->update('users', $data, array('user_id' => $user_id));
    }

    public function get_resuma_role()
    {
        $sql = "SELECT user_role, count(1) as cnt FROM user GROUP BY user_role";
        $query = $this->db->query($sql, array());
        return $query->result();
    }

}
?>