<?php
include_once("PasswordHash.php");
defined('BASEPATH') OR exit('No direct script access allowed');

class p extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->PasswordHash = new PasswordHash();
	}
	public function index($warn = "")
	{
		$data = array();
		$data = $this->get_global_vars($data);
		if ($data['userinfo'] == null)
			header("location:" . $data['baseurl'] . "welcome/index/unlogedin");
		$data['portfolios'] = $this->portfolio_model->get_all();
		foreach($data['portfolios'] as &$p)
		{
			$src = $data['userinfo']->username . "/" . $data['userinfo']->id . "/v/" . $p->id;
			$hashurl = $this->PasswordHash->TransientKey(16);
			$p->hashurl = $this->hashurl_model->insert(array("src" => $src, "hashurl" => $hashurl));
		}
		$categories = $this->category_model->get_all();
		$data['categories'] = array();
		foreach($categories as $cat)
			$data['categories'][$cat->id] = $cat->name;
		$this->load->view('p', $data);
	}
	public function s($hashurl = "")
	{
		$data = array();
		$data = $this->get_global_vars($data);
		if (isset($_REQUEST['act']))
		{
			$searchstr = $_REQUEST['searchstr'];
			if (!$data['userinfo'])
			{
				header("location:http://www.google.com");
				return;
			}
			$src = $data['userinfo']->username . "/" . $data['userinfo']->id . "/s/" . $searchstr;
			$hashurl = $this->PasswordHash->TransientKey(16);
			$hashurl = $this->hashurl_model->insert(array("src" => $src, "hashurl" => $hashurl));
			redirect("p/s/$hashurl");
		} else if ($hashurl != "") {
			$src = $this->hashurl_model->get_one('hashurl', $hashurl);
			if (!$src)
			{
				if ($data['userinfo'])
					redirect("p");
				else
					header("location:http://www.google.com");
				return;
			}
			$urlinfo = explode("/", $src->src);
			$data['owner'] = $urlinfo[0];
			$data['ownerid'] = $urlinfo[1];
			$data['hashurl'] = $hashurl;
			$searchstr = $urlinfo[3];
		} else {
			header("location:http://www.google.com");
			return;
		}
		$data['searchstr'] = $searchstr;
		$data = $this->get_global_vars($data);
		
		$words = explode(" ", $searchstr);
		$ids = array();
		foreach($words as $w)
		{
			if ($w == "") continue;
			$cats = $this->category_model->get_search($w);
			$catids = array();
			foreach($cats as $cat)
			{
				$catids = array_merge($catids, array($cat->id));
				$catids = array_merge($catids, $this->category_model->get_my_child($cat->id));
			}
			foreach($catids as $catid)
			{
				$posts = $this->portfolio_model->get_all_c($catid);
				foreach($posts as $post)
					if (!in_array($post->id, $ids))
						$ids[] = $post->id;
			}
			$posts = $this->portfolio_model->get_all_s($w);
			foreach($posts as $post)
				if (!in_array($post->id, $ids))
					$ids[] = $post->id;
		}
		
		$data['portfolios'] = $this->portfolio_model->get_all_fids($ids);
		foreach($data['portfolios'] as &$p)
		{
			$src = $data['owner'] . "/" . $data['ownerid'] . "/v/" . $p->id;
			$hashurl = $this->PasswordHash->TransientKey(16);
			$p->hashurl = $this->hashurl_model->insert(array("src" => $src, "hashurl" => $hashurl));
		}
		$categories = $this->category_model->get_all();
		$data['categories'] = array();
		foreach($categories as $cat)
			$data['categories'][$cat->id] = $cat->name;
		$this->load->view('p', $data);
	}
	public function add()
	{
		$data = array();
		$data['editmode'] = true;
		$data = $this->get_global_vars($data);
		if ($data['userinfo'] == null)
			header("location:" . $data['baseurl'] . "welcome/index/unlogedin");
		$data['sorted_cats'] = $this->sortbyparent($this->category_model->get_all());
		$this->load->view('pa', $data);
	}
	public function edit($id)
	{
		$data = array();
		$data['editmode'] = true;
		$data = $this->get_global_vars($data);
		if ($data['userinfo'] == null)
			header("location:" . $data['baseurl'] . "p/index/unlogedin");
		$data = $this->get_global_vars($data);
		$data['sorted_cats'] = $this->sortbyparent($this->category_model->get_all());
		$data['p'] = $this->portfolio_model->get_one('id', $id);
		$this->load->view('pe', $data);
	}
	public function v($hashurl = "")
	{
		if ($hashurl == "")
		{
			header("location:http://www.google.com");
			return;
		}
		$src = $this->hashurl_model->get_one('hashurl', $hashurl);
		$urlinfo = explode("/", $src->src);
		$data = array();
		$data['editmode'] = true;
		$data['owner'] = $urlinfo[0];
		$data['id'] = $urlinfo[3];
		$data = $this->get_global_vars($data);
		$data['sorted_cats'] = $this->sortbyparent($this->category_model->get_all());
		$data['p'] = $this->portfolio_model->get_one('id', $data['id']);
		$categories = $this->category_model->get_all();
		$data['categories'] = array();
		foreach($categories as $cat)
			$data['categories'][$cat->id] = $cat->name;
		$this->load->view('pv', $data);
	}
	public function set()
	{
		/*
		$fp = fopen("debug.txt", "a");
		fputs($fp, print_r($_REQUEST, true) . "\n");
		fclose($fp);
		//*/
		$act = $_REQUEST['act'];
		$data = $this->get_global_vars(array());
		if ($data['userinfo'] == null)
			redirect("p/index/unlogedin");
		$info['id'] = $_REQUEST['pid'];
		$info['subject'] = $_REQUEST['subject'];
		$info['cprivate'] = $_REQUEST['cprivate'];
		$info['cpublic'] = $_REQUEST['cpublic'];
		$info['category'] = implode(",", $_REQUEST['category']);
		if (isset($_FILES['previmg']) && $_FILES['previmg']['name'])
		{
			$previmg = $_FILES['previmg']['name'];
			preg_match("/^.*\.([a-zA-Z0-9]*)$/", $previmg, $matches);
			$ext = $matches[1];
			$previmgfile = time() . "_" . $data['userinfo']->id . "." . $ext;
			$info['previmg'] = $previmgfile;
			$uploadfile = "files/img/$previmgfile";
			move_uploaded_file($_FILES['previmg']['tmp_name'], $uploadfile);
		}
		if ($act == "new")
		{
			$this->portfolio_model->insert($info);
		}
		else if ($act == "edit")
		{
			$this->portfolio_model->update($info);
		}
		redirect("p");
	}
}
