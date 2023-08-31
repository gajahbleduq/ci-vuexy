<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General {

    public function session_check(){
        $CI =& get_instance();
        $CI->user_id      = $CI->session->userdata('id');
        $CI->user_nama    = $CI->session->userdata('nama');
        $CI->user_email   = $CI->session->userdata('email');
        $CI->user_phone   = $CI->session->userdata('handphone');
        $CI->user_nik     = $CI->session->userdata('nik');
        $CI->user_alamat  = $CI->session->userdata('alamat');
        $CI->user_level   = $CI->session->userdata('ulevel');
        $CI->user_status  = $CI->session->userdata('ustatus'); 
        $CI->wil_camat    = $CI->session->userdata('wil_camat');
        $CI->nama_camat    = $CI->session->userdata('nama_camat');
        $CI->wil_desa  = $CI->session->userdata('wil_desa');
        $CI->nama_desa  = $CI->session->userdata('nama_desa');
        if ($CI->user_id=="") {
            redirect(site_url("logout"));
        }
    }
	
    public function session_active(){
        $CI =& get_instance();
        $CI->user_id      = $CI->session->userdata('id');
        if ($CI->user_id!="") {
            redirect(site_url("home"));
        }
    }	
}