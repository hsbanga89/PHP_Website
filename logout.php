<?php
include "common/functionsList.php";
session_start();
session_destroy();
setcookie("candiesUser", "", time() - 3600);
$message = "You have been logged out successfully.";
//header("refresh:3; url=index.php");
redirectTo(3, 'index.php');
?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr" content="width=device-width, initial-scale=1">
    <head>
        <meta charset="utf-8">
        <title>PHP - Final Assessment</title>
        <style>
            <?php include_once "common/styling.css" ?>
            .logout {
                background-color: #990b25;
            }
        </style>
    </head>
    <body>

    <?php
    include "common/header.php";
    ?>

    <form class="MsgLout">
        <fieldset>
            <div class="MsgOut">
                <?php
                echo "<h3 style='color:#c40000;'>$message</h3>";
                //                echo "Redireting to Homepage in 3 seconds;";
                ?>
                <span id="countdown"></span>
                <script>
                    let seconds = 3, $seconds = document.querySelector('#countdown');
                    (function countdown() {
                        $seconds.textContent = 'Redireting to Homepage in ' + seconds + ' second' + (seconds === 1 ? '' : 's')
                        if (seconds-- > 1) setTimeout(countdown, 1000)
                    })();
                </script>
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

<?php exit(); ?>