<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

        private $programme = array();
        function __construct() 
        {
            parent::__construct();
            $this->load->model('Course_model');
            $this->load->model('Dept_model');
            $this->load->library('pagination');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
        
	public function index($branch = 1)
	{
            redirect('course/course_structure');
            
	}
        public function course_structure($programme_id = "",$branch = "")
        {
            if($programme_id == "" || $branch == "")
                redirect("errors/html/error_404.php");
            else
            {
                $result = $this->Course_model->get_course_structure($branch);
                $prog = $this->Dept_model->get_programme_name($programme_id);
                $branch_name = $this->Dept_model->get_branch_name($branch);
                $data['course'] = $prog[0]->name."-".$branch_name[0]->name;
            }
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            
            $course = array();
            foreach($result as $key => $item)
            {
               $course[$item->semester][$key] = $item;
            }
            ksort($course, SORT_NUMERIC);
            $data['c_structure'] = $course;
            $this->load->view('course_structure',$data);
            $this->load->view('footer');
        }
        
        public function phd($prog = 1)
	{
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $this->load->view('phd_course');
            $this->load->view('footer');
	}
        public function details($course_id = "",$sem = "")
	{
            if($course_id == "" || $sem == "")
                redirect("errors/html/error_404.php");
            $result = $this->Course_model->get_course_details($course_id);
            if(count($result) == 0)
                show_404 ();
            $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $data['detail'] = $result;
            $data['semester'] = $sem;
            if($result[0]->is_elective == 1)
            {
                $data['elective'] = $this->Course_model->get_elective_details($result[0]->course_id);
                $this->load->view('elective_course',$data);
            }
            else
                $this->load->view('course_detail',$data);
            //
            $this->load->view('footer');
	}
}

