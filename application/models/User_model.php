<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    
    public function login($data) 
    {
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . md5($data['password']) . "' AND " . "(dept_id is null or dept_id ="  . $data['dept_id'] . ")";
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) 
            return TRUE;
        else 
            return FALSE;
    }

// Read data from database to show data in admin page
    public function get_user_login_info($username) 
    {

        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) 
            return $query->result();
        else
            return false;
    }
    
    public function check_for_duplicate_username($POST)
    {
        $data = array(
            'user_id != ',$POST['id'],
            'username = ',$POST['username']
        );
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) 
            return array('status' => 400 , 'msg' => 'Username already used');
        else
            return array('status' => 400 , 'msg' => '');
    }
    
    public function check_for_duplicate_email($POST)
    {
        $data = array(
            'user_id != ',$POST['id'],
            'email = ',$POST['email']
        );
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) 
            return array('status' => 400 , 'msg' => 'email already used');
        else
            return array('status' => 400 , 'msg' => '');
    }
    
    public function get_user_info($id)
    {
        $data = array(
            'user_id =' => $id
        );
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    public function update_user($POST ,$id)
    {
        $data = array(
            'salutation' => $POST['salutation'],
            'user_fname' => $POST['fname'],
            'user_mname' => $POST['mname'],
            'user_lname' => $POST['lname'],
            'email' => $POST['email'],
            'designation' => $POST['designation'],
            'dob' => $POST['dob']!= "" ? date_format(date_create_from_format('d-m-Y', $POST['dob']), 'Y-m-d') : 0,
            'gender' => $POST['gender'],
            'father_name' => $POST['father_name'],
            'mother_name' => $POST['mother_name'],
            'date_of_joining' => $POST['doj'],
            'marital_status' => $POST["marital_status"],
            'nationality' => $POST["nationality"],
            'domicile' => $POST["domicile"],
            'religion' => $POST['religion'],
            'phone_office' => $POST['office_phone'],
            'phone_residence' => $POST['residence_phone'],
            'phone_personal' => $POST['personal_phone'],
            'fax' => $POST['fax'],
            'sec_email' => $POST['sec_email']
        );
        
        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
    }
    
    
    
    public function get_user_field($id,$field)
    {
        $data = array(
            'user_id =' =>  $id
        );
        $this->db->select($field);
        $this->db->from('user');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_address($user_id,$type)
    {
        $data = array(
            "user_id" => $user_id,
            "addr_type" => $type
        );
        
        $this->db->select('*');
        $this->db->from('user_address');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_address($POST,$user_id)
    {
        $home = $this->get_address($user_id,2);
        $office = $this->get_address($user_id,1);
        $office_data = array(
            "addr_line1" => $POST['ad_1_1'],
            "addr_line2" => $POST['ad_1_2'],
            "city" => $POST['city_1'],
            "state" => $POST['state_1'],
            "country" => $POST['country_1'],
            "pin_code" => $POST['pincode_1'],
            "addr_type" => 1,
            "user_id" => $user_id
        );
        
         $home_data = array(
             "addr_line1" => $POST['ad_2_1'],
            "addr_line2" => $POST['ad_2_2'],
            "city" => $POST['city_2'],
            "state" => $POST['state_2'],
            "country" => $POST['country_2'],
            "pin_code" => $POST['pincode_2'],
            "addr_type" => 2,
             "user_id" => $user_id
        );
        print_r($home);
        print_r($office);
        echo count($office);
        //die();
        if(count($home) == 0)
        {
             $this->db->insert("user_address",$home_data);
        }
        else
        {
            $where = array(
                "user_id" => $user_id,
                "addr_type" => 2
            );
            $this->db->where($where);
            $this->db->update("user_address",$home_data);
        }
        
        if(count($office) == 0)
        {
             $this->db->insert("user_address",$office_data);
        }
        else
        {
            $where = array(
                "user_id" => $user_id,
                "addr_type" => 1
            );
            $this->db->where($where);
            $this->db->update("user_address",$office_data);
        }
    }
    
    public function update_profile_pic($user_id,$link)
    {
        $data = array(
            "image_link" => $link
        );
        $where = array(
            "user_id" => $user_id
        );
        
        $this->db->where($where);
        $this->db->update("user",$data);
    }
    
    public function change_password($user,$pwd)
    {
        $data = array(
            "password" => md5($pwd)
        );
        $where = array(
            "user_id" => $user
        );
        
        $this->db->where($where);
        $this->db->update("login",$data);    
    }
    
    
    public function change_password_by_username($username,$pwd)
    {
        $data = array(
            "password" => md5($pwd)
        );
        $where = array(
            "username" => $username
        );
        
        $this->db->where($where);
        $this->db->update("login",$data);    
    }
    
    public function update_resume($user,$link)
    {
        $data = array(
            "resume_link" => $link
        );
        $where = array(
            "user_id" => $user
        );
        
        $this->db->where($where);
        $this->db->update("user",$data);
    }
}
?>
