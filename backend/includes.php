<?php

// error_reporting(E_ERROR);
include('./TTFInfo.php');


function notification($type,$text) {
	return '<div class="alert alert-dismissible alert-'.$type.'">'.$text.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}


function getRandomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}


?>