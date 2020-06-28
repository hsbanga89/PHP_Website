<?php
include 'common/sql-connect.php';

function inputCheck($connect, $input)
{
    $input = htmlspecialchars($input);
    $input = trim($input);
    $input = stripslashes($input);
    return mysqli_real_escape_string($connect, $input);
}

function redirectTo($interval, $location)
{
    ob_start();
    header("refresh: $interval; url= $location");
    ob_end_flush();
}

?>
