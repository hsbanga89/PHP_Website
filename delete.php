<?php
include 'common/header.php';
include 'common/functionsList.php';
require_once('common/sql-connect.php');

$Id = $_GET['ID'];

$query = "DELETE FROM products WHERE (productId = '$Id')";
$result = mysqli_query($dbConnect, $query);
if ($result) {
//        header("Location: products.php");
    redirectTo(0.1, 'products.php');
} else {
    echo "Delete Error!";
}
?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr" content="width=device-width, initial-scale=1">
    <head>
        <meta charset="utf-8">
        <title>PHP - Final Assessment</title>
        <style>
            <?php include "common/styling.css" ?>
        </style>
    </head>
    <body>

    <?php
    include "common/header.php";
    ?>

    <form class="FormAP" method="post" enctype="multipart/form-data">
        <fieldset style="height: 300px">
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

<?php
exit();
?>