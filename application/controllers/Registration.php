<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
        // parent::__construct();
        parent::__construct();
        $this->load->model('Registration_Model');
    }
    public function index()
    {
        $this->load->view('registration');
    }
    public function user_registration()
    {
        if ($_POST) {
            $user_name = $this->input->post('userName');
            $user_mobile = $this->input->post('userMobile');
            $user_email = $this->input->post('userEmail');
            $user_password = $this->input->post('userPassword');
            $insert_user = array(
                'name' => $user_name,
                'mobile' => $user_mobile,
                'email' => $user_email,
                'password' => md5($user_password),

            );
            //print_r($_POST); die;
            $insert_result = $this->Registration_Model->registration($insert_user);
            if ($insert_result > 0) {
                $message = array(
                    'status' => true,
                    'title' => 'Registration Done',
                    'message' => 'Registration successfully done!',
                    'val' => $insert_user
                );
            } else {
                $message = array(
                    'status' => false,
                    'title' => 'Error',
                    'message' => 'Something is wrong!',
                    'val' => $insert_user
                );
            }
        } else {
            $message = array(
                'status' => false,
                'title' => 'Error',
                'message' => 'Please fill all the required fields'
            );
        }
        echo json_encode($message);
    }
}
