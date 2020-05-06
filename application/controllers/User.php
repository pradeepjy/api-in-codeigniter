<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		$this->load->database();
		$this->load->model('login_model');
// Load these helper to create JWT tokens
		$this->load->helper(['jwt', 'authorization']);
		$fileContent = file_get_contents('php://input');

		if(!empty($fileContent))
		{
			$this->requestData = json_decode(file_get_contents('php://input'));
		}
		else
		{
			$this->requestData = (object)$_REQUEST;
		}
	}
	public function login()
	{
// Extract user data from POST request
		$user_email = isset($this->requestData->user_email)?$this->requestData->user_email:"";
		$password = isset($this->requestData->password)?$this->requestData->password:"";
		if ($user_email && $password != "")
		{
			$data = $this->login_model->validate($user_email,$password);
			if ($data != "")
			{
				$tokenData = array('user_email'=>$data->user_email,'id'=>$data->id);
// Create a token
				$token = AUTHORIZATION::generateToken($tokenData);
				echo json_encode($token);
			}
			else
			{
				echo json_encode('Invalid user_email or password');
			}
		}
		else
		{
			echo json_encode("plz provide username and password");
		}
	}
}