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

    <form class="outerForm">
        <fieldset style="height: 450px">
        </fieldset>
    </form>

    <?php
    include "common/footer.php";
    ?>

    </body>
    </html>

<?php
exit();
?>