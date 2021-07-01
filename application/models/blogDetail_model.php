<?php
class article_model extends CI_Model{
  function fetshArticle(){
    $result=$this->db->query("SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on` FROM `articles` WHERE `blogid`= '1'");
    return $result->result_array();
  }
}
 ?>
