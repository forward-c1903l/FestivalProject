<?php 
    session_start();
    ob_start();
    require('./lib_admin/book_cate_action.php');
    require('./common/top.php');
    require('./common/bottom.php');

    Top('Book Category Administator', "../assets/css/book_cate_cp.css");

    //Check Admin User Session
    require('./check_admin.php');

    // Check GET URL
    $resultGet = CheckGetUrl();
?>
<body>
    <?php include('common/header.php') ?>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>
        <section class='book_cate'>
            <div class="container">       
                <section class="admin-all-book-cate">
                    <div class='row'>
                        <div class='col-lg-6 block_book_cate'>
                            <div class='add_book_cate'>
                                <div class='title'>
                                    <h6>Add Category Book</h6>
                                </div>
                                <div class='add_main'>
                                    <form action="">
                                        <div class='group'>
                                            <label for="name_book_cate">Name: </label>
                                            <input type="text" name='name_book_cate' id='name_book_cate' class='input_book'/>
                                            <span class='error' id='error_name'></span>
                                        </div>
                                        <button type="button" id='submit-add-book-cate' class='btn-admin-book-cate'>Add Book Category</button>
                                    </form>
                                </div>
                            </div>
                            <?php 
                                if($resultGet == 1) include('edit_book_cate.php');;
                            ?>
                        </div>
                        <div class='col-lg-6 block_book_cate'>
                            <div class='all_book_cate'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $resultAllBookCate = AllBookCategory();
                                            if(is_object($resultAllBookCate)) {
                                                while($row_all = mysqli_fetch_array($resultAllBookCate)) {
                                        ?>
                                        <tr>
                                            <td> 
                                                <a href="book-category.php?ac=edit&id=<?php echo $row_all['id']?>#edit"><?php echo $row_all['name_book_cate']?></a>
                                            </td>
                                            <td>
                                                <span class='stt-religion'>
                                                    <?php echo $row_all['status'] == 1 ? "Active": 'No Active'?>
                                                </span>    
                                            </td>
                                            <td>
                                                <a href="book-category.php?ac=edit&id=<?php echo $row_all['id']?>#edit"><i class="far fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>
</body>
<?php 
    Bottom("../assets/js/admin/book_cate_cp.js");
?>