<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of cdmodel
 *
 * @author http://roytuts.com
 */
class Posts_model extends CI_Model {

  private $table = 'posts';

  function __construct() {

  }

  public function add_post($table,   $data = array()) { 
    if (count($data) > 0) {
      if($this->db->insert($table, $data)){ 
        return true;
      }else{
        return false;
      }  
    } else{
      return false;
    }   
  }

  public function update_post($table,   $data = array() ,$type='') { 
    if (count($data) > 0 ) { 
      $this->db->where('id', $data['id']);
      if($type==''){        
      $this->db->where('created_by', $data['updated_by']);
      } 
      $this->db->update($table, $data);
      if ($this->db->affected_rows() > 0) 
      {
       return true;
     } else{  
      return false;
    }  
  } else{
    return false;
  }   
}

  public function delete_post($table,   $data = array() ,$type='') { 
    if (count($data) > 0 ) { 
      $this->db->where('id', $data['id']);
      if($type==''){        
      $this->db->where('created_by', $data['user_id']);
      } 
      $this->db->delete($table);
      if ($this->db->affected_rows() > 0) 
      {
       return true;
     } else{  
      return false;
    }  
  } else{
    return false;
  }   
}

public function GetPosts($user_id ) { 
  if($user_id !=''){
    $where= " where created_by = $user_id ";
  }
  $sql = "SELECT title,description,concat(f_name,l_name) as user_name  from posts join users on users.id= posts.created_by $where " ; 

  $query = $this->db->query($sql);
  $PostsList = $query->result_array();
  return  $PostsList;
}

public function GetPost($post_id,$user_id='') { 
  if($user_id!=''){
    $where="and   created_by = $user_id";
  }
  $sql = "SELECT title,description,concat(f_name,l_name) as user_name  from posts join users on users.id=posts.created_by  where  posts.id=$post_id $where " ; 

  $query = $this->db->query($sql);
  $PostsList = $query->result_array();
  return  $PostsList;
}



}

/* End of file cdmodel.php */
/* Location: ./application/models/cdmodel.php */