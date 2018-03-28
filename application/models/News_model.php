<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    public function get_news_count()
    {
        $sql = "select * from news where  show_in_news = 1 and dept_id = ".DEPT_ID;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function get_all_dept_news()
    {
        $sql = "select * from news where  dept_id = ".DEPT_ID. " and show_in_news = 1 order by timestamp desc";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function get_all_dept_news_for_admin()
    {
        $sql = "select * from news where  dept_id = ".DEPT_ID. " order by timestamp desc";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function get_event_count()
    {
        $sql = "select * from events where  show_in_event = 1 and dept_id = ".DEPT_ID;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function get_all_dept_event()
    {
        $sql = "select * from events where  dept_id = ".DEPT_ID. " and show_in_event = 1 order by timestamp desc";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function get_all_dept_event_for_admin()
    {
        $sql = "select * from events where  dept_id = ".DEPT_ID. " order by timestamp desc";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function add_news($POST)
    {
        $data = array(
            "title" => $POST['title'],
            "show_in_news" => 1,
            "timestamp" => date_format(date_create_from_format('d-m-Y H:i:s', $POST['date']), 'Y-m-d H:i:s'),
            "content" => $POST['content'],
            "link" => $POST['link'],
            "dept_id" => DEPT_ID
            
        );
        $this->db->insert("news",$data);
    }
    
    public function enable_news($news_id)
    {
        $data = array(
            "news_id" => $news_id
        );
        
        $val = array(
            "show_in_news" => 1
        );
        
        $this->db->where($data);
        $this->db->update('news', $val); 
        
    }
    public function disable_news($news_id)
    {
        $data = array(
            "news_id" => $news_id
        );
        
        $val = array(
            "show_in_news" => 0
        );
        
        $this->db->where($data);
        $this->db->update('news', $val); 
        
    }
    
    
    
    public function add_event($POST)
    {
        $data = array(
            "title" => $POST['title'],
            "show_in_event" => 1,
            "timestamp" => date_format(date_create_from_format('d-m-Y H:i:s', $POST['date']), 'Y-m-d H:i:s'),
            "content" => $POST['content'],
            "link" => $POST['link'],
            "dept_id" => DEPT_ID
            
        );
        $this->db->insert("events",$data);
    }
    
    public function enable_event($event_id)
    {
        $data = array(
            "event_id" => $event_id
        );
        
        $val = array(
            "show_in_event" => 1
        );
        
        $this->db->where($data);
        $this->db->update('events', $val); 
        
    }
    
    public function disable_event($event_id)
    {
        $data = array(
            "event_id" => $event_id
        );
        
        $val = array(
            "show_in_event" => 0
        );
        
        $this->db->where($data);
        $this->db->update('events', $val); 
        
    }
    
}