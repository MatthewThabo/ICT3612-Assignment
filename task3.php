<!DOCTYPE html>
<html>
<head>
    <title>Task 3</title>
</head>

<body>
<?php
include 'menu.inc';
////////////////////////////// Task3 (a) //////////////////////////
    function validate($url){
        $pattern = '/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i';
        if (preg_match($pattern, $url))
            echo "The URL is OK.";
        else
            echo "Wrong URL.";
    }

    $url = "http://www.facebook.com";
    validate($url);
    echo "<br>";
    $url = "www.facebook.com";
    validate($url);

echo "<br><br>";
////////////////////////////// Task3 (b) //////////////////////////
    function checkString($valString){
        $pattern = '/^[a-z]{4}$/';
        if (preg_match($pattern, $valString))
            echo "The string is accepted.";
        else
            echo "rejected by the regular expression.";
    }

    $valString = "baby";
    checkString($valString);
    echo "<br>";
    $valString = "Goodmorning";
    checkString($valString);

    echo "<br><br>";

    function checkDigit($valDigits){
        $pattern = '/^\d{6,8}$/';
        if (preg_match($pattern, $valDigits))
            echo "The digits are accepted.";
        else
            echo "rejected by the regular expression.";
    }

    $valDigits = "12345678";
    checkDigit($valDigits);
    echo "<br>";
    $valDigits = "20210";
    checkDigit($valDigits);

    echo "<br><br>";
?>
<iframe src="task3.txt" height="400" scrolling="yes" width="1200px">
    <p>Your browser does not support iframes.</p></iframe>
</body>
</html>