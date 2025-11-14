<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends MY_Controller {

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

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->data['user'] = parent::get_data_user();
        $this->data['menu'] = "appointment";
        $this->load->library('form_validation');
        //$this->load->library('ion_auth');
    }

    public function index() {
        $mdl = new V1_mdl();

        $filter = array(
            "id" => 1
        );
        $order = array();
        $this->data['setting']  = $mdl->getRow2('setting', $filter, $order);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('company', 'Company', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required|trim');
        $this->form_validation->set_rules('service_id', 'Service', 'required|trim');        

        $data['errors'] = array();
        if ($this->form_validation->run() == TRUE) {
            $saveData['name'] = set_value('name');
            $saveData['company'] = set_value('company');
            $saveData['email'] = set_value('email');
            $saveData['whatsapp'] = set_value('whatsapp');
            $saveData['service_id'] = set_value('service_id');
            $saveData['created'] = date('Y-m-d H:i:s');
            $saveData['status'] = 'new';

            $insert_id = $mdl->insert('appointment', $saveData);                        

            $this->session->set_flashdata('message', 'Thank you for your interest! <br />Our team will be in touch shortly');
        } 

        $filter = array();
        $order = array();
        $this->data['services']  = $mdl->getListTable('services', $filter, $order, 5);

        //die(var_dump($this->data['portfolio'][1]));
        //$this->load->view('fe/base',$this->data);
        $this->load->view('appointment', $this->data);
    }
}
