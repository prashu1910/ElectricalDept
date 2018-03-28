<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

        public $nav = "faculty/home/faculty_nav";
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('User_model');
            $this->load->model('Faculty_model');
            $this->load->library('pagination');
            if($this->session->userdata['logged_in']['role']==3)
            {
              $this->nav = "hod/hod_nav"  ;
            }
        }
    
    
	public function index($prog = 1)
	{
            check_session($this->session);
            $user_id =  $this->session->userdata['logged_in']['user_id'];
            redirect('/home/profile/'.$user_id);
	}
        
        public function profile($id = 0)
        {
            
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            //print_r($data);
            //die();
            //$data['address'] = $this->User_model->get_address($user_id);
            $data['qualification'] = $this->Faculty_model->get_qualification($user_id);
            $data['phd'] = $this->Faculty_model->get_phd_qualification($user_id);
            $aoi = $this->Faculty_model->get_faculty_field($user_id,"area_of_interest");
            $home = $this->User_model->get_address($user_id,2);
            $office = $this->User_model->get_address($user_id,1);
            $data['home'] = $home;
            $data['can_edit'] = can_edit($this->session,$id);
            $data['office'] = $office;
            $data['aoi'] = $aoi[0]->area_of_interest;
            
            $data['segment1'] = 'profile.php';
//            $data['segment2'] = 'qualification.php';
            $data['segment2'] = 'address.php';
            //print_r($data['user']);
           //= die();
            $this->load->view('header');
            $this->load->view($this->nav);
            $this->load->view('faculty/home/home',$data);
            $this->load->view('footer');
            
        }
        
        
        public function edit_profile($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            if(count($this->input->post()) == 0)
            {
                $user = $this->User_model->get_user_info($user_id);
                $data['user'] = $user[0];
                $data['can_edit'] = can_edit($this->session,$id);
                $data['qualification'] = $this->Faculty_model->get_qualification($user_id);
                $aoi = $this->Faculty_model->get_faculty_field($user_id,"area_of_interest");
                $data['phd'] = $this->Faculty_model->get_phd_qualification($user_id);
                $data['aoi'] = $aoi[0]->area_of_interest;
                $home = $this->User_model->get_address($user_id,2);
                $office = $this->User_model->get_address($user_id,1);
                $data['home'] = $home;
                $data['office'] = $office;
                $data['segment1'] = 'profile_edit.php';
//                $data['segment2'] = 'qualification.php';
                $data['segment2'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->User_model->update_user($this->input->post(),$user_id);
                $this->Faculty_model->update_faculty($this->input->post(),$user_id);
                if($_FILES['resume']['size'] > 0)
                {
                    $name = "resume_".$user_id;
                    $config['upload_path']   = './'.RESUME_UPLOAD_FOLDER."/"; //./uploads/';
                    $config['max_size']      = 0;  
                    $config['overwrite']      = TRUE;
                    $config['file_name'] = $name;
                    $this->load->library('upload', $config);
                    $config['allowed_types'] = 'pdf';
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('resume')) 
                    {
                        $data['error']  = $this->upload->display_errors();
                    }
                    else 
                    { 
                        $data['upload_data'] = $this->upload->data();
                        $link = $data['upload_data']['file_name'];

                        $this->User_model->update_resume($user_id,$link);
                        $data['sucess'] = "File uploaded succesffully";
                    }
                }
                
                //print_r($data);
               // die();
                redirect('/home/profile/'.$user_id);
            }
            
        }
        
        public function edit_address($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            if(count($this->input->post()) == 0)
            {
                $user = $this->User_model->get_user_info($user_id);
                $data['user'] = $user[0];
                $data['can_edit'] = can_edit($this->session,$id);
                $aoi = $this->Faculty_model->get_faculty_field($user_id,"area_of_interest");
                
                $data['aoi'] = $aoi[0]->area_of_interest;
                $home = $this->User_model->get_address($user_id,2);
                $office = $this->User_model->get_address($user_id,1);
                $data['home'] = $home;
                $data['can_edit'] = $id == 0 ? TRUE : FALSE;
                $data['office'] = $office;
                $data['segment1'] = 'profile.php';
//                $data['segment2'] = 'qualification.php';
                $data['segment2'] = 'address_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->User_model->update_address($this->input->post(),$user_id);
                redirect('/home/profile/'.$user_id);
            }
        }
        
        public function qualification($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            if(count($this->input->post()) == 0)
            {
                $data['can_edit'] = can_edit($this->session,$id);
                $data['qualification'] = $this->Faculty_model->get_qualification($user_id);
                $data['phd'] = $this->Faculty_model->get_phd_qualification($user_id);
                if($data['can_edit'])
                {
                    if(count($data['phd']) == 0)
                        $data['segment1'] = 'qualification_phd_add.php';
                    $data['segment2'] = 'qualification_add.php';
                }
                
                $data['segment3'] = 'qualification.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_qualification($this->input->post(),$user_id);
                redirect('home/qualification/'.$user_id);
            }
        }
        
        public function add_phd_qualification($id = 0)
        {
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $this->Faculty_model->add_phd_qualification($this->input->post(),$user_id);
            redirect('home/qualification/'.$user_id);
        }
        
        public function edit_qualification($id = 0,$qual_id,$is_phd = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            if(count($this->input->post()) == 0)
            {
                $user = $this->User_model->get_user_info($user_id);
                $data['qualification'] = $this->Faculty_model->get_qualification($user_id);
                $data['phd'] = $this->Faculty_model->get_phd_qualification($user_id);
                $data['user'] = $user[0];
                $data['can_edit'] = can_edit($this->session,$id);
                if($is_phd)
                {
                    $result = $this->Faculty_model->get_phd_qualification($user_id);
                    $data['qual_detail'] = count($result) == 0 ? NULL : $result[0];
                }
                    
                else
                {
                    $result = $this->Faculty_model->get_qualification_deatils($qual_id);
                    $data['qual_detail'] = count($result) == 0 ? NULL : $result[0];;
                }
                    
                if($is_phd)
                    $data['segment2'] = 'qualification_phd_edit.php';
                else
                    $data['segment2'] = 'qualification_edit.php';
                $data['segment3'] = 'qualification.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                if($is_phd)
                    $this->Faculty_model->update_faculty_phd_qualification($this->input->post(),$user_id);
                else
                    $this->Faculty_model->update_faculty_qualification($this->input->post(),$qual_id);
                redirect('/home/qualification/'.$user_id);
            }
        }
        
        public function pub_journal($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                $config = array();
                $config["base_url"] = base_url() . "home/pub_journal/".$user_id;
                $config['uri_segment'] = 4;
                $total_row = $this->Faculty_model->total_journal_count($user_id);
                $config["total_rows"] = $total_row;
                $data["total_rows"] = $total_row;
                $config['per_page'] = PER_PAGE;
                $config['use_page_numbers'] = TRUE;
                $config['num_links'] = $total_row;
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = TRUE;
                $config['last_link'] = FALSE;
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
                $data["results"] = $this->Faculty_model->get_journal_details_of_faculty($offset, $config['per_page'],$user_id);
                $data["links"] = $this->pagination->create_links();
               //// print_r($data["results"]);
               // die();
                if($data['can_edit'])
                    $data['segment1'] = 'journal_add.php';
                $data['segment2'] = 'journal_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_journal($this->input->post(),$user_id);
                redirect('/home/pub_journal/'.$user_id);
            }
        }
        
        public function edit_pub_journal($id=0,$j_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_journal_details($j_id);
                $data['journal'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'journal_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_journal_details($this->input->post(),$j_id);
               redirect('/home/pub_journal/'.$user_id);
            }
        }
        
        public function pub_conf($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                $config = array();
                $config["base_url"] = base_url() . "home/pub_journal/".$user_id;
                $total_row = $this->Faculty_model->total_conference_count($user_id);
                $config['uri_segment'] = 4;
                $config["total_rows"] = $total_row;
                $data["total_rows"] = $total_row;
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
                $data["results"] = $this->Faculty_model->get_conference_details_of_faculty($offset, $config['per_page'],$user_id);
                $data["links"] = $this->pagination->create_links();
               // print_r($data["results"]);
              //  die();
                
                if($data['can_edit'])
                    $data['segment1'] = 'conference_add.php';
                $data['segment2'] = 'conference_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_conference($this->input->post(),$user_id);
                redirect('/home/pub_conf/'.$user_id);
            }
        }
        
        public function edit_pub_conference($id=0,$c_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_conference_details($c_id);
                $data['conf'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'conference_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_conference_details($this->input->post(),$c_id);
               redirect('/home/pub_conf/'.$user_id);
            }
        }
        
        
        public function admin_exp($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
           // $user_id = $this->session->userdata['logged_in']['user_id'];
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                $config = array();
                $config["base_url"] = base_url() . "home/admin_exp/".$user_id;
                $total_row = $this->Faculty_model->total_admin_exp_count($user_id);
                $config['uri_segment'] = 4;
                $data["total_rows"] = $total_row;
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
                $data["results"] = $this->Faculty_model->get_admin_exp_of_faculty($offset, $config['per_page'],$user_id);
                $data["links"] = $this->pagination->create_links();
               // print_r($data["results"]);
              //  die();
                
                if($data['can_edit'])
                    $data['segment1'] = 'admin_exp_add.php';
                $data['segment2'] = 'admin_exp_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_admin_exp($this->input->post(),$user_id);
                redirect('/home/admin_exp/'.$user_id);
            }
        }
        
        public function edit_admin_exp($id=0,$exp_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_experience_details($exp_id);
                $data['exp'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'admin_exp_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_experience_details($this->input->post(),$exp_id);
               redirect('/home/admin_exp/'.$user_id);
            }
        }
        
        
        public function phd_thesis_supervised($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                $config = array();
                $config["base_url"] = base_url() . "home/phd_thesis_supervised/".$user_id;
                $config['uri_segment'] = 4;
                $total_row = $this->Faculty_model->total_project($user_id,3);
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
                $data["results"] = $this->Faculty_model->get_projects($offset, $config['per_page'],$user_id,3);
                $data["links"] = $this->pagination->create_links();
               // print_r($data["results"]);
              //  die();
                
                $data['title'] = "Add new supervised PH.D. thesis";
                $data['type'] = 3;
                $data['display_title'] = "Ph.D. Thesis Supervised";
                if($data['can_edit'])
                    $data['segment1'] = 'project_supervised_add.php';
                $data['segment2'] = 'project_supervised_display.php';
                $data['edit_fn'] = "edit_phd_thesis_supervised";
                
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_project_supervised($this->input->post(),$user_id);
                redirect('/home/phd_thesis_supervised/'.$user_id);
            }
        }
        
        public function edit_phd_thesis_supervised($id = 0, $thesis_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_project_detail($thesis_id);
                $data['project'] = count($result) == 0 ? NULL : $result[0];
                 $data['title'] = "Edit supervised PH.D. thesis";
                $data['type'] = 3;
                $data['segment1'] = 'project_supervised_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_project_detail($this->input->post(),$thesis_id);
               redirect('/home/phd_thesis_supervised/'.$user_id);
            }
        }
        
        
        public function mtech_thesis_supervised($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                $config = array();
                $config["base_url"] = base_url() . "home/mtech_thesis_supervised/".$user_id;
                $config['uri_segment'] = 4;
                $total_row = $this->Faculty_model->total_project($user_id,2);
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
                $data["results"] = $this->Faculty_model->get_projects($offset, $config['per_page'],$user_id,2);
                $data["links"] = $this->pagination->create_links();
               // print_r($data["results"]);
              //  die();
                
                $data['title'] = "Add new supervised M.Tech thesis";
                $data['type'] = 2;
                $data['display_title'] = "M.Tech Thesis Supervised";
                if($data['can_edit'])
                    $data['segment1'] = 'project_supervised_add.php';
                $data['segment2'] = 'project_supervised_display.php';
                $data['edit_fn'] = "edit_mtech_thesis_supervised";
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_project_supervised($this->input->post(),$user_id);
                redirect('/home/mtech_thesis_supervised/'.$user_id);
            }
        }
        public function edit_mtech_thesis_supervised($id = 0, $thesis_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_project_detail($thesis_id);
                $data['project'] = count($result) == 0 ? NULL : $result[0];
                 $data['title'] = "Edit supervised M.Tech thesis";
                $data['type'] = 3;
                $data['segment1'] = 'project_supervised_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
               $this->Faculty_model->update_project_detail($this->input->post(),$thesis_id);
               redirect('/home/mtech_thesis_supervised/'.$user_id);
            }
        }
        
        public function btech_project_supervised($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                $config = array();
                $config["base_url"] = base_url() . "home/btech_project_supervised/".$user_id;
                $config['uri_segment'] = 4;
                $total_row = $this->Faculty_model->total_project($user_id,1);
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
                $data["results"] = $this->Faculty_model->get_projects($offset, $config['per_page'],$user_id,1);
                $data["links"] = $this->pagination->create_links();
               // print_r($data["results"]);
              //  die();
                
                $data['title'] = "Add new supervised B.Tech Project";
                $data['type'] = 1;
                $data['display_title'] = "B.Tech Project Supervised";
                if($data['can_edit'])
                    $data['segment1'] = 'project_supervised_add.php';
                $data['segment2'] = 'project_supervised_display.php';
                $data['edit_fn'] = "edit_btech_project_supervised";
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_project_supervised($this->input->post(),$user_id);
                redirect('/home/btech_project_supervised/'.$user_id);
            } 
        }
        public function edit_btech_project_supervised($id = 0, $project_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_project_detail($project_id);
                $data['project'] = count($result) == 0 ? NULL : $result[0];
                 $data['title'] = "Edit supervised B.Tech Project";
                $data['type'] = 3;
                $data['segment1'] = 'project_supervised_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
               $this->Faculty_model->update_project_detail($this->input->post(),$project_id);
               redirect('/home/btech_project_supervised/'.$user_id);
            }
        }
        
        public function patent($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                $data["results"] = $this->Faculty_model->get_faculty_patent($user_id);
                if($data['can_edit'])
                    $data['segment1'] = 'patent_add.php';
                $data['segment2'] = 'patent_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_patent($this->input->post(),$user_id);
                redirect('/home/patent/'.$user_id);
            } 
        }
        
        public function edit_patent($id = 0 ,$patent_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_patent_details($patent_id);
                $data['patent'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'patent_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_patent_details($this->input->post(),$patent_id);
               redirect('/home/patent/'.$user_id);
            }
        }
        
        public function teaching_exp($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                
                $data["results"] = $this->Faculty_model->get_faculty_course_tought(0,0,$user_id);
               
                if($data['can_edit'])
                    $data['segment1'] = 'teaching_exp_add.php';
                $data['segment2'] = 'teaching_exp_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_teaching_exp($this->input->post(),$user_id);
                redirect('/home/teaching_exp/'.$user_id);
            } 
        }
        
        public function edit_teaching_exp($id = 0 ,$exp_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_teaching_exp_details($exp_id);
                $data['exp'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'teaching_exp_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
               $this->Faculty_model->update_teaching_exp_details($this->input->post(),$exp_id);
               redirect('/home/teaching_exp/'.$user_id);
            }
        }
        
        
        public function project_investigated($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                
                $data["results"] = $this->Faculty_model->get_faculty_project_investigated($user_id);
               
                if($data['can_edit'])
                    $data['segment1'] = 'project_investigated_add.php';
                $data['segment2'] = 'project_investigated_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_project_investigated($this->input->post(),$user_id);
                redirect('/home/project_investigated/'.$user_id);
            }
        }
        
        public function edit_project_investigated($id = 0 ,$project_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_project_investigated_details($project_id);
                $data['project'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'project_investigated_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_project_investigated_details($this->input->post(),$project_id);
               redirect('/home/project_investigated/'.$user_id);
            }
        }
        
        public function employement($id = 0)
        {
            check_session($this->session);
           $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                
                $data["results"] = $this->Faculty_model->get_faculty_employment($user_id);
               
                if($data['can_edit'])
                    $data['segment1'] = 'faculty_employement_add.php';
                $data['segment2'] = 'faculty_employement_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_employment($this->input->post(),$user_id);
                redirect('/home/employement/'.$user_id);
            }
        }
        
        public function edit_employement($id = 0 ,$emp_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_faculty_employment_details($emp_id);
                $data['emp'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'faculty_employement_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_faculty_employment_details($this->input->post(),$emp_id);
               redirect('/home/employement/'.$user_id);
            }
        }
        
        public function lecture($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                
                $data["results"] = $this->Faculty_model->get_faculty_guest_lecture($user_id);
               
                if($data['can_edit'])
                    $data['segment1'] = 'faculty_guest_lecture_add.php';
                $data['segment2'] = 'faculty_guest_lecture_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_faculty_guest_lecture($this->input->post(),$user_id);
                redirect('/home/lecture/'.$user_id);
            }
        }
        
        public function edit_lecture($id = 0 ,$lecture_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_faculty_guest_lecture_details($lecture_id);
                $data['lecture'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'faculty_guest_lecture_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_faculty_guest_lecture($this->input->post(),$lecture_id);
                redirect('/home/lecture/'.$user_id);
            }
        }
        
        public function book($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                
                $data["results"] = $this->Faculty_model->get_book_published($user_id);
               
                if($data['can_edit']) 
                 $data['segment1'] = 'book_add.php';
                $data['segment2'] = 'book_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_book_published($this->input->post(),$user_id);
                redirect('/home/$book_id/'.$user_id);
            }
        }
        
        public function edit_book($id = 0 ,$book_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_book_published_detail($book_id);
                $data['book'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'book_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_book_published_detail($this->input->post(),$book_id);
               redirect('/home/book/'.$user_id);
            }
        }
        
        
        public function  chapter($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                
                $data["results"] = $this->Faculty_model->get_chapter_published($user_id);
               
                if($data['can_edit'])
                 $data['segment1'] = 'chapter_add.php';
                $data['segment2'] = 'chapter_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_chapter_published($this->input->post(),$user_id);
                redirect('/home/chapter/'.$user_id);
            }
        }
        
        public function edit_chapter($id = 0 ,$chapter_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_chapter_published_detail($chapter_id);
                $data['chapter'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'chapter_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_chapter_published_detail($this->input->post(),$chapter_id);
               redirect('/home/chapter/'.$user_id);
            }
        }
        
        public function activty($id = 0)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                
                
                $data["results"] = $this->Faculty_model->get_all_activity_detail($user_id);
               
                if($data['can_edit']) 
                    $data['segment1'] = 'activity_add.php';
                $data['segment2'] = 'activity_display.php';
               // $data['segment3'] = 'address.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->add_activity_detail($this->input->post(),$user_id);
                redirect('/home/activty/'.$user_id);
            }
        }
        
        
        public function edit_activity($id = 0 ,$activity_id)
        {
            check_session($this->session);
            $user_id = $id == 0 ? $this->session->userdata['logged_in']['user_id'] : $id;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            $data['can_edit'] = can_edit($this->session,$id);
            if(count($this->input->post()) == 0)
            {
                $result = $this->Faculty_model->get_activity_detail($activity_id);
                $data['activity'] = count($result) == 0 ? NULL : $result[0];
                $data['segment1'] = 'activity_edit.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $this->Faculty_model->update_activity_detail($this->input->post(),$activity_id);
               redirect('/home/activty/'.$user_id);
            }
        }
        
        public function settings()
        {
            check_session($this->session);
            $user_id = $this->session->userdata['logged_in']['user_id'] ;
            $user = $this->User_model->get_user_info($user_id);
            $data['user'] = $user[0];
            if(count($this->input->post()) == 0)
            {
                $data['segment1'] = 'setting.php';
                $this->load->view('header');
                $this->load->view($this->nav);
                $this->load->view('faculty/home/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $POST = $this->input->post();
                if($POST['pwd'] != "")
                    $this->User_model->change_password($user_id,$POST['pwd']);
               
                if($_FILES['profile_pic']['size'] > 0)
                {
                    $name = "profile_".$user[0]->user_id;
                    $config['upload_path']   = './'.IMG_UPLOAD_FOLDER."/"; //./uploads/';
                    $config['max_size']      = 0;  
                    $config['overwrite']      = TRUE;
                    $config['file_name'] = $name;
                    $this->load->library('upload', $config);
                    $config['allowed_types'] = 'gif|jpg|png';
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('profile_pic')) 
                    {
                        $data['error']  = $this->upload->display_errors();
                    }
                    else 
                    { 
                        $data['upload_data'] = $this->upload->data();
                        $link = $data['upload_data']['file_name'];

                        $this->User_model->update_profile_pic($user_id,$link);
                        $data['sucess'] = "File uploaded succesffully";
                    }
                }
                redirect("/home/profile");
            }
            
        }
        
}

