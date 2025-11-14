<?php
// filepath: /Applications/XAMPP/xamppfiles/htdocs/pio-ci/application/controllers/About.php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends MY_Controller
{

    private $data = array();

    function __construct()
    {
        parent::__construct();
        $this->data['user'] = parent::get_data_user();
        $this->data['menu'] = "about";
        //$this->load->library('ion_auth');
    }

    public function index()
    {
        $mdl = new V1_mdl();

        $filter = array(
            "id" => 1
        );
        $order = array();
        $this->data['setting']  = $mdl->getRow2('setting', $filter, $order);

        $filter = array();
		$order = array(
		);
		$this->data['core_values']  = $mdl->getListTable('core_values', $filter, $order);

        $filter = array();
		$order = array("sort" => 'asc');
		$this->data['milestones']  = $mdl->getListTable('milestones', $filter, $order);

        $filter = array();
		$order = array("sort" => 'asc');
		$this->data['milestones_image']  = $mdl->getListTable('milestones_image', $filter, $order);

        $filter = array();
		$order = array("sort" => 'asc');
		$this->data['team']  = $mdl->getListTable('team', $filter, $order);

        $this->load->view('about_us', $this->data);
    }
}
