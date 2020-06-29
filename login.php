<?php
session_start();
include('common/functionsList.php');
require_once('common/sql-connect.php');

if (isset($_POST['submit'])) {
    // # Input Field Variables #
    $email = inputCheck($dbConnect, $_POST['user']);
    $password = inputCheck($dbConnect, $_POST['password']);

    $userLogin = "SELECT * FROM accounts WHERE (email = '$email')";
    $dbAdapter = mysqli_query($dbConnect, $userLogin);
    if (mysqli_num_rows($dbAdapter) < 1) {
        $message = "User not Found.";
    } else {
        $userFound = mysqli_fetch_array($dbAdapter);
        if (hash('sha512', $password) !== $userFound['password']) {
            $message = "Email and/or Password mismatch.";
        } else {
            $user = $userFound['email'];
            $_SESSION['user-name'] = $user;
            setcookie('candiesUser', $user, time() + 60 * 60);     // One Hour Session
//            header("Location: index.php");
            redirectTo(0.1, 'profile.php');
        }
    }
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

<form class="signInLg" action="login.php" method="post">
    <fieldset>
        <div class="outerBoxLg">
            <h2 style="margin:10px 0 5px 0;">Sign In</h2>
            <?php ErrorCheck(); ?> <!-- # Database Connection Check - sql-connect.php Function # -->
            <table class="tableLg">
                <tr>
                    <td> E-mail : <input style="margin-left:26px; width:175px;" type="email" name="user" value=""></td>
                </tr>
                <tr>
                    <td> Password : <input style="margin-left:5px; width:175px;" type="password" name="password"
                                           value=""></td>
                </tr>
            </table>
            <table class="buttonsLg">
                <tr>
                    <td>
                        <input class="buttonLg" type="reset" name="reset" value="Reset">
                        <input class="buttonLg" type="submit" name="submit" value="Sign In">
                    </td>
                </tr>
            </table>
            <?php
            if (isset($message)) {
                echo "<h3 style='color:#c40000;'>$message</h3>";
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
