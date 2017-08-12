<?php
include_once("PasswordHash.php");
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->PasswordHash = new PasswordHash();
	}
	public function index($warn = '')
	{
		$data = array();
		if (!isset($_SESSION['userid']) || $_SESSION['userid'] == "")
		{
		//	$_SESSION['token'] = $this->PasswordHash->TransientKey(16);
			$token = $this->PasswordHash->TransientKey(16);
			$newdata = array('token' => $token);
			$this->session->set_userdata($newdata);
		}
		if ($warn == "loginfail")
		{
			$data['warn'] = "Incorrect user or password";
		} else {
			$data['warn'] = "";
		}
		$data = $this->get_global_vars($data);
		$data['token'] = $_SESSION['token'];
		if ($data['userinfo'])
			redirect("p");
		$this->load->view('welcome', $data);
	}
	public function login()
	{
		if (!isset($_SESSION['token']) || !isset($_REQUEST['token']) || $_SESSION['token'] != $_REQUEST['token'])
		{
			header("location:http://www.google.com");
			return;
		}
		$userid = $_REQUEST['userid'];
		$userpwd = $_REQUEST['userpwd'];
		$users = $this->user_model->is_login($userid, $userpwd);
		if (count($users) == 0)
			redirect("welcome/index/loginfail");
		$newdata = array('userid' => $userid);
		$this->session->set_userdata($newdata);
		redirect("welcome");
	}
	public function logout()
	{
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('token');
		redirect("welcome");
	}
	public function fileupload()
	{
		/*
		$fp = fopen("debug.txt", "a");
		fputs($fp, print_r($_FILES, true));
		fclose($fp);
		//	*/
		if (isset($_FILES['file']))
		{
			$file = $_FILES['file'];
			$uploaddir = 'files/img/';
			$filename = basename($file['name']);
			preg_match("/.*\.([a-zA-Z0-9]+)$/", $filename, $filenameinfo);
			$exten = $filenameinfo[1];
			$userinfo = $this->get_user_info();
			$newfilename = time() . "_" . $userinfo->id . ".$exten";
			//if (is_uploaded_file($file['tmp_name'])) {
			//	copy($file['tmp_name'], $uploaddir . $newfilename);
			if (move_uploaded_file($file['tmp_name'], $uploaddir . $newfilename)) {
				echo json_encode(array("link" => "http://georg.ueuo.com/p/files/img/" . $newfilename));
			}
		}
	}
}