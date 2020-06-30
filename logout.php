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

    <form class="outerForm">
        <fieldset>
            <div class="divFirst">
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

    <?php
    include "common/footer.php";
    ?>

    </body>
    </html>

<?php exit(); ?>