<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

        private $programme = array();
        function __construct() 
        {
            parent::__construct();
            $this->load->model('Dept_model');
            $this->programme = $this->Dept_model->get_all_programme_branch();
        }
        
	public function index($prog = 1)
	{
           /* $this->load->view('header');
            $this->load->view('nav',array("prog"=>$this->programme));
            $data = [];
            $data['page'] = '';
            $this->load->view('student/student',$data);
            $this->load->view('footer');*/
            redirect('student/timetable/');
	}
        public function timetable()
	{
            
            if(count($this->input->post()) == 0)
            {
                $data["programme"] = $this->Dept_model->get_dept_programme();
                $this->load->view('header');
                $this->load->view('nav',array("prog"=>$this->programme));
                $data['page'] = 'timetable.php';
                $this->load->view('student/student',$data);
                $this->load->view('footer');
            }
            else
            {
                $file = "";
                $details = $this->Dept_model->get_timetable($this->input->post());
                if(count($details) > 0)
                    $file = './'.TIMETABLE_UPLOAD_FOLDER."/".$details[0]->link;
                if($file != "")
                {
                    $this->load->library('excel');
                    $objPHPExcel = PHPExcel_IOFactory::load($file);

                    $str = '<table class="table table-bordered table-responsive table-striped table-condensed " style=" overflow: auto;">';

                    $str = $str."<tbody>";
                    foreach ($objPHPExcel->setActiveSheetIndex(0)->getRowIterator() as $row) {
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false);
                       $str =  $str.'<tr>';
                        foreach ($cellIterator as $cell) {
                            if (!is_null($cell)) {
                                $value = $cell->getCalculatedValue();
                              $str =   $str.'<td>';
                               $str = $str.$value . '&nbsp;';
                                $str = $str.'</td>';
                            }
                        }
                        $str = $str. '</tr>';
                    }
                    $str = $str. '</tbody></table>';
                    //send the data in an array format
                    $data['tt'] = $str;
                }
                
                //var_dump($data['tt']);
                //die();
                $data["programme"] = $this->Dept_model->get_dept_programme();
                $data['pname'] = $this->Dept_model->get_programme_name($this->input->post('programme'));
                $data['bname'] = $this->Dept_model->get_branch_name($this->input->post('branch'));
                $data['semester'] = $this->input->post('semester');
                //print_r($data);
               // die();
                $this->load->view('header');
                $this->load->view('nav',array("prog"=>$this->programme));
                $data['page'] = 'timetable.php';
                $this->load->view('student/student',$data);
                $this->load->view('footer');
            }
            
	}
}