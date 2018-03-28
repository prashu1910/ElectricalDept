<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

        private $programme = array();
        function __construct() 
        {
            parent::__construct();
            $this->load->model('Dept_model');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
        
	public function index($prog = 1)
	{
            $result = $this->Dept_model->get_images_from_gallery();
            $data['gallery'] =array_chunk($result, 4);
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('gallery',$data);
            $this->load->view('footer');
	}
        
        
}

