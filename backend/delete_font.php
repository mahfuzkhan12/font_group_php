<?php

include("./includes.php");

if(isset($_POST)){


    $json_file_name = '../fonts/fonts.json';
    $json_data = file_get_contents($json_file_name); // json data 
    $json_arr = json_decode($json_data, true);
    if(!$json_arr){
        $json_arr = [];
    }

    $delete_font_id = $_POST['id'];

    if($delete_font_id){

        $new_json_array = [];
        foreach ($json_arr as $key => $value) {
            if($value['id'] == $delete_font_id){
                continue;
            }else{
                $new_json_array[] = $value;
            }
        }

        if(file_put_contents($json_file_name, json_encode($new_json_array))){
            echo 1;
        }else {
            echo 500
        }


    }else {
        echo 404;
    }


}