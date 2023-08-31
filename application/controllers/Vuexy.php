<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vuexy extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Vuexy_model');
	}

	public function index() {
		$this->general->session_active();

		$username = $this->input->post("txt_username", true);
		$passwd = $this->input->post("txt_passwd", true);

		if ($username!="" && $passwd!="") {
			$data_login = $this->Vuexy_model->get_login($username,$passwd);
			
			if (sizeof($data_login)>0) {
				$id = $data_login[0]["id"];
				$nama = $data_login[0]["nama"];
				$email = $data_login[0]["email"];

				$sessdata = array(
					'id' => $id,
					'nama' => $nama,
					'email' => $email
				);

				$this->session->set_userdata($sessdata);

				redirect(site_url("home"));					

			} else {
				$pesan = "Login tidak valid";
			}
		} else {
			$pesan = "Username / Password harus diisi.";
		}

		$data['alert'] = $pesan;

		$this->load->view('login');
	}

	function logout() {
		$this->session->sess_destroy();
		redirect(site_url(""));
	}


	public function home() {
		$this->load->view('site_header');
		$this->load->view('site_sider');
		$this->load->view('home');
		$this->load->view('site_footer');
	}
}