<?php
class article_model extends CI_Model{
  function fetshArticle(){
    $result=$this->db->query("SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on` FROM `articles` WHERE `status`= '1'");
    return $result->result_array();
  }
  function detailBlog($blog_id){
     $result=$this->db->query("SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on` FROM `articles` WHERE `blogid`= '$blog_id'");
    return $result->result_array();
  }
}
 ?>
