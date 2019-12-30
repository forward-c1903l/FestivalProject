<?php 
    session_start();
    require('./lib_admin/dashboard_action.php');
    require('./common/top.php');
    require('./common/bottom.php');

    Top('Dashboard', "../assets/css/dashboard.css");

    //Check Admin User Session
    require('./check_admin.php');
?>
<body>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>

    </main>
</body>


<?php 
    Bottom();
?>