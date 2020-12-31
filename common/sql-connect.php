<?php
$dbConnect = new mysqli('192.168.1.231', 'hstest3bsql', 'H41r4nhu4*', 'candies');

function ErrorCheck()
{
    if (mysqli_connect_errno()) {
        echo "<h3 style='color:#c40000;'>Error: Unable to connect to SQL Database. </h3>";
        echo "<p style='font-weight:bold'>Error Code : ", mysqli_connect_errno(), "</p>";
        exit();
    }
}

?>
