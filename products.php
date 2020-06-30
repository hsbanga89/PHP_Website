<?php
session_start();
require_once('common/sql-connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <title>PHP - Final Assessment</title>
    <style>
        <?php include "common/styling.css" ?>
        .products {
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
        <div class="divFirstProducts">
            <?php ErrorCheck(); ?>
            <h2 style="margin:10px 0 5px 0;">Products List</h2>
            <div class="addProductsLink"><a href="addProducts.php">Add Product</a></div>
            <div class="divSecondProducts">
                <table class="tableFirstProducts">
                    <?php
                    if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
                        $products = "SELECT * FROM products";
                        $dbAdapter = mysqli_query($dbConnect, $products);

                        echo '<tr>';
                        echo '<th> ID </th>';
                        echo '<th> Name </th>';
                        echo '<th> Description </th>';
                        echo '<th> Image </th>';
                        echo '<th> Edit </th>';
                        echo '<th> Details </th>';
                        echo '<tr>';

                        while ($proItems = mysqli_fetch_array($dbAdapter)) {
                            echo '<tr>';
                            echo '<td>' . $proItems['productId'] . '</td>';
                            echo '<td>' . $proItems['productName'] . '</td>';
                            echo '<td>' . $proItems['productDescription'] . '</td>';
                            echo '<td style="padding:4px 0 0 0; text-align:center;"><img src="images/' . htmlentities($proItems['productImage']) . '" width="40px" height="40px" /></td>';
                            echo '<td><a href="delete.php?ID=', $proItems['productId'], '" Onclick="return confirm(\'Are you sure! You want to delete this item?\');">Delete</a></td>';
                            echo '<td><a href="view.php?ID=', $proItems['productId'], '">View</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<h3 style='color:#c40000;'>Please Login First.</h3>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </fieldset>
</form>

<?php
include "common/footer.php";
?>

</body>
</html>
