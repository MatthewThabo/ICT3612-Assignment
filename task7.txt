<!DOCTYPE html>
<html>
<head>
    <title>Task 7</title>
    <style>
        input[type=text]{
            border-radius: 4px;
            background-color: #3CBC8D;
        }
        h3{
            color:  #3CBC8D;
        }
    </style>
</head>

<body>
<?php
    include 'menu.inc';

////////////////////////////// Task7 (c) //////////////////////////
    function Directory($dir){
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
                echo "<ul>";
                while (($file = readdir($dh)) !== false){
                    if ($file == "." || $file == "..") continue;
                    echo "<li>$file</li><br>";
                }
                echo "</ul>";
                closedir($dh);
            }
        }
    }

    if (isset($_POST['write'])){
        write($_POST['file_name'].".txt", $_POST['file_contents']);
    } else if (isset($_POST['read'])){
        read($_POST['file_name'].".txt");
    } else if (isset($_POST['directory'])){
        
        Directory("./");
    }   

    ////////////////////////////// Task7 (d) //////////////////////////
    function fileDownload($filepath)
    {
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $filepath . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush();
            readfile($filepath);
        }
    }
    if (isset($_POST['download'])) {
        fileDownload($_POST['file_name'] . ".txt");
    }
    
    ////////////////////////////// Task7 (b) //////////////////////////
    function read($fileName){
        $fileContents = file_get_contents('./'.$fileName, false);
        echo $fileContents;
    }

////////////////////////////// Task7 (a) //////////////////////////
    function write($fileName, $fileContents)
    {
        $writeTo = fopen($fileName, "w") or die("Unable to open file!");
        fwrite($writeTo, $fileContents);
        fclose($writeTo);
    }
    echo "<br><br>";
?>
<br><hr width="1600px" align="left"><hr width="1600px" align="left">
<h3>Create A File</h3>
<form method="post" action="#">
    <input type="text" name="file_name" placeholder="File Name" required>
    <input type="text" name="file_contents" placeholder="File Contents" required>
    <br><br>
    <button type="submit" name="write" value="write">Write Contents</button>
</form><br><hr width="1600px" align="left"><hr width=1600px" align="left"">
<h3>Read A File</h3>
<form method="post" action="#">
    <input type="text" name="file_name" placeholder="File Name" required>
    <br><br>
    <button type="submit" name="read" value="read">Read Contents</button>
</form><br><hr width="1600px" align="left"><hr width="1600px" align="left">
<h3>Download A File</h3>
<form method="post" action="#">
    <input type="text" name="file_name" placeholder="File to Download" required>
    <br><br>
    <button type="submit" name="download" value="download">Download file</button>
</form><br><hr width="1600px" align="left"><hr width="1600px" align="left">
<h3>Read Directory</h3>
<form method="post" action="#">
<br><br>
    <button type="submit" name="directory" value="directory">List Directory Files</button>
</form><br><hr width="1600px" align="left"><hr width="1600px" align="left">
<iframe src="task7.txt" height="400" scrolling="yes" width="1200px">
    <p>Your browser does not support iframes.</p></iframe>
</body>
</html>