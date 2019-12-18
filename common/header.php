<?php 
    require('./lib/header_action.php');

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-bg">
        <a class="navbar-brand" href="#"><img class="img-fluid logonav" src="./upload/images/logo.png" width="180px" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <?php 
                    $resultMenu = Category();
                    while($row_menu = mysqli_fetch_array($resultMenu)) {
                ?>
                        <li class="nav-item festival-nav">
                            <a class="nav-link" href="<?php echo $row_menu['link_cate']?>"><?php echo $row_menu['name_cate']?></a>
                            <?php 
                                $resultChildren = GetCategoryChildren($row_menu['id']);
                                if(is_object($resultChildren)) {
                            ?>
                                <ul class="nav-dropdown">
                                    <?php 
                                        while($row_MenuChild = mysqli_fetch_array($resultChildren)){
                                    ?>
                                        <li>
                                            <a href="<?php echo $row_MenuChild['link_cate']?>">
                                                <?php echo $row_MenuChild['name_cate']?>
                                            </a>
                                        </li>
                                    <?php }?>
                                </ul>
                            <?php }?>

                        </li>
        
                <?php }?>

            </ul>
        </div>
    </nav>
</header>