<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of cdmodel
 *
 * @author http://roytuts.com
 */
class Auth_model extends CI_Model {
 
    var $user_resource = "task_app";
    var $key       = "task_key";

  function __construct() {

  }

   public function check_user_resource(){
        $user_resource = $this->input->get_request_header('user_resource', TRUE);
        $key  = $this->input->get_request_header('key', TRUE);
        
        if($user_resource == $this->user_resource && $key == $this->key){
            return true;
        }else{
            return false;
        }
  
    }

   

    function is_user_exist($email )
    { 
      $this->db->where('email', $email); 

      $this->db->from('users');

      $results = $this->db->get();

      if ($results->num_rows() != 0) {

        return $results->row();

      } else {

        return false;

      }

    }
 

  public function check_access_token()
  { 
     // $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMSIsInBob25lIjoiMDEwMDcxMzIzOTkiLCJmX25hbWUiOiJFbWFuIiwibF9uYW1lIjoiRXRtYW4iLCJlbWFpbCI6ImVtYW5AZ21haWwuY29tIiwidHlwZSI6ImFkbWluIiwiaXNzIjoidGFzay5jb20iLCJzdWIiOiJBY2Nlc3MgVG9rZW4gdGFzayIsImlhdCI6MTU5OTU3NjU5OSwiZXhwIjoxNjAwMTgxMzk5LCJzdGF0dXMiOjAsIm1zZyI6IiJ9.qTMR0dJ5lgrXSTaDOyVtqKcbwzEqE1GmB0c8RA8tEn0';

    $accessToken = $this->input->get_request_header('token', TRUE); 
  
    $key = "#!AccessTokentask@565656#";
    $access_data = $this->JWT->decode($accessToken, $key, array('HS256')); 
         
        if($access_data->{'user_id'} > 0 ){
           return $access_data ;
        }else{
            return false;
        } 


  }


   }
 