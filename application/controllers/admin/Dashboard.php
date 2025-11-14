<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct() {
        parent::__construct();

        $this->load->library('ion_auth');
        if ($this->V1_mdl->isNotAccessible($this->ion_auth->user()->row()->role_id, $this->router->class)) {
            redirect('auth/logout', 'refresh');
        }
    }

    public function index() {

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        $this->load->model('admin/dashboard_model', 'dashboard');
        /*
        $data["cnt_user"] = $this->dashboard->get_resuma_role();
        $data["transaction"] = $this->dashboard->get_resume();
        $data["topuser"] = $this->dashboard->get_graph_topuser();
        $data["transhis"] = $this->dashboard->get_graph_transaction();
        $data["dtranshis"] = $this->dashboard->get_graph_daily_trans();
        $data["role"] = [$this->ion_auth->user()->row()->role_id];
        */

        $data["cnt_user"] = array();
        $data["transaction"] = array();
        $data["topuser"] = array();
        $data["transhis"] = array();
        $data["dtranshis"] = array();
        $data["role"] = "1";
        // print_r($data["transaction"]);
        //die(var_dump($data["transhis"]));
        //$fields = $this->db->field_data('admin');
        //die(var_dump($fields));

        $this->load->view('admin/dashboard', $data);
    }

    function delete_notification($id = '') {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }

        $id = $_POST['note_id'];

        $data['user_id'] = $userid = $this->tank_auth->get_user_id();

        $data['username'] = $this->tank_auth->get_username();

        $data['email'] = $this->tank_auth->get_email();

        $data['groupid'] = $this->tank_auth->get_group();
        if (isset($id) and !empty($id)) {
            $count = $this->generic->getList('notification', 'c', '', '', 'user_id', $userid, 'id', $id);

            if (isset($count) and !empty($count)) {

                $this->generic->crud('notification', '', 'id', $id, 'delete');

                $this->session->set_flashdata('message', ' Notification Deleted Successfully !');

                redirect('admin/dashboard');
            } else {

                $this->session->set_flashdata('message', ' Invalid Id !');

                redirect('admin/dashboard');
            }
        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('admin/dashboard');
        }
    }

    function common_delete($id = '', $table = '') {

        if (!$this->tank_auth->is_logged_in()) {

            redirect('/auth/login/');
        }

        $id = $_POST['id'];

        $data['user_id'] = $userid = $this->tank_auth->get_user_id();
        if (isset($id) and !empty($id)) {

            $count = $this->generic->getList($table, 'c', '', '', '', '', 'id', $id);

            if (isset($count) and !empty($count)) {

                $this->generic->crud($table, '', 'id', $id, 'delete');
            }
        }
    }
}
