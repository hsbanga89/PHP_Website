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

<form class="FormPs">
    <fieldset>
        <div class="outerBoxPs">
            <?php ErrorCheck(); ?>
            <h2 style="margin:10px 0 5px 0;">Products List</h2>
            <div class="addPs"><a href="addProducts.php">Add Product</a></div>
            <div class="divTablePs">
                <table class="tablePs">
                    <?php
                    if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
                        $products = "SELECT * FROM products";
                        $dbAdapter = mysqli_query($dbConnect, $products);

                        echo '<tr>';
                        echo '<th> ID </th>';
                        echo '<th> Name </th>';
                        echo '<th> Description </th>';
                        echo '<th> Image </th>';
                        echo '<th> Edit </th>';
                        echo '<th> Details </th>';
                        echo '<tr>';

                        while ($proItems = mysqli_fetch_array($dbAdapter)) {
                            echo '<tr>';
                            echo '<td>' . $proItems['productId'] . '</td>';
                            echo '<td>' . $proItems['productName'] . '</td>';
                            echo '<td>' . $proItems['productDescription'] . '</td>';
                            echo '<td style="padding:4px 0 0 0; text-align:center;"><img src="images/' . htmlentities($proItems['productImage']) . '" width="40px" height="40px" /></td>';
                            echo '<td><a href="delete.php?ID=', $proItems['productId'], '" Onclick="return confirm(\'Are you sure! You want to delete this item?\');">Delete</a></td>';
                            echo '<td><a href="view.php?ID=', $proItems['productId'], '">View</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<h3 style='color:#c40000;'>Please Login First.</h3>";
                    }
                    ?>
                </table>
            </div>
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
