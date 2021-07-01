<?php
class blog_model extends CI_Model{
  function fetshArticles(){
    $result=$this->db->query("SELECT * FROM `articles` ORDER BY `blogid` DESC");
    return $result->result_array();
  }

function addBlog_post($fileurl='no_image',$title,$desc)
  {

    $query = $this->db->query("INSERT INTO `articles`(`blog_title`, `blog_desc`, `blog_img`) VALUES ('$title','$desc','$fileurl')");
    if($query){
            $this->session->set_flashdata('inserted','yes');
            redirect('admin/blog/addBlog');
    }

    else{
     $this->session->set_flashdata('inserted','no');
            redirect('admin/blog/addBlog');
    } 
  }

  public function editBlog($blog_id)
        {
                $query=$this->db->query(" SELECT `blog_title`, `blog_desc`, `blog_img` , `status` FROM `articles` WHERE `blogid`= '$blog_id'");
            
                return $query->result_array();
        }
  public function editBlogWithFile_post($fileurl,$title,$desc,$blog_id,$publish_unpublish)
  {

    $query = $this->db->query("UPDATE `articles` SET `blog_title`='$title',`blog_desc`='$desc',`blog_img`='$fileurl' ,`status`='$publish_unpublish' WHERE `blogid`='$blog_id'");
      if($query){
              $this->session->set_flashdata('updated','yes');
              redirect('admin/blog/');
      }

      else{
       $this->session->set_flashdata('updated','no');
              redirect('admin/blog/');
      } 
  }
  public function editBlogWithoutFile_post($title,$desc,$blog_id,$publish_unpublish){

     $query = $this->db->query("UPDATE `articles` SET `blog_title`='$title',`blog_desc`='$desc' ,`status`= '$publish_unpublish' WHERE `blogid`='$blog_id'");
        if($query){
                $this->session->set_flashdata('updated','yes');
                redirect('admin/blog/');
        }

        else{
         $this->session->set_flashdata('updated','no');
                redirect('admin/blog/');
        } 
  }

}
 ?>
