<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dept_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    /**
     * 
     * @return type
     */
    public function get_programme()
    {
        $sql = "SELECT * FROM programme where programme_id in (select distinct programme_id from branch where dept_id = 1".DEPT_ID;
        $result =  $this->db->query($sql);
        return $result->result();

    }
    /**
     * 
     * @return type
     */
    public function get_branch()
    {
        $sql = "SELECT * FROM branch where dept_id = ".DEPT_ID;
        $result =  $this->db->query($sql);
        return $result->result();

    }
    /**
     * 
     * @param type $p_id
     * @return type
     */
    public function get_programme_branch($p_id)
    {
        $data = array(
            "programme_id" => $p_id,
            "dept_id" => DEPT_ID
        );
        
        $this->db->select('*');
        $this->db->from('branch');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @return type
     */
    public function get_dept_programme()
    {
        $sql = "select * from programme where programme_id in(select distinct programme_id from branch where dept_id =".DEPT_ID." )";
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    /**
     * 
     * @param type $pid
     * @return type
     */
    public function get_programme_name($pid)
    {
        $data = array(
            "programme_id" => $pid
        );
        $this->db->select('*');
        $this->db->from('programme');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @param type $bid
     * @return type
     */
    public function get_branch_name($bid)
    {
        $data = array(
            "branch_id" => $bid
        );
        $this->db->select('*');
        $this->db->from('branch');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function get_all_programme_branch()
    {
        $sql = "select branch.name as b_name,programme.name as p_name, programme.programme_id,branch.branch_id from programme join branch where programme.programme_id = branch.programme_id and branch.dept_id = ".DEPT_ID;
        $query = $this->db->query($sql);
        return $query->result();
    }
    /**
     * 
     * @param type $POST
     * @param type $link
     */
    public function add_timetable($POST,$link)
    {
        $data = array(
            "programme_id" => $POST['programme'],
            "branch_id" => $POST['branch'],
            "semester" => $POST['semester'],
        );
        
        $this->db->select('*');
        $this->db->from('timetable');
        $this->db->where($data);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $data = array(
               "programme_id" => $POST['programme'],
                "branch_id" => $POST['branch'],
                "semester" => $POST['semester'],
            ); 
            
            $val = array(
                "link" => $link
            );
           
            $this->db->where($data);
            $this->db->update('timetable', $val);            
        }
        else 
        {
            $data = array(
                   "programme_id" => $POST['programme'],
                   "branch_id" => $POST['branch'],
                   "semester" => $POST['semester'],
                   "link" => $link
               );
            $this->db->insert("timetable",$data);
        }
        
    }
    /**
     * 
     * @param type $POST
     * @return type
     */
    public function get_timetable($POST)
    {
        $data = array(
            "programme_id" => $POST['programme'],
             "branch_id" => $POST['branch'],
             "semester" => $POST['semester'],
        ); 
        $this->db->select('*');
        $this->db->from('timetable');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function get_all_timetable()
    {
        $sql = "SELECT timetable_id, branch.name as b_name, programme.name as p_name, link  FROM mnnit_db.timetable join department join branch join programme on timetable.branch_id = branch.branch_id and programme.programme_id = timetable.programme_id where department.dept_id =  ".DEPT_ID;
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /**
     * 
     * @param type $POST
     * @param type $link
     */
    public function add_gallery($POST,$link)
    {
        $data = array(
            "title" => $POST['title'],
            "show_in_gallery" => 1,
            "upload_date" => date("Y-m-d"),
            "pic_link" => $link,
            "link" => $POST['link'],
            "dept_id" => DEPT_ID
        );
        $this->db->insert("gallery",$data);
    }
    /**
     * 
     * @return type
     */
    public function get_images_from_gallery()
    {
        $data = array(
            "dept_id" => DEPT_ID,
             "show_in_gallery" => 1,
        ); 
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * 
     * @return type
     */
    public function get_images_from_gallery_for_admin()
    {
        $data = array(
            "dept_id" => DEPT_ID
        ); 
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
   /**
    * 
    * @param type $pic_id
    */
    public function disable_pic_from_gallery($pic_id)
    {
        $data = array(
            "gallery_id" => $pic_id
        );
        
        $val = array(
            "show_in_gallery" => 0
        );
        
        $this->db->where($data);
        $this->db->update('gallery', $val); 
        
    }
    
    /**
     * 
     * @param type $pic_id
     */
    public function enable_pic_in_gallery($pic_id)
    {
        $data = array(
            "gallery_id" => $pic_id
        );
        
        $val = array(
            "show_in_gallery" => 1
        );
        
        $this->db->where($data);
        $this->db->update('gallery', $val); 
        
    }
    
    /**
     * 
     * @param type $POST
     * @return type
     */
    public function add_lab($POST)
    {
        $data = array(
            "name" => $POST['name'],
            "lab_type" => $POST["lab_type"],
            "under_supervison" => $POST["user_id"],
            "dept_id" => DEPT_ID
        );
        
        $this->db->insert("laboratory",$data);
        $id = $this->db->insert_id();
        
        for($i=1; $i<=$POST['rows']; $i++)
        {
            $data = array(
                "name" => $POST["name_".$i],
                "quantity" => $POST["qty_".$i],
                "description" => $POST["desc_".$i],
                "lab_id" => $id
            );
            $this->db->insert("lab_equipment",$data);
        }
        return $id;
    }
    /**
     * 
     * @return type
     */
    public function get_all_labs()
    {
        $data = array("dept_id" => DEPT_ID);
        $this->db->select('*');
        $this->db->where($data);
        $this->db->from('laboratory');
        $query = $this->db->get();
        return $query->result(); 
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    public function get_lab_details($id)
    {
        $data = array("lab_id" => $id);
        $this->db->select('*');
        $this->db->where($data);
        $this->db->from('laboratory');
        $query = $this->db->get();
        $result['lab'] = $query->result();
        if($result['lab'][0]->under_supervison)
        {
            $data = array("user_id" => $result['lab'][0]->under_supervison);
            $this->db->select('*');
            $this->db->where($data);
            $this->db->from('user');
            $query = $this->db->get();
            $result['supervisor'] = $query->result();
        }
        else
            $result['supervisor'] = [];
        return $result;
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    public function get_lab_equipments($id)
    {
        $data = array("lab_id" => $id);
        $this->db->select('*');
        $this->db->where($data);
        $this->db->from('lab_equipment');
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>
