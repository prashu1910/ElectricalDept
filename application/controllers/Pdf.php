<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {
        
        private $programme = array();
        function __construct() 
        {
            parent::__construct();
        }
	function pdf()
        {
            $this->load->helper('pdf_helper');
            /*
                ---- ---- ---- ----
                your code here
                ---- ---- ---- ----
            */
            $this->load->view('pdfreport', $data);
        }
}
