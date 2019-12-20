<li class="nav-item festival-nav">
    <a class="nav-link" href="information.php?id=<?php echo $_SESSION['userLogin']['id']?>">
        <i class="fas fa-user-tie"></i>
    </a>
    <ul class="nav-dropdown">
        <li>
            <a href="information.php?id=<?php echo $_SESSION['userLogin']['id']?>">
                Hello: <?php echo $_SESSION['userLogin']['fullname']?>
            </a>
        </li>
        <li>
            <a href="<?php echo 'logout.php'?>">
                Log Out
            </a>
        </li>
    </ul>
</li>