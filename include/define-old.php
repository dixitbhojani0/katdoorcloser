	<?php
// change section
define("SITENAME","katdoorcloser");
define("SITETITLE","katdoorcloser");
define("ADMINTITLE","katdoorcloser");
define("SITE_SESS","katdoorcloser");
// define("LOGO_IMAGE",SITEURL."images/construction-logo_white.png"); 
define("ENVIORNMENT_FLAG", "1"); // 1- LOCAL, 2 - LIVE
// change section 

if(ENVIORNMENT_FLAG == "1") {
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "flowtop_db");
	define("DB_HOST", "localhost");
	define("SITEURL","https://f9fe-43-241-145-20.ngrok.io/katdoorcloser/katdoorcloser/");
	define("MAIL_FROM_NAME","Chanakya Engineering Products");
	define("MAIL_FROM","dixitbhojani0@gmail.com"); 
	define("ADMIN_EMAIL","dixitbhojani0@gmail.com");
	define("ADMIN_EMAIL1","dixitbhojani0@gmail.com");
	define("SITE_PATH", 'F:\xampp\htdocs\katdoorcloser\katdoorcloser');
	define("MAIL_USERNAME","dixitbhojani0@gmail.com"); 
	define("MAIL_PASSWORD","dixit@123"); 
	define("MAIL_HOST", "smtp.gmail.com");
} else {
	define("DB_USER", "fdtechin_flowtop");
	define("DB_PASS", "fdtechin_flowtop");
	define("DB_NAME", "fdtechin_flowtop");
	define("DB_HOST", "localhost");
	define("SITEURL","https://fd7tech.in/flowtop/");
	define("MAIL_FROM_NAME","Chanakya Engineering Products");
	define("MAIL_FROM","info@fd7technology.com"); 
	define("ADMIN_EMAIL","support@fd7.com");
	define("ADMIN_EMAIL1","321@gmail.com");
	define("SITE_PATH", 'F:\xampp\htdocs\flowtop');
	define("MAIL_USERNAME","dixitbhojani0@gmail.com"); 
	define("MAIL_PASSWORD","dixit@123");
	define("MAIL_HOST", "smtp.gmail.com");
}
define("LOGO_IMAGE",SITEURL."images/logo.png"); 
define("ADMINFOLDER","admin");
define("ADMINSITEURL",SITEURL.ADMINFOLDER."/");
define("CTABLE_ADMIN","admin_table");
define("API_TABLE","api_key_table");
define("API_PARAM","key");
define("SERVICE_PARAM","s");

// Origins
define("SITEORIGINURL","http://thefd7.com/");
define("SITEORIGIN","Chanakya Engineering Products");

define("DBBACKUP_PATH","fonts/collection/");
static $comman_pages=array('400','401','402','403');

// Image Paths
define("CST","images/cst/");
define("HOME","images/home/");
define("CST_BANNER",CST."banner/");
define("HOME_BANNER",HOME."banner/");

define("USER_MAIN","../images/user/default/");
define("USER_MAIN_A","images/user/default/");
define("USER_BANNER","../images/user/banner/");
define("USER_DEFAULT","../images/user/default/");
define("PASS_QR","../images/pass/qrcode/'");

// File Paths
define("ATTACHMENT_A","attachment/");
define("API_FILES","api_doc/"); 
//social links 
define("FACEBOOK","https://www.facebook.com/flowtop/");
define("TWITTER","https://twitter.com/flowtop");
define("GOOGLEPLUS","https://www.plus.google.com/");
define("YOUTUBE","https://www.youtube.com");
define("INSTAGRAM","https://www.instagram.com/flowtop/"); 
define("WHATSAPP","https://wa.me/8866110546"); 
  
//Banner
define("BANNER","images/banner/");
define("BANNER_A","../images/banner/");
define("BANNER_T","../images/banner/tempImg/");

define("BANNER_WIDTH","1920");//900//1920
define("BANNER_HEIGHT","782");//1000//800

//category
define("CATEGORY","images/category/");
define("CATEGORY_A","../images/category/");
define("CATEGORY_T","../images/category/tempImg/");

define("CATEGORY_IMAGE_WIDTH","1380");
define("CATEGORY_IMAGE_HEIGHT","561");

//Sub category
define("SUBCATEGORY","images/subcategory/");
define("SUBCATEGORY_A","../images/subcategory/");
define("SUBCATEGORY_T","../images/subcategory/tempImg/");

define("SUBCATEGORY_IMAGE_WIDTH","1380");
define("SUBCATEGORY_IMAGE_HEIGHT","561");

//Product
define("PRODUCT","images/product/");
define("PRODUCT_ICON","images/icon_product/");
define("PRODUCT_A","../images/product/");
define("PRODUCT_T","../images/product/tempImg/");

define("PRODUCT_IMAGE_WIDTH","348");//278 //2048//300
define("PRODUCT_IMAGE_HEIGHT","325");//271 //2048//300

//Certificate
define("CLIENT","images/client_silder/");
define("CLIENT_A","../images/client_silder/");
define("CLIENT_T","../images/client_silder/tempImg/");


define("CLIENT_IMAGE_WIDTH","226");//198
define("CLIENT_IMAGE_HEIGHT","103");//70



