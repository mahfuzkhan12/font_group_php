<?php

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE,PATCH,OPTIONS');


 $file_path = '../';

if ( isset($_GET['src']) && file_exists ($file_path .  $_GET['src']) && $_GET['src'] != '') {

    $file_name = $_GET['src'];

    $mimeType = mime_content_type($file_path . $file_name);
    $fileSize = filesize ($file_path . $file_name);
   
    header("Content-Type: $mimeType");
    header("Content-Length: $fileSize");
    header("Content-Disposition: attachment; filename=$file_name");
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    readfile($file_path . $file_name);
    exit;   
}else {
    exit ( "file not found in" );
}

