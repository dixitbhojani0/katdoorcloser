<?php
$page_id="111";
include("connect.php");
include('PHPExcel/IOFactory.php'); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file_name  = "Product Inquiry"."-".date("d-m-Y").".xlsx";
$ctable1_r  = $db->rp_getData("product_inquiry","id,product_id,name,email,p_qty,message,contact_no","isDelete=0","",0);
// Instantiate a new PHPExcel object 
$objPHPExcel = new PHPExcel();  
// Set the active Excel worksheet to sheet 0 
$objPHPExcel->setActiveSheetIndex(0);  
// Initialise the Excel row number 
$rowCount = 1;  

//start of printing column names as names of MySQL fields  
$column = 'A';
$column1 = 'B';
$column2 = 'C';
$column3 = 'D';
$column4 = 'E';
$column5 = 'F';
$column6 = 'G';

$objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, "Id");
$objPHPExcel->getActiveSheet()->setCellValue($column1.$rowCount, "Name");
$objPHPExcel->getActiveSheet()->setCellValue($column2.$rowCount, "Email");
$objPHPExcel->getActiveSheet()->setCellValue($column3.$rowCount, "Product Name");
$objPHPExcel->getActiveSheet()->setCellValue($column4.$rowCount, "Quantity");
$objPHPExcel->getActiveSheet()->setCellValue($column5.$rowCount, "Message");
$objPHPExcel->getActiveSheet()->setCellValue($column6.$rowCount, "Contact Number");
$column++;
//end of adding column names  

//start while loop to get data  

$rowCount = 2;  
while($row = mysqli_fetch_array($ctable1_r))  
{  
  $column = 'A';
  for($j=0; $j<mysqli_num_fields($ctable1_r);$j++)  
  {  
    $value = $row[$j];
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