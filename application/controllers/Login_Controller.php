<?php

require(APPPATH.'/libraries/REST_Controller.php');

class Login_Controller extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
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

    function login_post()
    {
        $user_email      = $this->post('user_email');
        $password      = $this->post('password');

        if(!$user_email || !$password ){

            $this->response("Enter complete login information", 400);

        }else{

            $validate = $this->login_model->validate($user_email,$password);
            if($validate->num_rows() > 0){
                $data  = $validate->row();
                $status="success";
                $tokenData = array('user_email'=>$data->user_email,'full_name'=>$data->full_name,'mobile_no'=>$data->mobile_no,'city'=>$data->city,'country'=>$data->country,'language'=>$data->language,'id'=>$data->id);

             // Create a token
                $token = AUTHORIZATION::generateToken($tokenData);
                 $jsonresponce=array("status"=>$status,"data"=>$tokenData,"token"=>$token);
                // $array=array($tokenData,$token);
                // $this->response($array);

                $this->response($jsonresponce, REST_Controller::HTTP_OK);
            }else
            {
                $this->response("Enter complete login wronge", 400);
            }

        }
        
    }

    function signup_post()
    {
         $user_email      = $this->post('user_email');
         $password     = $this->post('password');
         $full_name     = $this->post('full_name');
         $mobile_no     = $this->post('mobile_no');
         $city     = $this->post('city');
         $country     = $this->post('country');
         $language     = $this->post('language');
        
         if(!$user_email || !$password || !$full_name || !$mobile_no || !$city || !$country || !$language){

                $this->response("Enter complete user information", 400);

         }else{

            $result = $this->login_model->add(array("full_name"=>$full_name, "user_email"=>$user_email, "password"=>$password, "mobile_no"=>$mobile_no, "city"=>$city, "country"=>$country, "language"=>$language));

            if($result === 0){

                $this->response("User information coild not be saved. Try again.", 404);

            }else{

                $this->response("success", 200);  
           
            }

        }
    }

        //API -  Fetch All user
    function users_get()
    {

        $result = $this->login_model->getallusers();

        if($result){

            $this->response($result, 200); 

        } 

        else{

            $this->response("No record found", 404);

        }
    }

    function userUpdate_put()
    {
         $user_email      = $this->put('user_email');
         // $password     = $this->put('password');
         $full_name     = $this->put('full_name');
         $mobile_no     = $this->put('mobile_no');
         $city     = $this->put('city');
         $country     = $this->put('country');
         $language     = $this->put('language');
         $id  =$this->put('id');
         // var_dump($user_email,$password,$full_name,$mobile_no,$city,$country,$language,$id);die();
        
         if(!$user_email  || !$full_name || !$mobile_no || !$city || !$country || !$language){

                $this->response("Enter complete user information", 400);

         }else{

            $result = $this->login_model->userupdate($id,array("full_name"=>$full_name, "user_email"=>$user_email, "mobile_no"=>$mobile_no, "city"=>$city, "country"=>$country, "language"=>$language));

            if($result === 0){

                $this->response("User information coild not be update. Try again.", 404);

            }else{

                $this->response("Update successfully", 200);  
           
            }

        }
    }

    function team_get()
    {
        $this->load->model('login_model');
        $data=$this->login_model->get_user();
                if($data){

            $this->response($data, 200); 

        } 

        else{

            $this->response("No record found", 404);

        }
    }
}