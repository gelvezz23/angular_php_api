<?php

require 'database.php';

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->title) &&
    !empty($data->startdate) &&
    !empty($data->enddate) &&
    !empty($data->hours)
) {
    $title = mysqli_real_escape_string($con, trim($data->title));;
    $description = mysqli_real_escape_string($con, trim($data->description));;
    $startdate = mysqli_real_escape_string($con, trim($data->startdate));;
    $enddate = mysqli_real_escape_string($con, trim($data->enddate));;
    $hours = mysqli_real_escape_string($con, trim($data->hours));;
}

$query = "INSERT INTO project (title, description, startdate, enddate, hours) VALUES ('{$title}', '{$description}', '{$startdate}', '{$enddate}', 5)";

if (mysqli_query($con, $query)){
    http_response_code(200);
    $project = [
        'title' => $title,
        'startdate' => $startdate,
        'hours' => $hours
    ];
    echo json_encode($project);
} else {
    http_response_code(400);
}

echo 'insertado :D';