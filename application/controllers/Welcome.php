<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        private $programme = array();
	function __construct() 
        {
            parent::__construct();
            $this->load->model('News_model');
            $this->load->library('pagination');
            $this->load->model('Dept_model');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
        
	public function index()
	{
            $data["news"] = $this->News_model->get_all_dept_news();
            $data["events"] = $this->News_model->get_all_dept_event();
          // print_r($data['events']);
          //  die();
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('slider',$data);
            
            $this->load->view('welcome_message');
            $this->load->view('footer');
	}
}
