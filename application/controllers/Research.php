<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research extends CI_Controller {

        private $programme = array();
        function __construct() 
        {
            parent::__construct();
            $this->load->model('Faculty_model');
            $this->load->library('pagination');
            $this->load->model('Dept_model');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
	public function index()
	{
            redirect('/research/publication/journal');
	}
        public function publication($type = "journal")
	{
            $config = array();
            if($type == "journal")
            {
                $config["base_url"] = base_url() . "research/publication/journal";
                $total_row = $this->Faculty_model->total_dept_journal_count();
                $config["total_rows"] = $total_row;
            }
            else if($type == "conference")
            {
                $config["base_url"] = base_url() . "research/publication/conference";
                $total_row = $this->Faculty_model->total_dept_conference_count();
                $config["total_rows"] = $total_row;
            }
            
            
            $config['per_page'] = PER_PAGE;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';


            $this->pagination->initialize($config);
            if($this->uri->segment(4))
            {
                $page = ($this->uri->segment(4)) ;
                $offset = ($page-1)*$config['per_page'] ;
            }
            else
            {
                $page = 1;
                $offset = 0;
            }
            if($type == "journal")
            {
                $data["results"] = $this->Faculty_model->get_journal_details_of_dept($offset, $config['per_page']);
                $data['page'] = 'journal.php';
            }
            else if($type == "conference")
            {
                $data["results"] = $this->Faculty_model->get_conference_details_of_dept($offset, $config['per_page']);
                $data['page'] = 'conference.php';
            }
            
            
            $data["links"] = $this->pagination->create_links();
            //print_r($data["results"]);
           // die();
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            
            $this->load->view('research/publications',$data);
            $this->load->view('footer');
	}
        
        public function project($prog = 1)
	{
            
            $data["results"] = $this->Faculty_model->get_dept_project_investigated();
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('research/projects',$data);
            $this->load->view('footer');
	}
        
        
}