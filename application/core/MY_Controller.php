<?php
class MY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
		$this->load->database();
        $this->load->model("user_model");
		$this->load->model("portfolio_model");
		$this->load->model("category_model");
		$this->load->model("hashurl_model");
        $this->load->library('session');
		$this->baseurl = $this->config->base_url();
        /*
        $this->cur_user=$this->user_model->is_login();
        if($this->cur_user === false){
            header("location:".site_url("common/login"));
        }else{
            $this->input->set_cookie("username",$this->cur_user['username'],60);
            $this->input->set_cookie("password",$this->cur_user['password'],00);
            $this->input->set_cookie("user_id",$this->cur_user['user_id'],60);
        }
        */
    }
    public function get_user_info()
    {
    	if (!isset($_SESSION['userid']) || $_SESSION['userid'] == "")
    		return null;
    	$userinfo = $this->user_model->getOne("user_id", $_SESSION['userid']);
    	return $userinfo;
    }
    public function get_global_vars($data)
    {
		$data["baseurl"] = $this->baseurl;
	//	$data["request_ip"] = $_SERVER['SERVER_ADDR'];
		$data['userinfo'] = $this->get_user_info();
		$data['mycls'] = get_class($this);
    	$data['header'] = $this->load->view("header", $data, true);
    	$data['footer'] = $this->load->view("footer", $data, true);
    	return $data;
    }
	public function sortbyparent($categories)
	{
		$res = array();
		foreach($categories as $cat)
		{
			if ($cat->parent != 0)
				continue;
			$newcat = $cat;
			$newcat->dep = 0;
			$res[] = $newcat;
			$res = array_merge($res, $this->getmychildren($categories, $newcat));
		}
		return $res;
	}
	private function getmychildren($categories, $mine)
	{
		$res = array();
		foreach($categories as $cat)
		{
			if ($mine->id != $cat->parent)
				continue;
			$newcat = $cat;
			$newcat->dep = $mine->dep + 1;
			$res[] = $newcat;
			$res = array_merge($res, $this->getmychildren($categories, $newcat));
		}
		return $res;
	}
	public function getmyallcategory($category)
	{
		$res = array();
		$res[] = $category;
		$childs = $this->get_my_child($category);
		if (count($childs) == 0)
			return $res;
		foreach($childs as $child)
			$res = array_merge($res, $this->getmyallcategory($child->id));
		return $res;
	}
}
?>