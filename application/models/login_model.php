<?php
class login_model extends CI_Model
{
	  public function signUp($user_name,$password,$email)
	  {


				$query = $this->db->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$user_name','$email','$password')");

				if($query)
				 {
						$s=$this->db->query(" SELECT `uid` FROM `users` WHERE `name`= '$user_name' AND `email`='$email' AND `password`='$password'");
						$q=$s->result_array();

						$to=$email;
						$subject="Email Verification";
						$message="<div> please go to activate your acoount </div> <br> <a href=' " .base_url() .'ver/activation/'.$q[0]['uid'] ."'>Register Acount</a>";
						$this->email->to($to);
						$this->email->from('ttesttsw@gmail.com');
						$this->email->subject($subject);
						$this->email->message($message);
						if($this->email->send())
						{
							$this->session->set_userdata('user_id',$q[0]['uid']);
							$this->session->set_flashdata('msg','mail link activation sent succesfully');
							redirect('login');
						}
						else
						{
							$this->session->set_flashdata('msg','mail has error');
							print_r($this->email->print_debugger());
						}
						
				 }
				else
				{
					die($query);
					redirect('login');
				}
	}
}
 ?>
