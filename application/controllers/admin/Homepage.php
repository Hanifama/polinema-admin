<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->model('admin/homepage_model','homepage');
		
        if ($this->V1_mdl->isNotAccessible($this->ion_auth->user()->row()->role_id, $this->router->class)) {
            redirect('auth/login', 'refresh');
        }
	}

	function index($id=1)
	{
		$cond="";
		$data['searchBy']='';
		$data['searchValue']='';
		$v_fields=$this->homepage->v_fields;
		$per_page_arr = array('5', '10', '20', '50', '100');

		if (isset($_GET['searchValue']) && isset($_GET['searchBy'])) {
			$data['searchBy']=$_GET['searchBy'];
			$data['searchValue']=$_GET['searchValue'];

			if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" ) {
				$cond="true";
			}
		}

		$data['sortBy']='';
        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';
        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';
        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;
        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';
        $searchValue = addslashes($searchValue);

		if(isset($_GET['sortBy']) && $_GET['sortBy']!=''){
			$data['sortBy']=$_GET['sortBy'];

			if(isset($_GET['order']) && $_GET['order']!=''){
				$_GET['order']=$_GET['order']=='asc'?'desc':'asc';
			} else{
				$_GET['order']='desc';
			}
		}

		$get_q = $_GET;
		foreach ($v_fields as $key => $value) {
			$get_q['sortBy'] = $value;
			$query_result = http_build_query($get_q);
			$data['fields_links'][$value] =current_url().'?'.$query_result;
		}

		$data['csvlink'] = base_url().'admin/homepage/export/csv';
		$data['pdflink'] = base_url().'admin/homepage/export/pdf';
		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";

		// PAGINATION
		$config = array();
		$config['suffix']='?'.$_SERVER['QUERY_STRING'];
        $config["base_url"] = base_url() . "admin/homepage/index";
        $total_row = $this->homepage->getCount('homepage', $searchBy, $searchValue);
        $config["first_url"] = base_url()."admin/homepage/index".'?'.$_SERVER['QUERY_STRING'];
        $config["total_rows"] = $total_row;
        $config["per_page"] = $per_page = $data['per_page'];
        $config["uri_segment"] = $this->uri->total_segments();
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3; //$total_row
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_link'] = 'First';
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);
        if($this->uri->segment(2))
		{
        	$cur_page = $id;
        	$pagi = array("cur_page"=>($cur_page-1)*$per_page, "per_page"=>$per_page, 'order'=>$order, 'order_by'=>$order_by);
        }
        else
		{	
    		$pagi = array("cur_page"=>0, "per_page"=>$per_page);
    	}

        $data["results"] = $result = $this->homepage->getList("homepage",$pagi);
        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;

        // ./ PAGINATION /.
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
        }
		else {
			$data['homepage']  = $this->homepage->getList('homepage');
		    $this->load->view('admin/homepage/manage',$data);
		}
	}
	public function add()
	{   
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

	    $data = NULL;

		$this->form_validation->set_rules('youtube_thumb', 'Youtube_thumb Name', 'trim');
		$this->form_validation->set_rules('youtube_link', 'Youtube_link Name', 'trim');
		$this->form_validation->set_rules('socmed_youtube', 'Socmed_youtube Name', 'trim');
		$this->form_validation->set_rules('socmed_tiktok', 'Socmed_tiktok Name', 'trim');
		$this->form_validation->set_rules('socmed_instagram', 'Socmed_instagram Name', 'trim');
		$this->form_validation->set_rules('socmed_facebook', 'Socmed_facebook Name', 'trim');
		$this->form_validation->set_rules('email_cs', 'Email_cs Name', 'trim');
		$this->form_validation->set_rules('feature_1', 'Feature_1 Name', 'trim');
		$this->form_validation->set_rules('feature_2', 'Feature_2 Name', 'trim');
		$this->form_validation->set_rules('feature_3', 'Feature_3 Name', 'trim');
		$this->form_validation->set_rules('feature_4', 'Feature_4 Name', 'trim');
		$this->form_validation->set_rules('feature_5', 'Feature_5 Name', 'trim');
$this->form_validation->set_rules("feature_1_image", "Feature_1_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_1_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_1_image","Feature_1_image","trim");

	    }$this->form_validation->set_rules("feature_2_image", "Feature_2_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_2_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_2_image","Feature_2_image","trim");

	    }$this->form_validation->set_rules("feature_3_image", "Feature_3_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_3_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_3_image","Feature_3_image","trim");

	    }$this->form_validation->set_rules("feature_4_image", "Feature_4_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_4_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_4_image","Feature_4_image","trim");

	    }$this->form_validation->set_rules("feature_5_image", "Feature_5_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_5_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_5_image","Feature_5_image","trim");

	    }$this->form_validation->set_rules("teknologi_image", "Teknologi_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "teknologi_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("teknologi_image","Teknologi_image","trim");

	    }$this->form_validation->set_rules("teknologi_icon", "Teknologi_icon", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "teknologi_icon", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("teknologi_icon","Teknologi_icon","trim");

	    }		$this->form_validation->set_rules('teknologi_title', 'Teknologi_title Name', 'trim');
		$this->form_validation->set_rules('teknologi_text', 'Teknologi_text Name', 'trim');
