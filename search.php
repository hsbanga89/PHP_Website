<?php
    include 'common/header.php';
    include 'common/functionslist.php';
    require_once('common/sql-connect.php');

    if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
        if (isset($_POST['submit'])) {
            $search = InputCheck($dbConnect, $_POST['searchText']);

            $query = "SELECT * FROM products WHERE productName = '$search'";
            $dbAdapter = mysqli_query($dbConnect, $query);
            if (mysqli_num_rows($dbAdapter) < 1) {
                $message = "Product not Found.";
            }
        }
    }
    else {
        $message = "Please Login First.";
    }
?>

    <style>
        form.searchForm { text-align: left; margin: 10% auto 0 auto; padding:0; width: 980px; }
        table:not(buttons) tr td { padding: 5px 30px; }
        table.buttons { width: 100%; text-align: center; padding: 10px 0; }
        table.buttons .button { width: 100px; }
        .outerBox { height:300px; overflow-y:auto; width:910px; }
        .search { background-color: #990b25; }
    </style>

        <form class="searchForm" action="search.php" method="post">
            <fieldset>
                <div class="outerBox">
                    <h2 style="margin:10px 0 5px 0;">Product Search</h2>
                    <?php ErrorCheck(); ?>
                    <table>
                        <tr>
                            <td> Enter Product Name : <input style="margin-left:5px; width:175px;" type="text" name="searchText" value=""> </td>
                        </tr>
                    </table>
                    <table class="buttons">
                        <tr>
                            <td>
                                <input class="button" type="reset" name="reset" value="Reset">
                                <input class="button" type="submit" name="submit" value="Search">
                            </td>
                        </tr>
                    </table>
                    <?php echo "<h3 style='color:#c40000;'>$message</h3>"; ?>
                    <?php
                        if (mysqli_num_rows($dbAdapter) > 0) {
                            echo "<style>";
                            echo ".searchTable {border-collapse:collapse; width:860px; resize:none; border:1px solid white; background-color:black; color:white; margin-left:33px;}";
                            echo ".searchTr {border:1px solid white;}";
                            echo ".searchTh {padding:5px 15px; border:1px solid white; text-align:center;}";
                            echo ".searchTd {text-align:center; background-color:grey; border:1px solid white;}";
                            echo "</style>";
                            echo '<table class="searchTable">';
                            echo '<tr class="searchTr">';
                            echo '<th class="searchTh"> ID </th>';
                            echo '<th class="searchTh"> Name </th>';
                            echo '<th class="searchTh"> Description </th>';
                            echo '<th class="searchTh"> Image </th>';
                            echo '<tr>';
                            while ($proItems = mysqli_fetch_array($dbAdapter)) {
                                echo '<tr class="searchTr">';
                                echo '<td class="searchTd">'.$proItems['productId'].'</td>';
                                echo '<td class="searchTd">'.$proItems['productName'].'</td>';
                                echo '<td class="searchTd">'.$proItems['productDescription'].'</td>';
                                echo '<td class="searchTd"><img src="images/'.htmlentities($proItems['productImage']).'" width="40px" height="40px" /></td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                        }
                    ?>
                </div>
            </fieldset>
        </form>

<?php
    include 'common/footer.php';
?>
