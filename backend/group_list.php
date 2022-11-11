<?php

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value'];



$json_file_name = '../font_group/font_group.json';
$json_data = file_get_contents($json_file_name); // json data 
$json_arr = json_decode($json_data, true);
if(!$json_arr){
    $json_arr = [];
}


// if($columnSortOrder == 'desc'){
//     usort($json_arr,function($first,$second){
//         return $first['title'] < $second['title'];
//     });
// }else if($columnSortOrder == 'asc'){
//     usort($json_arr,function($first,$second){
//         return $first['title'] > $second['title'];
//     });
// }


$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => count($json_arr),
    "iTotalDisplayRecords" => count($json_arr),
    "aaData" => $json_arr,
    "sort" => $columnSortOrder
);

echo json_encode($response);

?>