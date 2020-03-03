<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){ // mengecek apakah telah dilakukan login, jika sudah maka masuk ke sessionnya. Jika tidak maka akan diarahkan pada halaman login.
			redirect(base_url("login")); //diarahkan ke halaman login
		}
	}
 
	function index(){ // jika telah login, maka akan di load ke halaman admin
		$this->load->view('v_admin'); //meload ke halaman admin
	}
}