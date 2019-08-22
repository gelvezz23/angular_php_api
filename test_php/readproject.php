<?php
require 'database.php';

$projects = [];

$query = "SELECT * FROM project";

if ($result = mysqli_query($con, $query)) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $projects[$i]['id'] = $row ['id'];
        $projects[$i]['title'] = $row ['title'];
        $projects[$i]['description'] = $row ['description'];
        $projects[$i]['startdate'] = $row ['startdate'];
        $projects[$i]['enddate'] = $row ['enddate'];
        $projects[$i]['hours'] = $row ['hours'];
        $i++;
    }
    
    http_response_code(200);
    echo json_encode($projects);
} else {
    http_response_code(404);
} 