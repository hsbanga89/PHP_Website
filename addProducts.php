<?php
session_start();
include 'common/functionsList.php';
require_once('common/sql-connect.php');

if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
    if (isset($_POST['addProduct'])) {
        $productName = inputCheck($dbConnect, strtolower($_POST['productName']));
        $productDesc = inputCheck($dbConnect, $_POST['productDesc']);
        $productImage = inputCheck($dbConnect, strtolower($_FILES['uploadFile']['name']));
        $fileName = $productImage;
        $targetDir = 'images/' . $productImage;
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!empty($_FILES['uploadFile']['tmp_name'])) {
            $checkIfFile = getimagesize($_FILES['uploadFile']['tmp_name']);
            if ($checkIfFile == false) {
                $message = "File is not an image.";
            } else {
                if (file_exists($targetDir)) {
                    $message = "Sorry, file already exists.";
                } else {
                    if ($_FILES['uploadFile']['size'] > 1024000) {
                        $message = "Sorry, your file is too large.";
                    } else {
                        if ($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png") {
                            $message = "Sorry, only JPG, JPEG & PNG files are allowed.";
                        } else {
                            if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $targetDir)) {
                                $query = "INSERT INTO products (productName, productDescription, productImage) VALUES ('$productName', '$productDesc', '$fileName')";
                                $dbAdapter = mysqli_query($dbConnect, $query);
                                $message = "The file " . basename($_FILES["uploadFile"]["name"]) . " has been uploaded.";
                            } else {
                                $message = "Sorry, there was an error uploading your file.";
                            }
                        }
                    }
                }
            }
        } else {
            $message = "Please select a product image.";
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
        .login {
            background-color: #990b25;
        }
    </style>
</head>
<body>

<?php
include "common/header.php";
?>

<form class="FormAP" method="post" enctype="multipart/form-data">
    <fieldset>
        <div class="outerBoxAP">
            <h2 style="margin:10px 0 5px 0;">Add Product</h2>
            <?php ErrorCheck(); ?>
            <table class="tableAP">
                <tr>
                    <td><label for="productName"> Product Name : </label>
                        <input class="productName" style="margin-left:41px; width:300px;" type="text" name="productName"
                               maxlength="30" required/></td>
                    <td> Product Image : <input style="margin-left:10px;" type="file" name="uploadFile"></td>
                </tr>
                <tr>
                    <td><label for="productDesc"> Product Description : </label>
                        <textarea class="productDesc" name="productDesc" rows="4" cols="40"
                                  style="float:right; margin-left:5px; width:300px; resize:none;" maxlength="150"
                                  required></textarea></td>
                </tr>
            </table>
            <table class="buttonsAP">
                <tr>
                    <td>
                        <input class="buttonAP" type="reset" name="reset" value="Reset">
                        <input class="buttonAP" type="submit" name="addProduct" value="Add Product">
                    </td>
                </tr>
            </table>
            <?php
            if (isset($message)) {
                echo "<h3 style='color:#c40000;'>$message</h3>";
            } ?>
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
