<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function get_data_user() {

        $user = array(
            'id' => '',
            'name' => '',
            'balance' => '0',
            'token' => '',
            'key' => '',
            'photo' => '',
            'badge' => '',
            'email' => '',
            'lvl' => '0',
        );



        if ($this->session->userdata('id') != "") {
            $user = $this->session->userdata;
            //die(var_dump($this->session->userdata));
            
        }
        return $user;
    }

    function check_auth($base = ""){
        if($this->session->userdata('id') == ""){
			$this->session->set_flashdata('message', 'Login dulu yaa, untuk bisa menggunakan fitur ini');
        	redirect(base_url().$base);
		}
    }


    function encrypt_decrypt($action, $string, $key = "") {
        $output = false;
        $encrypt_method = "AES-256-CBC";

        $secret_key = '4N1';
        if ($key != "") {
            $secret_key = $key;
        }

        $secret_iv = IV_KEY;
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'e') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    function startsWith($string, $startString) {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    function normalize_number($nohp) {
        $nohp = str_replace(" ", "", $nohp);
        $nohp = str_replace("(", "", $nohp);
        $nohp = str_replace(")", "", $nohp);
        $nohp = str_replace(".", "", $nohp);
        $valid_nohp = $nohp;
        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp), 0, 3) == '+62') {
                $valid_nohp = '62' . substr(trim($nohp), 3);
            } elseif (substr(trim($nohp), 0, 1) == '0') {
                //$valid_nohp = trim($nohp);
                $valid_nohp = '62' . substr(trim($nohp), 1);
            } elseif (substr(trim($nohp), 0, 2) == '62') {

                $valid_nohp = trim($nohp);
            }
        }

        return $valid_nohp;
    }

    function humanTiming($time, $type = "past") {
        $time = $type === "past" ? time() - $time : $time - time();
        $time = ($time < 1) ? 1 : $time;
        $tokens = array(
            31536000 => 'tahun',
            2592000 => 'bulan',
            604800 => 'minggu',
            86400 => 'hari',
            3600 => 'jam',
            60 => 'menit',
            1 => 'detik'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? '' : '');
        }
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function curl_request($method = 'post', $url="", $headers = array(), $data = array()){
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url );
        if($method == 'post'){
            curl_setopt( $ch,CURLOPT_POST, true );
        }
        if($method == 'get'){
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        }
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $data ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        $responseData = json_decode($result);

        return $responseData ;
    }
}
