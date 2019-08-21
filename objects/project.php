<?php

class Project {

    private $conn;
    private $table_name = "project";

    //properties
    private $id;
    private $title;
    private $description;
    private $startdate;
    private $enddate;
    private $hours;

    //constructor with the db connection
    public function __construct ($db) {
        $this->conn = $db;
    }

    function read () {
        // select all query
        $query = "SELECT * FROM  project";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        //var_dump($stmt);
        $stmt->execute();
        //var_dump($stmt);
        return $stmt;
    }
}