<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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
            $config = array();
            $config["base_url"] = base_url() . "news";
            $total_row = $this->News_model->get_news_count();
            $config["total_rows"] = $total_row;
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
            $data['type'] = "News";
            $data["results"] = $this->News_model->get_all_dept_news($offset, $config['per_page']);
            $data["links"] = $this->pagination->create_links();
            //print_r($data["results"]);
            //die();
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('news',$data);
            $this->load->view('footer');
	} 
        public function events()
	{
            $config = array();
            $config["base_url"] = base_url() . "news";
            $total_row = $this->News_model->get_event_count();
            $config["total_rows"] = $total_row;
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
            $data["results"] = $this->News_model->get_all_dept_event($offset, $config['per_page']);
            $data["links"] = $this->pagination->create_links();
            //print_r($data["results"]);
            //die();
            $data['type'] = "Events";
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('news',$data);
            $this->load->view('footer');
	} 
}