<?php 
    session_start();
    ob_start();
    require('./lib_admin/books_action.php');
    require('./common/top.php');
    require('./common/bottom.php');


    Top('Books Administator', "../assets/css/books_cp.css");

    //Check Admin User Session
    require('./check_admin.php');

    // Check GET URL
    $resultGet = CheckGetUrl();

?>
<body>
    <?php include('common/menu.php') ?>
    <main class='main_cp'>
        <section id='books_admin'>
            <?php 
                if($resultGet == 1) {
                    require('add_books.php');
                } else if($resultGet == 2){
                    require('detail_books.php');
                } else {
            ?>
            
            <div class="container">       
                <div class="admin-books">
                    <table>
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Inventory</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $resultAllBook = AllBooks();
                                while($row_all = mysqli_fetch_array($resultAllBook)) {
                                    $row_all['status'] == 0 ? $status = 'No Active': $status = 'Active';
                                    $row_all['status'] == 0 ? $class = 'no-active': $class = 'active';
                                    $resultBookCategory = BookOfCategory($row_all['id_category']);
                                    $row_book_cate = mysqli_fetch_assoc($resultBookCategory);
                            ?>
                            <tr class='item-books'>
                                <td>
                                    <input type="checkbox" name='items' value='<?php echo $row_all['id']?>'>
                                </td>
                                <td>
                                    <a href="books.php?ac=detail&id=<?php echo $row_all['id']?>">
                                        <img class="img-fluid" src="../<?php echo $row_all['avata_book']?>" 
                                        alt="<?php echo $row_all['name_book']?>">
                                    </a>
                                </td>
                                <td class='name'> 
                                    <a href="books.php?ac=detail&id=<?php echo $row_all['id']?>" class='name-books'><?php echo $row_all['name_book']?></a>
                                </td>
                                <td> 
                                    <a href="book-category.php?ac=edit&id=<?php echo $row_book_cate['id']?>#edit" class='name-book-cate'><?php echo $row_book_cate['name_book_cate']?></a>
                                </td>
                                <td> 
                                    <span class='price-books'><?php echo number_format($row_all['price_book'],0,",",".")?></span>
                                </td>
                                <td class='inventory'> 
                                    <span class='inventory-book'><?php echo $row_all['inventory']?></span>
                                </td>
                                <td>
                                    <span class='stt-book <?php echo $class?>'>
                                        <?php echo $status?>
                                    </span>    
                                </td>
                                <td>
                                    <a href="books.php?ac=detail&id=<?php echo $row_all['id']?>"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php }?>

                        </tbody>
                    </table>
                    <div class='action'>
                        <div class='select-all'>
                            <span><i class="fas fa-level-up-alt arrow"></i></span>
                            <input type="checkbox" name='select_all'>
                            <span>Select All</span>
                        </div>
                        <div class='delete'>
                            <button type='button' name='delete_books'><i class="far fa-trash-alt"></i></button>
                            <span>Delete</span>
                        </div>
                    </div>
                </div>
            </div>



            <?php }?>
        </section>
    </main>
</body>

<?php 
    Bottom("../assets/js/admin/books_cp.js");
?>