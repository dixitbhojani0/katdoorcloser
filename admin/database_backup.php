<?php
  include("connect.php");
  $main_page    = "utility";
  $page         = "database_backup";
  $page_title = "Database Backup";
  $Path = SITEURL."/".ADMINFOLDER."/fonts/collection/";
  
  /* backup the db OR just a table */
  function backup_tables($host,$user,$pass,$name,$tables = '*')
  {
    
    $link = mysqli_connect($host,$user,$pass);
    mysqli_select_db($name,$link);
    
    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query('SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
        // print_r($tables);exit;
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
    
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query('SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);
        
        //$return.= 'DROP TABLE '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query('SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
        
        for ($i = 0; $i < $num_fields; $i++) 
        {
            while($row = mysqli_fetch_row($result))
            {
                $return.= 'INSERT INTO '.$table.' VALUES(';
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }
    
    //save file
    $time = time();
    $fileName   = $time.'.sql';
    $zipfileName= $time.'.zip';
    $mysqlExportPath = "fonts/collection/".$fileName;
    $handle = fopen($mysqlExportPath,'w+');
    fwrite($handle,$return);
    fclose($handle);
    
    /**************************Zip File Creation****************************/
    $zip = new ZipArchive();
    $filename = "fonts/collection/".$time.".zip";
    if($zip->open($filename, ZIPARCHIVE::CREATE) !== TRUE) {
        exit("cannot open <$filename>n");
    }
    $zip->addFile($mysqlExportPath , $time.'.sql');
    $zip->close();
    @unlink($mysqlExportPath);
    /**************************Zip File Creation***************************/
    
    return $zipfileName;
  }
  if(isset($_POST['saveDB'])){
    // echo "abcd";
    // exit();  
    $fileName = backup_tables('localhost','root','','corporate');
    
    $dateDownload = date('Y-m-d H:i:s');
    
    $values = array($dateDownload,$fileName);
    $rows = array("createDate","fileUrl");
    $ps = $db->rp_insert("dbbackup",$values,$rows,0);
    if($ps){
      $result=array(' Databse Backup Add Successfully');
      $_SESSION['success_msg']= $result;
       $db->rp_location("database_backup.php?msg=4");
    }
    $db->rp_location("database_backup.php?msg=4");  
  }
  if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="delete"){
    
    $where = " id =".$_REQUEST['id'];
    $del_r = $db->rp_getData("dbbackup","*",$where);
    $del_d = mysqli_fetch_array($del_r);
    $filename = $del_d['fileUrl'];
    if($filename!="" && file_exists("fonts/collection/".$filename)){
        unlink("fonts/collection/".$filename);
    }
    $where = " id='".$_REQUEST['id']."'";
    $ps=$db->rp_delete("dbbackup",$where);
    if($ps){
      $result=array(' Databse Delete Successfully');
      $_SESSION['success_msg']= $result;
       $db->rp_location("database_backup.php?msg=4");
    }
    $db->rp_location("database_backup.php?msg=3");
  }
  $scheck_res = $db->rp_getData("dbbackup","*");
  ?>
<!DOCTYPE html>
<html lang="en">
  <!--<![endif]-->
  <!-- BEGIN HEAD -->
  <head>
    <meta charset="utf-8" />
    <title><?php echo SITETITLE; ?> | Manage Database Backup</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php include("include_css.php");?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
  </head>
  <!-- END HEAD -->
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-md">
    <div class="page-wrapper">
      <?php include("top.php");?>
      <!-- BEGIN HEADER & CONTENT DIVIDER -->
      <div class="clearfix"> </div>
      <!-- END HEADER & CONTENT DIVIDER -->
      <!-- BEGIN CONTAINER -->
      <div class="page-container">
        <?php include('sidebar.php'); ?>
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
          <!-- BEGIN CONTENT BODY -->
          <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <?php $system->changeThemeMenu();?>
            <?php $system->pageBar($page_hierarchy);?>
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">
              Manage Database Backup
              <!-- <small>Manage User</small> -->
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
              <div class="col-md-12">
                <?php
                  if(!empty($success_msg)){
                      ?>
                <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <?php
                    foreach($success_msg as $s)
                    {
                    ?>
                  <b>Success! </b><?php echo $s; ?>
                  <?php }?>
                </div>
                <?php
                  }
                  if(!empty($error_msg)){
                  ?>
                <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <?php
                    foreach($error_msg as $e)
                    {
                    ?>
                  <b>Error! </b><?php echo $e; ?>
                  <?php
                    }
                    ?>
                </div>
                <?php
                  }
                  ?>
              </div>
            </div>
            <!-- END PAGE HEADER-->
            <div class="row">
              <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                  <div class="portlet-body pull-right">
                    <h5><strong>Search here</strong></h5>
                    <form class="form-inline" action="#"  onSubmit="return searchByName();" role="form">
                      <div class="form-group">
                        <!-- <label class="sr-only" for="searchName">Search Contact Message</label> -->
                        <input class="form-control" id="searchName" placeholder="Search here.." type="text"> 
                      </div>
                      <button type="submit" onClick="searchByName()"  class="btn btn-primary">Search</button>
                      <button type="button" onClick="clearSearchByName()" class="btn btn-danger">Clear</button>
                    </form>
                  </div>
                  <div class="portlet-title">
                    <div class="actions">
                      <div class="btn-group btn-group-devided" data-toggle="buttons">
                      </div>
                    </div>
                  </div>
                  <div class="portlet-body">
                    <form action="" name="frm" id="frm" method="post">
                      <input type="submit" value="New Backup" class="btn green" name="saveDB">
                      <table id="example1" class="table table-bordered table-striped dataTable">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Backup Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if(mysqli_num_rows($scheck_res)>0){
                                $count = 0;
                                
                                while($scheck_res_d = mysqli_fetch_array($scheck_res)){
                                    $count++;
                            ?>
                          <tr>
                            <td><?php echo $count; ?></td>
                            <td>
                              <?php echo date('d-m-Y H:i:s A',strtotime($scheck_res_d['createDate'])); ?>
                            </td>
                            <td>
                              <a href="<?php echo $Path.$scheck_res_d['fileUrl']; ?>" download class="btn btn-primary">Download</a>
                              <input type="button" class="btn btn-danger" onClick="del_conf('<?php echo $scheck_res_d['id']; ?>');" value="Delete">
                            </td>
                          </tr>
                          <?php
                            }
                            }
                            ?>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="dataTables_info">
                            Rows Limit:
                            <select id="numRecords" onChange="changeDisplayRowCount(this.value);">
                              <option value="10" <?php if ($_REQUEST["show"] == 10 || $_REQUEST["show"] == "" ) { echo ' selected="selected"'; }  ?> >10</option>
                              <option value="20" <?php if ($_REQUEST["show"] == 20) { echo ' selected="selected"'; }  ?> >20</option>
                              <option value="30" <?php if ($_REQUEST["show"] == 30) { echo ' selected="selected"'; }  ?> >30</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                              <?php
                                echo $db->rp_paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);
                                ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!--  <input type="submit" value="New Backup" class="btn btn-success btn-sm" name="saveDB"> -->
                    </form>
                  </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
              </div>
            </div>
          </div>
          <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
      </div>
      <!-- END CONTAINER -->
      <?php include('footer.php'); ?>
    </div>
    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script>
    <![endif]-->
    <?php include('include_js.php');?>
    <!-- START PAGELEVEL JS -->
    <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
      //         $(function() {
      //             $('#example1').dataTable({
      //    "aaSorting": [[1,'desc']]
      // });
      //         });
      function del_conf(id){
      var r = confirm("Are you sure you want to delete?");
      if(r){
        window.location.href='database_backup.php?mode=delete&id='+id;
      }
      }
          
    </script>
    <!-- <script type="text/javascript">
      function hello(){
        var r = confirm("Backup Datebase ?");
        if(r){
          window.location.href='database_backup.php';
        }
      }
    </script> -->
    <!-- END PAGELEVEL JS -->
  </body>
</html>