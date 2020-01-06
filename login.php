<?php
    include('common/header.php');
    include('common/functionslist.php');
    require_once('common/sql-connect.php');

    if (isset($_POST['submit'])) {
        // # Input Field Variables #
        $email = InputCheck($dbConnect, $_POST['user']); $password = InputCheck($dbConnect, $_POST['password']);

        $userLogin = "SELECT * FROM accounts WHERE (email = '$email')";
        $dbAdapter = mysqli_query($dbConnect, $userLogin);
        if (mysqli_num_rows($dbAdapter) < 1) {
            $message = "User not Found.";
        }
        else {
            $userFound = mysqli_fetch_array($dbAdapter);
            if (hash('sha512', $password) !== $userFound['password']) {
                $message = "Email and/or Password mismatch.";
            }
            else {
                $user = $userFound['email'];
                $_SESSION['user-name'] = $user;
                setcookie('candiesUser', $user, time() + 60 * 60);     // One Hour Session
                header("Location: index.php");
            }
        }
    }
?>

    <style>
        form.signIn { text-align: left; margin: 10% auto 0 auto; width: 980px; }
        table:not(buttons) tr td { padding: 5px 30px; }
        table.buttons { width: 100%; text-align: center; padding: 10px 0; }
        table.buttons .button { width: 100px; }
        .outerBox { height:300px; overflow-y:auto; width:910px; }
        .login { background-color:#990b25; }
    </style>

    <form class="signIn" action="login.php" method="post">
        <fieldset>
            <div class="outerBox">
                <h2 style="margin:10px 0 5px 0;">Sign In</h2>
                <?php ErrorCheck(); ?>  <!-- # Database Connection Check - sql-connect.php Function # -->
                <table>
                    <tr>
                        <td> E-mail : <input style="margin-left:26px; width:175px;" type="email" name="user" value=""> </td>
                    </tr>
                    <tr>
                        <td> Password : <input style="margin-left:5px; width:175px;" type="password" name="password" value=""> </td>
                    </tr>
                </table>
                <table class="buttons">
                    <tr>
                        <td>
                            <input class="button" type="reset" name="reset" value="Reset">
                            <input class="button" type="submit" name="submit" value="Sign In">
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
