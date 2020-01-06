<?php
    include 'common/header.php';
    include 'common/functionslist.php';
    require_once('common/sql-connect.php');

    if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
        if (isset($_POST['addProduct'])) {
            $productName = InputCheck($dbConnect, strtolower($_POST['productName']));
            $productDesc = InputCheck($dbConnect, $_POST['productDesc']);
            $productImage = InputCheck($dbConnect, strtolower($_FILES['uploadFile']['name']));

            $fileName = $productImage;
            $targetDir = 'images/'.$productImage;
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $checkIfFile = getimagesize($_FILES['uploadFile']['tmp_name']);
            
            if ($checkIfFile == false) {
                $message = "File is not an image.";
            }
            else {
                if (file_exists($targetDir)) {
                    $message = "Sorry, file already exists.";
                }
                else {
                    if ($_FILES['uploadFile']['size'] > 1024000) {
                        $message = "Sorry, your file is too large.";
                    }
                    else {
                        if ($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png") {
                            $message = "Sorry, only JPG, JPEG & PNG files are allowed.";
                        }
                        else {
                            if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $targetDir)) {
                                $query = "INSERT INTO products (productName, productDescription, productImage) VALUES ('$productName', '$productDesc', '$fileName')";
                                $dbAdapter = mysqli_query($dbConnect, $query);
                                $message = "The file ". basename($_FILES["uploadFile"]["name"]). " has been uploaded.";
                            }
                            else {
                                $message = "Sorry, there was an error uploading your file.";
                            }
                        }
                    }
                }
            }
        }
    }
    else {
        $message = "Please Login First.";
    }
?>

        <style>
            form.addProductsForm { text-align: left; margin: 10% auto 0 auto; width: 980px; }
            table:not(buttons) tr td { padding: 5px 30px; }
            table.buttons { width: 100%; text-align: center; padding: 10px 0; }
            table.buttons .button { width: 100px; }
            .outerBox { height:300px; overflow-y:auto; padding:0; }
        </style>

        <form class="addProductsForm" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="outerBox">
                    <h2 style="margin:10px 0 5px 0;">Add Product</h2>
                    <?php ErrorCheck(); ?>
                    <table>
                        <tr>
                            <td><label for="productName"> Product Name : </label>
                                <input class="productName" style="margin-left:41px; width:300px;" type="text" name="productName" maxlength="30" required/> </td>
                            <td> Product Image : <input style="margin-left:10px;" type="file" name="uploadFile"> </td>
                        </tr>
                        <tr>
                            <td><label for="productDesc"> Product Description : </label>
                                <textarea class="productDesc" name="productDesc" rows="4" cols="40" style="float:right; margin-left:5px; width:300px; resize:none;" maxlength="150" required></textarea> </td>
                        </tr>
                    </table>
                    <table class="buttons">
                        <tr>
                            <td>
                                <input class="button" type="reset" name="reset" value="Reset">
                                <input class="button" type="submit" name="addProduct" value="Add Product">
                            </td>
                        </tr>
                    </table>
                    <?php echo "<h3 style='color:#c40000;'>$message</h3>"; ?>
                </div>
            </fieldset>
        </form>

<?php
    include 'common/footer.php';
?>
