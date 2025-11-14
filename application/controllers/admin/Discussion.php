<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Discussion extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->model('admin/discussion_model', 'discussion');

		if ($this->V1_mdl->isNotAccessible($this->ion_auth->user()->row()->role_id, $this->router->class)) {
			redirect('auth/login', 'refresh');
		}
	}

	function index($id = 1) {
		$cond = "";
		$data['searchBy'] = '';
		$data['searchValue'] = '';
		$v_fields = $this->discussion->v_fields;
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

		$data['csvlink'] = base_url() . 'admin/discussion/export/csv';
		$data['pdflink'] = base_url() . 'admin/discussion/export/pdf';
		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		// PAGINATION
		$config = array();
		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];
		$config["base_url"] = base_url() . "admin/discussion/index";
		$total_row = $this->discussion->getCount('discussion', $searchBy, $searchValue);
		$config["first_url"] = base_url() . "admin/discussion/index" . '?' . $_SERVER['QUERY_STRING'];
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

		$data["results"] = $result = $this->discussion->getList("discussion", $pagi);
		$str_links = $this->pagination->create_links();

		$data["links"] = $str_links;

		// ./ PAGINATION /.
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['discussion']  = $this->discussion->getList('discussion');
			$this->load->view('admin/discussion/manage', $data);
		}
	}
	public function add() {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		$data = NULL;

		$this->form_validation->set_rules('discus_id', 'Discus_id Name', 'trim');
		$this->form_validation->set_rules('title', 'Title Name', 'trim');
		$this->form_validation->set_rules('content', 'Content Name', 'trim');
		$this->form_validation->set_rules("attachment", "Attachment", "trim|xss_clean");

		$this->discussion->uploadData($photo_data, "attachment", "photo_path", "", "gif|jpg|png|jpeg");

		if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

			$data["errors"] = $photo_data["photo_err"];

			$this->form_validation->set_rules("attachment", "Attachment", "trim");
		}
		$this->form_validation->set_rules('attachment_mime', 'Attachment Mime Name', 'trim');
		$this->form_validation->set_rules('created_dt', 'Created Name', 'trim');
		$this->form_validation->set_rules('user_id', 'User_id Name', 'trim');
		$this->form_validation->set_rules('view_cnt', 'View Name', 'trim');
		$this->form_validation->set_rules('like_cnt', 'Like Name', 'trim');
		$this->form_validation->set_rules('comment_cnt', 'Comment Name', 'trim');
		$this->form_validation->set_rules('community_id', 'Community_id Name', 'trim');


		$data['errors'] = array();
		if ($this->form_validation->run() == FALSE) {
			$data["users"] = $this->discussion->getListTable("users");
			$data["communities"] = $this->discussion->getListTable("communities");

			$this->load->view('admin/discussion/add', $data);
		} else {
			$saveData['discus_id'] = set_value('discus_id');
			$saveData['title'] = set_value('title');
			$saveData['content'] = set_value('content');
			if (isset($photo_data["attachment"]) && !empty($photo_data["attachment"])) {

				$saveData["attachment"] = $this->config->item('photo_sv_url') . $photo_data["attachment"];
			}
			$saveData['attachment_mime'] = set_value('attachment_mime');
			$saveData['created_dt'] = set_value('created_dt');
			$saveData['user_id'] = set_value('user_id');
			$saveData['view_cnt'] = set_value('view_cnt');
			$saveData['like_cnt'] = set_value('like_cnt');
			$saveData['comment_cnt'] = set_value('comment_cnt');
			$saveData['community_id'] = set_value('community_id');

			$insert_id = $this->discussion->insert('discussion', $saveData);

			$this->session->set_flashdata('message', 'Discussion Added Successfully!');
			redirect('admin/discussion');
		}
	}

	function view($id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (isset($id) and !empty($id)) {
			$data = NULL;

			$this->form_validation->set_rules('discus_id', 'Discus_id Name', 'trim');
			$this->form_validation->set_rules('title', 'Title Name', 'trim');
			$this->form_validation->set_rules('content', 'Content Name', 'trim');
			$this->form_validation->set_rules("attachment", "Attachment", "trim|xss_clean");

			$this->discussion->uploadData($photo_data, "attachment", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("attachment", "Attachment", "trim");
			}
			$this->form_validation->set_rules('attachment_mime', 'Attachment Mime Name', 'trim');
			$this->form_validation->set_rules('created_dt', 'Created Name', 'trim');
			$this->form_validation->set_rules('user_id', 'User_id Name', 'trim');
			$this->form_validation->set_rules('view_cnt', 'View Name', 'trim');
			$this->form_validation->set_rules('like_cnt', 'Like Name', 'trim');
			$this->form_validation->set_rules('comment_cnt', 'Comment Name', 'trim');
			$this->form_validation->set_rules('community_id', 'Community_id Name', 'trim');
			$data['errors'] = array();
			if ($this->form_validation->run() == FALSE) {
				$data["users"] = $this->discussion->getListTable("users");
				$data["communities"] = $this->discussion->getListTable("communities");



				$data['discussion'] = $this->discussion->getRow('discussion', $id);
				$this->load->view('admin/discussion/view', $data);
			} else {
				redirect('admin/discussion/view');
			}
		} else {
			$this->session->set_flashdata('message', ' Invalid Id !');
			redirect('admin/discussion/view');
		}
	}

	function edit($id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (isset($id) and !empty($id)) {
			$data = NULL;
			$this->form_validation->set_rules('discus_id', 'Discus_id Name', 'trim');
			$this->form_validation->set_rules('title', 'Title Name', 'trim');
			$this->form_validation->set_rules('content', 'Content Name', 'trim');
			$this->form_validation->set_rules("attachment", "Attachment", "trim|xss_clean");

			$this->discussion->uploadData($photo_data, "attachment", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("attachment", "Attachment", "trim");
			}
			$this->form_validation->set_rules('attachment_mime', 'Attachment Mime Name', 'trim');
			$this->form_validation->set_rules('created_dt', 'Created Name', 'trim');
			$this->form_validation->set_rules('user_id', 'User_id Name', 'trim');
			$this->form_validation->set_rules('view_cnt', 'View Name', 'trim');
			$this->form_validation->set_rules('like_cnt', 'Like Name', 'trim');
			$this->form_validation->set_rules('comment_cnt', 'Comment Name', 'trim');
			$this->form_validation->set_rules('community_id', 'Community_id Name', 'trim');

			$data['errors'] = array();
			if ($this->form_validation->run() == FALSE) {


				$data['discussion'] = $this->discussion->getRow('discussion', $id);
				$data["users"] = $this->discussion->getListTable("users");
				$data["communities"] = $this->discussion->getListTable("communities");
				$this->load->view('admin/discussion/edit', $data);
			} else {
				$saveData['discus_id'] = set_value('discus_id');
				$saveData['title'] = set_value('title');
				$saveData['content'] = set_value('content');
				if (isset($photo_data["attachment"]) && !empty($photo_data["attachment"])) {

					$saveData["attachment"] = $this->config->item('photo_sv_url') . $photo_data["attachment"];
				}
				$saveData['attachment_mime'] = set_value('attachment_mime');
				$saveData['created_dt'] = set_value('created_dt');
				$saveData['user_id'] = set_value('user_id');
				$saveData['view_cnt'] = set_value('view_cnt');
				$saveData['like_cnt'] = set_value('like_cnt');
				$saveData['comment_cnt'] = set_value('comment_cnt');
				$saveData['community_id'] = set_value('community_id');

				$this->discussion->updateData('discussion', $saveData, $id);

				$this->session->set_flashdata('message', 'Discussion Updated Successfully!');
				redirect('admin/discussion');
			}
		} else {
			$this->session->set_flashdata('message', ' Invalid Id !');
			redirect('admin/discussion');
		}
	}

	function delete($id = '') {
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if (isset($id) and !empty($id)) {
			$count = $this->discussion->getCount('discussion', 'discussion.discus_id', $id);
			if (isset($count) and !empty($count)) {
				$this->discussion->delete('discussion', 'discus_id', $id);
				$this->session->set_flashdata('message', ' Discussion Deleted Successfully !');
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
			//$count=$this->discussion->getCount('discussion','discussion.id',$id);
			for ($a = 0; $a < count($all_ids); $a++) {
				if ($all_ids[$a] != "") {
					$this->discussion->delete('discussion', 'discus_id', $all_ids[$a]);
					$this->session->set_flashdata('message', ' Discussion(s) Deleted Successfully !');
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
		$v_fields = array('discus_id', 'title', 'content', 'attachment', 'attachment_mime', 'created_dt', 'user_id', 'view_cnt', 'like_cnt', 'comment_cnt', 'community_id');

		$data['sortBy'] = '';
		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';
		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';
		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;
		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';
		$searchValue = addslashes($searchValue);
		$pagi = array('order' => $order, 'order_by' => $order_by);

		$result = $this->discussion->getList("discussion");

		if ($filetype == 'csv') {
			header('Content-Type: application/csv');
			header('Content-Disposition: attachment; filename=discussion.csv');
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
			<h1 align="center">Discussion</h1>
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
			$pdf->Output('discussion.pdf', "D");
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
				if (!is_null($discussion = $this->discussion->getRow('discussion', $id))) {
					$status = $discussion->$field;
					if ($status == 1) {
						$status = 0;
					} else {
						$status = 1;
					}

					$statusData[$field] = $status;
					$this->discussion->updateData('discussion', $statusData, $id);
					$this->session->set_flashdata('message', ucfirst($field) . ' Updated Successfully');
					if (isset($_GET['redirect']) && $_GET['redirect'] != '') {
						redirect($_GET['redirect']);
					} else {
						redirect('admin/discussion');
					}
				} else {
					$this->session->set_flashdata('error', 'Invalid Record Id!');
					redirect('admin/discussion');
				}
			} else {
				$this->session->set_flashdata('error', 'Invalid Record Id!');
				redirect('admin/discussion');
			}
		}
	}
}
