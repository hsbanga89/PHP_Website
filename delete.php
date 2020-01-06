<?php
    include 'common/header.php';
    require_once('common/sql-connect.php');

    $Id = $_GET['ID'];

    $query = "DELETE FROM products WHERE (productId = '$Id')";
    $result = mysqli_query($dbConnect, $query);
    if ($result) {
        header("Location: products.php");
    }
    else {
        echo "Delete Error!";
    }
?>
