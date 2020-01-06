<?php
    include 'common/header.php';
    require_once('common/sql-connect.php');

?>

<style>
    form.productsForm { text-align:left; margin:10% auto 0 auto; width:980px; }
    table { border-collapse:collapse; border:1px solid white; background-color:black; color:white; }
    table tr { border:1px solid white; }
    table tr th { padding:5px 15px; border:1px solid white; text-align:center; }
    table tr td { text-align:center; color:#000000; background-color:#cfcfcf; border:1px solid white; }
    div.addProducts { width:100px; background-color:#bab8b8; font-weight:bold; text-align:center; margin:2px 0px 2px 800px; }
    .outerBox { height:300px; overflow-y:auto; }
    .outerBox::-webkit-scrollbar { display:none; }
    .divTable { height:230px; overflow-y:auto; }
    .divTable::-webkit-scrollbar { display:none; }
    .products { background-color:#990b25; }
</style>

        <form class="productsForm">
            <fieldset>
                <div class="outerBox">
                    <?php ErrorCheck(); ?>
                    <h2 style="margin:10px 0 5px 0;">Products List</h2>
                    <div class="addProducts"><a href="addProducts.php">Add Product</a></div>
                    <div class="divTable">
                        <table>
                            <?php
                                if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
                                    $products = "SELECT * FROM products";
                                    $dbAdapter  = mysqli_query($dbConnect, $products);

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
                                        echo '<td>'.$proItems['productId'].'</td>';
                                        echo '<td>'.$proItems['productName'].'</td>';
                                        echo '<td>'.$proItems['productDescription'].'</td>';
                                        echo '<td style="padding:4px 0 0 0; text-align:center;"><img src="images/'.htmlentities($proItems['productImage']).'" width="40px" height="40px" /></td>';
                                        echo '<td><a href="delete.php?ID=',$proItems['productId'],'" Onclick="return confirm(\'Are you sure! You want to delete this item?\');">Delete</a></td>';
                                        echo '<td><a href="view.php?ID=',$proItems['productId'],'">View</a></td>';
                                        echo '</tr>';
                                    }
                                }
                                else {
                                    echo "<h3 style='color:#c40000;'>Please Login First.</h3>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </fieldset>
        </form>

<?php
    include 'common/footer.php';
?>
