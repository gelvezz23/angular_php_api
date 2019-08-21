<?php

// required headers
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: GET");

// include database and object files
include_once '../config/database.php';
include_once '../objects/project.php';

//instantiate db and project
$database = new Database ();
$db = $database->getConnection();
//initialize object
$project = new Project ($db);

//query project
$stmt = $project->read();
var_dump('tttt'.$stmt);
$num = $stmt->rowCount();
var_dump($num);

//check if its more than 0, record found
if ($num>0) {
    $projects_arr = [];
    $projects_arr["records"] = [];

    while ($row = $stmt->fetch_assoc()) {
        //extract($row);
        var_dump($row);
        $project_items = [
            "id" => $id,
            "title" => $title,
            "description" => $description,
            "startdate" => $startdate,
            "enddate" => $enddate,
            "hours" => $hours
        ];
        array_push($projects_arr["records"], $project_items);
    }
    //set the response code - 200 ok
    http_response_code(200);
    //show products data in json format
    echo json_encode($products_arr);
} else { //no projects found
    //set response code - 404 not found
    http_response_code(404);
    echo json_encode( array("message" => "No projects founds.") );
} 


