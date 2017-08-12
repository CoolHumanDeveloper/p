<?php
class hashurl_model extends CI_Model {

	public $title;
	public $content;
	public $date;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get_one($key, $val)
	{
		$query = $this->db->query("select * from hashurl where $key='$val'");
		$res = $query->result();
		return count($res) > 0 ? $res[0] : null;
	}

	public function insert($info)
	{
		$query = $this->db->query("select * from hashurl where src='{$info['src']}'");
		$res = $query->result();
		if (count($res) > 0)
			return $res[0]->hashurl;
		$query = $this->db->query("insert into hashurl (src, hashurl) values ('" . $info['src'] . "', '" . $info['hashurl']. "');");
		return $info['hashurl'];
	}
}