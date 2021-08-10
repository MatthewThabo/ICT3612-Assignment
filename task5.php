<?php 
    include 'menu.inc';

    $DB_NAME = "ict3612";
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
        $sql = "CREATE TABLE `actors` (
          `ActorID` varchar(11) NOT NULL,
          `ActorFullName` varchar(50) NOT NULL,
          `ActorNotes` longtext NOT NULL
          )ENGINE=InnoDB DEFAULT CHARSET=latin1";

        $conn->exec($sql);
        echo "actors table created successfully";
    }
    catch(PDOException $e)
    {
        // echo "Error: ". $e->getMessage();
    }
     try {
        $conn = new PDO($DB_DSN, $DB_USER , $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `filmactorroles` (
            `FilmTitleID` varchar(11) NOT NULL,
            `ActorID` varchar(11) NOT NULL,
            `RoleTypeID` int(11) NOT NULL,
            `CharacterName` varchar(50) NOT NULL,
            `CharacterDescription` text NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

            
        $conn->exec($sql);
        echo "filmactorroles table created successfully";
    }
    catch(PDOException $e)
    {
        // echo "Error: ". $e->getMessage();
    }

    try {
        $conn = new PDO($DB_DSN, $DB_USER , $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `filmtitles` (
            `FilmTitleID` varchar(11) NOT NULL,
            `FilmTitle` varchar(30) NOT NULL,
            `FilmDuration` int(11) NOT NULL,
            `FilmStory` longtext NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

           $conn->exec($sql);
        echo "filmtitles table created successfully";
    }
    catch(PDOException $e)
    {
        // echo "Error: ". $e->getMessage();
    }

     try {
        $conn = new PDO($DB_DSN, $DB_USER , $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "CREATE TABLE `roletypes` (
        `RoleTypeID` int(10) NOT NULL,
        `RoleType` varchar(30) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

                  $conn->exec($sql);
        echo "roletypes table created successfully";
    }
    catch(PDOException $e)
    {
        // echo "Error: ". $e->getMessage();
    }

    $statement = $conn->prepare('SELECT * FROM `actors`');
    $success = $statement->execute();
    $rows = $statement->fetchAll();

    echo "<h1>Actors Table</h1>
        <table>
            <tr>
                <th>Actor ID</th>
                <th>Actor Full Name</th>
                <th>Actor Notes</th>
            </tr>";
        

    foreach ($rows as $row){
        echo "<tr>
                <td> $row[ActorID] </td>
                <td> $row[ActorFullName] </td>
                <td> $row[ActorNotes] </td>
            </tr>";
    }

    echo "</table><br>";

    $statement = $conn->prepare('SELECT * FROM `roletypes`');
    $success = $statement->execute();
    $rows = $statement->fetchAll();

    echo "<h1>Role Types Table</h1>
        <table>
            <tr>
                <th>Role Type ID</th>
                <th>Role Type</th>
            </tr>";

    foreach ($rows as $row){
        echo "<tr>
                <td> $row[RoleTypeID] </td>
                <td> $row[RoleType] </td>
            </tr>";
    }

    echo "</table><br>";

    $statement = $conn->prepare('SELECT * FROM `filmtitles`');
    $success = $statement->execute();
    $rows = $statement->fetchAll();

    echo "<h1>Film Titles Table</h1>
        <table>
            <tr>
                <th>Film Title ID</th>
                <th>Film Title</th>
                <th>Film Duration</th>
                <th>Film Story</th>
            </tr>";

    foreach ($rows as $row){
        echo "<tr>
                <td> $row[FilmTitleID] </td>
                <td> $row[FilmTitle] </td>
                <td> $row[FilmDuration] </td>
                <td> $row[FilmStory] </td>
            </tr>";
    }

    echo "</table><br>";

    $statement = $conn->prepare('SELECT * FROM `filmactorroles`');
    $success = $statement->execute();
    $rows = $statement->fetchAll();

    echo "<h1>Film Actor Roles Table</h1>
        <table>
            <tr>
                <th>Film Title ID</th>
                <th>Actor ID</th>
                <th>Role Type ID</th>
                <th>Character Name</th>
                <th>Character Description</th>
            </tr>";

    foreach ($rows as $row){
        echo "<tr>
                <td> $row[FilmTitleID] </td>
                <td> $row[ActorID] </td>
                <td> $row[RoleTypeID] </td>
                <td> $row[CharacterName] </td>
                <td> $row[CharacterDescription] </td>
            </tr>";
    }

    echo "</table><br>";

    function orderBy($conn){
        $statement = $conn->prepare('SELECT * FROM `roletypes` ORDER BY `RoleType`');
        $success = $statement->execute();
        $rows = $statement->fetchAll();

        echo "<h1>Role Types Table Ordered By Type</h1>
            <table>
                <tr>
                    <th>Role Type ID</th>
                    <th>Role Type</th>
                </tr>";

        foreach ($rows as $row){
            echo "<tr>
                    <td> $row[RoleTypeID] </td>
                    <td> $row[RoleType] </td>
                </tr>";
        }

        echo "</table><br>";
    }

    function like($conn){
        $statement = $conn->prepare('SELECT `FilmTitle`, `FilmDuration`  FROM `filmtitles` WHERE `FilmStory` LIKE "%man%"');
        $success = $statement->execute();
        $rows = $statement->fetchAll();

        echo "<h1>Like Table</h1>
            <table>
                <tr>
                    <th>Film Title</th>
                    <th>Film Duration</th>
                </tr>";

        foreach ($rows as $row){
            echo "<tr>
                    <td> $row[FilmTitle] </td>
                    <td> $row[FilmDuration] </td>
                </tr>";
        }

        echo "</table><br>";
    }

    function avg($conn){
        $statement = $conn->prepare('SELECT AVG(FilmDuration) AS FilmDurationAverage FROM `filmtitles`');
    $success = $statement->execute();
    $rows = $statement->fetchAll();

    echo "<h1>Film Duration Average Table</h1>
        <table>
            <tr>
                <th>Film Duration Average</th>
            </tr>";

    foreach ($rows as $row){
        echo "<tr>
                <td>" . number_format($row['FilmDurationAverage'], 0) . "</td>
            </tr>";
    }

    echo "</table><br>";
    }

    function innerJoin($conn){
        $statement = $conn->prepare('SELECT actors.ActorFullName, filmactorroles.CharacterName, filmtitles.FilmTitle FROM ((`filmactorroles` INNER JOIN `actors` ON filmactorroles.ActorID = actors.ActorID) INNER JOIN `filmtitles` ON filmactorroles.FilmTitleID = filmtitles.FilmTitleID)');
        $success = $statement->execute();
        $rows = $statement->fetchAll();

        echo "<h1>Inner Joined Table</h1>
            <table>
                <tr>
                    <th>Actor Full Name</th>
                    <th>Actor Full Name</th>
                    <th>Film Title</th>
                </tr>";

        foreach ($rows as $row){
            echo "<tr>
                    <td> $row[ActorFullName] </td>
                    <td> $row[CharacterName] </td>
                    <td> $row[FilmTitle] </td>
                </tr>";
        }

        echo "</table><br>";
    }

    function whereAndLike($conn){
        $statement = $conn->prepare('SELECT * FROM `actors` WHERE `ActorID` LIKE "%actor%" AND LENGTH(ActorNotes) > 250');
        $success = $statement->execute();
        $rows = $statement->fetchAll();

        echo "<h1>Actors Table (WHERE AND)</h1>
            <table>
                <tr>
                    <th>Actor ID</th>
                    <th>Actor Full Name</th>
                    <th>Actor Notes</th>
                </tr>";

        foreach ($rows as $row){
            echo "<tr>
                    <td> $row[ActorID] </td>
                    <td> $row[ActorFullName] </td>
                    <td> $row[ActorNotes] </td>
                </tr>";
        }

        echo "</table><br>";
    }

    $focus = "false";
    if(isset($_POST['submit_form'])){
        if(isset($_POST['select'])){
            $select = $_POST['select'];
            switch($select){
                case "orderby":
                    orderBy($conn); break;
                case "like":
                    like($conn); break;
                case "innerjoin":
                    innerJoin($conn); break;
                case "whereand":
                    whereAndLike($conn); break;
                case "avg":
                    avg($conn); break;
            }
        }
        $focus = "true";
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Task 5</title>
    <style>
        table, th, tr, td {
            border: 2px solid red;
        }
        table {
            border-collapse: separate;
        }
        td, th {
            background: white;
            padding: 10px;
            text-align: left;
        }
        .button{
            background-color: red;
            color: white;
            position: center;
        }
    </style>
</head>

<body onload="focusForm('<?php echo $focus ;?>')">
    <form action="#" method="post">
        <p>Choose view option:</p>
        <label>
            <input type="radio" name="select" value="orderby"> ORDER BY
        </label>
        <label>
            <input type="radio" name="select" value="like"> LIKE
        </label>
        <label>
            <input type="radio" name="select" value="innerjoin"> INNER JOIN
        </label>
        <label>
            <input type="radio" name="select" value="whereand"> WHERE AND LIKE
        </label>
        <label>
            <input type="radio" name="select" value="avg"> AVG
        </label>
        <br><br>
        <input type="submit" id="btn" class="button" name="submit_form" value="Submit">
    </form>
    <br>
    <script>
        function focusForm(val){
            if (val == "true"){
                document.getElementById("btn").focus();
            }
        }
    </script>
    <iframe src="task5.txt" height="400" width="1200">Your browser does not support iframes.</iframe>
</body>

</html>