<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vouchers extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->model('admin/vouchers_model', 'vouchers');

		if ($this->V1_mdl->isNotAccessible($this->ion_auth->user()->row()->role_id, $this->router->class)) {
			redirect('auth/login', 'refresh');
		}
	}

	function index($id = 1) {
		$cond = "";
		$data['searchBy'] = '';
		$data['searchValue'] = '';
		$v_fields = $this->vouchers->v_fields;
		$per_page_arr = array('5', '10', '20', '50', '100');

		if (isset($_GET['searchValue']) && isset($_GET['searchBy'])) {
			$data['searchBy'] = $_GET['searchBy'];
			$data['searchValue'] = $_GET['searchValue'];

			if (!empty($_GET['searchValue']) && $_GET['searchValue'] != "" && !empty($_GET['searchBy']) && $_GET['searchBy'] != "") {
				$cond = "true";
			}
		}

		$data['sortBy'] = '';
		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';
		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';
		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;
		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';
		$searchValue = addslashes($searchValue);

		if (isset($_GET['sortBy']) && $_GET['sortBy'] != '') {
			$data['sortBy'] = $_GET['sortBy'];

			if (isset($_GET['order']) && $_GET['order'] != '') {
				$_GET['order'] = $_GET['order'] == 'asc' ? 'desc' : 'asc';
			} else {
				$_GET['order'] = 'desc';
			}
		}

		$get_q = $_GET;
		foreach ($v_fields as $key => $value) {
			$get_q['sortBy'] = $value;
			$query_result = http_build_query($get_q);
			$data['fields_links'][$value] = current_url() . '?' . $query_result;
		}

		$data['csvlink'] = base_url() . 'admin/vouchers/export/csv';
		$data['pdflink'] = base_url() . 'admin/vouchers/export/pdf';
		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		// PAGINATION
		$config = array();
		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];
		$config["base_url"] = base_url() . "admin/vouchers/index";
		$total_row = $this->vouchers->getCount('vouchers', $searchBy, $searchValue);
		$config["first_url"] = base_url() . "admin/vouchers/index" . '?' . $_SERVER['QUERY_STRING'];
		$config["total_rows"] = $total_row;
		$config["per_page"] = $per_page = $data['per_page'];
		$config["uri_segment"] = $this->uri->total_segments();
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 3; //$total_row
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
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
		if ($this->uri->segment(2)) {
			$cur_page = $id;
			$pagi = array("cur_page" => ($cur_page - 1) * $per_page, "per_page" => $per_page, 'order' => $order, 'order_by' => $order_by);
		} else {
			$pagi = array("cur_page" => 0, "per_page" => $per_page);
		}

		$data["results"] = $result = $this->vouchers->getList("vouchers", $pagi);
		$str_links = $this->pagination->create_links();

		$data["links"] = $str_links;

		// ./ PAGINATION /.
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['vouchers']  = $this->vouchers->getList('vouchers');
			$this->load->view('admin/vouchers/manage', $data);
		}
	}
	public function add() {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		$data = NULL;

		$this->form_validation->set_rules('voucher_id', 'Voucher_id Name', 'trim');
		$this->form_validation->set_rules('tenant_id', 'Tenant_id Name', 'trim');
		$this->form_validation->set_rules('title', 'Title Name', 'trim');
		$this->form_validation->set_rules('description', 'Description Name', 'trim');
		$this->form_validation->set_rules("banner_1", "Banner_1", "trim|xss_clean");

		$this->vouchers->uploadData($photo_data, "banner_1", "photo_path", "", "gif|jpg|png|jpeg");

		if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

			$data["errors"] = $photo_data["photo_err"];

			$this->form_validation->set_rules("banner_1", "Banner_1", "trim");
		}
		$this->form_validation->set_rules("banner_2", "Banner_2", "trim|xss_clean");

		$this->vouchers->uploadData($photo_data, "banner_2", "photo_path", "", "gif|jpg|png|jpeg");

		if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

			$data["errors"] = $photo_data["photo_err"];

			$this->form_validation->set_rules("banner_2", "Banner_2", "trim");
		}
		$this->form_validation->set_rules("banner_3", "Banner_3", "trim|xss_clean");

		$this->vouchers->uploadData($photo_data, "banner_3", "photo_path", "", "gif|jpg|png|jpeg");

		if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

			$data["errors"] = $photo_data["photo_err"];

			$this->form_validation->set_rules("banner_3", "Banner_3", "trim");
		}
		$this->form_validation->set_rules("banner_4", "Banner_4", "trim|xss_clean");

		$this->vouchers->uploadData($photo_data, "banner_4", "photo_path", "", "gif|jpg|png|jpeg");

		if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

			$data["errors"] = $photo_data["photo_err"];

			$this->form_validation->set_rules("banner_4", "Banner_4", "trim");
		}
		$this->form_validation->set_rules('discount_type', 'Discount_type Name', 'trim');
		$this->form_validation->set_rules('discount_value', 'Discount_value Name', 'trim');
		$this->form_validation->set_rules('minimum_amount', 'Minimum_amount Name', 'trim');
		$this->form_validation->set_rules('maximum_discount', 'Maximum_discount Name', 'trim');
		$this->form_validation->set_rules('start_dt', 'Start_dt Name', 'trim');
		$this->form_validation->set_rules('end_dt', 'End_dt Name', 'trim');
		$this->form_validation->set_rules('is_claimed', 'Is_claimed Name', 'trim');
		$this->form_validation->set_rules('quota', 'Quota Name', 'trim');
		$this->form_validation->set_rules('used', 'Used Name', 'trim');
		$this->form_validation->set_rules('created_dt', 'Created Name', 'trim');
		$this->form_validation->set_rules('status', 'Status Name', 'trim');
		$this->form_validation->set_rules('vocat_id', 'Vocat_id Name', 'trim');


		$data['errors'] = array();
		if ($this->form_validation->run() == FALSE) {
			$data["tenants"] = $this->vouchers->getListTable("tenants");
			$data["voucher_categories"] = $this->vouchers->getListTable("voucher_categories");

			$this->load->view('admin/vouchers/add', $data);
		} else {
			$saveData['voucher_id'] = set_value('voucher_id');
			$saveData['tenant_id'] = set_value('tenant_id');
			$saveData['title'] = set_value('title');
			$saveData['description'] = set_value('description');
			if (isset($photo_data["banner_1"]) && !empty($photo_data["banner_1"])) {

				$saveData["banner_1"] = $this->config->item('photo_sv_url') . $photo_data["banner_1"];
			}
			if (isset($photo_data["banner_2"]) && !empty($photo_data["banner_2"])) {

				$saveData["banner_2"] = $this->config->item('photo_sv_url') . $photo_data["banner_2"];
			}
			if (isset($photo_data["banner_3"]) && !empty($photo_data["banner_3"])) {

				$saveData["banner_3"] = $this->config->item('photo_sv_url') . $photo_data["banner_3"];
			}
			if (isset($photo_data["banner_4"]) && !empty($photo_data["banner_4"])) {

				$saveData["banner_4"] = $this->config->item('photo_sv_url') . $photo_data["banner_4"];
			}
			$saveData['discount_type'] = set_value('discount_type');
			$saveData['discount_value'] = set_value('discount_value');
			$saveData['minimum_amount'] = set_value('minimum_amount');
			$saveData['maximum_discount'] = set_value('maximum_discount');
			$saveData['start_dt'] = set_value('start_dt');
			$saveData['end_dt'] = set_value('end_dt');
			$saveData['is_claimed'] = set_value('is_claimed');
			$saveData['quota'] = set_value('quota');
			$saveData['used'] = set_value('used');
			$saveData['created_dt'] = set_value('created_dt');
			$saveData['status'] = set_value('status');
			$saveData['vocat_id'] = set_value('vocat_id');

			$insert_id = $this->vouchers->insert('vouchers', $saveData);

			$this->session->set_flashdata('message', 'Vouchers Added Successfully!');
			redirect('admin/vouchers');
		}
	}

	function view($id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (isset($id) and !empty($id)) {
			$data = NULL;

			$this->form_validation->set_rules('voucher_id', 'Voucher_id Name', 'trim');
			$this->form_validation->set_rules('tenant_id', 'Tenant_id Name', 'trim');
			$this->form_validation->set_rules('title', 'Title Name', 'trim');
			$this->form_validation->set_rules('description', 'Description Name', 'trim');
			$this->form_validation->set_rules("banner_1", "Banner_1", "trim|xss_clean");

			$this->vouchers->uploadData($photo_data, "banner_1", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("banner_1", "Banner_1", "trim");
			}
			$this->form_validation->set_rules("banner_2", "Banner_2", "trim|xss_clean");

			$this->vouchers->uploadData($photo_data, "banner_2", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("banner_2", "Banner_2", "trim");
			}
			$this->form_validation->set_rules("banner_3", "Banner_3", "trim|xss_clean");

			$this->vouchers->uploadData($photo_data, "banner_3", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("banner_3", "Banner_3", "trim");
			}
			$this->form_validation->set_rules("banner_4", "Banner_4", "trim|xss_clean");

			$this->vouchers->uploadData($photo_data, "banner_4", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("banner_4", "Banner_4", "trim");
			}
			$this->form_validation->set_rules('discount_type', 'Discount_type Name', 'trim');
			$this->form_validation->set_rules('discount_value', 'Discount_value Name', 'trim');
			$this->form_validation->set_rules('minimum_amount', 'Minimum_amount Name', 'trim');
			$this->form_validation->set_rules('maximum_discount', 'Maximum_discount Name', 'trim');
			$this->form_validation->set_rules('start_dt', 'Start_dt Name', 'trim');
			$this->form_validation->set_rules('end_dt', 'End_dt Name', 'trim');
			$this->form_validation->set_rules('is_claimed', 'Is_claimed Name', 'trim');
			$this->form_validation->set_rules('quota', 'Quota Name', 'trim');
			$this->form_validation->set_rules('used', 'Used Name', 'trim');
			$this->form_validation->set_rules('created_dt', 'Created Name', 'trim');
			$this->form_validation->set_rules('status', 'Status Name', 'trim');
			$this->form_validation->set_rules('vocat_id', 'Vocat_id Name', 'trim');
			$data['errors'] = array();
			if ($this->form_validation->run() == FALSE) {
				$data["tenants"] = $this->vouchers->getListTable("tenants");
				$data["voucher_categories"] = $this->vouchers->getListTable("voucher_categories");



				$data['vouchers'] = $this->vouchers->getRow('vouchers', $id);
				$this->load->view('admin/vouchers/view', $data);
			} else {
				redirect('admin/vouchers/view');
			}
		} else {
			$this->session->set_flashdata('message', ' Invalid Id !');
			redirect('admin/vouchers/view');
		}
	}

	function edit($id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (isset($id) and !empty($id)) {
			$data = NULL;
			$this->form_validation->set_rules('voucher_id', 'Voucher_id Name', 'trim');
			$this->form_validation->set_rules('tenant_id', 'Tenant_id Name', 'trim');
			$this->form_validation->set_rules('title', 'Title Name', 'trim');
			$this->form_validation->set_rules('description', 'Description Name', 'trim');
			$this->form_validation->set_rules("banner_1", "Banner_1", "trim|xss_clean");

			$this->vouchers->uploadData($photo_data, "banner_1", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("banner_1", "Banner_1", "trim");
			}
			$this->form_validation->set_rules("banner_2", "Banner_2", "trim|xss_clean");

			$this->vouchers->uploadData($photo_data, "banner_2", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("banner_2", "Banner_2", "trim");
			}
			$this->form_validation->set_rules("banner_3", "Banner_3", "trim|xss_clean");

			$this->vouchers->uploadData($photo_data, "banner_3", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("banner_3", "Banner_3", "trim");
			}
			$this->form_validation->set_rules("banner_4", "Banner_4", "trim|xss_clean");

			$this->vouchers->uploadData($photo_data, "banner_4", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("banner_4", "Banner_4", "trim");
			}
			$this->form_validation->set_rules('discount_type', 'Discount_type Name', 'trim');
			$this->form_validation->set_rules('discount_value', 'Discount_value Name', 'trim');
			$this->form_validation->set_rules('minimum_amount', 'Minimum_amount Name', 'trim');
			$this->form_validation->set_rules('maximum_discount', 'Maximum_discount Name', 'trim');
			$this->form_validation->set_rules('start_dt', 'Start_dt Name', 'trim');
			$this->form_validation->set_rules('end_dt', 'End_dt Name', 'trim');
			$this->form_validation->set_rules('is_claimed', 'Is_claimed Name', 'trim');
			$this->form_validation->set_rules('quota', 'Quota Name', 'trim');
			$this->form_validation->set_rules('used', 'Used Name', 'trim');
			$this->form_validation->set_rules('created_dt', 'Created Name', 'trim');
			$this->form_validation->set_rules('status', 'Status Name', 'trim');
			$this->form_validation->set_rules('vocat_id', 'Vocat_id Name', 'trim');

			$data['errors'] = array();
			if ($this->form_validation->run() == FALSE) {


				$data['vouchers'] = $this->vouchers->getRow('vouchers', $id);
				$data["tenants"] = $this->vouchers->getListTable("tenants");
				$data["voucher_categories"] = $this->vouchers->getListTable("voucher_categories");
				$this->load->view('admin/vouchers/edit', $data);
			} else {
				$saveData['voucher_id'] = set_value('voucher_id');
				$saveData['tenant_id'] = set_value('tenant_id');
				$saveData['title'] = set_value('title');
				$saveData['description'] = set_value('description');
				if (isset($photo_data["banner_1"]) && !empty($photo_data["banner_1"])) {

					$saveData["banner_1"] = $this->config->item('photo_sv_url') . $photo_data["banner_1"];
				}
				if (isset($photo_data["banner_2"]) && !empty($photo_data["banner_2"])) {

					$saveData["banner_2"] = $this->config->item('photo_sv_url') . $photo_data["banner_2"];
				}
				if (isset($photo_data["banner_3"]) && !empty($photo_data["banner_3"])) {

					$saveData["banner_3"] = $this->config->item('photo_sv_url') . $photo_data["banner_3"];
				}
				if (isset($photo_data["banner_4"]) && !empty($photo_data["banner_4"])) {

					$saveData["banner_4"] = $this->config->item('photo_sv_url') . $photo_data["banner_4"];
				}
				$saveData['discount_type'] = set_value('discount_type');
				$saveData['discount_value'] = set_value('discount_value');
				$saveData['minimum_amount'] = set_value('minimum_amount');
				$saveData['maximum_discount'] = set_value('maximum_discount');
				$saveData['start_dt'] = set_value('start_dt');
				$saveData['end_dt'] = set_value('end_dt');
				$saveData['is_claimed'] = set_value('is_claimed');
				$saveData['quota'] = set_value('quota');
				$saveData['used'] = set_value('used');
				$saveData['created_dt'] = set_value('created_dt');
				$saveData['status'] = set_value('status');
				$saveData['vocat_id'] = set_value('vocat_id');

				$this->vouchers->updateData('vouchers', $saveData, $id);

				$this->session->set_flashdata('message', 'Vouchers Updated Successfully!');
				redirect('admin/vouchers');
			}
		} else {
			$this->session->set_flashdata('message', ' Invalid Id !');
			redirect('admin/vouchers');
		}
	}

	function delete($id = '') {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (isset($id) and !empty($id)) {
			$count = $this->vouchers->getCount('vouchers', 'vouchers.voucher_id', $id);
			if (isset($count) and !empty($count)) {
				$this->vouchers->delete('vouchers', 'voucher_id', $id);
				$this->session->set_flashdata('message', ' Vouchers Deleted Successfully !');
				echo "success";
				exit;
			} else {
				$this->session->set_flashdata('message', ' Invalid Id !');
			}
		} else {
			$this->session->set_flashdata('message', ' Invalid Id !');
		}
	}

	function deleteAll($id = '') {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		$all_ids = $_POST["allIds"];
		if (isset($all_ids) and !empty($all_ids)) {
			//$count=$this->vouchers->getCount('vouchers','vouchers.id',$id);
			for ($a = 0; $a < count($all_ids); $a++) {
				if ($all_ids[$a] != "") {
					$this->vouchers->delete('vouchers', 'voucher_id', $all_ids[$a]);
					$this->session->set_flashdata('message', ' Vouchers(s) Deleted Successfully !');
				}
			}

			echo "success";
			exit;
		} else {
			$this->session->set_flashdata('message', ' Invalid Id !');
		}
	}

	function export($filetype = 'csv') {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		$searchBy = '';
		$searchValue = '';
		$v_fields = array('voucher_id', 'tenant_id', 'title', 'description', 'banner_1', 'banner_2', 'banner_3', 'banner_4', 'discount_type', 'discount_value', 'minimum_amount', 'maximum_discount', 'start_dt', 'end_dt', 'is_claimed', 'quota', 'used', 'created_dt', 'status', 'vocat_id');

		$data['sortBy'] = '';
		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';
		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';
		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;
		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';
		$searchValue = addslashes($searchValue);
		$pagi = array('order' => $order, 'order_by' => $order_by);

		$result = $this->vouchers->getList("vouchers");

		if ($filetype == 'csv') {
			header('Content-Type: application/csv');
			header('Content-Disposition: attachment; filename=vouchers.csv');
			header('Pragma: no-cache');

			$csv = 'Sr. No,' . implode(',', $v_fields) . "\n";
			foreach ($result as $key => $value) {
				$line = ($key + 1) . ',';
				foreach ($v_fields as $field) {
					$line .= '"' . addslashes($value->$field) . '"' . ',';
				}
				$csv .= ltrim($line, ',') . "\n";
			}
			echo $csv;
			exit;
		} elseif ($filetype == 'pdf') {
			error_reporting(0);
			ob_start();
			$this->load->library('m_pdf');
			$table = '
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
			<h1 align="center">Vouchers</h1>
			<table><tr>';
			$table .= '<th>Sr. No</th>';
			foreach ($v_fields as $value) {
				$table .= '<th>' . $value . '</th>';
			}

			$table .= '</tr>';
			foreach ($result as $key => $value) {
				$table .= '<tr><td>' . ($key + 1) . '</td>';
				foreach ($v_fields as $field) {
					$table .= '<td>' . $value->$field . '</td>';
				}
				$table .= '</tr>';
			}

			$table .= '</table></body></html>';

			ob_clean();
			$pdf = $this->m_pdf->load();
			$pdf->WriteHTML($table);
			$pdf->Output('vouchers.pdf', "D");
			exit;
		} else {
			echo 'Invalid option';
			exit;
		}
	}

	function status($field, $id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (in_array($field, array())) {
			if (isset($id) && !empty($id)) {
				if (!is_null($vouchers = $this->vouchers->getRow('vouchers', $id))) {
					$status = $vouchers->$field;
					if ($status == 1) {
						$status = 0;
					} else {
						$status = 1;
					}

					$statusData[$field] = $status;
					$this->vouchers->updateData('vouchers', $statusData, $id);
					$this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');
					if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
						redirect($_GET['redirect']);
					} else {
						redirect('admin/vouchers');
					}
				} else {
					$this->session->set_flashdata('error', 'Invalid Record Id!');
					redirect('admin/vouchers');
				}
			} else {
				$this->session->set_flashdata('error', 'Invalid Record Id!');
				redirect('admin/vouchers');
			}
		}
	}
}
