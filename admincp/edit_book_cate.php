<?php 
    ob_start();
    $check = CheckActionEditId();
    if(!$check){
        header('location:book-category.php');
        die();
    } else {
        $row = mysqli_fetch_assoc($check);
        //Save Session ID Religion Edit
        $_SESSION['ad_id_book_cate_edit'] = $row['id'];
?>

<div class='edit_book_cate' id='edit'>
    <div class='title'>
        <h6>Edit Book Category</h6>
    </div>
    <div class='book_cate_main edit_main'>
        <form action="">
            <div class='group'>
                <label for="name_reli">Name Book Category: </label>
                <input type="text" name='name_book_cate_edit' id='name_book_cate_edit' value='<?php echo $row['name_book_cate']?>' class='input_book'/>
                <span class='error_edit' id='error_name_edit'></span>
            </div>
            <div class='group'>
                <label for="status_book_cate_edit">Status: </label>
                <select name="status_book_cate_edit" id='status_book_cate_edit'>
                    <?php 
                        if($row['status'] == 0) {
                    ?>
                        <option value="0">No Active</option>
                        <option value="1">Active</option>
                    <?php } else {?>
                        <option value="1">Active</option>
                        <option value="0">No Active</option>
                    <?php }?>
                </select>
                <span class='error_edit' id='error_stt_edit'></span>
                <button type="button" id='submit-edit-book-cate' class='btn-admin-book-cate btn-edit-margin'>Edit Book Category</button>
            </div>
        </form>
        <div class='delete_main'>
            <div class='title-delete'>
                <span>If you want to delete this book category, please click below!</span>
            </div>
            <div class='delete-book-cate'>
                <button type='button' id='btn-delete-book-cate' class='btn-admin-book-cate btn-admin-delete' style='width: 100%'>Delete</button>
            </div>
            <div class='pop-up-delete'>
                <div class='title-pop-up'>
                    <span>Are you sure you delete this book category ?</span>
                </div>
                <div class='pop-up-main'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <button type='button' id='yes-delete' class='btn-admin-religion btn-popup'>Yes</button>
                        </div>
                        <div class='col-md-6'>
                            <button type='button' id='no-delete' class='btn-admin-religion btn-popup'>No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>