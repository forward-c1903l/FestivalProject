<?php 
    //check admin.vi da require o moi trang nen khong can require
    $check_admin = CheckAdmin();
    
    require('./lib_admin/menu_action.php');
    $check_invoice = CheckTotalInvoiceAdminCheck();
?>

<nav class="container-menu-dashboard">
    <div class="logo-menu">
        <div class="nav-logo">
            <img class="img-fluid" src="./../upload/images/logo.png" alt="logo navbar" width="110px">
        </div>
    </div>
    <div class="content-nav-dashboard-menu">
        <div class="name-nav-menu">Menu</div>
        <div class="title-name-menu">
            <div class="wrap-title-nav">
                <div class="main-name-nav">
                    <a href="#">Dashboard</a> 
                </div>
            </div>
        </div>
        <div class="title-name-menu">
            <div class="wrap-title-nav">
                <div data-id="1" class="main-name-nav">
                    <a href="#">Religions</a> 
                    <div  class="toggle-click"><i class="fas fa-angle-right"></i></div>
                </div>
                <div class="child-menu-nav">
                    <div class="child-nav"><a href="religions.php">All Religions</a></div>
                    <div class="child-nav"><a href="religions.php?ac=add">Add Religions</a></div>
                </div>
            </div>
            <div class="wrap-title-nav">
                <div data-id="2" class="main-name-nav">
                    <a href="#">Festivals</a> 
                    <div  class="toggle-click"><i class="fas fa-angle-right"></i></div>
                </div>
                <div class="child-menu-nav">
                    <div class="child-nav"><a href="festivals.php">All Festivals</a></div>
                    <div class="child-nav"><a href="festivals.php?ac=add">Add Festivals</a></div>
                </div>
            </div>
            <div class="wrap-title-nav">
                <div data-id="3" class="main-name-nav">
                    <a href="#">Books</a> 
                    <div  class="toggle-click"><i class="fas fa-angle-right"></i></div>
                </div>
                <div class="child-menu-nav">
                    <div class="child-nav"><a href="book-category.php">Category Book</a></div>
                    <div class="child-nav"><a href="books.php">All Books</a></div>
                    <div class="child-nav"><a href="books.php?ac=add">Add Books</a></div>
                </div>
            </div>
            <div class="wrap-title-nav">
                <div data-id="4" class="main-name-nav">
                    <a href="#">Invoices</a> 
                    <div  class="toggle-click"><i class="fas fa-angle-right"></i></div>
                </div>
                <div class="child-menu-nav">
                    <div class="child-nav"><a href="invoice.php">All Invoice</a></div>
                </div>
                <?php 
                    if($check_invoice != 0) {
                ?>
                    <div class='total-invoice'>
                        <span><?php echo $check_invoice?></span>
                    </div>
                    <?php }?>
            </div>
            <div class="wrap-title-nav">
                <div data-id="5" class="main-name-nav">
                    <a href="#">FeedBack</a> 
                    <div  class="toggle-click"><i class="fas fa-angle-right"></i></div>
                </div>
                <div class="child-menu-nav">
                    <div class="child-nav"><a href="feedback.php">All Feedback</a></div>
                </div>
            </div>
            <?php if($check_admin) {?>
            <div class="wrap-title-nav">
                <div data-id="6" class="main-name-nav">
                    <a href="#">User and Staff</a> 
                    <div  class="toggle-click"><i class="fas fa-angle-right"></i></div>
                </div>
                <div class="child-menu-nav">
                    <div class="child-nav"><a href="user.php">All User</a></div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</nav>
