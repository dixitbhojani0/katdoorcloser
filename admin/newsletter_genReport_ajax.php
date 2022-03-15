<?php 
include("connect.php");
include('PHPExcel/IOFactory.php'); 
$file_name  = "Newsletter_Report"."_".date("d-m-Y").".xlsx";
$ctable_where = "";
// Get the total number of rows in the table

if(isset($_REQUEST['searchName']) && $_REQUEST['searchName']!=""){
  $ctable_where .= " ( 
    email like '%".$_REQUEST['searchName']."%' 
  ) AND ";
}
$ctable_where .= " isDelete=0";
$ctable1_r = $db->rp_getData("newsletter","id,email,adate",$ctable_where,"id DESC",0);  
 
// Instantiate a new PHPExcel object 
$objPHPExcel = new PHPExcel();  
// Set the active Excel worksheet to sheet 0 
$objPHPExcel->setActiveSheetIndex(0);  
// Initialise the Excel row number 
$rowCount = 1;  

//start of printing column names as names of MySQL fields  
$column  = 'A';
$column1 = 'B';
$column2 = 'C';
 
  $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, "Id"); 
  $objPHPExcel->getActiveSheet()->setCellValue($column1.$rowCount, "Email"); 
  $objPHPExcel->getActiveSheet()->setCellValue($column2.$rowCount, "Created Date");
  
  $column++;
//end of adding column names  

$rowCount = 2; 
$count =0; 
while($row = mysqli_fetch_array($ctable1_r))  
{  
  $count++;
  $column = 'A';
  for($j=0; $j<mysqli_num_fields($ctable1_r);$j++)  
  {     
    if($j==0)
    {
      $value = $count;
    } 
    else if($j==2)
    {
      $value = date('d-m-Y',strtotime($row[$j]));
    }   
    else{
      $value = $row[$j];   
    }     
    $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
    $column++;
  }  
  $rowCount++;
}  
// Redirect output to a client’s web browser (Excel5) 
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment;filename=".$file_name);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output'); 

?>