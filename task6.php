<!DOCTYPE html>
<html>
<head>
    <title>Task 6</title>
    <style>
        table {
            border-collapse: separate;
        }
        th, td {
            border: 1px solid red;
            padding: 20px;
            text-align: left;
        }
    </style>
</head>

<body>
<?php
    include 'menu.inc';

    echo "
            <table border = '1'>
                <tr>
                    <th>URL (Uniform Resouce Locator)</th><th>Certificate Authority</th><th>Certificate expires</th>
                </tr>
                 <tr>
                    <td>https://www.google.com</td><td>Google Trust Services</td><td>15/06/2021</td>
                </tr>
                 <tr>
                    <td>https://www.unisa.ac.za</td><td>Sectigo Limited</td><td>19/06/2021</td>
                </tr>
                 <tr>
                    <td>https://now.dstv.com</td><td>Amazon</td><td>07/12/2021</td>
                </tr>
                <tr>
                    <td>https://www.bing.com</td><td>Microsoft Corporation</td><td>19/07/2021</td>
                </tr>
                <tr>
                    <td>https://www.php.net</td><td>DigiCert Inc</td><td>23/05/2021</td>
                </tr>
            </table>
    <br><br><br>";
?>

<iframe src="task6.txt" height="400" scrolling="yes" width="1200px">
<p>Your browser does not support iframes.</p></iframe>
</body>
</html>
