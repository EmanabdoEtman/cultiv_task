<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct(); 
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('posts_model', 'posts_model');
		$this->load->model('auth_model', 'auth_model');
	}


	function add_post(){
		$check_user_resource = $this->auth_model->check_access_token(); 

		if($check_user_resource){ 
			$method = $_SERVER['REQUEST_METHOD'];
			if($method != 'POST'){
				echo json_encode(array('status' => 400,'message' => 'Bad request.'));
			}else{ 
				$params = $_REQUEST; 
				$result_data = array();


				$data['title'] = strip_tags($this->input->post('title')); 
				$data['description'] = strip_tags($this->input->post('description')); 
				$data['created_by'] = $check_user_resource->{'user_id'};  
				$add_post = $this->posts_model->add_post('posts', $data);


				if($add_post){  

					echo json_encode(array('status' => 1,'message' => ' Adding done.'));

				}else{
					echo json_encode(array('status' => 401,'message' => 'add error.'));
				} 


			}
		}else{
			echo json_encode(array('status' => 401,'message' => 'Unauthorized error.'));
		}  
	}

	public function getUserPosts()
	{   
		$check_user_resource = $this->auth_model->check_access_token(); 

		if($check_user_resource){ 
			$user_id=$check_user_resource->{'user_id'};	 
			if($check_user_resource->{'type'}!='admin'){
				$PostsList = $this->posts_model->GetPosts($user_id); 
			}else{
				$PostsList = $this->posts_model->GetPosts($post['user_id']); 
			}
			$rows = array(); 
			if (isset($PostsList) && count($PostsList) != 0) {
				foreach ($PostsList as $post) {
					$post_arr = array(  'title' => $post['title'], 'description' => $post['description'] , 'user_name' => $post['user_name']    );
					array_push($rows, $post_arr);
				}
			}
			print_r(json_encode($rows)); 

		}else{
			echo json_encode(array('status' => 401,'message' => 'Unauthorized error.'));
		}  

	} 

	public function getUserPost()
	{  $post_id= strip_tags($_GET['post_id']);
	$check_user_resource = $this->auth_model->check_access_token(); 

	if($check_user_resource){ 
		$user_id=$check_user_resource->{'user_id'};	 
		if($check_user_resource->{'type'}!='admin'){
			$PostsList = $this->posts_model->GetPost($post_id,$user_id);  
		}else{
			$PostsList = $this->posts_model->GetPost($post_id); 
		}
		$rows = array(); 
		if (isset($PostsList) && count($PostsList) != 0) {
			foreach ($PostsList as $post) {
				$post_arr = array(  'title' => $post['title'], 'description' => $post['description'] , 'user_name' => $post['user_name']    );
				array_push($rows, $post_arr);
			}
		}
		print_r(json_encode($rows)); 

	}else{
		echo json_encode(array('status' => 401,'message' => 'Unauthorized error.'));
	}  

} 


function Update_post(){
	$check_user_resource = $this->auth_model->check_access_token(); 

	if($check_user_resource){ 
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		}else{ 
			$params = $_REQUEST; 
			$result_data = array();


			$data['title'] = strip_tags($this->input->post('title')); 
			$data['description'] = strip_tags($this->input->post('description')); 
			$data['id'] = strip_tags($this->input->post('id')); 
			$data['updated_by'] = $check_user_resource->{'user_id'};  

			if($check_user_resource->{'type'}!='admin'){
				$update_post = $this->posts_model->Update_post('posts', $data);
			}else{

				$update_post = $this->posts_model->Update_post('posts', $data , 'admin');
			}

			if($update_post){  

				echo json_encode(array('status' => 1,'message' => ' Updating done.'));

			}else{
				echo json_encode(array('status' => 401,'message' => 'Updating error.'));
			} 


		}
	}else{
		echo json_encode(array('status' => 401,'message' => 'Unauthorized error.'));
	}  
}

function Delete_post(){
	$check_user_resource = $this->auth_model->check_access_token(); 

	if($check_user_resource){ 
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		}else{ 
			$params = $_REQUEST; 
			$result_data = array();

 
			$data['id'] = strip_tags($this->input->post('id'));  
			$data['user_id'] = $check_user_resource->{'user_id'}; 

			if($check_user_resource->{'type'}!='admin'){
				$delete_post = $this->posts_model->Delete_post('posts', $data);
			}else{

				$delete_post = $this->posts_model->Delete_post('posts', $data , 'admin');
			}

			if($delete_post){  

				echo json_encode(array('status' => 1,'message' => ' Delete done.'));

			}else{
				echo json_encode(array('status' => 401,'message' => 'Delete error.'));
			} 


		}
	}else{
		echo json_encode(array('status' => 401,'message' => 'Unauthorized error.'));
	}  
}

}
