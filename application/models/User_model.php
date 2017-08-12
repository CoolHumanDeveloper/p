<?php
class User_model extends CI_Model {

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
                $query = $this->db->query("select * from user order by user_id limit 0, 10");
                return $query->result();
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

        public function is_login($userid, $userpwd)
        {
                $query = $this->db->query("select * from user where user_id='$userid' and userpass=password('$userpwd')");
                return $query->result();
        }

        public function getOne($key, $val)
        {
                $query = $this->db->query("select * from user where $key='$val'");
                $res = $query->result();
                return count($res) > 0 ? $res[0] : null;
        }

        public function get_all()
        {
                $query = $this->db->query("select * from user");
                return $query->result();
        }

        public function add($username, $userid, $userpwd, $birthday, $useremail, $usertoken, $status)
        {
                $query = $this->db->query("insert into user(username, user_id, userpass, birthday, email, usertoken, status) values ('$username', '$userid', '$userpwd', '$birthday', '$useremail', '$usertoken', $status)");
        }

        public function edit($id, $username, $birthday, $email)
        {
                $query = $this->db->query("update user set username='$username', birthday='$birthday', email='$email' where id=$id");
        }

        public function editpass($id, $newpass)
        {
                $query = $this->db->query("update user set userpass='$newpass' where id=$id");
        }

        public function verify($id)
        {
                $query = $this->db->query("update user status=1 where id=$id");
        }
}