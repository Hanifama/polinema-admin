<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {

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
		$this->data['menu'] = "home";
		//$this->load->library('ion_auth');
	}

	public function index()
	{
		$mdl = new V1_mdl();
		
		$filter = array(
			"id" => 1
		);
		$order = array();
		$this->data['setting']  = $mdl->getRow2('setting',$filter,$order);

		$filter = array(
			"status" => "active"
		);
		$order = array();
		$this->data['banner']  = $mdl->getRow2('banner',$filter,$order);

		$filter = array();
		$order = array();
		$this->data['services']  = $mdl->getListTable('services',$filter,$order);
		
		$filter = array(
			"status" => "active"
		);
		$order = array(
			"order_numb" => 'asc'
		);
		$this->data['portfolio']  = $mdl->getListTable('portfolio',$filter,$order,5);

		$filter = array();
		$order = array(
			"order_numb" => 'asc'
		);
		$this->data['client']  = $mdl->getListTable('client',$filter,$order,5);

		//die(var_dump($this->data['portfolio'][1]));
        
		//$this->load->view('fe/base',$this->data);
		$this->load->view('home',$this->data);
	}

	public function detail($id)
	{
		$mdl = new V1_mdl();
		
		$filter = array(
			"id" => 1
		);
		$order = array();
		$this->data['setting']  = $mdl->getRow2('setting',$filter,$order);
		
		$filter = array(
			"status" => "active",
			"id" => $id
		);
		$order = array(
		);
		$this->data['portfolio']  = $mdl->getRow2('portfolio',$filter,$order,5);

		$filter = array(
			"portfolio_id" => $id
		);
		$order = array(
		);
		$this->data['portfolio_image']  = $mdl->getListTable('portfolio_image',$filter,$order);

		//die(var_dump($this->data['portfolio'][1]));
        
		//$this->load->view('fe/base',$this->data);
		$this->load->view('project_detail',$this->data);
	}}
