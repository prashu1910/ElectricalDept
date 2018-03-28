<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Course_model extends CI_Model 
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
     * @return type
     */
    public function get_course_count()
    {
        //$sql = "select * from course where course_id in (SELECT course_id FROM course_branch where branch_id in (select branch_id from branch where dept_id = ".DEPT_ID."))";
        $sql = "select * from course";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    /**
     * 
     * @param int $start
     * @param int $limit
     * @return array
     */
    public function get_all_course($start = 0,$limit = 0)
    {
        if($start == 0 && $limit == 0)
        {
            //$sql = "select * from course where course_id in (SELECT course_id FROM course_branch where branch_id in (select branch_id from branch where dept_id = ".DEPT_ID."))";
            $sql = "select * from course where dept_id = 6";
        }
        else 
        {
            //$sql = "select * from course where course_id in (SELECT course_id FROM course_branch where branch_id in (select branch_id from branch where dept_id = ".DEPT_ID.")) limit ".$start.",".$limit;
            $sql = "select * from course where dept_id = 6 limit ".$start.",".$limit;
        }
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    public function get_all_courses_registered()
    {
        $sql = "SELECT * FROM course";
        $result =  $this->db->query($sql);
        return $result->result();
    }
    /**
     * 
     * @param type $POST
     * @return type
     */
    public function check_course($POST)
    {
        $sql = "select * from course where course_id = '".$POST['course_code']."'";
        $result =  $this->db->query($sql);
        if ($result->num_rows() >= 1) 
            return array('status' => 400, 'msg'=>"Course code already exist");
        else 
            return array('status' => 200, 'msg'=>"");
    }
    /**
     * 
     * @param type $POST
     * @return type
     */
    public function add_course($POST)
    {
       
        $data = array(
            'course_code' => $POST['course_code'],
            'course_name' => $POST['course_name'],
            'category_id' => $POST['category'],
            'lecture' => $POST['lecture'],
            'tutorial' => $POST['tutorial'],
            'practical' => $POST['practical'],
            'content' => $POST['content'],
            'reference' => $POST['reference'],
            'credit' => $POST['credit'],
            'is_elective' => isset($POST['elective']) ? 1 : 0,
            'dept_id' => DEPT_ID
        );
        $this->db->insert('course', $data);
        $id = $this->db->insert_id();
        
        if(isset($POST['elective']))
        {
            foreach ($POST['elective_course'] as $cr)
            {
                $data = array(
                    'course_id' => $cr,
                    'elective_id' =>$id
                );
                $this->db->insert('elective_course', $data);
            }
        }
        return $id;
    }
    /**
     * 
     * @return type
     */
    public function get_category()
    {
        $sql = "SELECT * FROM course_category";
        $result =  $this->db->query($sql);
        return $result->result();
    }
    
    /**
     * @author Prashant
     * @param type $POST
     * @return boolean
     */
    public function add_curriculam($POST)
    {
      //  print_r($POST);
       //. die();
        //$course = explode(",", $POST['course']);
        foreach ($POST['course'] as $cr)
        {
            $data = array(
                'branch_id' => $POST['branch'],
                'course_id' => $cr,
                'semester' =>$POST['semester']
            );
            $this->db->insert('course_branch', $data);
        }
        return TRUE;
    }
    
    
    public function get_all_curriculam()
    {
       $sql = "Select branch.dept_id,programme.programme_id, programme.name as p_name,branch.branch_id,branch.name as b_name,  course_branch.semester from branch join programme join course_branch where branch.branch_id = course_branch.branch_id and branch.programme_id = programme.programme_id group by course_branch.branch_id,course_branch.semester having branch.dept_id = ".DEPT_ID;
       $query = $this->db->query($sql);
       return $query->result();
    }
    
    /**
     * 
     * @param array $branch_id
     * @return type
     */
    public function get_course_structure($branch_id)
    {
        $sql = "select * from course join course_branch where course.course_id = course_branch.course_id and course_branch.branch_id = ".$branch_id." group by semester,course_branch.course_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function get_course_details($course_id)
    {
       $sql = "select * from course join course_category where course.category_id = course_category.category_id and course.course_id = ".$course_id ;
       $query = $this->db->query($sql);
       return $query->result();
    }
    
    public function get_elective_details($course_id)
    {
       $sql = "select * from course join course_category where course.category_id = course_category.category_id and course.course_id in (select course_id from elective_course where elective_id = ".$course_id.")" ;
       $query = $this->db->query($sql);
       return $query->result();
    }
}
?>
