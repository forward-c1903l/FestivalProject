<?php 
    //Check out the existence of the festival
    $result_books = CheckIdBookGet();

    if($result_books == false) {
        header('location:books.php');
        die();
    }

    $row_books = mysqli_fetch_assoc($result_books);

    // SAVE SESSION books CURRENT
    $_SESSION['books_current'] = $row_books['id'];
?>

<div class="container">       
    <div class="admin-books">
        <div class='title'>
            <h6>Detail Books</h6>
        </div>
        <div class='books_main'>
            <form action="">
                <div class='row'>
                    <div class='col-md-8 group'>
                        <label for="name_books">Name: </label>
                        <input type="text" name='name_books' id='name_books' class='input_books' value='<?php echo $row_books['name_book']?>'/>
                        <span class='error' id='error_name'></span>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="name_category">Category: </label>
                        <select name="name_category" id="name_category">
                        <?php 
                            $resultCategory = CategoryOfBook($row_books['id_category']);
                            $row_category_book = mysqli_fetch_assoc($resultCategory);
                        ?>
                        <option value="<?php echo $row_books['id_category']?>"><?php echo $row_category_book['name_book_cate']?></option>
                        <?php 
                            $resultAllCategory = SelectAllCategory($row_books['id_category']);
                            while($row_all_category = mysqli_fetch_array($resultAllCategory)) {
                        ?>
                        <option value="<?php echo $row_all_category['id']?>"><?php echo $row_all_category['name_book_cate']?></option>
                        <?php }?>
                        </select>
                        <span class='error' id='error_name'></span>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-8 group'>
                        <label for="author">Author: </label>
                        <input type="text" name='author' id='author' class='input_books' value='<?php echo $row_books['author']?>'/>
                        <span class='error' id='error_author'></span>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="price">Price: </label>
                        <input type="text" name='price' id='price' class='input_books' value='<?php echo $row_books['price_book']?>'/>
                        <span class='error' id='error_price'></span>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-8 group'>
                        <label for="describle">Describle: </label>
                        <input type="text" name='describle' id='describle' class='input_books' value='<?php echo $row_books['des_book']?>'/>
                        <span class='error' id='error_des'></span>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="inventory">Inventory: </label>
                        <input type="text" name='inventory' id='inventory' class='input_books' value='<?php echo $row_books['inventory']?>'/>
                        <span class='error' id='error_inventory'></span>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4 group'>
                        <span class='ex'>Date Posted: </span>
                        <span id='date_posted'><?php echo $row_books['date_posted']?></span>
                    </div>
                    <div class='col-md-4 group'>
                        <span class='ex'>User Posted: </span>
                        <?php 
                            $resultUser = UserPosted($row_books['id_user']);
                            $row_user = mysqli_fetch_assoc($resultUser);
                        ?>
                        <span id='user_post'><?php echo $row_user['fullname']?></span>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="stt_fes">Status: </label>
                        <select name="best" id="stt_book">
                            <?php 
                                if($row_books['status'] == 0) {
                            ?>
                            <option value="0">No Active</option>
                            <option value="1">Active</option>
                            <?php } else {?>
                            <option value="1">Active</option>
                            <option value="0">No Active</option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class='group'>
                    <label for="content_books">Content: </label>
                    <textarea rows="4" cols="50" id='content_books' name='content_books'>
                        <?php echo $row_books['content_book']?>
                    </textarea>
                    <span class='error' id='error_content'></span>
                </div>
                <div class='row align-items-center'>
                    <div class='col-md-6 group'>
                        <input
                        ref='inputFile' 
                        type="file" name='img_books' id='img_books' class='ip_file'/> 
                        <label for="img_reli" class='lb_file'><i class="fas fa-cloud-upload-alt"></i> Upload Your Image... </label>
                        <span class='error' id='error_image'></span>
                    </div>
                    <div class='col-md-6 image_book'>
                        <img src="./../<?php echo $row_books['avata_book']?>">
                    </div>
                </div>
                <button type="button" id='submit-edit-books' class='btn-admin-books'>Edit Book</button>
            </form>
        </div>
    </div>
</div>