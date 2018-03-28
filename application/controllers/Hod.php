<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hod extends CI_Controller {
        
        private $programme = array();
        function __construct() 
        {
            parent::__construct();
           // $this->output->enable_profiler(TRUE);
            $this->load->library('excel');
            $this->load->model('Faculty_model');
            $this->load->model('User_model');
            $this->load->library('pagination');
            $this->load->model('Dept_model');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
        
	
	public function index()
	{
            redirect('/hod/faculty');
	}
        public function faculty()
        {
            check_session($this->session);
            $data['faculty'] = $this->Faculty_model->get_all_faculty();
            $data['segment1'] = 'other_faculty_profile.php';
           
            
           // $data['segment3'] = 'address.php';
            $this->load->view('header');
            $this->load->view('hod/hod_nav');
            $this->load->view('hod/home',$data);
            $this->load->view('footer');
        }
        
        public function view_faculty($id)
        {
            check_session($this->session);
            redirect('/home/profile/'.$id);
        }
        public function settings()
        {
            check_session($this->session);
            
            $username = $this->session->userdata['logged_in']['username'];
            if(count($this->input->post()) == 0)
            {
                $data['segment1'] = 'setting.php';
                $this->load->view('header');
                $this->load->view('hod/hod_nav');
                $this->load->view('hod/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $POST = $this->input->post();
                if($POST['pwd'] != "")
                    $this->User_model->change_password_by_username($username,$POST['pwd']);
               
                redirect("/hod");
            }
            
        }
        
         public function adv_query()
        {
            check_session($this->session);
            if(count($this->input->post()) == 0)
            {
                $data['segment1'] = 'adv_query.php';
                //$data['segment2'] = 'adv_query_result.php';
                $this->load->view('header');
                $this->load->view('hod/hod_nav');
                $this->load->view('hod/home',$data);
                $this->load->view('footer');
            }
            else
            {
                $data['query'] = $this->input->post('query');
                $query = explode(" ",$data['query']);
                if(strcasecmp($query[0],'select')==0  )
                {
                    $result = $this->Faculty_model->execute_query($this->input->post());
                }
                else
                {
                    $result = array("status" => 400, "error" =>array("Only select query can be performed"));
                }
                
                if($result['status'] == 400)
                {
                    $data['status'] = 400;
                    $data['error'] = $result['error'];
                }
                else
                {
                    $data['status'] = 200;
                    $data['result'] = $result['result'];
                }
              //  print_r($data);
              // die();
                $data['segment1'] = 'adv_query.php';
                $data['segment2'] = 'adv_query_result.php';
                $this->load->view('header');
                $this->load->view('hod/hod_nav');
                $this->load->view('hod/home',$data);
                $this->load->view('footer');
            }
            
        }
        
        public function create_excel()
        {
            check_session($this->session);
            $data['query'] = $this->input->post('query');
            $query = explode(" ",$data['query']);
            if(strcasecmp($query[0],'select')==0  )
            {
                $result = $this->Faculty_model->execute_query($this->input->post());
            }
            else
            {
                $result = array("status" => 400, "error" =>array("Only select query can be performed"));
            }
                
            if($result['status'] == 400)
            {
                $data['status'] = 400;
                $data['error'] = $result['error'];
            }
            else
            {
                $data['status'] = 200;
                $data['result'] = $result['result'];
            }
            $result = $result['result'];
            $header = array();
            if(count($data['result']) > 0)
            {
                $row = $data['result'][0];
                foreach ($row as $key => $value) {
                    $header[$key] = $key;
                }
            }
            
            $this->excel->setActiveSheetIndex(0);
            //name the worksheet
            $this->excel->getActiveSheet()->setTitle('Query Result');
            //set cell A1 content with some text
            $columnID = 'A';
            foreach ($header as $key => $value) {
                $this->excel->getActiveSheet()->setCellValue($columnID. '1', $value);
                $columnID++;
            }
           /* $this->excel->getActiveSheet()->setCellValue('A1', 'Country Excel Sheet');
            $this->excel->getActiveSheet()->setCellValue('A4', 'S.No.');
            $this->excel->getActiveSheet()->setCellValue('B4', 'Country Code');
            $this->excel->getActiveSheet()->setCellValue('C4', 'Country Name');
            //merge cell A1 until C1
            $this->excel->getActiveSheet()->mergeCells('A1:C1');
            //set aligment to center for that merged cell (A1 to C1)
            $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //make the font become bold
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
            $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
            for($col = ord('A'); $col <= ord('C'); $col++)
            { //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
             //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }*/
            //retrive contries table data
            $result = json_decode(json_encode($result), TRUE);
            //print_r($result);
            //die();
            $exceldata = [];
            foreach ($result as $row)
            {
                $exceldata[] = $row;
            }
            //Fill data 
            $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');

            /*$this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
*/
            $filename='query_result.xls'; //save our workbook as this file name
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache

            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');
        }
}
