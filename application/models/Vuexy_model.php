<?php
class Vuexy_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_login($userid, $passwd) {
		$mpass = md5($passwd);
		$sql = "SELECT a.id, a.nama, a.email, a.handphone, a.nik, a.alamat, a.wil_kec, b.nama AS nama_kec, a.wil_desa, c.nama AS nama_desa, a.user_level, a.user_status
				FROM t_user
				WHERE a.username = ? AND a.password = ?";
		$query = $this->db->query($sql, array($userid, $mpass));
	
		// Display the executed query
		// $last_query = $this->db->last_query();
		// echo "Executed Query: " . $last_query . "<br>";
	
		return $query->result_array();
	}

}