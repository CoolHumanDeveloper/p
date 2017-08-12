<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("category_model");
	}
	public function index($id = 0)
	{
		$data = array();
		$data = $this->get_global_vars($data);
		if ($data['userinfo'] == null)
			header("location:" . $data['baseurl'] . "welcome/index/unlogedin");
		$data['categories'] = $this->category_model->get_all();
		$sorted_cats = $this->sortbyparent($data['categories']);
		$data['sorted_cats'] = $sorted_cats;
		$data['cur_id'] = $id;
		if ($id != 0)
		{
			$data['cur_id'] = $id;
			$data['catinfo'] = $this->category_model->get_one('id', $id);
		}
		$this->load->view('category', $data);
	}
	public function set()
	{
		$act = $_REQUEST['act'];
		$cur_id = $_REQUEST['cur_id'];
		$name = trim($_REQUEST['name']);
		$parent = $_REQUEST['parent'];
		
		if ($name == "")
			redirect("category");
		
		if ($act == "new")
		{
			$info['name'] = $name;
			$info['parent'] = $parent;
			$this->category_model->insert($info);
		} else if ($act == "edit") {
			$info['id'] = $cur_id;
			$info['name'] = $name;
			$info['parent'] = $parent;
			$this->category_model->update($info);
		}
		redirect("category");
	}
}
