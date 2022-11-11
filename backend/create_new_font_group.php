<?php

include("./includes.php");

if(isset($_POST)){


    $group_title = $_POST['group_title'];

    if($group_title == '') {
        echo notification('danger',"Please insert Group title");
    }else {

        $font_name = $_POST['font_name'];
        $font_id = $_POST['font_id'];

        // print_r($font_name);

        $error_font_name = false;
        $error_font_id = false;
        foreach($font_name as $field) {
            if($field == ''){
                $error_font_name = true;
            }
        }
        foreach($font_id as $field) {
            if($field == ''){
                $error_font_id = true;
            }
        }
        // check if a value is empty


        if($error_font_name){
            echo notification('danger', "Please fill out all font name");
        }else if($error_font_id){
            echo notification('danger', "Please select all font select field");
        }else if(count($font_name) < 2){
            echo notification('danger', "You have to select at least two fonts to create a group");
        }else{


            // get and save json data for the font group
            $json_file_name = '../font_group/font_group.json';
            $json_data = file_get_contents($json_file_name); // json data 
            $json_arr = json_decode($json_data, true);
            if(!$json_arr){
                $json_arr = [];
            }


            // input value to array
            $fonts = [];
            for($i = 0; $i < count($font_name); $i++) {
                $fonts[] = array('name' => $font_name[$i], 'font_family' => $font_id[$i]);
            }

            // save the data
            $unique_id = uniqid().getRandomString(6);
            $json_arr[] = array('title' => $group_title, 'fonts' => $fonts, 'id' => $unique_id);
            if(file_put_contents($json_file_name, json_encode($json_arr))){
                echo 1;
            }else {
                echo notification('danger',"Error Happend! please try again");
            }
                


        }

    }


}