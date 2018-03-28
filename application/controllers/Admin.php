<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() 
        {
            parent::__construct();
            $this->load->model('Faculty_model');
            $this->load->model('User_model');
            $this->load->model('Course_model');
            $this->load->model('Dept_model');
            $this->load->model('News_model');
            $this->load->library('pagination');
            
        }
        
	public function index()
	{
            check_session($this->session);
            redirect('admin/faculty');
            /*$this->load->view('header');
            $this->load->view('admin/admin_nav');
            $data = [];
            $data['segment1'] = "faculty.php";
            $this->load->view('admin/admin_home',$data);
            $this->load->view('footer');*/
	}
        
        public function faculty()
        {
            check_session($this->session);
            $this->load->view('header');
            $this->load->view('admin/admin_nav');
            $config = array();
            $config["base_url"] = base_url() . "admin/faculty";
            $total_row = $this->Faculty_model->get_faculty_count();
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
            if($this->uri->segment(3))
            {
                $page = ($this->uri->segment(3)) ;
                $offset = ($page-1)*$config['per_page'] ;
            }
            else
            {
                $page = 1;
                $offset = 0;
            }
            
            $data["results"] = $this->Faculty_model->get_all_faculty($offset, $config['per_page']);
            $data["links"] = $this->pagination->create_links();
            if($this->session->flashdata('para'))
            {
                $data['msg'] = $this->session->flashdata('para');
                $this->session->set_flashdata('para',null);
            }
            
            $data['segment1'] = "faculty.php";
            $this->load->view('admin/admin_home',$data);
            $this->load->view('footer');
        }
        
        public function add_faculty()
        {
            check_session($this->session);
            if(count($this->input->post()) == 0)
            {
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $this->load->view('admin/add_faculty');
                $this->load->view('footer');
            }
            else
            {
                $valid = $this->Faculty_model->check_faculty($this->input->post());
                if($valid['status'] == 400)
                {
                    $this->load->view('header');
                    $this->load->view('admin/admin_nav');
                    $this->load->view('admin/add_faculty',$valid);
                    $this->load->view('footer');
                }
                else
                {
                    $id = $this->Faculty_model->add_faculty($this->input->post());
                    /*$this->load->view('header');
                    $this->load->view('admin/admin_nav');
                    $data['segment1'] = "faculty.php";
                    $data['msg'] = "Faculty added successfully";
                    $this->load->view('admin/admin_home',$data);
                    $this->load->view('footer');*/
                    $para =  array(
                            'msg' => "Faculty added successfully"
                     );
                    $this->session->set_flashdata('para',$para);
                    redirect('admin/faculty');
                }
            }
            
        }
        
        
        public function edit_faculty($id = 0)
        {
            check_session($this->session);
            if($id == 0)
            {
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $data['segment1'] = "faculty.php";
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
            else if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_faculty_detail($id);
                $data["result"] = $result;
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $this->load->view('admin/edit_faculty',$data);
                $this->load->view('footer');
            }
            else
            {
                $is_email_valid = $this->Faculty_model->check_for_duplicate_email($this->input->post());
                if($is_email_valid['status'] == 400)
                {
                    $this->load->view('header');
                    $this->load->view('admin/admin_nav');
                    $this->load->view('admin/edit_faculty',$data);
                    $this->load->view('footer');
                }
                else 
                {
                    $is_valid_username = $this->User_model->check_for_duplicate_username($this->input->post());
                    if($is_valid_username['status'] == 400)
                    {
                        $this->load->view('header');
                        $this->load->view('admin/admin_nav');
                        $this->load->view('admin/edit_faculty',$data);
                        $this->load->view('footer');
                    }
                    else
                    {
                        $status = $this->Faculty_model->update_faculty($this->input->post());
                        $para =  array(
                            'msg' => "Faculty added successfully"
                        );
                    $this->session->set_flashdata('para',$para);
                    redirect('admin/faculty');
                    }
                }
                
            }
            
        }
        
        public function assign_hod()
        {
            check_session($this->session);
            if(count($this->input->post()) > 0)
            {
                $result = $this->Faculty_model->assign_hod($this->input->post());
                $result = $this->Faculty_model->get_all_faculty();
                $data["result"] = $result;
                $result = $this->Faculty_model->get_hod();
                $data["hod"] = $result;
                $data['segment1'] = 'assign_hod.php';
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
            else
            {
                $result = $this->Faculty_model->get_all_faculty();
                $data["result"] = $result;
                $result = $this->Faculty_model->get_hod();
                $data["hod"] = $result;
                $data['segment1'] = 'assign_hod.php';
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
        }
        
        
        public function course()
        {
            check_session($this->session);
            $this->load->view('header');
            $this->load->view('admin/admin_nav');
            $config = array();
            $config["base_url"] = base_url() . "admin/course";
            $total_row = $this->Course_model->get_course_count();
            $config["total_rows"] = $total_row;
            $config['per_page'] = 100;
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
            if($this->uri->segment(3))
            {
                $page = ($this->uri->segment(3)) ;
                $offset = $page*$config['per_page'] - 1 ;
            }
            else
            {
                $page = 1;
                $offset = 0;
            }
            
            $data["results"] = $this->Course_model->get_all_course($offset, $config['per_page']);
            $data["links"] = $this->pagination->create_links();
            if($this->session->flashdata('para'))
            {
                $data['msg'] = $this->session->flashdata('para');
                $this->session->set_flashdata('para',null);
            }
            
            $data['segment1'] = "course.php";
            $this->load->view('admin/admin_home',$data);
            $this->load->view('footer');
        }
        
        
        public function add_course()
        {
            check_session($this->session);
            if(count($this->input->post()) == 0)
            {
               // $programme = $this->Dept_model->get_programme();
                $category = $this->Course_model->get_category();
                $branch = $this->Dept_model->get_branch();
                $courses = $this->Course_model->get_all_courses_registered();
                $data['courses'] = $courses;
                $data['category'] = $category;
                $data['branch'] = $branch;
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $this->load->view('admin/add_course',$data);
                $this->load->view('footer');
            }
            else
            {
                //print_r($this->input->post());
              //  die();
                $valid = $this->Course_model->check_course($this->input->post());
                if($valid['status'] == 400)
                {
                    $this->load->view('header');
                    $this->load->view('admin/admin_nav');
                    $this->load->view('admin/add_course',$valid);
                    $this->load->view('footer');
                }
                else
                {
                    $id = $this->Course_model->add_course($this->input->post());
                   // print_r($id);
                   // die();
                    $para =  array(
                            'msg' => "Course added successfully"
                     );
                    $this->session->set_flashdata('para',$para);
                    redirect('admin/course');
                }
            }
        }
        
        public function edit_course($id = 0)
        {
            check_session($this->session);
            if($id == 0)
            {
                redirect("admin/course");
            }
            else if(count($this->input->post()) == 0)
            {
                //$result = $this->
            }
            else
            {
                
            }
        }
        
        public function add_curriculam()
        {
            check_session($this->session);
            $data["programme"] = $this->Dept_model->get_dept_programme();
            $courses = $this->Course_model->get_all_courses_registered();
            $data['courses'] = $courses;
            if(count($this->input->post()) == 0)
            {
                $data["curriculam"] = $this->Course_model->get_all_curriculam();
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $data['segment1'] = "curriculam_add.php";
                $data['segment2'] = "curriculam_display.php";
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Course_model->add_curriculam($this->input->post());
                redirect("admin/add_curriculam");
            }
        }
        public function add_timetable()
        {
            check_session($this->session);
            $data["programme"] = $this->Dept_model->get_dept_programme();
            if(count($this->input->post()) == 0)
            {
                $this->load->view('header');
                $data['timetable'] = $this->Dept_model->get_all_timetable();
                $this->load->view('admin/admin_nav');
                $data['segment1'] = "timetable_add.php";
                $data['segment2'] = "timetable_display.php";
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
            else
            {
                $POST = $this->input->post();
                $name = "tt_".$POST['programme']."_".$POST['branch']."_".$POST['semester'];
                $config['upload_path']   = './'.TIMETABLE_UPLOAD_FOLDER."/"; 
                $config['allowed_types'] = 'xls|xlsx'; 
                $config['max_size']      = 0;  
                $config['overwrite']      = TRUE;
                $config['file_name'] = $name;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('timetable')) 
                {
                    $data['error']  = $this->upload->display_errors();
                    $data['timetable'] = $this->Dept_model->get_all_timetable();
                    $this->load->view('header');
                    $this->load->view('admin/admin_nav');
                    $data['segment1'] = "timetable_add.php";
                    $data['segment2'] = "timetable_display.php";
                    $this->load->view('admin/admin_home',$data);
                    $this->load->view('footer'); 
                }
                else 
                { 
                    $data['upload_data'] = $this->upload->data();
                    $link = $data['upload_data']['file_name'];
                  // print_r();
                  // die();
                    
                    $this->Dept_model->add_timetable($POST,$link);
                    $data['timetable'] = $this->Dept_model->get_all_timetable();
                    $data['sucess'] = "File uploaded succesffully";
                    $this->load->view('header');
                    $this->load->view('admin/admin_nav');
                    $data['segment1'] = "timetable_add.php";
                    $data['segment2'] = "timetable_display.php";
                    $this->load->view('admin/admin_home',$data);
                    $this->load->view('footer');
                }
            }
            
        }
        
        public function add_gallery()
        {
            check_session($this->session);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Dept_model->get_images_from_gallery_for_admin();
                $data['gallery'] =array_chunk($result, 4);
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $data['segment1'] = "gallery_add.php";
                $data['segment2'] = "gallery_display.php";
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
            else
            {
                $POST = $this->input->post();
                $name = "gallery_".date('dmYHis');
                $config['upload_path']   = './'.GALLERY_UPLOAD_FOLDER."/"; //./uploads/';
                $config['max_size']      = 0;  
                $config['overwrite']      = TRUE;
                $config['file_name'] = $name;
                $this->load->library('upload', $config);
                $config['allowed_types'] = 'gif|jpg|png';
                $this->upload->initialize($config);
                if($this->upload->do_upload('gallery_pics'))
                {
                   $data['upload_data'] = $this->upload->data();
                     $link = $data['upload_data']['file_name'];
                    // print_r();
                    // die();

                    $this->Dept_model->add_gallery($POST,$link);
                    $result = $this->Dept_model->get_images_from_gallery_for_admin();
                    $data['gallery'] =array_chunk($result, 4);
                    $data['sucess'] = "File uploaded succesffully";
                    $this->load->view('header');
                    $this->load->view('admin/admin_nav');
                    $data['segment1'] = "gallery_add.php";
                    $data['segment2'] = "gallery_display.php";
                    $this->load->view('admin/admin_home',$data);
                    $this->load->view('footer');
                }
                else
                {
                    $result = $this->Dept_model->get_images_from_gallery_for_admin();
                    $data['gallery'] =array_chunk($result, 4);
                    $data['error']  = $this->upload->display_errors();
                    $this->load->view('header');
                    $this->load->view('admin/admin_nav');
                    $data['segment1'] = "gallery_add.php";
                    $data['segment2'] = "gallery_display.php";
                    $this->load->view('admin/admin_home',$data);
                    $this->load->view('footer');
                }
            }
        }
        
        public function disable_pic($pic_id = 0)
        {
            check_session($this->session);
            if($pic_id == 0)
            {
                redirect("admin/add_gallery");
            }
            else
            {
                $this->Dept_model->disable_pic_from_gallery($pic_id);
                redirect("admin/add_gallery");
            }
        }
        
        
        public function enable_pic($pic_id = 0)
        {
            check_session($this->session);
            if($pic_id == 0)
            {
                redirect("admin/add_gallery");
            }
            else
            {
                $this->Dept_model->enable_pic_in_gallery($pic_id);
                redirect("admin/add_gallery");
            }
        }
        
        public function add_news()
        {
            check_session($this->session);
            if(count($this->input->post()) == 0)
            {
                $data["news"] = $this->News_model->get_all_dept_news_for_admin();
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $data['segment1'] = "news_add.php";
                $data['segment2'] = "news_display.php";
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->News_model->add_news($this->input->post());
                redirect("admin/add_news");
            }
        }
        
        public function show_news($id = 0)
        {
            check_session($this->session);
            if($id == 0)
            {
                redirect('admin/add_news');
            }
            else
            {
                $this->News_model->enable_news($id);
                redirect("admin/add_news");
            }
        }
        
        public function hide_news($id = 0)
        {
            check_session($this->session);
            if($id == 0)
            {
                redirect('admin/add_news');
            }
            else
            {
                $this->News_model->disable_news($id);
                redirect("admin/add_news");
            }
        }
        
        
        public function add_events()
        {
            check_session($this->session);
            if(count($this->input->post()) == 0)
            {
                $data["event"] = $this->News_model->get_all_dept_event_for_admin();
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $data['segment1'] = "event_add.php";
                $data['segment2'] = "event_display.php";
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->News_model->add_event($this->input->post());
                redirect("admin/add_events");
            }
        }
        
        public function show_events($id = 0)
        {
            check_session($this->session);
            if($id == 0)
            {
                redirect('admin/add_events');
            }
            else
            {
                $this->News_model->enable_event($id);
                redirect("admin/add_events");
            }
        }
        
        public function hide_event($id = 0)
        {
            check_session($this->session);
            if($id == 0)
            {
                redirect('admin/add_events');
            }
            else
            {
                $this->News_model->disable_event($id);
                redirect("admin/add_events");
            }
        }
        
        
        public function add_lab()
        {
            check_session($this->session);
            $data["faculty"] = $this->Faculty_model->get_all_faculty(0,0);
            if(count($this->input->post()) == 0)
            {
                $data["lab_details"] = $this->Dept_model->get_all_labs();
                $this->load->view('header');
                $this->load->view('admin/admin_nav');
                $data['segment1'] = "lab_add.php";
                $data['segment2'] = "lab_display.php";
                $this->load->view('admin/admin_home',$data);
                $this->load->view('footer');
            }
            else
            {
                $id = $this->Dept_model->add_lab($this->input->post());
                
                redirect("admin/add_lab");
            }
        }
}
