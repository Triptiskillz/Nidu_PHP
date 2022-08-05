<?php
session_start();

 $server ="localhost";//	sql313.epizy.com
 $user="root";//epiz_31351439
 $password="";//d7txdvXzxhqz //843bj_mPx@{O0?#a
 $db="nidu";//epiz_31351439_test 
 $con= mysqli_connect($server,$user,$password,$db);
   
 define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/nidu/');
define('SITE_PATH','http://127.0.0.1/nidu/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

 define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH',SERVER_PATH.'media/product_images/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH',SITE_PATH.'media/product_images/');

define('BANNER_SERVER_PATH',SERVER_PATH.'media/banner/');
define('BANNER_SITE_PATH',SITE_PATH.'media/banner/')
?>