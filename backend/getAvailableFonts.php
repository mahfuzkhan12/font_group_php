<?php


$json_file_name = '../fonts/fonts.json';
$json_data = file_get_contents($json_file_name); // json data 
$json_arr = json_decode($json_data, true);
if(!$json_arr){
    $json_arr = [];
}


// array merger function 
function unique_multidimensional_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[] = $val[$key];
            $temp_array[] = $val;
        }
        $i++;
    }
    sort($temp_array);
    return $temp_array;
}


if (isset($_GET['case'])) {
    $case = $_GET['case'];
} else {
    $case = '';
}



$uniqe_fonts = unique_multidimensional_array($json_arr, 'font_name');

switch ($case) {

    case 'get_as_options':
        if(count($uniqe_fonts) > 0){
            echo '<option value="">Select a font</option>'; 
            foreach($uniqe_fonts as $key => $value) {
                echo "<option value='".$value['font_name']."'>".$value['font_name']."</option>";
            }
        }else {
            echo '<option>Please add a Font first</option>';
        }
    break;

    default;
        echo json_encode($uniqe_fonts); // return json of available unique fonts
}



?>