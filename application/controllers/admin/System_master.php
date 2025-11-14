<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class System_master extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->model('admin/system_master_model','system_master');
		
        if ($this->V1_mdl->isNotAccessible($this->ion_auth->user()->row()->role_id, $this->router->class)) {
            redirect('auth/login', 'refresh');
        }
	}

	function index($id=1)
	{
		$cond="";
		$data['searchBy']='';
		$data['searchValue']='';
		$v_fields=$this->system_master->v_fields;
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

		$data['csvlink'] = base_url().'admin/system_master/export/csv';
		$data['pdflink'] = base_url().'admin/system_master/export/pdf';
		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";

		// PAGINATION
		$config = array();
		$config['suffix']='?'.$_SERVER['QUERY_STRING'];
        $config["base_url"] = base_url() . "admin/system_master/index";
        $total_row = $this->system_master->getCount('system_master', $searchBy, $searchValue);
        $config["first_url"] = base_url()."admin/system_master/index".'?'.$_SERVER['QUERY_STRING'];
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

        $data["results"] = $result = $this->system_master->getList("system_master",$pagi);
        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;

        // ./ PAGINATION /.
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
        }
		else {
			$data['system_master']  = $this->system_master->getList('system_master');
		    $this->load->view('admin/system_master/manage',$data);
		}
	}
	
	public function add($custom = '')
	{   
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		$data = NULL;

		$this->form_validation->set_rules('category', 'Category Name', 'trim');
		$this->form_validation->set_rules('sub_category', 'Sub_category Name', 'trim');
		$this->form_validation->set_rules('key', 'Key Name', 'trim');
		$this->form_validation->set_rules('description', 'Description Name', 'trim');
		$this->form_validation->set_rules('status', 'Status Name', 'trim');

		$data['errors'] = array();
		if ($this->form_validation->run() == FALSE) {
			if($custom == "sponsor"){
				//die('sponsor');
				$data['default']['category'] = "app_information";
				$data['default']['sub_category'] = "sponsor_by";
				$data['default']['key'] = "logo_sponsor_".date("Ymd");
				$data['default']['type'] = "image";
			}
			$this->load->view('admin/system_master/add', $data);
		} else {
			$value_type = $this->input->post('value_type');

			$saveData['category'] = set_value('category');
			$saveData['sub_category'] = set_value('sub_category');
			$saveData['key'] = set_value('key');
			$saveData['description'] = set_value('description');
			$saveData['status'] = set_value('status');

			if ($value_type == 'image' && !empty($_FILES['value_image']['name'])) {
				$config['upload_path'] = './uploads/photo/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
				$config['max_size'] = 2048;
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('value_image')) {
					$uploadData = $this->upload->data();
					$base_url = base_url();
					$saveData['value'] = $base_url . 'uploads/photo/' . $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/system_master/add');
				}
			} elseif ($value_type == 'image') {
				$saveData['value'] = $this->input->post('value_image_url', TRUE);
			} else {
				$saveData['value'] = $this->input->post('value_text', TRUE);
			}

			$this->system_master->insert('system_master', $saveData);
			$this->session->set_flashdata('message', 'System_master Added Successfully!');
			redirect('admin/system_master');
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

		$this->form_validation->set_rules('category', 'Category Name', 'trim');
		$this->form_validation->set_rules('sub_category', 'Sub_category Name', 'trim');
		$this->form_validation->set_rules('key', 'Key Name', 'trim');
		$this->form_validation->set_rules('value', 'Value Name', 'trim');
		$this->form_validation->set_rules('description', 'Description Name', 'trim');
		$this->form_validation->set_rules('status', 'Status Name', 'trim');


			$data['errors'] = array();
			if($this->form_validation->run() == FALSE) 
			{
					
					
					

					$data['system_master']=$this->system_master->getRow('system_master',$id);
					$this->load->view('admin/system_master/view', $data);
			}
			else
			{
				redirect('admin/system_master/view');
			}
		}
		else
		{
		$this->session->set_flashdata('message', ' Invalid Id !'); 
		redirect('admin/system_master/view');
		}
	}

	function edit($id)
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (isset($id) and !empty($id)) {
			$this->form_validation->set_rules('category', 'Category Name', 'trim');
			$this->form_validation->set_rules('sub_category', 'Sub_category Name', 'trim');
			$this->form_validation->set_rules('key', 'Key Name', 'trim');
			$this->form_validation->set_rules('description', 'Description Name', 'trim');
			$this->form_validation->set_rules('status', 'Status Name', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$data['system_master'] = $this->system_master->getRow('system_master', $id);
				$this->load->view('admin/system_master/edit', $data);
			} else {
				$value_type = $this->input->post('value_type');

				$saveData['category'] = set_value('category');
				$saveData['sub_category'] = set_value('sub_category');
				$saveData['key'] = set_value('key');
				$saveData['description'] = set_value('description');
				$saveData['status'] = set_value('status');

				if ($value_type == 'image' && !empty($_FILES['value_image']['name'])) {
					$config['upload_path'] = './uploads/photo/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
					$config['max_size'] = 2048;
					$config['encrypt_name'] = TRUE;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('value_image')) {
						$uploadData = $this->upload->data();
						$base_url = base_url();
						$saveData['value'] = $base_url . 'uploads/photo/' . $uploadData['file_name'];

						$old = $this->system_master->getRow('system_master', $id);
						if (!empty($old->value)) {
							$old_path = str_replace($base_url, '', $old->value);
							if (file_exists(FCPATH . $old_path)) {
								@unlink(FCPATH . $old_path);
							}
						}
					} else {
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/system_master/edit/' . $id);
					}
				} elseif ($value_type == 'image') {
					$saveData['value'] = $this->input->post('value_image_url', TRUE);
				} else {
					$saveData['value'] = $this->input->post('value_text', TRUE);
				}

				$this->system_master->updateData('system_master', $saveData, $id);

				$this->session->set_flashdata('message', 'System_master Updated Successfully!');
				redirect('admin/system_master');
			}
		} else {
			$this->session->set_flashdata('message', 'Invalid Id !');
			redirect('admin/system_master');
		}
	}



	 function delete($id='')
     {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

 		if(isset($id) and !empty($id))
		{
			$count=$this->system_master->getCount('system_master','system_master.id',$id);
			if(isset($count) and !empty($count))
			{
				$this->system_master->delete('system_master','id',$id);
				$this->session->set_flashdata('message', ' System_master Deleted Successfully !');
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
			//$count=$this->system_master->getCount('system_master','system_master.id',$id);
			for($a=0; $a<count($all_ids); $a++)
	  		{
	  			if($all_ids[$a]!="")
	  			{
					$this->system_master->delete('system_master','id',$all_ids[$a]);
					$this->session->set_flashdata('message', ' System_master(s) Deleted Successfully !');
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
		$v_fields=array('category', 'sub_category', 'key', 'value', 'description', 'status');

		$data['sortBy']='';
        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';
        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';
        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;
        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';
        $searchValue = addslashes($searchValue);
        $pagi = array('order'=>$order, 'order_by'=>$order_by);

		$result = $this->system_master->getList("system_master");

		if($filetype=='csv'){
			header('Content-Type: application/csv');
			header('Content-Disposition: attachment; filename=system_master.csv');
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
			<h1 align="center">System_master</h1>
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
			$pdf->Output('system_master.pdf', "D");
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
				if (!is_null($system_master=$this->system_master->getRow('system_master',$id)))	
				{					
					$status = $system_master->$field;				
					if($status == 1){
						$status = 0;
					}else{
						$status = 1;
					}

					$statusData[$field] = $status;
					$this->system_master->updateData('system_master',$statusData,$id);
					$this->session->set_flashdata('message', ucfirst($field).' Updated Successfully');
					if(isset($_GET['redirect']) && $_GET['redirect']!=''){
						redirect($_GET['redirect']);
					} else{
						redirect('admin/system_master');
					}
				} else {
					$this->session->set_flashdata('error', 'Invalid Record Id!');
					redirect('admin/system_master');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Invalid Record Id!');
				redirect('admin/system_master');
			}
		}
	}
}
