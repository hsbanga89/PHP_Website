<?php
    include 'common/sql-connect.php';

    function InputCheck($connect, $input) {
        $input = htmlspecialchars($input);
        $input = trim($input);
        $input = stripslashes($input);
        return mysqli_real_escape_string($connect, $input);
    }
?>
