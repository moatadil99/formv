<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	
	public function index()
	{
				
		$this->form_validation->set_rules('email','Email Id','required|valid_email');
		$this->form_validation->set_rules('user_name','user_name','required|alpha');
		$this->form_validation->set_rules('password','password','required|max_length[12]|min_length[6]');
		$this->form_validation->set_rules('cpassword','confirm password','required|max_length[12]|min_length[6]');
		$this->form_validation->set_rules('check','checkbox','required');

		if($this->form_validation->run()==False)
			{
				$this->load->view('adminpanel/login_view');
			}
		else
		{ 
			if(isset($_POST))
				{
					$user_name=$_POST['user_name'];
					$email=$_POST['email'];
					$cpassword=$_POST['cpassword'];
					$password=$_POST['password'];

					if($password==$cpassword)
					{
						$pass=$password;
					$this->load->model('login_model');
		            $this->login_model->signUp($user_name,$pass,$email);
		       		 }
		       		 else{
		       		 	$this->session->set_flashdata('match','must match the two password');
		       		 	redirect('login');
		       		 }
				}
				else
				{
					die("Invalid input");
				}
		}
	}

	function logout(){
		session_destroy();
		redirect('login');
	}
}
