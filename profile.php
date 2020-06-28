<?php
session_start();
include('common/functionsList.php');
require_once('common/sql-connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <title>PHP - Final Assessment</title>
    <style>
        <?php include "common/styling.css" ?>
        .profile {
            background-color: #990b25;
        }
    </style>
</head>
<body>

<?php
include "common/header.php";
?>

<form class="formPf" action="profile.php" method="post">
    <fieldset>
        <div class="outerBoxPf">
            <h2 style="margin:10px 0 5px 0;">Profile</h2>
            <!-- # Database Connection Check - sql-connect.php Function # -->
            <?php
            ErrorCheck();
            $message = "'>";

            if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
                $user = $_SESSION['user-name'];
                $query = "SELECT * FROM accounts WHERE email = '$user'";
                $dbAdapter = mysqli_query($dbConnect, $query);
                $profileData = mysqli_fetch_assoc($dbAdapter);
                if ($profileData) {
                    echo '<style>';
                    echo 'table { border-collapse:collapse; border:1px solid #e6e9ed; margin:0 auto; background-color:black; color:#e6e9ed; }';
                    echo 'table tr { border:1px solid #e6e9ed; }';
                    echo 'table tr th { padding:5px 25px; border:1px solid #e6e9ed; text-align:center; }';
                    echo 'table tr td { text-align:center; padding:5px 25px; color:#000000; background-color:#cfcfcf; border:1px solid #e6e9ed; }';
                    echo '.updateButton { width: 150px; }';
                    echo '.updateEnclosure { float:right; width:350px; text-align:center; margin-right:50px; }';
                    echo '.updateInputBox input { margin:2px 50px 2px 0; }';
                    echo '.outerBox { height:300px; overflow-y:auto; width:910px; }';
                    echo '.profile { background-color:#990b25; }';
                    echo '</style>';

                    echo '<div style="float:left; width:350px; margin-left:50px;">';
                    echo "<table>";
                    echo "<tr> <th> User ID </th>";
                    echo "<td>" . $profileData['userId'] . "</td> </tr>";
                    echo "<tr> <th> Email </th>";
                    echo "<td>" . $profileData['email'] . "</td> </tr>";
                    echo "<tr> <th> Name </th>";
                    echo "<td>" . $profileData['firstName'] . " " . $profileData['lastName'] . "</td> </tr>";
                    echo "<tr> <th> Country </th>";
                    echo "<td>" . $profileData['country'] . "</td> </tr>";
                    echo "</table>";
                    echo '</div>';

                    echo '<div class="updateEnclosure">';
                    echo '<div class="updateInputBox" style="text-align:right;">';
                    echo '<label for="currentPass">Current Password : </label> <input type="password" name="currentPass" value=""></br>';
                    echo '<label for="newPass">New Password : </label> <input type="password" name="newPass" value=""></br>';
                    echo '<label for="retypePass">Retype Password : </label> <input type="password" name="retypePass" value=""></br>';
                    echo '</div>';
                    echo '<div class="updateBtnBox" style="text-align:center; margin:5px auto;">';
                    echo '<input style="" type="submit" class="updateButton" name="updateButton" value="Update Password">';
                    echo '</div>';
                    echo '</div>';
                }
                if (isset($_POST['updateButton']) && !empty($_POST['currentPass']) && !empty($_POST['newPass'])) {
                    $currentPass = hash('sha512', inputCheck($dbConnect, $_POST['currentPass']));
                    $newPass = inputCheck($dbConnect, $_POST['newPass']);
                    $retypePass = inputCheck($dbConnect, $_POST['retypePass']);
                    if ($profileData['password'] == $currentPass) {
                        if ($newPass == $retypePass) {
                            $hashedPass = hash('sha512', $newPass);
                            $query = "UPDATE accounts SET password = '$hashedPass' WHERE email = '$user'";
                            $dbAdapter = mysqli_query($dbConnect, $query);
                            $message = " float:right; margin-right:100px;'>Password Updated.";
                        } else {
                            $message = " float:right; margin-right:100px;'>Password Mis-match. Try again.";
                        }
                    } else {
                        $message = " float:right; margin-right:100px;'>Incorrect Password. Please try again.";
                    }
                }
            } else {
                $message = "'>Please Login First.";
            }

            echo "<h3 style='color:#c40000;" . $message . "</h3>";
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
