<?php
   $page_id="504";
   include("connect.php");
   
   // PAGE DECLARATION
   $main_page  = "dashboard";
   $page       = "product";
   $page_title = "Add/Edit Product";
   $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"Dashboard"),array("link"=>"product_manage.php","title"=>"Manage Product"),array("link"=>"product_crud.php","title"=>"Add/Edit Product"));
   $success_msg=array();
   $error_msg=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   include('../include/class.product.php');
   
   $product_obj=new Product();
   $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
   
   // Variable Definations
   $id='';   $advantage=''; $cid='';$sid='';$name='';$slug='';$meta_descr="";$price="";$image_path="";$brochure="";$description="";$add_date="";$file_upload="";
   
   if(isset($_REQUEST['submit'])){
      
      
      // Variable Declaration
      // GET SUBMITTED FORM VALUES
   $params=array();
   if(isset($_REQUEST['id']))
   $params['id']=trim($db->clean($_REQUEST['id']));
   $params['cid']=trim($db->clean($_REQUEST['cid']));
   $params['sid']=trim($db->clean($_REQUEST['sid']));
   $params['name']=trim($db->clean($_REQUEST['name']));
   $params['price']=trim($db->clean($_REQUEST['price']));
   $params['video_url']=trim($db->clean($_REQUEST['video_url']));
   $params['slug']=$db->rp_createSlug($_REQUEST['name']);
   $params['image_path']=trim($db->clean($_REQUEST['image_path']));
   $params['old_image_path']=trim($db->clean($_REQUEST['old_image_path']));
   $params['meta_descr']=$db->clean($_REQUEST['meta_descr']);
   $params['description']=$db->clean(htmlentities($_REQUEST['description']));
   $params['add_info']=$db->clean(htmlentities($_REQUEST['add_info']));
   $params['advantage']=$db->clean(htmlentities($_REQUEST['advantage']));
   $params['brochure']=  $db->clean(htmlentities($_REQUEST['brochure']));
   if(empty($params['brochure'])) {
      unset($params['brochure']);
   }
      if($mode=='a')
      {
          $reply=$product_obj->insert($params,"",$_FILES);
         if($reply['ack']==1)
         {
            $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("product_manage.php");
         }
         else
         {
            $error_msg[]=$reply['ack_msg'];
            $_SESSION['error_msg']= $error_msg;
               $db->rp_location("product_manage.php");
         }
      }
      else if($mode=='e')
      {
         $reply=$product_obj->update($params,"",$params['id'],$_FILES);
         if($reply['ack']==1)
         {
            $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("product_manage.php");
         }
         else
         {
            $error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("product_manage.php");
           }
      }
      else if($mode=='d')
      {
   
         $reply=$product_obj->delete(array("key"=>"id","value"=>$params['id']));
         if($reply['ack']==1)
         {
             $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("product_manage.php");
         }
         else
         {
             $error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("product_manage.php");
         }
      }
      else if($mode=='ac')
      {
         //
           $params['status']=$_REQUEST['status'];
         $reply=$product_obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['status']));
         if($reply['ack']==1)
         {
             $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("product_manage.php");
         }
         else
         {
            $error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("product_manage.php");
         }
      }
   
   }
   
   if($mode=="e")
   {
   
      // GET REQUIRED VALUE FROM DATABASE
   
      
         $id=trim($db->clean($_REQUEST['id']));
   
         $reply=$product_obj->view("id='".$id."'");
         if($reply['ack']==1)
         {
            extract($reply['result'][0]);
         }
         else
         {
            $error_msg[]=$reply['ack_msg'];
         }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <!--<![endif]-->
   <!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8" />
      <title><?php echo SITETITLE; ?> | Add/Edit Product</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta content="" name="message" />
      <meta content="" name="author" />
      <?php include("include_css.php");?>
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <!-- END PAGE LEVEL STYLES -->
      <!--- css for drop Down-->
      <link href="../assets/global/css/demo.html5imageupload.css?v1.3" rel="stylesheet">
      <style>
         .btn1{
         padding:0 5px !important;
         }
         .box-attr{
         font-size:14px !important;
         }
         .box-header{
         padding-bottom:0 !important;
         }
      </style>
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
                  <h1 class="page-title"> Add/Edit Product
                     <small> Add/Edit Sub Product</small>
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
                     <!-- FORM START -->
                     <form method="POST" role="form" id="form_bus" name="form_bus" enctype="multipart/form-data" class="" action="">
                        <div class="col-md-12">
                           <!-- BEGIN SAMPLE FORM PORTLET-->
                           <div class="col-md-6">
                              <div class="portlet light bordered">
                                 <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                       <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Detail</span>
                                    </div>
                                    <div class="actions">
                                       <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                                       </a>
                                    </div>
                                 </div>
                                 <div class="portlet-body form">
                                    <div class="form-group">
                                       <label for="cid">Category<code>*</code></label>
                                       <select class="form-control" name="cid" id="cid" onChange="getSubCat(this.value);" >
                                          <option value="">Select Category</option>
                                          <?php
                                             $cat_r = $db->rp_getData("category","*","isDelete=0");
                                             if(mysqli_num_rows($cat_r)>0){
                                                while($cat_d = mysqli_fetch_array($cat_r)){
                                                ?>
                                          <option value="<?php echo $cat_d['id']; ?>" <?php if($cat_d['id']==$cid){?> selected <?php } ?>><?php echo $cat_d['name']; ?></option>
                                          <?php
                                             }
                                             }
                                             ?>
                                       </select>
                                    </div>
                                    <!-- <div class="form-group">
                                       <label for="sid">Sub Category <code>*</code></label>
                                       <select class="form-control" name="sid" id="sid" >
                                          <option value="">Select Sub Category</option>
                                          <?php
                                             if($cid!="" && $cid>0){
                                                $scat_r = $db->rp_getData("sub_category","*","isDelete=0 AND cid=".$cid);
                                                if(mysqli_num_rows($scat_r)>0){
                                                   while($scat_d = mysqli_fetch_array($scat_r)){
                                                   ?>
                                          <option value="<?php echo $scat_d['id']; ?>" <?php if($scat_d['id']==$sid){?> selected <?php } ?>><?php echo $scat_d['name']; ?></option>
                                          <?php
                                             }
                                             }
                                             }
                                             ?>
                                       </select>
                                    </div> -->
                                    <div class="form-group">
                                       <label for="name">Product Name <code>*</code></label>
                                       <input class="form-control " value="<?php echo $name;  ?>" name="name" id="name" type="text"  data-validation="required,length"   data-validation-length="min3" data-validation-error-msg="Enter atleast 3 Characters." >
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                       <label for="name">Product Price <code>*</code></label>
                                       <input class="form-control " value="<?php echo $price;  ?>" name="price" id="price" type="number" data-validation="required,length"   data-validation-length="min1" data-validation-error-msg="Enter atleast 1 Characters.">
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                       <label for="meta_descr">Meta Description</label>
                                       <input class="form-control " value="<?php echo $meta_descr; ?>" name="meta_descr" id="meta_descr" type="text" >
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                       <label for="description">Description</label>
                                       <textarea name="description" id="description"><?php echo html_entity_decode($description); ?></textarea>
                                       <span class="help-block"></span>
                                    </div>
                                      <div class="form-group">
                                       <label for="description">Advantage</label>
                                       <textarea name="advantage" id="advantage"><?php echo html_entity_decode($advantage); ?></textarea>
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                       <label for="description">Additional Information</label>
                                       <textarea name="add_info" id="add_info"><?php echo html_entity_decode($add_info); ?></textarea>
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                       <label for="video_url">Video Url</label>
                                       <input class="form-control " value="<?php echo $video_url; ?>" name="video_url" id="video_url" type="text" >
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-actions noborder">
                                       <button type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">Submit</button>
                                       <button type="button" class="btn btn-primary" onClick="window.location.href='product_manage.php'">Back</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- END SAMPLE FORM PORTLET-->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="portlet light bordered">
                                    <div class="portlet-title">
                                       <div class="caption font-red-sunglo">
                                          <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Image</span>
                                       </div>
                                       <div class="actions">
                                          <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                                          </a>
                                       </div>
                                    </div>
                                    <div class="form-body">
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <div class="form-group">
                                                <lable>Select Product Image</lable>
                                                <input data-image="<?php echo ($image_path!="" && file_exists(PRODUCT_A.$image_path))?PRODUCT_A.$image_path:"";?>" type="file" accept="image/*" name="image_path" id="image_path" data-old-image-dom="old_image_path"  data-old-image-path="<?php echo $image_path ?>" value="" >
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                                 <div class="form-group">
                                 <div class="portlet light bordered">
                                    <div class="portlet-title">
                                       <div class="caption font-red-sunglo">
                                          <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Brochure</span>
                                       </div>
                                       <div class="actions">
                                          <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                                          </a>
                                       </div>
                                    </div>
                                    <div class="form-body">
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <div class="form-group">
                                                <lable>Select Product Brochure</lable>
                                                <input data-brochure="<?php echo ($brochure!="" && file_exists(BROUCHER_A.$brochure))?BROUCHER_A.$brochure:"";?>"  type="file" accept="pdf/*" id="brochure" 
                                                data-old-brochure-dom="old_brochure"  data-old-brochure-path="<?php echo $brochure ?>" name="brochure" value="" > 
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>

                        <div class="col-md-12">
                        </div>
                  </div>
                  </form>
               </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
         </div>
         <!-- FORM END -->
      </div>
      <!-- END CONTAINER -->
      <?php include('footer.php'); ?>
      <?php include('include_js.php');?>
      <script src="js/ckeditor/ckeditor.js" type="text/javascript"></script>
      <script src="js/banner_html5imageupload.js?v1.3.4"></script>
      <script src="js/jquery.numeric.min.js"></script>
      <!-- START PAGELEVEL JS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <!-- END PAGE LEVEL SCRIPTS -->
      <script>
         $.validate({
         lang: 'en'
         });
         
      </script>
      <script>
         $(document).ready(function(){
               CKEDITOR.replace('description');
               CKEDITOR.replace('add_info');
               CKEDITOR.instances.description.getData().replace(/(\r\n|\n|\r)/gm,"");
               
               
         });
          $(document).ready(function(){
               CKEDITOR.replace('advantage');
     
               CKEDITOR.instances.description.getData().replace(/(\r\n|\n|\r)/gm,"");
               
               
         });
         var isImageThumbnailLoaded=false;
         var isImageThumbnailValid=false;
         
         

         $(function(){
            aj.imageHolder($("input[name=image_path]"),"<?= PRODUCT_IMAGE_WIDTH; ?>","<?= PRODUCT_IMAGE_HEIGHT;?>",
            function(isImageThumbnailLoadedReply,isImageThumbnailValidReply){
               isImageThumbnailLoaded=isImageThumbnailLoadedReply;
               isImageThumbnailValid=isImageThumbnailValidReply;
               toastr.success("Old Image Found!!");
            },
            function(file,img)
            {
               if(!file)
               {
                  toastr.error("File may be corrupted or missing. Try again!!");
               }
            },
            function(isImageThumbnailLoadedReply,isImageThumbnailValidReply,image_width,image_height){
               isImageThumbnailLoaded=isImageThumbnailLoadedReply;
               isImageThumbnailValid=isImageThumbnailValidReply;
                  toastr.success("Selected File Dimension: "+image_width+" X "+image_height);
               },
            function(data){
               isImageThumbnailLoadedReply
            }
            );
            
            
         })

         $(function(){
            aj.imageHolder($("input[name=brochure]"),"","",
            function(isImageThumbnailLoadedReply,isImageThumbnailValidReply){
               isImageThumbnailLoaded=isImageThumbnailLoadedReply;
               isImageThumbnailValid=isImageThumbnailValidReply;
               toastr.success("Old Brochure Found!!");
            },
            function(file,img)
            {
               if(!file_existse)
               {
                  toastr.error("File may be corrupted or missing. Try again!!");
               }
            },
            function(isImageThumbnailLoadedReply,isImageThumbnailValidReply,image_width,image_height){
               isImageThumbnailLoaded=isImageThumbnailLoadedReply;
               isImageThumbnailValid=isImageThumbnailValidReply;
                  toastr.success("Old File Found!! ");
               },
            function(data){
               isImageThumbnailLoadedReply
            }
            );
            
            
         })
         
         
          $("form").submit( function( e ) {
               var isValid=true;
               var form = this;
                if(!isImageThumbnailValid)
               {  
                  toastr.error("Please select image!","error");
                  isValid=false;
                  
               }
                return isValid;
         });
         
          function getSubCat(id){
            $.ajax({
               type: "POST",
               url: "ajax_getSubCat.php",
               data: 'cid='+id,
               success: function(result){
                     $("#sid").html(result);
                  }
            });
         }
      </script>
      <!-- END PAGELEVEL JS -->
   </body>
</html>