<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	private $programme = array();
        function __construct() 
        {
            parent::__construct();
           // $this->output->enable_profiler(TRUE);
            $this->load->model('Dept_model');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
        
	public function index()
	{
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('contact');
            $this->load->view('footer');
	}
}
