<?php
session_start();
include 'common/functionsList.php';
require_once('common/sql-connect.php');

if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
    if (isset($_POST['submit'])) {
        $search = InputCheck($dbConnect, $_POST['searchText']);
        $query = "SELECT * FROM products WHERE productName LIKE '%" . $search . "%'";
        $dbAdapter = mysqli_query($dbConnect, $query);
        if (mysqli_num_rows($dbAdapter) < 1) {
            $message = "Product not Found.";
        }
    }
} else {
    $message = "Please Login First.";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <title>PHP - Final Assessment</title>
    <style>
        <?php include "common/styling.css" ?>
        .search {
            background-color: #990b25;
        }
    </style>
</head>
<body>

<?php
include "common/header.php";
?>

<form class="formSh" action="search.php" method="post">
    <fieldset>
        <div class="outerBoxSh">
            <h2 style="margin:10px 0 5px 0;">Product Search</h2>
            <?php ErrorCheck(); ?>
            <table>
                <tr>
                    <td> Enter Product Name : <input style="margin-left:5px; width:175px;" type="text" name="searchText"
                                                     value=""></td>
                </tr>
            </table>
            <table class="buttonsSh">
                <tr>
                    <td>
                        <input class="buttonSh" type="reset" name="reset" value="Reset">
                        <input class="buttonSh" type="submit" name="submit" value="Search">
                    </td>
                </tr>
            </table>
            <?php
            if (isset($message)) {
                echo "<h3 style='color:#c40000;'>$message</h3>";
            }

            if (isset($dbAdapter)) {
                if (mysqli_num_rows($dbAdapter) > 0) {
                    echo "<style>";
                    echo ".searchTable {border-collapse:collapse; width:860px; resize:none; border:1px solid white; background-color:black; color:white; margin-left:33px;}";
                    echo ".searchTr {border:1px solid white;}";
                    echo ".searchTh {padding:5px 15px; border:1px solid white; text-align:center;}";
                    echo ".searchTd {text-align:center; background-color:grey; border:1px solid white;}";
                    echo "</style>";
                    echo '<table class="searchTable">';
                    echo '<tr class="searchTr">';
                    echo '<th class="searchTh"> ID </th>';
                    echo '<th class="searchTh"> Name </th>';
                    echo '<th class="searchTh"> Description </th>';
                    echo '<th class="searchTh"> Image </th>';
                    echo '<tr>';
                    while ($proItems = mysqli_fetch_array($dbAdapter)) {
                        echo '<tr class="searchTr">';
                        echo '<td class="searchTd">' . $proItems['productId'] . '</td>';
                        echo '<td class="searchTd">' . $proItems['productName'] . '</td>';
                        echo '<td class="searchTd">' . $proItems['productDescription'] . '</td>';
                        echo '<td class="searchTd"><img src="images/' . htmlentities($proItems['productImage']) . '" width="40px" height="40px" /></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            }
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
