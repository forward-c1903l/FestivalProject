<?php 
    $fullname = $_SESSION['userLogin']['fullname'];
?>
<header id='header_admin'>
    <div class='container'>
        <div class='header_block'>
            <div class='header_group index'>
                <a href="./../index.php"><i class="fas fa-home"></i> Back to the client page</a>
            </div>
            <div class='header_group user'>
                <a href="./../information.php"><i class="fas fa-user-cog"></i> <?php echo $fullname?></a>
            </div>
            <div class='header_group'>
                <a href="./../logout.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
            </div>
        </div>
    </div>
</header>