<?php

include("./includes.php");

if(isset($_POST)){

    // font upload dir
    $upload_dir = '../fonts/list';

    $json_file_name = '../fonts/fonts.json';
    $json_data = file_get_contents($json_file_name); // json data 
    $json_arr = json_decode($json_data, true);
    if(!$json_arr){
        $json_arr = [];
    }


    /// font uploading
    if(is_array($_FILES['files']['name']) && count($_FILES['files']['name']) > 0) {

        $files = [];
        $extension_err = [];
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
             
            $file_tmpname = $_FILES['files']['tmp_name'][$key];
            $file_name = $_FILES['files']['name'][$key];

            $info = pathinfo($file_name);
            $base = basename($file_name,'.'.$info['extension']); 
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);

            if($ext == 'ttf') {
                $files[] = array('name' => $base, 'ext' => $ext, 'tmp' => $file_tmpname);
            }else {
                $extension_err[] = true;
            }
        } // checking files


        if(count($extension_err) > 0) {
            echo notification('danger',"Only TTF file is allowed");
        }else {

            $data_uploaded = [];

            $error = false;
            foreach($files as $key => $value) {
                
                $file_name = $value['name'];
                $ext = $value['ext'];

                $new_file_name = $file_name.'-'. getRandomString(6) .'.' . $ext; // new file name after uploading
                $tmp_name = $value['tmp'];

                if(move_uploaded_file($tmp_name, $upload_dir.'/'.$new_file_name)) {
                    $src = $upload_dir.'/'.$new_file_name;

                    $objFontInfo = new FontInfo( $src );
                    $font_name = $objFontInfo->getFontName();
                    $font_family = $objFontInfo->getFontFamily();

                    $data_uploaded[] = array('src' => $src);
                    $unique_id = uniqid().getRandomString(6);

                    $json_arr[] =  array('font_name' => $font_name, 'font_family' => $font_family, 'src' => str_replace('../', '', $src), 'id' => $unique_id);

                }else {
                    $error = true;
                    break;
                }
            }

            if($error) {
                foreach($data_uploaded as $key => $value) {
                    if(file_exist($value['src'])){
                        unlink($value['src']);
                    }
                }
                echo notification('danger',"Error Happend! please try again");
            }else {
                
                file_put_contents($json_file_name, json_encode($json_arr));
                echo 1;

            }
        }

    }else {
        echo notification('danger',"Please Select at least one ttf file!");
    }
}


?>