<?php
class portfolio_model extends CI_Model {

	public $title;
	public $content;
	public $date;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get_last_ten_entries()
	{
		$query = $this->db->query("select * from portfolio order by id desc limit 0, 10");
		return $query->result();
	}

	public function get_all()
	{
		$query = $this->db->query("select * from portfolio order by id desc");
		return $query->result();
	}

	public function get_all_c($cid)
	{
		$query = $this->db->query("select * from portfolio where category='$cid' or category like '$cid,%' or category like '%,$cid' or category like '%,$cid,%' order by id desc");
		return $query->result();
	}

	public function get_all_s($str)
	{
		$query = $this->db->query("select * from portfolio where upper(cpublic) like upper('%$str%') or upper(cprivate) like upper('%$str%') or upper(subject) like upper('%$str%') order by id desc");
		return $query->result();
	}

	public function get_all_fids($ids)
	{
		$con = "";
		foreach($ids as $id)
		{
			$con .= "id=$id or ";
		}
		if ($con == "")
			return array();
		$con = preg_replace("/ or $/", "", $con);
		$query = $this->db->query("select * from portfolio where $con order by id desc");
		return $query->result();
	}

	public function get_one($key, $val)
	{
		$query = $this->db->query("select * from portfolio where $key='$val'");
		$res = $query->result();
		return count($res) > 0 ? $res[0] : null;
	}

	public function insert_entry()
	{
		$this->title    = $_POST['title']; // please read the below note
		$this->content  = $_POST['content'];
		$this->date     = time();

		$this->db->insert('entries', $this);
	}

	public function update_entry()
	{
		$this->title    = $_POST['title'];
		$this->content  = $_POST['content'];
		$this->date     = time();

		$this->db->update('entries', $this, array('id' => $_POST['id']));
	}

	public function insert($info)
	{
		$query = $this->db->query("insert into portfolio (subject, previmg, cprivate, cpublic, category) values ('" . $info['subject'] . "', '" . $info['previmg']. "', '" . $info['cprivate']. "', '" . $info['cpublic']. "', '" . $info['category'] . "');");
	}

	public function update($info)
	{
		if (isset($info['previmg']))
			$query = $this->db->query("update portfolio set subject='" . $info['subject'] . "', previmg='" . $info['previmg'] . "', cprivate='" . $info['cprivate'] . "', cpublic='" . $info['cpublic'] . "', category='" . $info['category'] . "' where id=" . $info['id'] . ";");
		else
			$query = $this->db->query("update portfolio set subject='" . $info['subject'] . "', cprivate='" . $info['cprivate'] . "', cpublic='" . $info['cpublic'] . "', category='" . $info['category'] . "' where id=" . $info['id'] . ";");
	}
}