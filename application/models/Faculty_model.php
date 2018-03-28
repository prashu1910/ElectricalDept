<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Faculty_model extends CI_Model 
{ 
    /**
     * 
     */
    function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * 
     * @param type $POST
     * @return type
     */
    public function add_faculty($POST)
    {
        $data = array(
            'salutation' => $POST['salutation'],
            'user_fname' => $POST['fname'],
            'user_mname' => $POST['mname'],
            'user_lname' => $POST['lname'],
            'email' => $POST['email'],
            'designation' => $POST['designation'],
            'dob' => 0,
            'gender' => $POST['gender'],
            'father_name' => "",
            'mother_name' => "",
            'date_of_joining' => $POST['doj'],
            'marital_status' => "",
            'nationality' => "",
            'domicile' => "",
            'religion' => "",
            'phone_office' => ""
        );
        $this->db->insert('user', $data);
        $id = $this->db->insert_id();
        
        $data = array(
            'username' => $POST['username'],
            'user_id' => $id,
            'email' => $POST['email'],
            'password' => md5($POST['password']),
            'role' => 2,
            'status' => 1,
            'dept_id' => DEPT_ID
        );
        $this->db->insert('login', $data);
        
        $data = array(
            'faculty_id' => $id,
            'area_of_interest' => "",
            'type' => $POST['type']
        );
        $this->db->insert('faculty', $data);
        $data = array(
            'faculty_id' => $id,
            'dept_id' => DEPT_ID,
        );
        
        $this->db->insert('faculty_department', $data);
        
        return $id;
        
    }
    
    /**
     * 
     * @param type $POST
     * @return type
     */
    public function check_faculty($POST)
    {
        $data = array(
            'email =' => $POST['email']
        );
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($data);
        $query = $this->db->get();
        if($query->num_rows() > 0)
            return array('status' => 400,"msg" => "Faculty already exist");
        
        
        $data = array(
            'username' => $POST['username']
        );
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($data);
        $query = $this->db->get();
        if($query->num_rows() > 0)
            return array('status' => 400,"msg" => "Username already used");
        
        return array('status' => 100,"msg" => "Faculty added successfully");
    }
    /**
     * 
     * @param type $start
     * @param type $limit
     * @return type
     */
    public function get_all_faculty($start = 0,$limit = 0)
    {
        
      
        if($start == 0 && $limit == 0)
        {
            $sql = "select * from user join faculty where user_id in (select faculty_id from faculty_department "
                . "where dept_id =".DEPT_ID.") and user_id = faculty_id order by designation desc";
        }
        else 
        {
            $sql = "select * from user where user_id in (select faculty_id from faculty_department "
                . "where dept_id =".DEPT_ID.") order by designation desc  limit ".$start.",".$limit;
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @return type
     */
    public function get_faculty_count()
    {
         $data = array(
            'dept_id' => DEPT_ID
        );
        $this->db->select('faculty_id');
        $this->db->from('faculty_department');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    public function get_faculty_detail($id)
    {
        
        $query = $this->db->select('*')
         ->from('user')
         ->join('login', 'user.user_id = login.user_id')
         ->where('user.user_id', $id)
         ->get();
        
        $result = $query->result();
        if(count($result) > 0)
            return $result[0];
        return [];
    }
    
    /**
     * 
     * @param type $POST
     * @param type $id
     */
    public function update_faculty($POST, $id)
    {
        $data = array(
            "area_of_interest" => $POST["aoi"] 
        );
       $this->db->where('faculty_id', $id);
       $this->db->update('faculty', $data);
    }
    
    /**
     * 
     * @param type $POST
     */
    public function assign_hod($POST)
    {
        
        $current = $this->get_hod();
        if(isset($current))
        {
            $data = array(
                    'end_date' => $POST['end_date'],
            );
            $this->db->where('dept_hod_id', $current->dept_hod_id);
            $this->db->update('dept_hod', $data);
            
            $data = array("user_id"=>$POST['user_id'],"role" => 3);
            $this->db->select('*');
            $this->db->from('login');
            $this->db->where($data);
            $query = $this->db->get();
            if( $query->num_rows() > 0)
            {
                $data = array("role"=>2);
                $val = array("user_id" => $POST['user_id']);
                $this->db->where($data);
                $this->db->update('login', $val);
            }
        }
       /* $data = array(
            'dept_id' => DEPT_ID,
            'hod_id' => $POST['user_id'],
            'start_date' => $POST['start_date']
        );
        $this->db->insert('dept_hod', $data);
        $data = array("role"=>3);
        $val = array("user_id" => $POST['user_id']);
        $this->db->where($val);
        $this->db->update('login', $data);*/
    }
    
    /**
     * 
     * @return type
     */
    public function get_hod()
    {
        $sql = "SELECT dept_hod_id, user_id, user_fname,user_mname,user_lname, start_date from user join dept_hod where hod_id = user_id and end_date is null and dept_id = ".DEPT_ID;
        $result = $this->db->query($sql);
        return $result->row();
    }
    
    /**
     * 
     * @param integer $id
     * @return array 
     */
    public function get_qualification($id)
    {
        $data = array(
            'faculty_id =' => $id
        );
        $this->db->select('*');
        $this->db->from('faculty_qualification');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    
    public function get_phd_qualification($id)
    {
        $data = array(
            'faculty_id =' => $id
        );
        $this->db->select('*');
        $this->db->from('faculty_qualification_phd');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $id
     * @param type $field
     * @return type
     */
    public function get_faculty_field($id,$field)
    {
        $data = array(
            'faculty.faculty_id =' =>  $id
        );
        $this->db->select($field);
        $this->db->from('faculty');
        $this->db->join('user', 'user.user_id = faculty.faculty_id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * 
     * @param type $fid
     * @return type
     */
    public function total_journal_count($fid)
    {
        $data = array(
            'author_id' => $fid
        );
        $this->db->select('*');
        $this->db->from('journal_paper_author');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /**
     * 
     * @return type
     */
    public function total_dept_journal_count()
    {
       
        $sql = "select * from journal_paper_author where author_id in(select faculty_id from faculty_department where dept_id =".DEPT_ID." )";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    /**
     * 
     * @param type $start
     * @param type $limit
     * @param type $fac_id
     * @return type
     */
    public function get_journal_details_of_faculty($start = 0,$limit = 0,$fac_id)
    {
        if($start == 0 && $limit == 0)
        {
            $sql = "select * from journal_publication where paper_id in(select paper_id from journal_paper_author where author_id = ".$fac_id.")" ;
        }
        else 
        {
            $sql = "select * from journal_publication where paper_id in(select paper_id from journal_paper_author where author_id = ".$fac_id.") limit ".$start.",".$limit;
        }
       // echo $sql;
        //die();
        $query = $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $start
     * @param type $limit
     * @return type
     */
    public function get_journal_details_of_dept($start = 0,$limit = 0)
    {
        if($start == 0 && $limit == 0)
        {
            $sql = "select * from journal_publication where paper_id in(select paper_id from journal_paper_author where author_id in (select faculty_id from faculty_department where dept_id = ".DEPT_ID." ))" ;
        }
        else 
        {
            $sql = "select * from journal_publication where paper_id in(select paper_id from journal_paper_author where author_id in (select faculty_id from faculty_department where dept_id = ".DEPT_ID." )) limit ".$start.",".$limit;
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $fid
     * @return type
     */
    public function total_conference_count($fid)
    {
        $data = array(
            'author_id' => $fid
        );
        $this->db->select('*');
        $this->db->from('confrence_paper_author');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /**
     * 
     * @return type
     */
    public function total_dept_conference_count()
    {
       
        $sql = "select * from confrence_paper_author where author_id in(select faculty_id from faculty_department where dept_id =".DEPT_ID." )";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    /**
     * 
     * @param type $start
     * @param type $limit
     * @param type $fac_id
     * @return type
     */
    public function get_conference_details_of_faculty($start = 0,$limit = 0,$fac_id)
    {
        if($start == 0 && $limit == 0)
        {
            $sql = "select * from conference_proceeding where conference_id in(select conference_id from confrence_paper_author where author_id = ".$fac_id.")" ;
        }
        else 
        {
            $sql = "select * from conference_proceeding where conference_id in(select conference_id from confrence_paper_author where author_id = ".$fac_id.") limit ".$start.",".$limit;
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $start
     * @param type $limit
     * @return type
     */
    public function get_conference_details_of_dept($start = 0,$limit = 0)
    {
        if($start == 0 && $limit == 0)
        {
            $sql = "select * from conference_proceeding where conference_id in(select conference_id from confrence_paper_author where author_id in (select faculty_id from faculty_department where dept_id = ".DEPT_ID." ))" ;
        }
        else 
        {
            $sql = "select * from conference_proceeding where conference_id in(select conference_id from confrence_paper_author where author_id in (select faculty_id from faculty_department where dept_id = ".DEPT_ID." )) limit ".$start.",".$limit;
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $fid
     * @return type
     */
    public function total_count_of_course_tought($fid)
    {
        $data = array(
            'faculty_id' => $fid
        );
        $this->db->select('*');
        $this->db->from('faculty_teaching_exp');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /**
     * 
     * @param type $start
     * @param type $limit
     * @param type $fid
     * @return type
     */
    public function get_faculty_course_tought($start=0, $limit = 0,$fid)
    {
        if($start == 0 && $limit == 0)
        {
            $sql = "select * from faculty_teaching_exp where faculty_id = ".$fid;
        }
        else 
        {
            $sql = "select * from faculty_teaching_exp where faculty_id = ".$fid." limit ".$start.",".$limit;
        }
        $query = $this->db->query($sql);
        return $query->result();
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_teaching_exp($POST,$fac_id)
    {
        $data = array(
            "faculty_id" => $fac_id,
            "course_name" => $POST['course_name'],
            "semester" => $POST['semester'],
            "year" => $POST['year']
        );
        $this->db->insert('faculty_teaching_exp',$data);
        return  $this->db->insert_id();
    }
    /**
     * 
     * @param type $exp_id
     * @return type
     */
    public function get_teaching_exp_details($exp_id)
    {
        $data = array(
            'fac_exp_id' => $exp_id
        );
        $this->db->select('*');
        $this->db->from('faculty_teaching_exp');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $exp_id
     */
    public function update_teaching_exp_details($POST,$exp_id)
    {
        $data = array(
            "course_name" => $POST['course_name'],
            "semester" => $POST['semester'],
            "year" => $POST['year']
        );
        $where = array("fac_exp_id" => $exp_id);
        $this->db->where($where);
        $this->db->update("faculty_teaching_exp",$data);
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_project_supervised($POST,$fac_id)
    {
        $data = array(
            'title' => $POST['title'],
            'institute' => $POST['institute'],
            'year' => $POST['year'],
            'student' => $POST['student'],
            'status' => $POST['status'],
            'other_supervisors' => $POST['other_supervisor'],
            'type' => $POST['type'],
            'supervisor_id' => $fac_id,
            'dept_id' => DEPT_ID
        );
        $this->db->insert('faculty_project_supervised', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    /**
     * 
     * @param type $fid
     * @param type $type
     * @return type
     */
    public function total_project($fid,$type)
    {
        $data = array(
            'supervisor_id' => $fid,
            'type' => $type
        );
        $this->db->select('*');
        $this->db->from('faculty_project_supervised');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /**
     * 
     * @param type $start
     * @param type $limit
     * @param type $fid
     * @param type $type
     * @return type
     */
    public function get_projects($start=0, $limit = 0,$fid, $type)
    {
        if($start == 0 && $limit == 0)
        {
            $sql = "select * from faculty_project_supervised where supervisor_id = ".$fid." and type = ".$type;
        }
        else 
        {
            $sql = "select * from faculty_project_supervised where supervisor_id = ".$fid." and type = ".$type." limit ".$start.",".$limit;
        }
       // echo $sql;
        $query = $this->db->query($sql);
        //die();
        return $query->result();
        
    }
    /**
     * 
     * @param type $project_id
     * @return type
     */
    public function get_project_detail($project_id)
    {
        $data = array(
            'project_id' => $project_id
        );
        $this->db->select('*');
        $this->db->from('faculty_project_supervised');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $project_id
     */
    public function update_project_detail($POST,$project_id)
    {
        $data = array(
            'title' => $POST['title'],
            'institute' => $POST['institute'],
            'year' => $POST['year'],
            'student' => $POST['student'],
            'status' => $POST['status'],
            'other_supervisors' => $POST['other_supervisor']
        );
        
        $where = array(
            'project_id' => $project_id
        );
        
        $this->db->where($where);
        $this->db->update("faculty_project_supervised",$data);
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_journal($POST,$fac_id)
    {
        $data = array(
            'title' => $POST['title'],
            'journal' => $POST['journal'],
            'volume' => $POST['volume'],
            'volume_no' => $POST['volume_no'],
            'page_from' => $POST['page_from'],
            'page_to' => $POST['page_to'],
            'year' => $POST['year'],
            'impact_factor' => $POST['impact_factor'],
            'citation' => $POST['citation'],
            'digital_object_identifier' => $POST['doi'],
            'journal_type' => $POST['type'],
            'in_phd_work' => 0,
            'status' => $POST['status'],
            'other_authors' => $POST['other_author'],
            'link' => $POST['link'],
        );
        $this->db->insert('journal_publication', $data);
        $id = $this->db->insert_id();
        
        $data = array(
            "paper_id" => $id,
            "author_id" => $fac_id
        );
        
        $this->db->insert('journal_paper_author', $data);
        return $id;
    }
    /**
     * 
     * @param type $j_id
     * @return type
     */
    public function get_journal_details($j_id)
    {
        $data = array(
            "paper_id" => $j_id
        );
        $this->db->select('*');
        $this->db->from('journal_publication');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $j_id
     */
    public function update_journal_details($POST,$j_id)
    {
        //print_r($POST);
        $data = array(
            'title' => $POST['title'],
            'journal' => $POST['journal'],
            'volume' => $POST['volume'],
            'volume_no' => $POST['volume_no'],
            'page_from' => $POST['page_from'],
            'page_to' => $POST['page_to'],
            'year' => $POST['year'],
            'impact_factor' => $POST['impact_factor'],
            'citation' => $POST['citation'],
            'digital_object_identifier' => $POST['doi'],
            'journal_type' => $POST['type'],
            'in_phd_work' => 0,
            'status' => $POST['status'],
            'other_authors' => $POST['other_author'],
            'link' => $POST['link'],
        );
        
        $where  = array(
            "paper_id" => $j_id
        );
        
        $this->db->where($where);
        $this->db->update("journal_publication",$data);
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_conference($POST,$fac_id)
    {
        $data = array(
            'title' => $POST['title'],
            'conference_name' => $POST['conference'],
            'city' => $POST['city'],
            'country' => $POST['country'],
            'start_date' => $POST['start_date'],
            'end_date' => $POST['end_date'],
            'volume' => $POST['volume'],
            'volume_no' => $POST['volume_no'],
            'page_from' => $POST['page_from'],
            'page_to' => $POST['page_to'],
            'digital_object_identifier' => $POST['doi'],
            'citation' => $POST['citation'],
            'isbn' => $POST['isbn'],
            'issn' => $POST['issn'],
            'presentation_nature' => $POST['nature'],
            'organisor' => $POST['organisor'],
            'in_phd_work' => 0,
            'other_authors' => $POST['other_author'],
            'link' => $POST['link'],
            'conference_type' => $POST['type'],
        );
        $this->db->insert('conference_proceeding', $data);
        $id = $this->db->insert_id();
        
        $data = array(
            "conference_id" => $id,
            "author_id" => $fac_id
        );
        
        $this->db->insert('confrence_paper_author', $data);
        return $id;
    }
    /**
     * 
     * @param type $c_id
     * @return type
     */
    public function get_conference_details($c_id)
    {
        $data = array(
            "conference_id" => $c_id
        );
        $this->db->select('*');
        $this->db->from('conference_proceeding');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $c_id
     */
    public function update_conference_details($POST,$c_id)
    {
        $data = array(
            'title' => $POST['title'],
            'conference_name' => $POST['conference'],
            'city' => $POST['city'],
            'country' => $POST['country'],
            'start_date' => $POST['start_date'],
            'end_date' => $POST['end_date'],
            'volume' => $POST['volume'],
            'volume_no' => $POST['volume_no'],
            'page_from' => $POST['page_from'],
            'page_to' => $POST['page_to'],
            'digital_object_identifier' => $POST['doi'],
            'citation' => $POST['citation'],
            'isbn' => $POST['isbn'],
            'issn' => $POST['issn'],
            'presentation_nature' => $POST['nature'],
            'organisor' => $POST['organisor'],
            'in_phd_work' => 0,
            'other_authors' => $POST['other_author'],
            'link' => $POST['link'],
            'conference_type' => $POST['type'],
        );
        
        $where  = array(
            "conference_id" => $c_id
        );
        
        $this->db->where($where);
        $this->db->update("conference_proceeding",$data);
    }
    /**
     * 
     * @param type $fac_id
     * @return type
     */
    public function total_admin_exp_count($fac_id)
    {
        $data = array(
            'faculty_id' => $fac_id
        );
        $this->db->select('*');
        $this->db->from('administrative_experience');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /**
     * 
     * @param type $start
     * @param type $limit
     * @param type $fid
     * @return type
     */
    public function get_admin_exp_of_faculty($start=0, $limit = 0,$fid)
    {
        if($start == 0 && $limit == 0)
        {
            $sql = "select * from administrative_experience where faculty_id = ".$fid;
        }
        else 
        {
            $sql = "select * from administrative_experience where faculty_id = ".$fid." limit ".$start.",".$limit;
        }
       // echo $sql;
        $query = $this->db->query($sql);
        //die();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_admin_exp($POST,$fac_id)
    {
        $data = array(
            'designation' => $POST['designation'],
            'from_date' => $POST['start_date'],
            'to_date' => $POST['end_date'],
            'organisation' => $POST['organisation'],
            'responsibility' => $POST['resposibility'],
            'faculty_id' => $fac_id
        );
        $this->db->insert('administrative_experience', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    /**
     * 
     * @param type $exp_id
     * @return type
     */
    public function get_experience_details($exp_id)
    {
        $data = array(
            "experience_id" => $exp_id
        );
        $this->db->select('*');
        $this->db->from('administrative_experience');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $exp_id
     */
    public function update_experience_details($POST,$exp_id)
    {
        $data = array(
            'designation' => $POST['designation'],
            'from_date' => $POST['start_date'],
            'to_date' => $POST['end_date'],
            'organisation' => $POST['organisation'],
            'responsibility' => $POST['resposibility']
        );
        
        $where = array(
           "experience_id" => $exp_id
        );
        $this->db->where($where);
        $this->db->update('administrative_experience', $data);
    }

    /**
     * 
     * @param type $fac_id
     * @return type
     */
    public function get_faculty_patent($fac_id)
    {
        $sql = "select * from patent where patent_id in (select patent_id from patent_awardee where awardee =".$fac_id." )";
        $query= $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_patent($POST,$fac_id)
    {
       $data = array(
            'patent_reg_no' => $POST['patent_reg_no'],
            'name' => $POST['name'],
            'patent_date' => $POST['patent_date'],
            'awarding_country' => $POST['awarding_country'],
            'other_coawardee' => $POST['other_coawardee']
        );
        $this->db->insert('patent', $data);
        $id = $this->db->insert_id();
        
        $data = array(
            "patent_id" => $id,
            "awardee" => $fac_id
        );
        $this->db->insert('patent_awardee', $data);
        return $id; 
    }
    /**
     * 
     * @param type $patent_id
     * @return type
     */
    public function get_patent_details($patent_id)
    {
        $data = array(
            "patent_id" => $patent_id
        );
        $this->db->select('*');
        $this->db->from('patent');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $patent_id
     */
    public function update_patent_details($POST,$patent_id)
    {
        $data = array(
            'patent_reg_no' => $POST['patent_reg_no'],
            'name' => $POST['name'],
            'patent_date' => $POST['patent_date'],
            'awarding_country' => $POST['awarding_country'],
            'other_coawardee' => $POST['other_coawardee']
        );
        $where = array("patent_id" => $patent_id);
        $this->db->where($where);
        $this->db->update("patent",$data);
    }
    /**
     * 
     * @param type $fac_id
     * @return type
     */
    public function get_faculty_project_investigated($fac_id)
    {
        $sql = "select * from faculty_project_investigated where project_id in (select project_id from faculty_project_investigator where investigator =".$fac_id." )";
        $query= $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_project_investigated($POST,$fac_id)
    {
        $data = array(
            'title' => $POST['title'],
            'details' => $POST['details'],
            'start_date' => $POST['start_date'],
            'end_date' => $POST['end_date'],
            'sponsor_name' => $POST['sponsor_name'],
            'amount' => $POST['amount'],
            'other_investigators' => $POST['other_coawardee'],
            'type' => $POST['type']
        );
        $this->db->insert('faculty_project_investigated', $data);
        $id = $this->db->insert_id();
        
        $data = array(
            "project_id" => $id,
            "investigator" => $fac_id
        );
        $this->db->insert('faculty_project_investigator', $data);
        return $id;
    }
    /**
     * 
     * @param type $project_id
     * @return type
     */
    public function get_project_investigated_details($project_id)
    {
        $data = array(
            "project_id" => $project_id
        );
        $this->db->select('*');
        $this->db->from('faculty_project_investigated');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $project_id
     */
    public function update_project_investigated_details($POST,$project_id)
    {
        $data = array(
            'title' => $POST['title'],
            'details' => $POST['details'],
            'start_date' => $POST['start_date'],
            'end_date' => $POST['end_date'],
            'sponsor_name' => $POST['sponsor_name'],
            'amount' => $POST['amount'],
            'other_investigators' => $POST['other_coawardee']
        );
        $where = array(
            "project_id" => $project_id
        );
        $this->db->where($where);
        $this->db->update("faculty_project_investigated",$data);
    }
    /**
     * 
     * @param type $fac_id
     * @return type
     */
    public function get_faculty_employment($fac_id)
    {
        $sql = "select * from faculty_employment where faculty_id  =".$fac_id;
        $query= $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_employment($POST,$fac_id)
    {
        $data = array(
            'start_date' => $POST['start_date'],
            'end_date' => $POST['end_date'],
            'position' => $POST['position'],
            'organisation' => $POST['organisation'],
            'work_nature' => $POST['work_nature'],
            'faculty_id' => $fac_id
        );
        $this->db->insert('faculty_employment', $data);
        $id = $this->db->insert_id();
        
        return $id;
    }
    /**
     * 
     * @param type $emp_id
     * @return type
     */
    public function get_faculty_employment_details($emp_id)
    {
        $data = array(
            "emp_id" => $emp_id
        );
        $this->db->select('*');
        $this->db->from('faculty_employment');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $emp_id
     */
    public function update_faculty_employment_details($POST,$emp_id)
    {
    
         $data = array(
            'start_date' => $POST['start_date'],
            'end_date' => $POST['end_date'],
            'position' => $POST['position'],
            'organisation' => $POST['organisation'],
            'work_nature' => $POST['work_nature']
        );
        $where = array(
            "emp_id" => $emp_id
        );
        $this->db->where($where);
        $this->db->update("faculty_employment",$data);
    }
    /**
     * 
     * @param type $fac_id
     * @return type
     */
    public function get_faculty_guest_lecture($fac_id)
    {
        $sql = "select * from delivered_guest_lecture where faculty_id  =".$fac_id;
        $query= $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_faculty_guest_lecture($POST,$fac_id)
    {
        $data = array(
            'lecture_title' => $POST['lecture_title'],
            'date' => $POST['date'],
            'type' => $POST['type'],
            'organisation' => $POST['organisation'],
            'faculty_id' => $fac_id
        );
        $this->db->insert('delivered_guest_lecture', $data);
        $id = $this->db->insert_id();
        
        return $id;
    }
    /**
     * 
     * @param type $lecture_id
     * @return type
     */
    public function get_faculty_guest_lecture_details($lecture_id)
    {
        $data = array(
            "lecture_id" => $lecture_id
        );
        $this->db->select('*');
        $this->db->from('delivered_guest_lecture');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $lecture_id
     */
    public function update_faculty_guest_lecture($POST,$lecture_id)
    {
        $data = array(
            'lecture_title' => $POST['lecture_title'],
            'date' => $POST['date'],
            'type' => $POST['type'],
            'organisation' => $POST['organisation']
        );
        
        $where = array(
            "lecture_id" => $lecture_id
        );
        $this->db->where($where);
        $this->db->update("delivered_guest_lecture",$data);
    }
    /**
     * 
     * @param type $fac_id
     * @return type
     */
    public function get_book_published($fac_id)
    {
        $sql = "select * from book_published where book_id in (select book_id from book_author where author_id =".$fac_id." )";
        $query= $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_book_published($POST,$fac_id)
    {
        $data = array(
            'year' => $POST['year'],
            'book_title' => $POST['book_title'],
            'isbn' => $POST['isbn'],
            'issn' => $POST['issn'],
            'publisher' => $POST['publisher']
        );
        $this->db->insert('book_published', $data);
        $id = $this->db->insert_id();
        
        $data = array(
            "book_id" => $id,
            "author_id" => $fac_id
        );
        $this->db->insert('book_author', $data);
        return $id;
    }
    /**
     * 
     * @param type $book_id
     * @return type
     */
    public function get_book_published_detail($book_id)
    {
        $data = array(
            "book_id" => $book_id
        );
        $this->db->select('*');
        $this->db->from('book_published');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $book_id
     */
    public function update_book_published_detail($POST,$book_id)
    {
        $data = array(
            'year' => $POST['year'],
            'book_title' => $POST['book_title'],
            'isbn' => $POST['isbn'],
            'issn' => $POST['issn'],
            'publisher' => $POST['publisher']
        );
        
        $where = array(
            "book_id" => $book_id
        );
        $this->db->where($where);
        $this->db->update("book_published",$data);
    }
    /**
     * 
     * @param type $fac_id
     * @return type
     */
    public function get_chapter_published($fac_id)
    {
        $sql = "select * from chapter_published where chapter_id in (select chapter_id from chapter_author where author_id =".$fac_id." )";
        $query= $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_chapter_published($POST,$fac_id)
    {
        $data = array(
            'year' => $POST['year'],
            'book_title' => $POST['book_title'],
            'isbn' => $POST['isbn'],
            'chapter_title' => $POST['chapter_title'],
            'publisher' => $POST['publisher'],
            'page_from' => $POST['page_from'],
            'page_to' => $POST['page_to']
        );
        $this->db->insert('chapter_published', $data);
        $id = $this->db->insert_id();
        
        $data = array(
            "chapter_id" => $id,
            "author_id" => $fac_id
        );
        $this->db->insert('chapter_author', $data);
        return $id;
    }
    /**
     * 
     * @param type $chapter_id
     * @return type
     */
    public function get_chapter_published_detail($chapter_id)
    {
        $data = array(
            "chapter_id" => $chapter_id
        );
        $this->db->select('*');
        $this->db->from('chapter_published');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $chapter_id
     */
    public function update_chapter_published_detail($POST,$chapter_id)
    {
        $data = array(
            'year' => $POST['year'],
            'book_title' => $POST['book_title'],
            'isbn' => $POST['isbn'],
            'chapter_title' => $POST['chapter_title'],
            'publisher' => $POST['publisher'],
            'page_from' => $POST['page_from'],
            'page_to' => $POST['page_to']
        );
        
        $where = array(
            "chapter_id" => $chapter_id
        );
        $this->db->where($where);
        $this->db->update("chapter_published",$data);
    }
    /**
     * 
     * @param type $fac_id
     * @return type
     */
    public function get_all_activity_detail($fac_id)
    {
         $sql = "select * from academic_activity_organisor where activity_id in (select activity_id from activity_cordinator where cordinator_id =".$fac_id." )";
        $query= $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     * @return type
     */
    public function add_activity_detail($POST,$fac_id)
    {
        $data = array(
            'in_capacity_of' => $POST['in_capacity_of'],
            'title' => $POST['title'],
            'duration' => $POST['duration'],
            'organized_at' => $POST['organized_at'],
            'sponsor' => $POST['sponsor'],
            'amount' => $POST['amount'],
            'type' => $POST['type'],
            'other_cocoordinators' => ""
        );
        $this->db->insert('academic_activity_organisor', $data);
        $id = $this->db->insert_id();
        
        $data = array(
            "activity_id" => $id,
            "cordinator_id" => $fac_id
        );
        $this->db->insert('activity_cordinator', $data);
        return $id;
    }
    /**
     * 
     * @param type $activity_id
     * @return type
     */
    public function get_activity_detail($activity_id)
    {
         $data = array(
            "activity_id" => $activity_id
        );
        $this->db->select('*');
        $this->db->from('academic_activity_organisor');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $activity_id
     */
    public function update_activity_detail($POST,$activity_id)
    {
        
        $data = array(
            'in_capacity_of' => $POST['in_capacity_of'],
            'title' => $POST['title'],
            'duration' => $POST['duration'],
            'organized_at' => $POST['organized_at'],
            'sponsor' => $POST['sponsor'],
            'amount' => $POST['amount'],
            'type' => $POST['type'],
            'other_cocoordinators' => ""
        );
        $where = array(
            "activity_id" => $activity_id
        );
        $this->db->where($where);
        $this->db->update("academic_activity_organisor",$data);
    }
    /**
     * 
     * @return type
     */
    public function get_dept_project_investigated()
    {
        $sql = "select * from faculty_project_investigated  where project_id in (select project_id from faculty_project_investigator where investigator in (select faculty_id from faculty_department where dept_id = ".DEPT_ID."))";
        $query= $this->db->query($sql);
        return $query->result();
    }
    
    /**
     * 
     * @param type $POST
     * @return type
     */
    public function execute_query($POST)
    {
       
        $query = $this->db->query($POST['query']);
        $error = $this->db->error();
        if(isset($error) && $error['message'] != "")
            return array('status' => 400,'error' => $error);
        else
            return array('status' => 200 , 'result' => $query->result());
    }
    
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     */
    public function add_phd_qualification($POST,$fac_id)
    {
        $data = array(
            "faculty_id" => $fac_id,
            "date_of_registration" => $POST['registration_date'] != "" ? date_format(date_create_from_format('d-m-Y', $POST['registration_date']), 'Y-m-d') :0,
            "date_of_award" => $POST['award_date'] != "" ? date_format(date_create_from_format('d-m-Y', $POST['award_date']), 'Y-m-d'): 0 ,
            "university" => $POST['institute'],
            "title" => $POST['title'],
            "area" => $POST['area'],
            "status" => $POST['status']
        );
        
        $this->db->insert("faculty_qualification_phd",$data);
    }
    
    /**
     * 
     * @param type $POST
     * @param type $fac_id
     */
    public function add_qualification($POST,$fac_id)
    {
        $data = array(
            "faculty_id" => $fac_id,
            "year_of_passing" => $POST['passing_year'] ,
            "degree" => $POST['degree'],
            "institute" => $POST['institute'],
            "board" => $POST['board'],
            "specialization" => $POST['specialization'],
            "percentage" =>$POST['mark_type'] == 10 ? $POST['marks'] : 0,
            "cgpa" => $POST['mark_type'] == 20 ? $POST['marks'] : 0
        );
        
        $this->db->insert("faculty_qualification",$data);
    }
    
    /**
     * 
     * @param type $POST
     * @param type $user_id
     */
    public function update_faculty_phd_qualification($POST,$user_id)
    {
        $data = array(
            "date_of_registration" => $POST['registration_date'] != "" ? date_format(date_create_from_format('d-m-Y', $POST['registration_date']), 'Y-m-d') :0,
            "date_of_registration"=> $POST['award_date'] != "" ? date_format(date_create_from_format('d-m-Y', $POST['award_date']), 'Y-m-d'): 0 ,
            "university" => $POST['institute'],
            "title" => $POST['title'],
            "status" => $POST['status'],
            "area" => $POST['area']
        );
        $where = array(
            "faculty_id" => $user_id
        );
        $this->db->where($where);
        $this->db->update("faculty_qualification_phd",$data);
    }
    
    /**
     * 
     * @param type $POST
     * @param type $qual_id
     */
    public function update_faculty_qualification($POST,$qual_id)
    {
        $data = array(
            "year_of_passing" => $POST['passing_year'] ,
            "degree" => $POST['degree'],
            "institute" => $POST['institute'],
            "board" => $POST['board'],
            "specialization" => $POST['specialization'],
            "percentage" =>$POST['mark_type'] == 10 ? $POST['marks'] : 0,
            "cgpa" => $POST['mark_type'] == 20 ? $POST['marks'] : 0
        );
        
        $where = array(
            "qual_id" => $qual_id
        );
        $this->db->where($where);
        $this->db->update("faculty_qualification",$data);
    }
    
    /**
     * 
     * @param type $qual_id
     * @return type
     */
    public function get_qualification_deatils($qual_id)
    {
        $data = array(
            "qual_id" => $qual_id
        );
        $this->db->select('*');
        $this->db->from('faculty_qualification');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
