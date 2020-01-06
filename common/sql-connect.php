<?php
    $dbConnect = mysqli_connect('127.0.0.1', 'bing', 'abc123', 'candies');

    function ErrorCheck(){
        if (mysqli_connect_errno()) {
            echo "<h3 style='color:#c40000;'>Error: Unable to connect to SQL Database. </h3>";
            echo "<p style='font-weight:bold'>Error Code : ", mysqli_connect_errno(), "</p>";
            exit();
        }
    }
?>
