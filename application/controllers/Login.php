<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Login extends CI_Controller 
{

    private $programme = array();
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Dept_model');
        $this->load->model('Faculty_model');
        $this->programme = $this->Dept_model->get_all_programme_branch();
    }
    
    public function landing_page($role)
    {
        
        switch ($role)
        {
            case 1:
                redirect('/admin');
                break;
            case 2:
                redirect('/home');
                break;
            case 3:
                redirect('/hod');
        }
    }
    
    public function index()
    {
        if(isset($this->session->userdata['logged_in']['username']) && $this->session->userdata['logged_in']['username'] != "")
        {
            if($this->session->userdata['logged_in']['role'] == 1)
                redirect("/admin");
            else if($this->session->userdata['logged_in']['role'] == 3)
                redirect("/hod");
            else
                redirect('home/profile/'.$this->session->userdata['logged_in']['user_id']);
        }
        else
        {
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('login');
            $this->load->view('footer');
        }
        
    }

    public function auth()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
//            if(isset($this->session->userdata['logged_in']))
//                $this->load->view('admin_page');
//            else
//            {
                $this->load->view('header');
                $this->load->view('nav',array("prog"=>$this->programme));
                $this->load->view('login');
                $this->load->view('footer');
            //}

        }
        else 
        {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'user_id' => null,
                'dept_id' =>DEPT_ID
                );
            $result = $this->User_model->login($data);
            if ($result == TRUE) 
            {
                $username = $this->input->post('username');
                $result = $this->User_model->get_user_login_info($username);
                if ($result != false) 
                {
                    $session_data = array(
                        'username' => $result[0]->username,
                        'email' => $result[0]->email,
                        'dept' => $result[0]->dept_id,
                        'user_id'=> $result[0]->user_id,
                        'role' =>$result[0]->role,
                        );
                    if($result[0]->user_id != NULL)
                    {
                        $res = $this->User_model->get_user_field($result[0]->user_id,"user_fname");
                        $session_data['user_detail'] = $res[0];
                    }
                    if($result[0]->role == 3)
                    {
                        $hod = $this->Faculty_model->get_hod();
                        $session_data['user_id'] = $hod->user_id;
                        $res = $this->User_model->get_user_field($result[0]->user_id,"user_fname");
                        $session_data['user_detail'] = $res[0];
                    }
                 //print_r($session_data);
                    // Add user data in session
                 //die();
                    $this->session->set_userdata('logged_in', $session_data);
                   
                    $this->landing_page($result[0]->role);
                }
            } 
            else 
            {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                    );
                $this->load->view('header');
                $this->load->view('nav',array("prog"=>$this->programme));
                $this->load->view('login',$data);
                $this->load->view('footer');
            }
        }
    }
    
    public function logout() 
    {

        $sess_array = array(
                'username' => ''
                );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('header');
        $this->load->view('nav',array("prog"=>$this->programme));
        $this->load->view('login',$data);
        $this->load->view('footer');
    }
    
    
}