$this->form_validation->set_rules("banner_bottom_img", "Banner_bottom_img", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "banner_bottom_img", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("banner_bottom_img","Banner_bottom_img","trim");

	    }		$this->form_validation->set_rules('banner_bottom_url', 'Banner_bottom_url Name', 'trim');
		$this->form_validation->set_rules('contact_email', 'Contact_email Name', 'trim');
		$this->form_validation->set_rules('contact_phone', 'Contact_phone Name', 'trim');
		$this->form_validation->set_rules('contact_address', 'Contact_address Name', 'trim');
		$this->form_validation->set_rules('is_maintenance', 'Is_maintenance Name', 'trim');
			

        $data['errors'] = array();
        if($this->form_validation->run() == FALSE) 
        {
			
		
			$this->load->view('admin/homepage/add', $data);
        }
        else
        {
			$saveData['youtube_thumb'] = set_value('youtube_thumb');
			$saveData['youtube_link'] = set_value('youtube_link');
			$saveData['socmed_youtube'] = set_value('socmed_youtube');
			$saveData['socmed_tiktok'] = set_value('socmed_tiktok');
			$saveData['socmed_instagram'] = set_value('socmed_instagram');
			$saveData['socmed_facebook'] = set_value('socmed_facebook');
			$saveData['email_cs'] = set_value('email_cs');
			$saveData['feature_1'] = set_value('feature_1');
			$saveData['feature_2'] = set_value('feature_2');
			$saveData['feature_3'] = set_value('feature_3');
			$saveData['feature_4'] = set_value('feature_4');
			$saveData['feature_5'] = set_value('feature_5');
if(isset($photo_data["feature_1_image"]) && !empty($photo_data["feature_1_image"]))

		{

	      $saveData["feature_1_image"] = $this->config->item('photo_sv_url').$photo_data["feature_1_image"];

        }if(isset($photo_data["feature_2_image"]) && !empty($photo_data["feature_2_image"]))

		{

	      $saveData["feature_2_image"] = $this->config->item('photo_sv_url').$photo_data["feature_2_image"];

        }if(isset($photo_data["feature_3_image"]) && !empty($photo_data["feature_3_image"]))

		{

	      $saveData["feature_3_image"] = $this->config->item('photo_sv_url').$photo_data["feature_3_image"];

        }if(isset($photo_data["feature_4_image"]) && !empty($photo_data["feature_4_image"]))

		{

	      $saveData["feature_4_image"] = $this->config->item('photo_sv_url').$photo_data["feature_4_image"];

        }if(isset($photo_data["feature_5_image"]) && !empty($photo_data["feature_5_image"]))

		{

	      $saveData["feature_5_image"] = $this->config->item('photo_sv_url').$photo_data["feature_5_image"];

        }if(isset($photo_data["teknologi_image"]) && !empty($photo_data["teknologi_image"]))

		{

	      $saveData["teknologi_image"] = $this->config->item('photo_sv_url').$photo_data["teknologi_image"];

        }if(isset($photo_data["teknologi_icon"]) && !empty($photo_data["teknologi_icon"]))

		{

	      $saveData["teknologi_icon"] = $this->config->item('photo_sv_url').$photo_data["teknologi_icon"];

        }			$saveData['teknologi_title'] = set_value('teknologi_title');
			$saveData['teknologi_text'] = set_value('teknologi_text');
if(isset($photo_data["banner_bottom_img"]) && !empty($photo_data["banner_bottom_img"]))

		{

	      $saveData["banner_bottom_img"] = $this->config->item('photo_sv_url').$photo_data["banner_bottom_img"];

        }			$saveData['banner_bottom_url'] = set_value('banner_bottom_url');
			$saveData['contact_email'] = set_value('contact_email');
			$saveData['contact_phone'] = set_value('contact_phone');
			$saveData['contact_address'] = set_value('contact_address');
			$saveData['is_maintenance'] = set_value('is_maintenance');

			$insert_id = $this->homepage->insert('homepage',$saveData);
			
			$this->session->set_flashdata('message', 'Homepage Added Successfully!');
			redirect('admin/homepage');
	   }
	}

	function view($id)
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if(isset($id) and !empty($id))
		{
		  	$data = NULL;

		$this->form_validation->set_rules('youtube_thumb', 'Youtube_thumb Name', 'trim');
		$this->form_validation->set_rules('youtube_link', 'Youtube_link Name', 'trim');
		$this->form_validation->set_rules('socmed_youtube', 'Socmed_youtube Name', 'trim');
		$this->form_validation->set_rules('socmed_tiktok', 'Socmed_tiktok Name', 'trim');
		$this->form_validation->set_rules('socmed_instagram', 'Socmed_instagram Name', 'trim');
		$this->form_validation->set_rules('socmed_facebook', 'Socmed_facebook Name', 'trim');
		$this->form_validation->set_rules('email_cs', 'Email_cs Name', 'trim');
		$this->form_validation->set_rules('feature_1', 'Feature_1 Name', 'trim');
		$this->form_validation->set_rules('feature_2', 'Feature_2 Name', 'trim');
		$this->form_validation->set_rules('feature_3', 'Feature_3 Name', 'trim');
		$this->form_validation->set_rules('feature_4', 'Feature_4 Name', 'trim');
		$this->form_validation->set_rules('feature_5', 'Feature_5 Name', 'trim');
$this->form_validation->set_rules("feature_1_image", "Feature_1_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_1_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_1_image","Feature_1_image","trim");

	    }$this->form_validation->set_rules("feature_2_image", "Feature_2_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_2_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_2_image","Feature_2_image","trim");

	    }$this->form_validation->set_rules("feature_3_image", "Feature_3_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_3_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_3_image","Feature_3_image","trim");

	    }$this->form_validation->set_rules("feature_4_image", "Feature_4_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_4_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_4_image","Feature_4_image","trim");

	    }$this->form_validation->set_rules("feature_5_image", "Feature_5_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_5_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_5_image","Feature_5_image","trim");

	    }$this->form_validation->set_rules("teknologi_image", "Teknologi_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "teknologi_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("teknologi_image","Teknologi_image","trim");

	    }$this->form_validation->set_rules("teknologi_icon", "Teknologi_icon", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "teknologi_icon", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("teknologi_icon","Teknologi_icon","trim");

	    }		$this->form_validation->set_rules('teknologi_title', 'Teknologi_title Name', 'trim');
		$this->form_validation->set_rules('teknologi_text', 'Teknologi_text Name', 'trim');
