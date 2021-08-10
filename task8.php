<?php
require "task8_controller.php";
// require "task8_model.php";
require "task8_view.php";

 $DB_NAME = "communityclinics";
    $DB_DSN = "mysql:host=localhost;dbname=".$DB_NAME;
    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "";

    try{
	    $conn = new PDO("mysql:host=localhost;dbname=".$DB_NAME, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        // echo "Error: ". $e->getMessage();
    }

    try {
    $conn = new PDO('mysql:host=localhost', $DB_USER , $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sql = "DROP DATABASE IF EXISTS `$DB_NAME`";
    // $conn->exec($sql);
    // echo "Database dropped successfully";

    $sql = "CREATE DATABASE IF NOT EXISTS `$DB_NAME`";
    $conn->exec($sql);
    echo "Database created successfully";
    
    } catch(PDOException $e) {
        // echo $sql . "Error: <br>" . $e->getMessage();
    }

    try {
        $conn = new PDO($DB_DSN, $DB_USER , $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `peoplewithdisabilityandolder` (
                `fullname` varchar(50) NOT NULL,
                `idnumber` varchar(13) NOT NULL,
                `area` varchar(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1";


        $conn->exec($sql);
        echo "HomeCareworker table created successfully";
    }
    catch(PDOException $e)
    {
        // echo "Error: ". $e->getMessage();
    }
     try {
        $conn = new PDO($DB_DSN, $DB_USER , $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `checkups` (
                `id` int(11) NOT NULL,
                `checkupdate` varchar(15) NOT NULL,
                `checkupcode` varchar(3) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

            
        $conn->exec($sql);
        echo "checkups table created successfully";
    }
    catch(PDOException $e)
    {
        // echo "Error: ". $e->getMessage();
    }
// $db = new Model($pdo);
// $controller = new Controller($db);
// $controller->index();
?>