<?php
require (__DIR__ . '/vendor/autoload.php');

use mysqli;

class dbAccess
{
    private static $instance = null;
    private $conn;

    protected function __construct($host, $username, $password, $database, $port)
    {
        $this->conn = new mysqli($host, $username, $password, $database, $port);
    }

    public static function getInstance($host, $username, $password, $database, $port)
    {
        if(!self::$instance)
        {
            self::$instance = new dbAccess($host, $username, $password, $database, $port);
        }
        return self::$instance;
    }

    //Function related to CRUD or any database queries
    //Example

    public function createEntry($id, $name, $surname)
    {
        $sql = "INSERT INTO exampleTable('id','name','surname') VALUES(?,?,?)";
        $statement = $this->conn->prepare($sql);
        $statement->bind_param
        (
            'iss',
            $id,
            $name,
            $surname
        );
        //type i = integer and s = string
        $statement->execute();
        return $statement->get_result();
    }
}