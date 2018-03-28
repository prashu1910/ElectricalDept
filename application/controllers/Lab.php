<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends CI_Controller {

        private $programme = array();
        function __construct() 
        {
            parent::__construct();
            $this->load->model('Dept_model');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
	public function index()
	{
            $data['lab'] = $this->Dept_model->get_all_labs();
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('lab',$data);
            $this->load->view('footer');
	} 
        
        public function lab_detail($id = 0)
        {
            if($id == 0)
                redirect ("/lab");
            else
            {
                $data['lab'] = $this->Dept_model->get_all_labs();
                $data['lab_details'] = $this->Dept_model->get_lab_details($id);
                $data['lab_euipment'] = $this->Dept_model->get_lab_equipments($id);
               // print_r($data);
               // die();
                $this->load->view('header');
                $this->load->view('nav',array("prog"=>$this->programme));
                $this->load->view('lab',$data);
                $this->load->view('footer');
            }
        }
}