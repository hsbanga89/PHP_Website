<?php
    // ## Sources :
        // https://www.joysdelights.com.au/

    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PHP - Final Assessment</title>
        <style>
            body {
                background-image: url("layout/back.png");   /* Source : https://wall.alphacoders.com/big.php?i=890765 */
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
                background-position: top;
                background-color: #95c5eb;
                font-family: Calibri, Verdana;
            }
            .nav {
                position: absolute;
                background-color: #404040;
                top: 80px; left: 275px;
                padding: 0 0 0 5px;
                list-style-type: none;
                border-top: 2px solid #22680f;
                border-bottom: 2px solid #22680f;
                width: 980px;
                text-align: center;
            }
            .nav li {
                display: inline;
                padding: 10px 20px;
            }
            .nav li a {
                display: inline-block;
                text-decoration: none;
                padding: 10px 0;
                width: 150px;
                color: #e6e6e6;
            }
            .nav li a:hover {
                background-color: #1a1a1a;
            }
            .bodyBox {
                color: #000000;
                text-align: center;
                margin: 12% auto 0 auto;
                width: 980px;
            }
            .mainTitle {
                color: #990b25;
            }
            .mainText {
                padding: 20px;
                font-size: 15px;
            }
        </style>
    </head>
    <body>
        <ul class="nav">
            <li> <a href="index.php" class="index"> Home </a></li>
            <li> <a href="products.php" class="products"> Products </a></li>
            <li> <a href="search.php" class="search"> Search </a></li>
            <li>
                <?php
                    if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
                        echo '<a href="profile.php" class="profile"> Profile </a>';
                    }
                    else {
                        echo '<a href="register.php" class="register"> Register </a>';
                    }
                ?>
            </li>
            <li>
                <?php
                    if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
                        echo '<a href="logout.php" class="logout"> Logout </a>';
                    }
                    else {
                        echo '<a href="login.php" class="login"> Login </a>';
                    }
                ?>
            </li>
        </ul>
