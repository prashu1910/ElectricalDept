<?php

/*tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Query Result";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();*/

//ob_start();
    // we can have any view part here like HTML, PHP etc
   // $content = $this->load->view("hod/query_result_template");
$header = array();
if(count($result) > 0)
{
    $row = $result[0];
    foreach ($row as $key => $value) {
        $header[$key] = $key;
    }
}
//print_r($header);
$content = "hello";
$content = "<div class='row'>";
$content.'<div class="col-md-12 col-sm-12">';
$content.'<div id="profile">';
$content.'<div class="panel panel-info">';
$content.'<div class="panel-heading">';
$content.'<h3 class="panel-title">Query Result</h3>';
$content.'</div>';
$content.'<div class="panel-body">';
$content.'<div class="row">';
$content.'<div class="col-md-12 col-sm-12 col-lg-12 table-responsive">';
$content.'<table class="table table-striped table-bordered">';
$content.'<thead>';
$content.'<tr>';
/*foreach ($header as $value) 
{
    $content.'<th>'.$value.'</th>';
}
$content.'</tr>';
$content.'</thead>';
$content.'<tbody>';
/*foreach ($result as $key => $value) 
{
    $content.'<tr>';
    foreach($value as $row)
    {
        $content.'<td>'.$row.'</td>';
    } 
    $content.'</tr>'; 
}
$content.'</tbody>';
$content.'</table>';
$content.'</div>';
$content.'</div>';
$content.'</div>';
$content.'</div>';
$content.'</div>';
$content.'</div>';
$content.'</div>';*/
//ob_end_clean();
//echo $content;
print_r("Sdf".$content);
die();
/*$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');*/

?>