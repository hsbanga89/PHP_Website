<?php
session_start();
require_once('common/sql-connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <title>PHP - Final Assessment</title>
    <style>
        <?php include "common/styling.css" ?>
        .products {
            background-color: #990b25;
        }
    </style>
</head>
<body>

<?php
include "common/header.php";
?>

<form class="formVw" style="margin: 8% 0 0 20%">
    <fieldset>
        <div class="outerBoxVw">
            <h2 style="margin:10px 0 5px 0;">Product Details</h2>
            <?php ErrorCheck(); ?>

            <?php
            $productId = $_GET['ID'];
            // var_dump($productId);
            $query = "SELECT * FROM products WHERE productId = '$productId'";
            $dbAdapter = mysqli_query($dbConnect, $query);

            echo "<style>";
            echo ".formVw { text-align: left; margin: 10% auto 0 auto; padding:0; width: 980px; }";
            echo "table { border-collapse:collapse; border:1px solid white; margin: 10px auto; background-color:black; color:white; }";
            echo "table tr { border:1px solid white; }";
            echo "table tr th { padding:5px 15px; border:1px solid white; text-align:center; }";
            echo "table tr td { text-align:center; color:#000000; background-color:#cfcfcf; border:1px solid white; }";
            echo ".outerBoxVw::-webkit-scrollbar { display:none; }";
            echo ".outerBoxVw { height:300px; overflow-y:auto; width:910px; }";
            echo "</style>";
            echo "<table>";
            while ($proItems = mysqli_fetch_array($dbAdapter)) {
                $image = $proItems["productImage"];
                echo "<tr>";
                echo "<th>Product ID</th> <td>" . $proItems['productId'];
                echo "</tr>";
                echo "<tr>";
                echo "<th>Product Name</th> <td>" . $proItems["productName"];
                echo "</tr>";
                echo "<tr>";
                echo "<th>Description</th> <td>" . $proItems["productDescription"];
                echo "</tr>";
                echo "<tr>";
                echo "<th>Picture</th> <td>" . "<img src='images/$image' width='110px' height='100px' align='top' />";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </fieldset>
</form>

<footer>
    <div class="foot_links">
        <a href="index.php">Home</a> |
        <a href="details.php">Details</a> |
        <a href="gallery.php">Gallery</a> |
        <a href="contact.php">Contact Us</a>
    </div>
    <div class="contact">
        Harpreet Singh<br/>
        Contact No.: (+61) 400 900 400<br/>
        Address: 1 Some Street, Suburb VIC 1234
    </div>
    <div class="icons">
        <a href="https://www.facebook.com/" target="_blank"><img src="layout/Facebook.png"/></a>
        <!-- Source : https://www.vecteezy.com/ -->
        <a href="https://www.twitter.com/" target="_blank"><img src="layout/Twitter.png"/></a>
        <!-- Source : https://www.vecteezy.com/ -->
        <a href="https://www.youtube.com/" target="_blank"><img src="layout/YouTube.png"/></a>
        <!-- Source : https://www.vecteezy.com/ -->
        <a href="https://www.instagram.com/" target="_blank"><img src="layout/Instagram.png"/></a>
        <!-- Source : https://www.vecteezy.com/ -->
    </div>
    <span class="copyright">© 2019-2020 Harpreet Singh. All rights reserved.</span>
</footer>
</body>
</html>
