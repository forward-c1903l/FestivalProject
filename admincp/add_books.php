<div class="container">       
    <div class="admin-books">
        <div class='title'>
            <h6>Add Books</h6>
        </div>
        <div class='books_main'>
            <form action="">
                <div class='row'>
                    <div class='col-md-8 group'>
                        <label for="name_books">Name: </label>
                        <input type="text" name='name_books' id='name_books' class='input_books'/>
                        <span class='error' id='error_name'></span>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="name_category">Category: </label>
                        <select name="name_category" id="name_category">
                    <?php 
                        $resultAllCate = SelectAllCategory();
                        while($row_all_cate = mysqli_fetch_array($resultAllCate)) {
                    ?>
                    <option value="<?php echo $row_all_cate['id']?>"><?php echo $row_all_cate['name_book_cate']?></option>
                    <?php }?>
                    </select>
                        <span class='error' id='error_name'></span>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-8 group'>
                        <label for="author">Author: </label>
                        <input type="text" name='author' id='author' class='input_books'/>
                        <span class='error' id='error_author'></span>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="price">Price: </label>
                        <input type="text" name='price' id='price' class='input_books'/>
                        <span class='error' id='error_price'></span>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-8 group'>
                        <label for="describle">Describle: </label>
                        <input type="text" name='describle' id='describle' class='input_books'/>
                        <span class='error' id='error_des'></span>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="inventory">Inventory: </label>
                        <input type="text" name='inventory' id='inventory' class='input_books'/>
                        <span class='error' id='error_inventory'></span>
                    </div>
                </div>
                <div class='group'>
                    <label for="content_books">Content: </label>
                    <textarea rows="4" cols="50" id='content_books' name='content_books'>
                    </textarea>
                    <span class='error' id='error_content'></span>
                </div>
                <div class='group'>
                    <input
                    ref='inputFile' 
                    type="file" name='img_books' id='img_books' class='ip_file'/> 
                    <label for="img_reli" class='lb_file'><i class="fas fa-cloud-upload-alt"></i> Upload Your Image... </label>
                    <span class='error' id='error_image'></span>
                </div>
                <button type="button" id='submit-add-books' class='btn-admin-books'>Add Book</button>
            </form>
        </div>
    </div>
</div>