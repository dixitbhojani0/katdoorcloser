<?php
  /*
   * @author mr._.raj
   */
  
  $page_id=530;$page_slug='page_patient_report_view';
  
  include("connect.php");
  $cid=date('d_M_Y');
  $relCertFileNames = array();
  $merge_file = array();
  $tag_id = $_REQUEST['tag_id'];
  $query = $_REQUEST['query'];
  $df=$_REQUEST['df'];
  $string ="<style>th,tr,td{border:1px solid #000; padding:10px;}</style>";
  $d = file_get_contents(ADMINSITEURL."product_inquiry_view.php?label_id=".urlencode($label_id)."&tag_id=".urlencode($tag_id)."&df=".urlencode($df)."&query=".$query);//$d = html_entity_decode($_REQUEST['rc']);
  $d.=$string;
  require('mpdf60/mpdf.php');
  
  
  
  $mpdf = new mPDF('',    // mode - default ''
  
   'A4',    // format - A4, for example, default ''
  
   10,     // font size - default 0
  
   'sans-serif',    // default font family
  
   3,    // margin_left
  
   3,    // margin right
  
   3,     // margin top
  
   3,    // margin bottom
  
   0,     // margin header
  
   0,     // margin footer
  
   'P');  // L - landscape, P - portrait
  
  $mpdf->WriteHTML($d);
  
  $fileName = "PRODUCT_INQUIRY_REPORT-".$cid;
  
  if(!is_dir($fileName)){
  
  	mkdir(PRODUCT_INQUIRY_FILES.$fileName);
  
  }
  
  $pdf_file_path	= PRODUCT_INQUIRY_FILES.$fileName."/".$fileName.'.pdf';
  
  
  
  if(file_exists($pdf_file_path)){
  
  	unlink($pdf_file_path);
  
  }
  
  $mpdf->Output($pdf_file_path);
  
  $xl_file_path	= PRODUCT_INQUIRY_FILES.$fileName."/".$fileName.'.xls';
  
  if(file_exists($xl_file_path)){
  
  	unlink($xl_file_path);
  
  }
  
  file_put_contents($xl_file_path, $d);
  
  echo $xl_file_path;
  
  
  ?>