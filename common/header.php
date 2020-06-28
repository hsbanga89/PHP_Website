<ul class="nav">
    <li><a href="index.php" class="index"> Home </a></li>
    <li><a href="products.php" class="products"> Products </a></li>
    <li><a href="search.php" class="search"> Search </a></li>
    <li>
        <?php
        if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
            echo '<a href="profile.php" class="profile"> Profile </a>';
        } else {
            echo '<a href="register.php" class="register"> Register </a>';
        }
        ?>
    </li>
    <li>
        <?php
        if (isset($_SESSION['user-name']) && isset($_COOKIE['candiesUser'])) {
            echo '<a href="logout.php" class="logout"> Logout </a>';
        } else {
            echo '<a href="login.php" class="login"> Login </a>';
        }
        ?>
    </li>
</ul>