$this->form_validation->set_rules("banner_bottom_img", "Banner_bottom_img", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "banner_bottom_img", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("banner_bottom_img","Banner_bottom_img","trim");

	    }		$this->form_validation->set_rules('banner_bottom_url', 'Banner_bottom_url Name', 'trim');
		$this->form_validation->set_rules('contact_email', 'Contact_email Name', 'trim');
		$this->form_validation->set_rules('contact_phone', 'Contact_phone Name', 'trim');
		$this->form_validation->set_rules('contact_address', 'Contact_address Name', 'trim');
		$this->form_validation->set_rules('is_maintenance', 'Is_maintenance Name', 'trim');			$data['errors'] = array();
			if($this->form_validation->run() == FALSE) 
			{
					
					
					

					$data['homepage']=$this->homepage->getRow('homepage',$id);
					$this->load->view('admin/homepage/view', $data);
			}
			else
			{
				redirect('admin/homepage/view');
			}
		}
		else
		{
		$this->session->set_flashdata('message', ' Invalid Id !'); 
		redirect('admin/homepage/view');
		}
	}

	function edit($id)
    {
	 	if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if(isset($id) and !empty($id))
		{
			$data = NULL;
			    		$this->form_validation->set_rules('youtube_thumb', 'Youtube_thumb Name', 'trim');
		$this->form_validation->set_rules('youtube_link', 'Youtube_link Name', 'trim');
		$this->form_validation->set_rules('socmed_youtube', 'Socmed_youtube Name', 'trim');
		$this->form_validation->set_rules('socmed_tiktok', 'Socmed_tiktok Name', 'trim');
		$this->form_validation->set_rules('socmed_instagram', 'Socmed_instagram Name', 'trim');
		$this->form_validation->set_rules('socmed_facebook', 'Socmed_facebook Name', 'trim');
		$this->form_validation->set_rules('email_cs', 'Email_cs Name', 'trim');
		$this->form_validation->set_rules('feature_1', 'Feature_1 Name', 'trim');
		$this->form_validation->set_rules('feature_2', 'Feature_2 Name', 'trim');
		$this->form_validation->set_rules('feature_3', 'Feature_3 Name', 'trim');
		$this->form_validation->set_rules('feature_4', 'Feature_4 Name', 'trim');
		$this->form_validation->set_rules('feature_5', 'Feature_5 Name', 'trim');
$this->form_validation->set_rules("feature_1_image", "Feature_1_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_1_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_1_image","Feature_1_image","trim");

	    }$this->form_validation->set_rules("feature_2_image", "Feature_2_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_2_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_2_image","Feature_2_image","trim");

	    }$this->form_validation->set_rules("feature_3_image", "Feature_3_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_3_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_3_image","Feature_3_image","trim");

	    }$this->form_validation->set_rules("feature_4_image", "Feature_4_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_4_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_4_image","Feature_4_image","trim");

	    }$this->form_validation->set_rules("feature_5_image", "Feature_5_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "feature_5_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("feature_5_image","Feature_5_image","trim");

	    }$this->form_validation->set_rules("teknologi_image", "Teknologi_image", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "teknologi_image", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("teknologi_image","Teknologi_image","trim");

	    }$this->form_validation->set_rules("teknologi_icon", "Teknologi_icon", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "teknologi_icon", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("teknologi_icon","Teknologi_icon","trim");

	    }		$this->form_validation->set_rules('teknologi_title', 'Teknologi_title Name', 'trim');
		$this->form_validation->set_rules('teknologi_text', 'Teknologi_text Name', 'trim');
