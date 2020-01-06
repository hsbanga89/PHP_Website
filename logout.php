<?php
    include('common/header.php');
    include('common/sql-connect.php');
    session_start();
    session_destroy();
    setcookie("candiesUser", "", time() - 3600);
    $message = "You have been logged out successfully.";
?>
    <style>
        form.logoutMsg { text-align: left; margin: 10% auto 0 auto; width: 980px; }
        .Msg { height:300px; overflow-y:auto; width:910px; }
    </style>

        <form class="logoutMsg">
            <fieldset>
                <div class="Msg">
                    <?php
                        echo "<h3 style='color:#c40000;'>$message</h3>";
                        echo "Redireting to Homepage in 3 seconds;";
                        header("refresh:3; url=index.php");
                    ?>
                </div>
            </fieldset>
        </form>

<?php
    include('common/footer.php');
?>
