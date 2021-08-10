<!DOCTYPE html>
<html>
<head>
    <title>Task 1</title>
</head>

<body>
<?php
    include 'menu.inc';
////////////////////////////// Task1 (a) ////////////////////////// 
    function processStrings_1($upperCase){

        for ($i = 0; $i < count($upperCase); $i++) {
            $upperCase[$i][0] = strtoupper($upperCase[$i][0]);
            $upperCase[$i][strlen($upperCase[$i])] = ".";
        }
        return $upperCase;
    }

    $upperCase = array("good luck", "best wishes", "get well soon");

    $upperChar = processStrings_1($upperCase);

    print_r($upperCase);

    echo "<br><br>";
    
    print_r($upperChar);

    echo "<br><br>";

    function processStrings_2(&$reference){

        for ($i = 0; $i < count($reference); $i++) {
            $reference[$i][0] = strtoupper($reference[$i][0]);
            $reference[$i][strlen($reference[$i])] = ".";
        }
    }

    $reference = array("good luck", "best wishes", "get well soon");
    processStrings_2($reference);
    print_r($reference);

    echo "<br><br>";

////////////////////////////// Task1 (b) //////////////////////////
    function displayStrings(...$lists){
        
        foreach($lists as $provinces){
            echo "$provinces. First Character: ".$provinces[0]."<br>";
        }
    }
    
    displayStrings("Gauteng ", "North West ");

    displayStrings("Tshwane ", "Durban ", "Polokwane ", "Pretoria ");

    echo "<br><br>";

////////////////////////////// Task1 (c) //////////////////////////
    function calculateVAT($check, $vat = 15){
        $total =$check * (100+$vat)/100;
        $amount =$total;
        echo $amount;
    }calculateVAT(80);

    echo "<br>";

    calculateVAT(80,8);

    echo "<br><br>";

////////////////////////////// Task1 (d) //////////////////////////
    function variable($runTime)
    {
        $phpArrayFunction = array(1 => 'shuffle', 2 => 'sort', 3 => 'rsort', 4 => 'array_pop', 5 => 'array_reverse');
        $numbers =  array(6, 98, 54, 13, 25, 70);

        for (;$runTime > 0; $runTime--){
            $randNumber = rand(1,5);
            $storage = $phpArrayFunction[$randNumber];
            $storage($numbers);
            echo $randNumber . " --> ";
            foreach($numbers as $values){
                echo "$values ";
            }
            echo "</br>";
        }
    }

    variable(5);

    echo "<br><br>";

?>
<iframe src="task1.txt" height="400" scrolling="yes" width="1200px">
    <p>Your browser does not support iframes.</p></iframe>
</body>
</html>