//Alter Image
define("ALT_IMAGE","images/alter_image/");
define("ALT_IMAGE_A","../images/alter_image/");
define("ALT_IMAGE_T","../images/alter_image/tempImg/");

define("ALT_IMAGE_WIDTH","1380");
define("ALT_IMAGE_HEIGHT","561");

//service Category
define("SERVICE_CATEGORY","images/service_category/");
define("SERVICE_CATEGORY_A","../images/service_category/");
define("SERVICE_CATEGORY_T","../images/service_category/tempImg/");

define("SERVICE_CATEGORY_WIDTH","370");
define("SERVICE_CATEGORY_HEIGHT","190");

// Services
define("SERVICES","images/services/");
define("SERVICES_A","../images/services/");
define("SERVICES_T","../images/services/tempImg/");

define("SERVICES_IMAGE_WIDTH","640");
define("SERVICES_IMAGE_HEIGHT","426");

// Testimony
define("TESTIMONY","images/testimonials/");
define("TESTIMONY_A","../images/testimonials/");
define("TESTIMONY_T","../images/testimonials/tempImg/");

define("TESTIMONY_IMAGE_WIDTH","80");
define("TESTIMONY_IMAGE_HEIGHT","80");

//Gallery
define("GALLERY","images/gallery/");
define("GALLERY_ICON","images/icon_gallery/");
define("GALLERY_A","../images/gallery/");
define("GALLERY_T","../images/gallery/tempImg/");

define("GALLERY_WIDTH","400");//360
define("GALLERY_HEIGHT","450");//240

//Infrastructure Gallery
define("TEAM","images/team/"); 
define("TEAM_A","../images/team/");
define("TEAM_T","../images/team/tempImg/");

define("TEAM_WIDTH","");
define("TEAM_HEIGHT",""); 

//news
define("NEWS","images/news/");
define("NEWS_A","../images/news/");
define("NEWS_T","../images/news/tempImg/");

define("NEWS_WIDTH","740");
define("NEWS_HEIGHT","350");

//export country
define("EXPORT_COUNTRY","images/export_country/");
define("EXPORT_COUNTRY_A","../images/export_country/");
define("EXPORT_COUNTRY_T","../images/export_country/tempImg/");

define("EXPORT_COUNTRY_WIDTH","1380");
define("EXPORT_COUNTRY_HEIGHT","561");

// About Us Short Image
define("SHORT_IMAGE","images/about_short_image/");
define("SHORT_IMAGE_A","../images/about_short_image/");
define("SHORT_IMAGE_T","../images/about_short_image/tempImg/");

define("SHORT_IMAGE_WIDTH","364");
define("SHORT_IMAGE_HEIGHT","364");

// About Us Big Image
define("BIG_IMAGE","images/about_big_image/");
define("BIG_IMAGE_A","../images/about_big_image/");
define("BIG_IMAGE_T","../images/about_big_image/tempImg/");

define("BIG_IMAGE_WIDTH","364");
define("BIG_IMAGE_HEIGHT","364");

// About Us Big Image
define("MISSION_IMAGE","images/about_mission_image/");
define("MISSION_IMAGE_A","../images/about_mission_image/");
define("MISSION_IMAGE_T","../images/about_mission_image/tempImg/");

define("MISSION_IMAGE_WIDTH","364");
define("MISSION_IMAGE_HEIGHT","364");

// About Us Big Image
define("VISION_IMAGE","images/about_vision_image/");
define("VISION_IMAGE_A","../images/about_vision_image/");
define("VISION_IMAGE_T","../images/about_vision_image/tempImg/");

define("VISION_IMAGE_WIDTH","364");
define("VISION_IMAGE_HEIGHT","364");

//Front popup Image
define("FRONT_POPUP_IMAGE","images/front_popup_image/");
define("FRONT_POPUP_IMAGE_A","../images/front_popup_image/");
define("FRONT_POPUP_IMAGE_T","../images/front_popup_image/tempImg/");

define("FRONT_POPUP_IMAGE_WIDTH","1380");
define("FRONT_POPUP_IMAGE_HEIGHT","561"); 

//Scheme
define("SCHEME","images/scheme/");
define("SCHEME_A","../images/scheme/");
define("SCHEME_T","../images/scheme/tempImg/");
  
define("SCHEME_IMAGE_WIDTH","370");
define("SCHEME_IMAGE_HEIGHT","280");

//Video Gallery
define("DEMO","images/demo/");
define("DEMO_A","../images/demo/");
define("DEMO_T","../images/demo/tempImg/");

//currency
define("CURR","&#8377;");
//PDF
define("NEWSLETTER_FILES","report/newsletter_report/");
define("CONTACT_US_FILES","report/contact_us_report/");
define("PRODUCT_INQUIRY_FILES","report/product_inquery_report/");
define("BROUCHER","images/broucher/");
define("BROUCHER_A","../images/broucher/");

//application

define("application","images/application/");
define("application_ICON","images/icon_application/");
define("application_A","../images/application/");
define("application_T","../images/gallery/tempImg/");
// certificate
define("certificate","images/certificate/");
define("certificate_ICON","images/icon_certificate/");
define("certificate_A","../images/certificate/");
define("certificate_T","../images/certificate/tempImg/");

// gallery

define("RESUME_PATH","..images/resume/");
define("RESUME_PATH_A","images/resume/");

?>