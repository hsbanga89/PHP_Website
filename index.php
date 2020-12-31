<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <title>PHP - Final Assessment</title>
    <style>
        <?php include "common/styling.css" ?>
        .index {
            background-color: #990b25;
        }
    </style>
</head>
<body>

<?php
include "common/header.php";
?>

<form class="outerForm" style="text-align: center;">
    <fieldset>
        <div class="divFirst" style="padding: 0 1% 0 1%">
            <h1 class="mainTitle">The Candy Collection</h1>
            <h4>This is the collection of the best candies out there.</h4>
            <p class="mainText">
                Candy, known also as sweets and confectionery, has a long history as a familiar food treat that is
                available
                in many varieties.
                Candy varieties are influenced by the size of the sugar crystals, aeration, sugar concentrations, colour
                and
                the types of sugar used.
                <!-- Source: https://en.wikipedia.org/wiki/List_of_candies -->
            </p>
        </div>
    </fieldset>
</form>

<?php
include "common/footer.php";
?>

</body>
</html>
