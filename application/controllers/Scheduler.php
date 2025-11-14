<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scheduler extends CI_Controller {

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
	}

	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			redirect('admin');
		}else{
			redirect('admin/dashboard');
		}	}

	public function update_stream_spotify(){		$mdl = new V1_mdl();	
		$filter = array(
			"spotify_id<>" => ""
		);
		$order = array(
			"last_update" => 'asc'
		);
		$track = $mdl->getListTable('track',$filter,$order,3);		foreach($track as $row){
			$curl = curl_init();

			curl_setopt_array($curl, [
				CURLOPT_URL => "https://spotify-track-streams-playback-count1.p.rapidapi.com/tracks/spotify_track_streams?spotify_track_id=".$row->spotify_id."&isrc=CA5KR1821202",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"x-rapidapi-host: spotify-track-streams-playback-count1.p.rapidapi.com",
					"x-rapidapi-key: 9a5b661e38msh2b6581306ee4e2ap19f2eajsn55c01ce7bf9c"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$responseData = json_decode($response);
				if($responseData->result == "success"){
					$tracklog = array();
					$tracklog['tlog_id'] = uniqid("", true);
					$tracklog['track_id'] = $responseData->spotify_track_id;
					$tracklog['stream_spotify'] = $responseData->streams;
					$tracklog['growth_spotify'] = $responseData->streams - $row->stream_spotify;
					$insert_id = $mdl->insert('track_log', $tracklog);

					//update
					$upd_track = array();
					$upd_track['stream_spotify'] = $responseData->streams;
					$upd_track['last_update'] = date("Y-m-d H:i:s");
					$filter = array();
					$filter['track_id'] = $row->spotify_id;
					$rs_upd = $mdl->update('track', $upd_track, $filter);

					// TODO calculate artist
					

				}else{

					die(var_dump($responseData));

				}
				

			}
		}

	}

}
