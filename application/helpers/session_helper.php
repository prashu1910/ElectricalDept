<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_session'))
{
    function check_session($session)
    {
       // print_r($session);
       // die();
        if(!(isset($session->userdata['logged_in']) && $session->userdata['logged_in']['username'] != ""))
            redirect("/login");
    }   
}

if ( ! function_exists('can_edit'))
{
    function can_edit($session,$id)
    {
       if($session->userdata['logged_in']['user_id'] == $id)
           return TRUE;
       return FALSE;
    }   
}