$this->form_validation->set_rules("banner_bottom_img", "Banner_bottom_img", "trim|xss_clean");

         $this->homepage->uploadData($photo_data, "banner_bottom_img", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("banner_bottom_img","Banner_bottom_img","trim");

	    }		$this->form_validation->set_rules('banner_bottom_url', 'Banner_bottom_url Name', 'trim');
		$this->form_validation->set_rules('contact_email', 'Contact_email Name', 'trim');
		$this->form_validation->set_rules('contact_phone', 'Contact_phone Name', 'trim');
		$this->form_validation->set_rules('contact_address', 'Contact_address Name', 'trim');
		$this->form_validation->set_rules('is_maintenance', 'Is_maintenance Name', 'trim');

            $data['errors'] = array();
            if($this->form_validation->run() == FALSE) 
            {
            	
            	
              	$data['homepage']=$this->homepage->getRow('homepage',$id);
              	
				$this->load->view('admin/homepage/edit', $data);
            }
            else
            {
			   				$saveData['youtube_thumb'] = set_value('youtube_thumb');
			$saveData['youtube_link'] = set_value('youtube_link');
			$saveData['socmed_youtube'] = set_value('socmed_youtube');
			$saveData['socmed_tiktok'] = set_value('socmed_tiktok');
			$saveData['socmed_instagram'] = set_value('socmed_instagram');
			$saveData['socmed_facebook'] = set_value('socmed_facebook');
			$saveData['email_cs'] = set_value('email_cs');
			$saveData['feature_1'] = set_value('feature_1');
			$saveData['feature_2'] = set_value('feature_2');
			$saveData['feature_3'] = set_value('feature_3');
			$saveData['feature_4'] = set_value('feature_4');
			$saveData['feature_5'] = set_value('feature_5');
if(isset($photo_data["feature_1_image"]) && !empty($photo_data["feature_1_image"]))

		{

	      $saveData["feature_1_image"] = $this->config->item('photo_sv_url').$photo_data["feature_1_image"];

        }if(isset($photo_data["feature_2_image"]) && !empty($photo_data["feature_2_image"]))

		{

	      $saveData["feature_2_image"] = $this->config->item('photo_sv_url').$photo_data["feature_2_image"];

        }if(isset($photo_data["feature_3_image"]) && !empty($photo_data["feature_3_image"]))

		{

	      $saveData["feature_3_image"] = $this->config->item('photo_sv_url').$photo_data["feature_3_image"];

        }if(isset($photo_data["feature_4_image"]) && !empty($photo_data["feature_4_image"]))

		{

	      $saveData["feature_4_image"] = $this->config->item('photo_sv_url').$photo_data["feature_4_image"];

        }if(isset($photo_data["feature_5_image"]) && !empty($photo_data["feature_5_image"]))

		{

	      $saveData["feature_5_image"] = $this->config->item('photo_sv_url').$photo_data["feature_5_image"];

        }if(isset($photo_data["teknologi_image"]) && !empty($photo_data["teknologi_image"]))

		{

	      $saveData["teknologi_image"] = $this->config->item('photo_sv_url').$photo_data["teknologi_image"];

        }if(isset($photo_data["teknologi_icon"]) && !empty($photo_data["teknologi_icon"]))

		{

	      $saveData["teknologi_icon"] = $this->config->item('photo_sv_url').$photo_data["teknologi_icon"];

        }			$saveData['teknologi_title'] = set_value('teknologi_title');
			$saveData['teknologi_text'] = set_value('teknologi_text');
if(isset($photo_data["banner_bottom_img"]) && !empty($photo_data["banner_bottom_img"]))

		{

	      $saveData["banner_bottom_img"] = $this->config->item('photo_sv_url').$photo_data["banner_bottom_img"];

        }			$saveData['banner_bottom_url'] = set_value('banner_bottom_url');
			$saveData['contact_email'] = set_value('contact_email');
			$saveData['contact_phone'] = set_value('contact_phone');
			$saveData['contact_address'] = set_value('contact_address');
			$saveData['is_maintenance'] = set_value('is_maintenance');
					
				$this->homepage->updateData('homepage',$saveData,$id);
				
				$this->session->set_flashdata('message', 'Homepage Updated Successfully!');
				redirect('admin/homepage');
            }
		}
		else
		{
			$this->session->set_flashdata('message', ' Invalid Id !');	
		    redirect('admin/homepage');
		}
	 }

	 function delete($id='')
     {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

 		if(isset($id) and !empty($id))
		{
			$count=$this->homepage->getCount('homepage','homepage.id',$id);
			if(isset($count) and !empty($count))
			{
				$this->homepage->delete('homepage','id',$id);
				$this->session->set_flashdata('message', ' Homepage Deleted Successfully !');
	            echo "success";
           		exit;
			}
			else
			{
				$this->session->set_flashdata('message', ' Invalid Id !');	
			}
		}
		else
		{
			$this->session->set_flashdata('message', ' Invalid Id !');
		}
	}

	function deleteAll($id='')
    {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		$all_ids = $_POST["allIds"];
 		if(isset($all_ids) and !empty($all_ids))
		{
			//$count=$this->homepage->getCount('homepage','homepage.id',$id);
			for($a=0; $a<count($all_ids); $a++)
	  		{
	  			if($all_ids[$a]!="")
	  			{
					$this->homepage->delete('homepage','id',$all_ids[$a]);
					$this->session->set_flashdata('message', ' Homepage(s) Deleted Successfully !');
				}
	  		}	

            echo "success";
       		exit;
		}
		else
		{
			$this->session->set_flashdata('message', ' Invalid Id !');
		}
	}

	function export($filetype='csv'){
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		$searchBy='';
		$searchValue='';
		$v_fields=array('youtube_thumb', 'youtube_link', 'socmed_youtube', 'socmed_tiktok', 'socmed_instagram', 'socmed_facebook', 'email_cs', 'feature_1', 'feature_2', 'feature_3', 'feature_4', 'feature_5', 'feature_1_image', 'feature_2_image', 'feature_3_image', 'feature_4_image', 'feature_5_image', 'teknologi_image', 'teknologi_icon', 'teknologi_title', 'teknologi_text', 'banner_bottom_img', 'banner_bottom_url', 'contact_email', 'contact_phone', 'contact_address', 'is_maintenance');

		$data['sortBy']='';
        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';
        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';
        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;
        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';
        $searchValue = addslashes($searchValue);
        $pagi = array('order'=>$order, 'order_by'=>$order_by);

		$result = $this->homepage->getList("homepage");

		if($filetype=='csv'){
			header('Content-Type: application/csv');
			header('Content-Disposition: attachment; filename=homepage.csv');
			header('Pragma: no-cache');

			$csv='Sr. No,'.implode(',', $v_fields)."\n";
			foreach ($result as $key => $value) {
				$line=($key+1).',';
				foreach ($v_fields as $field) {
					$line.='"'.addslashes($value->$field).'"'.',';
				}
				$csv.=ltrim($line,',')."\n";
			}
			echo $csv; exit;
		} elseif ($filetype=='pdf'){
			error_reporting(0);
			ob_start();
			$this->load->library('m_pdf');
			$table='
			<html>
			<head><title></title>
			<style>
			table{
				border:1px solid;
			}
			tr:nth-child(even)
			{
			    background-color: rgba(158, 158, 158, 0.82);
			}
			</style>
			</head>
			<body>
			<h1 align="center">Homepage</h1>
			<table><tr>';
			$table.='<th>Sr. No</th>';
			foreach ($v_fields as $value) {
				$table.='<th>'.$value.'</th>';
			}

			$table.='</tr>';
			foreach ($result as $key => $value) {
				$table.='<tr><td>'.($key+1).'</td>';
				foreach ($v_fields as $field) {
					$table.='<td>'.$value->$field.'</td>';
				}
				$table.='</tr>';
			}

			$table.='</table></body></html>';

			ob_clean();
			$pdf = $this->m_pdf->load();
			$pdf->WriteHTML($table);
			$pdf->Output('homepage.pdf', "D");
			exit;
		} else{
			echo 'Invalid option'; exit;
		}
	}

	function status($field,$id)
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (in_array($field, array()))
		{
			if(isset($id) && !empty($id))
			{
				if (!is_null($homepage=$this->homepage->getRow('homepage',$id)))	
				{					
					$status = $homepage->$field;				
					if($status == 1){
						$status = 0;
					}else{
						$status = 1;
					}

					$statusData[$field] = $status;
					$this->homepage->updateData('homepage',$statusData,$id);
					$this->session->set_flashdata('message', ucfirst($field).' Updated Successfully');
					if(isset($_GET['redirect']) && $_GET['redirect']!=''){
						redirect($_GET['redirect']);
					} else{
						redirect('admin/homepage');
					}
				} else {
					$this->session->set_flashdata('error', 'Invalid Record Id!');
					redirect('admin/homepage');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Invalid Record Id!');
				redirect('admin/homepage');
			}
		}
	}
}
