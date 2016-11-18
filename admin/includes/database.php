<?php

require_once('new_config.php');

class Database
{

    public $connection;

    function __construct()
    {
        $this->open_db_connection();
    }

    //create a connection
    public function open_db_connection()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database connection failed!" . mysqli_error());
        }
//        else {
//            echo "Database connected!";
//        }
    }

    //querys
    public function query($sql)
    {

        $result = mysqli_query($this->connection, $sql);//1st argument = get the connection 2nd=sql nga ge pasa

        $this->confirm_query($result);

        return $result;
    }

    private function confirm_query($result)
    {
        if (!$result) {
            die("query failed!" . mysqli_error());
        }
    }

    public function escape_string($string)
    {
        $escape_string = mysqli_real_escape_string($this->connection, $string);
        return $escape_string;
    }
}

$database = new Database();
?>