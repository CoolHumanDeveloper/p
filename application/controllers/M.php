<?php
include_once("PasswordHash.php");
defined('BASEPATH') OR exit('No direct script access allowed');

class m extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->PasswordHash = new PasswordHash();
	}
	public function index($cid = 2)
	{
		$data = array();
		$data = $this->get_global_vars($data);
		if (!$data['userinfo'])
		{
			header("location:http://www.google.com");
			return;
		}
		$src = $data['userinfo']->username . "/" . $data['userinfo']->id . "/ms/" . $cid;
		$hashurl = $this->PasswordHash->TransientKey(16);
		$hashurl = $this->hashurl_model->insert(array("src" => $src, "hashurl" => $hashurl));
		redirect("m/s/$hashurl");
	}
	public function s($hashurl = "")
	{
		$data = array();
		$data = $this->get_global_vars($data);
		if ($hashurl != "") {
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
			$cid = $urlinfo[3];
		} else {
			if ($data['userinfo'])
				redirect("p");
			else
				header("location:http://www.google.com");
			return;
		}
		$data['cid'] = $cid;
		$data = $this->get_global_vars($data);
		
		$catids = array_merge(array($cid), $this->category_model->get_my_child($cid));
		$ids = array();
		foreach($catids as $catid)
		{
			$posts = $this->portfolio_model->get_all_c($catid);
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
		$sorted_cats = $this->sortbyparent($categories);
		$data['categories'] = $sorted_cats;
		$data['catnames'] = array();
		$data['cid'] = $cid;
		foreach($sorted_cats as $cat)
			$data['catnames'][$cat->id] = $cat->name;
		$data['cattrunk'] = $this->category_model->get_trunk($cid);
		$this->load->view('m', $data);
	}
}
