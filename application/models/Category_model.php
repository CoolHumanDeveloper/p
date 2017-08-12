<?php
class Category_model extends CI_Model {

	public $title;
	public $content;
	public $date;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get_all()
	{
		$query = $this->db->query("select * from category order by id");
		return $query->result();
	}

	public function get_search($str)
	{
		$query = $this->db->query("select * from category where upper(name) like upper('%$str%') order by id");
		return $query->result();
	}

	public function get_one($key, $val)
	{
		$query = $this->db->query("select * from category where $key='$val'");
		$info = $query->result();
		return $info[0];
	}

	public function get_my_child($myid)
	{
		$query = $this->db->query("select * from category where parent='$myid'");
		$infos = $query->result();
		$res = array($myid);
		foreach($infos as $info)
			$res = array_merge($res, $this->get_my_child($info->id));
		return $res;
	}

	public function get_trunk($cid)
	{
		$query = $this->db->query("select * from category where id='$cid'");
		$infos = $query->result();
		$res = $infos[0]->id;
		if ($infos[0]->parent == 0)
			return array($res);
		$res = array_merge($this->get_trunk($infos[0]->parent), array($res));
		return $res;
	}

	public function insert($info)
	{
		$query = $this->db->query("insert into category (name, parent) values ('" . $info['name'] . "', '" . $info['parent']. "');");
	}

	public function update($info)
	{
		$query = $this->db->query("update category set name='" . $info['name'] . "', parent='" . $info['parent']. "' where id=" . $info['id'] . ";");
	}
}