/*
 * Toastr
 * Copyright 2012-2015
 * Authors: John Papa, Hans Fjällemark, and Tim Ferrell.
 * All Rights Reserved.
 * Use, reproduction, distribution, and modification of this code is subject to the terms and
 * conditions of the MIT license, available at http://www.opensource.org/licenses/mit-license.php
 *
 * ARIA Support: Greta Krafsig
 *
 * Project: https://github.com/CodeSeven/toastr
 */
/* global define */
(function (define) {
    define(['jquery'], function ($) {
		return (function () {
			var $container;
            var listener;
            var ajId = 0;
            var ajType = {
                error: 'error',
                info: 'info',
                success: 'success',
                warning: 'warning'
            };

            var aj = {
                               
                error: error,  
				createFormElement: createFormElement,
				callAJAX: callAJAX,  
				getNotifications:getNotifications,	
				quickNotification:quickNotification,	
				redirect:redirect,					
				getLoadingBlock:getLoadingBlock,
				getErrorBlock:getErrorBlock,                         
                delete_notification:delete_notification,
				removeMedia:removeMedia,
				roundNumber:roundNumber,
				fetchCity:fetchCity,
				fetchState:fetchState,
				deleteImage:deleteImage,
				imageHolder:imageHolder,
				saveFile:saveFile,
                version: '1.0.0',
                
            };

            var previousToast;

            return aj;
			function redirect(url)
			{
				window.location.href=url;
			}
			function roundNumber(num, scale=2) {
			  if(!("" + num).includes("e")) {
				return +(Math.round(num + "e+" + scale)  + "e-" + scale);  
			  } else {
				var arr = ("" + num).split("e");
				var sig = ""
				if(+arr[1] + scale > 0) {
				  sig = "+";
				}
				return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + scale)) + "e-" + scale);
			  }
			}
			function saveFile(url) {
			  // Get file name from url.
			  var filename = url.substring(url.lastIndexOf("/") + 1).split("?")[0];
			  var xhr = new XMLHttpRequest();
			  xhr.responseType = 'blob';
			  if(toastr)
			 // toastr.warning("Downloading..","Please wait..");
			  xhr.onload = function() {
				var a = document.createElement('a');
				a.href = window.URL.createObjectURL(xhr.response); // xhr.response is a blob
				a.download = filename; // Set the file name.
				a.style.display = 'none';
				document.body.appendChild(a);
				a.click();
				if(toastr)
				 toastr.success("Downloaded successfully..","Success");
				delete a;
			  };
			  xhr.open('GET', url);
			  xhr.send();
			}
			function imageHolder(input,w,h,onInitCallback="",onChangeCallback="",onLoadCallback="",onDeleteCallback=""){
				var isImageThumbnailLoaded=false;
				var isImageThumbnailValid=false;
				var input_id=$(input).attr("id");
				var last_image=$(input).data("image");
				var old_dom=$(input).data("old-image-dom");
				var old_image_path=$(input).data("old-image-path");
				
				var html='<div class="form-group">'+
					'<label>Select Image</label>'+
					'<div class="input-group">'+
						'<input disabled id="file_select_'+input_id+'" class="form-control" name="file_select_'+input_id+'" placeholder="No File Selected" type="text">'+
						'<span class="input-group-btn">'+
							'<button id="selectFileBtn'+input_id+'" class="btn red" type="button">Select File</button>'+
						'</span>'+
					'</div>'	+
					'<p style="opacity:1" id="selectFileError'+input_id+'" class="help-block"></p>'+		
				'</div>';
				
				$(input).hide();
				$(html).appendTo($(input).parent());
				if(last_image!="")
				{
					var preview_image='<div class="row" id="image_holder_image_path_edit'+input_id+'"><input type="hidden" name="'+old_dom+'" id="'+old_dom+'" value="'+old_image_path+'"><div class="col-sm-10"><div class="mainImg">'+
										'<img src="'+last_image+'" width="175"><br>'+
									'<a id="deleteImage'+input_id+'" style="margin-top:10px;" data-image-holder="#image_holder_image_path_edit'+input_id+'" data-src="'+last_image+'" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</a>'+	
								'</div></div></div>';
								
					$("#file_select_"+input_id).parent("div.input-group").parent("div.form-group").parent("div").append(preview_image);
					$("#deleteImage"+input_id).on("click",function(){
						var image_holder=$(this).data("image-holder");
						var src=$(this).data("src");
						
						onSystemDeleteCallback=function(){
							if(onDeleteCallback!="")
							onDeleteCallback();	
						}	
						deleteImage(this,src,image_holder,onSystemDeleteCallback);
					});	
					isImageThumbnailLoaded=true;
					isImageThumbnailValid=true;
					onInitCallback(isImageThumbnailLoaded,isImageThumbnailValid);	
				}
				
				
				$("#selectFileBtn"+input_id).on("click",function(){
					$(input).click();
				});
				$(input).on("change",function(){
				$("#file_select_"+input_id).parent("div.input-group").parent("div.form-group").removeClass("has-error").find("p.help-block").html("");
				var fileInput = $(input)[0];
				var file = fileInput.files && fileInput.files[0];
				var img="";
				if(file) {
					$("#file_select_"+input_id).val($(input).val());
					var img = new Image();
					img.src = window.URL.createObjectURL(file);
					img.onload=function(){
						isImageThumbnailLoaded=true;
						if(w!="" && h!="")
						isImageThumbnailValid=checkImage(img,w,h);
						else
						isImageThumbnailValid=true;	
						if(!isImageThumbnailValid)
						{
							$("#file_select_"+input_id).parent("div.input-group").parent("div.form-group").addClass("has-error").find("p.help-block").html("Invalid Thumbnail Image!! Select Image With "+w+" X "+h+" Resolution");
						}
						image_width = img.naturalWidth,
						image_height = img.naturalHeight;
						if(onLoadCallback!="")
						onLoadCallback(isImageThumbnailLoaded,isImageThumbnailValid,image_width,image_height);
						
						
					}
					
				}
				if(onChangeCallback!="")
				onChangeCallback(file,img);
				
			})
			}
			function checkImage(img,require_width,require_height){
					var width = img.naturalWidth,
						height = img.naturalHeight;
					if( width != require_width && height != require_height ) {
						toastr.error("Invalid Thumbnail Image!! Select Image With "+require_width+" X "+require_height+" Resolution","error");
						return false;									
					}
					
				return true;		
			}
			function createFormElement(type,value="",_class="",name="",id="",label="",style="",extra)
			{
				var text="";
				if(type=='radio')
				{
					text='<div class="form-group"><div class="radio"><label for="'+name+'"><input type="radio" id="'+id+'" name="'+name+'" class="'+_class+'" value="'+value+'">'+label+'</label></div></div>';					
				}
				else if(type=='checkbox')
				{
					text='<div class="form-group"><div class="md-checkbox"><input '+extra+' type="checkbox" id="'+id+'" name="'+name+'" class="md-check '+_class+'" value="'+value+'"><label for="'+id+'">'+label+'<span></span><span class="check"></span><span class="box"></span></label></div></div>';					
				}
				else if(type=='spinner')
				{
					text='<option '+extra+' value="'+value+'">'+label+'</option>';	
				}
				return text;
				
			}
			function error(id,msg,operation,toast=false)
			{
				if(id!="" || id!='undefined' && msg!="")
				{
					if(operation=='add_error')
					{
						$("#"+id).focus().parent().addClass("has-error");
						$("#"+id).focus().parent().find("p.help-block").html("<i class='fa fa-warning'></i>&nbsp;"+msg);
						if(toast)
						toastr.error(msg,"Error!!");
						return true;
					}
					else if(operation=='add_success')
					{
						$("#"+id).focus().parent().addClass("has-success");
						$("#"+id).focus().parent().find("p.help-block").html("<i class='fa fa-ok'></i>"+msg);
						if(toast)
						toastr.success(msg,"Success!!");
						return true;
					}
					else if(operation=='remove_error')
					{
						$("#"+id).focus().parent().removeClass("has-error");
						$("#"+id).focus().parent().find("p.help-block").html("");				
					}
					else
					{
						console.log('wrong service');
					}
				}
				else
				{
					console.log('id or msg not found!!');
				}
			}
			function removeMedia(btn,media_id,reference_id,reference_type,reference_column)
			{
				if($(btn).data("click")==0)
				{
					$(btn).data("click",1);
					$.ajax({       
						url:"media_function/media_ajax_function.php",
						type:"POST",
						data:{
							mode:"remove_media",
							media_id:media_id,
							reference_id:reference_id,
							reference_type:reference_type,
							reference_column:reference_column
						},
						cache: false,
						beforeSend:function(){
							
						},
						success:function(data)
						{
							var json_obj=$.parseJSON(data);
							if(json_obj.ack!=1)
							toastr.error(json_obj.ack_msg,"Error!!");
							else
							toastr.success(json_obj.ack_msg,"Success!!");	
							$(btn).data("click",0);
							
						},
						error:function()
						{
							toastr.error("Internal Error","Error!!");
						},
						
					});
				}
			}
			function fetchCity(val,result_container,callback=""){
			 $.ajax({
				type: "POST",
				url: "ajax_function_system.php",
				data:{state_id:val,mode:"fetch_city"},
				beforeSend:function(){
					if(callback!="")
					callback(0,true);
				},
				success: function(data){
				$(result_container).html(data);
				if(callback!="")
				callback(1,true);
				},
				error:function(){
					if(callback!="")
					callback(2,false);
				}
			 });
			}
			function fetchState(val,result_container,callback="") {
			$.ajax({
				type: "POST",
				url: "ajax_function_system.php",
				data:{country_id:val,mode:"fetch_state"},
				beforeSend:function(){
					if(callback!="")
					callback(0,true);
				},
				success: function(data){
				$(result_container).html(data);
				if(callback!="")
				callback(1,true);
				},
				error:function(){
					if(callback!="")
					callback(2,false);
				}
			});
			}
			function deleteImage(dom,path,image_holder,deleteImageCallback){
			 var old_text=$(dom).html();
			 $.ajax({
				type: "POST",
				url: "ajax_function_system.php",
				data:{path:path,mode:"delete_image"},
				beforeSend:function(){
					$(dom).html("Please Wait..");
				},
				success: function(data){
					$(image_holder).remove();	
					if(deleteImageCallback!="")
					deleteImageCallback(data);
					$(dom).html(old_text);
				},
				error:function(){
					toastr.error("Image could not delete right now!!");
					$(dom).html(old_text);
				}
			 });
			}
			
			function getNotifications(container){
				//alert('sd');
				var notification_ids=[];
					/*$.ajax({
						url:"ajax_function_system.php",
						data:{mode:"set_notification",notification_id:1,notification_icon:"fa fa-check",notification_msg:"You have One New Notification From Something"},
						beforeSend:function(){
							var loading_block=getLoadingBlock();
							$(container).html();
						},
						error:function(){
							var error_block=getErrorBlock();
							$(container).html();
						},
						success:function(result){
							var result=$.parseJSON(result);
							
							$(container).html(result.result);
						}
						
						});*/
						/*$.ajax({
						url:"ajax_function_system.php",
						data:{mode:"get_notifications"},
						beforeSend:function(){
							var loading_block=getLoadingBlock();
							$(container).html();
						},
						error:function(){
							var error_block=getErrorBlock();
							$(container).html();
						},
						success:function(result){
							var result=$.parseJSON(result);
							
							$.each(result.notification_json,function(i,v){
								if(notification_ids.indexOf(v.id)==-1)
								{
									toastr.options = {
									timeOut: 0,
									extendedTimeOut: 0,
									tapToDismiss: true,
									 onclick: function(){
										 $(this).data('id');
										 delete_notification();
									 },
									
									 
								};
								notification_ids.push(v.id);
								toastr.success(v.notification_msg);
							}
								
							})
							
							$(container).html(result.result);
						}
						
						});*/
					setInterval(function(){
						//alert('sd');
						$.ajax({
						url:"ajax_function_system.php",
						data:{mode:"get_notifications"},
						beforeSend:function(){
							var loading_block=getLoadingBlock();
							$(container).html();
						},
						error:function(){
							var error_block=getErrorBlock();
							$(container).html();
						},
						success:function(result){
							var result=$.parseJSON(result);
							
							/*$.each(result.notification_json,function(i,v){
								if(notification_ids.indexOf(v.id)==-1)
								{
									toastr.options = {
									timeOut: 0,
									extendedTimeOut: 0,
									tapToDismiss: true,
								};
								notification_ids.push(v.id);
								toastr.success(v.notification_msg+"<br/><br/><button type='button' onClick='return aj.delete_notification(this,"+v.id+")' class='btn btn-warning'>Ok</button>");
							}
								
							})*/
														
						}
						
						});
					},1000);
					setInterval(function(){
						$.ajax({
						url:"ajax_function_system.php",
						data:{mode:"get_notifications",html:"true"},
						beforeSend:function(){
							var loading_block=getLoadingBlock();
							$(container).html();
						},
						error:function(){
							var error_block=getErrorBlock();
							$(container).html();
						},
						success:function(result){
							$(container).html(result);
						}
						
						});
					},1000);
					
				}
			function delete_notification(btn,notification_id)
			{	
					var r=confirm('Are You Sure?');
					if(r){
					$.ajax({
							url:"ajax_function_system.php",
							data:{
								mode:"delete_notification",
								notification_id:notification_id,
								},
							beforeSend:function(){
								var loading_block=aj.getLoadingBlock();
								//$(container).html();
							},
							error:function(){
								var error_block=aj.getErrorBlock();
								//$(container).html();
							},
							success:function(result){
								var result=$.parseJSON(result);
								//$(container).html(result.result);
								$(btn).closest("li").hide(500);
							}
							
						});
					}
				}
			function quickNotification(n){
				if(n)
				{
						var notification_ids=[];
					setInterval(function(){
						//alert('sd');
						$.ajax({
						url:"ajax_function_system.php",
						data:{mode:"get_notifications"},
						beforeSend:function(){
							
						},
						error:function(){
							
						},
						success:function(result){
							var result=$.parseJSON(result);
							
							$.each(result.notification_json,function(i,v){
								if(notification_ids.indexOf(v.id)==-1)
								{
									toastr.options = {
									timeOut: 0,
									extendedTimeOut: 0,
									tapToDismiss: true,
								};
								notification_ids.push(v.id);
								toastr.success(v.notification_msg+"<br/><br/><button type='button' onClick='return aj.delete_notification(this,"+v.id+")' class='btn btn-warning'>Ok</button>");
							}
								
							})
														
						}
						
						});
					},1000);
				}
				
			}
			function getLoadingBlock()
			{
				if($("body").find("div.modal-backdrop").length>=1)
				{
					$("body").find("div.modal-backdrop").remove();
				}
				var loading_block='<div class="row"><div class="col-sm-12"><div class="text-center"><h2> <i class="fa fa-spin fa-refresh"></i> &nbsp;Loading..</h2></div></div></div>';
				return loading_block;		
			}
			function getErrorBlock()
			{
				if($("body").find("div.modal-backdrop").length>=1)
				{
					$("body").find("div.modal-backdrop").remove();
				}
				var loading_block='<div class="row"><div class="col-sm-12"><div class="text-center"><h2> <i class="fa fa-spin fa- fa-unlink"></i> &nbsp;Server Connection Error</h2></div></div></div>';
				return loading_block;		
			}
			function callAJAX(params,url,type,callback,callbackParams='',callType=0)
			{
				$.ajax({       
					url:url,
					type:type,
					data:params,
					cache: false,
					beforeSend:function(){
						/*if(callType!=0)progressDialog(1);*/
					},
					success:function(data)
					{
						var json_obj=data;
						if(callbackParams!="")		
						callback(json_obj,callbackParams);
						else
						callback(json_obj);
						
					},
					error:function()
					{
						/*progressDialog(0);*/
						alertDialog(1,"danger","warning","Alert","Connection Error!! Try Later.")
						//alert('Connection Error Try Again Later');
					},
					
				});
			}
		})();  
	});
}
(typeof define === 'function' && define.amd ? define : function (deps, factory) {
    if (typeof module !== 'undefined' && module.exports) { //Node
        module.exports = factory(require('jquery'));
    } else {
        window.aj = factory(window.jQuery);
    }
})
);
