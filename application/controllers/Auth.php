<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();    
    $this->load->model('Auth_model', 'auth_model');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
  }

  public function login(){
    foreach ($_REQUEST as $key => $value) {
      $_REQUEST[$key] = str_replace("script","",$this->security->xss_clean($value));
    }
    $method = $_SERVER['REQUEST_METHOD'];
    if($method != 'POST'){
      echo json_encode(array('status' => 400,'message' => 'Bad request.'));
    }else{ 

      $params = $_REQUEST; 

      $array_rules = array(
        array('field' => 'email', 'label' => 'E-mail', 'rules' => 'required|valid_email'),  
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required'), 
      ); 
      $this->form_validation->set_rules($array_rules);

      if ($this->form_validation->run() == false) {
        $errors = validation_errors(); 
        echo json_encode(array('status' => 401,'message' => $errors));
      } else{
        $result_data = array();
        $email = strip_tags($params['email']); 
        $password = strip_tags($params['password']);
        $check_login = $this->auth_model->is_user_exist($email);
        if($check_login){  
          if (password_verify($password, $check_login->password)) { 
            $result_data['user_id'] = $check_login->id;
            $result_data['phone'] = $check_login->phone;
            $result_data['f_name'] = $check_login->f_name;
            $result_data['l_name'] = $check_login->l_name;
            $result_data['email'] = $check_login->email;
            if($check_login->is_admin==1){
              $result_data['type']='admin';
            }else{
              $result_data['type']='user';
            }  
            
            $result_data['token']=$this->create_login_access_token($result_data);


          }else{
            $status = "Rong password";              
            $result_data['status'] = $status;
          } 
        }else{
          $status = "User not exist";
          $result_data['status'] = $status;
        }  
        $results = json_encode($result_data); 
        echo $results;
      }

    }
  } 



  public function create_login_access_token($payload)
  {

    $key = "#!AccessTokentask@565656#";
    $payload['iss']   = "task.com" ;
    $payload['sub']   = "Access Token task" ;
    $payload['iat']   = time()  ;
    $payload['exp']   = time()+604800 ; 
    $payload['msg']   = ''; 
    $accessToken = $this->JWT->encode($payload,$key); 

    return   $accessToken;
  }



}
