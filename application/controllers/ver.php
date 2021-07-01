<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ver extends CI_Controller {

	
	public function index()
	{
		$this->load->view('ver_view');
	}
	public function activation($uid){
		$query = $this->db->query("SELECT `activated` from `users` WHERE `uid`='$uid'");
		        if($query){
		               $r=$query->result_array();
		               if($r[0]['activated'])
		                redirect('ver');
		        }
		           
          $data['uid']=$uid;
	$this->form_validation->set_rules('password','password','callback_valid_password');
          if($this->form_validation->run()==False)
		{	
   			$this->load->view('verA_view',$data);
		}
		else
		{ 
			 

			$pass=md5($_POST['password']);
			
			$query = $this->db->query("UPDATE `users` SET `password`='$pass' ,`activated`='1' WHERE `uid`='$uid'");
		        if($query){
		                $this->session->set_flashdata('activation','true');
		                redirect('login');
		        }

		        else{
		         $this->session->set_flashdata('activation','error in activation');
		                redirect('login');
		        } 
			

		}


		
	}
	public function valid_password($password = '')
	{
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));

			return FALSE;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');

			return FALSE;
		}

		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

			return FALSE;
		}

		return TRUE;
	}
	}
