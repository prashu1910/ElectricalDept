<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

        private $programme = array();
        function __construct() 
        {
            parent::__construct();
            $this->load->model('Dept_model');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
    
	public function index()
	{
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('lab');
            $this->load->view('footer');
	}
        
        public function get_branch()
        {
           // ob_start("ob_gzhandler");
            $arr = $this->Dept_model->get_programme_branch($this->input->post('p_id'));
            header('Content-Type: application/json');
            echo json_encode( $arr );
           // ob_end_flush();
        }
}