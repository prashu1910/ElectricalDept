<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {
    private $programme = array();
    function __construct() 
    {
        parent::__construct();
        $this->load->model('Faculty_model');
        $this->load->model('User_model');
        $this->load->library('pagination');
        $this->load->model('Dept_model');
        $this->programme = $this->Dept_model->get_all_programme_branch();
    }

    public function index($prog = 1)
    {
        $hod_index = 0;
        $data = $this->Faculty_model->get_all_faculty();
        $hod = $this->Faculty_model->get_hod();
        foreach($data as $key=>$value)
        {
            if($value->user_id == $hod->user_id)
            {
                $hod_index = $key;
                break;
            }
        }
        $hod_data = $data[$hod_index];
        array_splice($data, $hod_index, 1);
        array_unshift($data, $hod_data);
        //echo $hod_index;
        //die();
        $result['faculty'] = array_chunk($data, 4);
        
        $result['hod'] = count($hod) > 0 ? $hod : NULL;
       // print_r($result['faculty']);
     //  die();
        $this->load->view('header');
        $this->load->view('nav',array("prog"=>$this->programme));
        $this->load->view('faculty/faculty_list',$result);
        $this->load->view('footer');
    }
    public function details($fac_id = "")
    {
        $user = $this->User_model->get_user_info($fac_id);
        $data['user'] = $user[0];
        $data['qualification'] = $this->Faculty_model->get_qualification($fac_id);
        $data['phd_qualification'] = $this->Faculty_model->get_phd_qualification($fac_id);
        $aoi = $this->Faculty_model->get_faculty_field($fac_id,"area_of_interest");
        $data['aoi'] = $aoi[0]->area_of_interest;
       //print_r($data);
       //die();
        $this->load->view('header');
        $this->load->view('nav',array("prog"=>$this->programme));
        //$this->load->view('course_detail');
        $data['page'] = 'profile.php';
       
        $this->load->view('faculty/faculty_details',$data);
        $this->load->view('footer');
    }
    public function profile($fac_id = "")
    {
        $user = $this->User_model->get_user_info($fac_id);
        $data['user'] = $user[0];
        $data['qualification'] = $this->Faculty_model->get_qualification($fac_id);
        $data['phd_qualification'] = $this->Faculty_model->get_phd_qualification($fac_id);
        $aoi = $this->Faculty_model->get_faculty_field($fac_id,"area_of_interest");
        $data['aoi'] = $aoi[0]->area_of_interest;
        $this->load->view('header');
        $this->load->view('nav',array("prog"=>$this->programme));
        //$this->load->view('course_detail');
        $data['page'] = 'profile.php';
        $this->load->view('faculty/faculty_details',$data);
        $this->load->view('footer');
    }
    public function journals($fac_id = "")
    {

        $user = $this->User_model->get_user_info($fac_id);
        $data['user'] = $user[0];
        $data['qualification'] = $this->Faculty_model->get_qualification($fac_id);
        $data['phd_qualification'] = $this->Faculty_model->get_phd_qualification($fac_id);
        $aoi = $this->Faculty_model->get_faculty_field($fac_id,"area_of_interest");
        $data['aoi'] = $aoi[0]->area_of_interest;
        $config = array();
        $config["base_url"] = base_url() . "faculty/journals/".$fac_id;
        $total_row = $this->Faculty_model->total_journal_count($fac_id);
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
        $data["results"] = $this->Faculty_model->get_journal_details_of_faculty($offset, $config['per_page'],$fac_id);
        $data["links"] = $this->pagination->create_links();
        //print_r($data["results"]);
        //die();
        $this->load->view('header');
        $this->load->view('nav',array("prog"=>$this->programme));
        $data['page'] = 'journals.php';
        $this->load->view('faculty/faculty_details' , $data);
        $this->load->view('footer');
        
    }
    public function conferences($fac_id = "")
    {
        
        $user = $this->User_model->get_user_info($fac_id);
        $data['user'] = $user[0];
        $data['qualification'] = $this->Faculty_model->get_qualification($fac_id);
        $data['phd_qualification'] = $this->Faculty_model->get_phd_qualification($fac_id);
        $aoi = $this->Faculty_model->get_faculty_field($fac_id,"area_of_interest");
        $data['aoi'] = $aoi[0]->area_of_interest;
        
        $this->load->view('header');
        $this->load->view('nav',array("prog"=>$this->programme));
        $config = array();
        $config["base_url"] = base_url() . "faculty/conferences/".$fac_id;;
        $total_row = $this->Faculty_model->total_conference_count($fac_id);
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
        $data["results"] = $this->Faculty_model->get_conference_details_of_faculty($offset, $config['per_page'],$fac_id);
        $data["links"] = $this->pagination->create_links();
        //print_r($data["results"]);
       // die();
        $data['page'] = 'conferences.php';
        $this->load->view('faculty/faculty_details' , $data);
        $this->load->view('footer');
    }
    
    
    public function courses($fac_id = "")
    {
        $user = $this->User_model->get_user_info($fac_id);
        $data['user'] = $user[0];
        $this->load->view('header');
        $this->load->view('nav',array("prog"=>$this->programme));
        $config = array();
        $config["base_url"] = base_url() . "faculty/courses/".$fac_id;
        $total_row = $this->Faculty_model->total_count_of_course_tought($fac_id);
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
        $data["results"] = $this->Faculty_model->get_faculty_course_tought($offset, $config['per_page'],$fac_id);
        $data["links"] = $this->pagination->create_links();

        $data['page'] = 'course_tought.php';
        $this->load->view('faculty/faculty_details' , $data);
        $this->load->view('footer');
    }
    
    public function project($fac_id = "",$type = 1)
    {
        $user = $this->User_model->get_user_info($fac_id);
        $data['user'] = $user[0];
        $this->load->view('header');
        $this->load->view('nav',array("prog"=>$this->programme));
        $config = array();
        $config["base_url"] = base_url() . "faculty/project/".$fac_id."/".$type;
        $total_row = $this->Faculty_model->total_project($fac_id,$type);
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
        if($this->uri->segment(5))
        {
            $page = ($this->uri->segment(5)) ;
            $offset = ($page-1)*$config['per_page'] ;
        }
        else
        {
            $page = 1;
            $offset = 0;
        }
        $data["results"] = $this->Faculty_model->get_projects($offset, $config['per_page'],$fac_id,$type);
       // print_r($data['results']);
       // die();
        $data["links"] = $this->pagination->create_links();
        if($type == 1)
            $data['title'] = "B.Tech Projects Supervised";
        else if($type == 2)
            $data['title'] = "M.Tech Thesis Supervised";
        else if($type == 3)
            $data['title'] = "Ph.D. Thesis Supervised";
            
        $data['page'] = 'project.php';
        $this->load->view('faculty/faculty_details' , $data);
        $this->load->view('footer');
    }
    
    
}

