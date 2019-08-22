<?php

class Database {

  //database creds
    private static $db_host = "localhost";
    private static $db_user = "root";
    private static $db_pass = "root";
    protected $db_name = "api_db";
    private $conn;

    //get the db connection
    public function getConnection () {
        $this->conn = null;
        
        try {
            $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
            echo 'connected to the db :DDD';
        } catch (mysqli_sql_exception $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
