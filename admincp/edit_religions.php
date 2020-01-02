<?php 
    ob_start();
    $check = CheckActionEditId();
    if(!$check){
        header('location:religions.php');
        die();
    } else {
        $row = mysqli_fetch_assoc($check);
        //Save Session ID Religion Edit
        $_SESSION['ad_id_religion_edit'] = $row['id'];

?>

<div class="container">       
    <section class="admin-all-religions block-religions">
        <div class='title'>
            <h6>Edit Religion</h6>
        </div>
        <div class='religion_main edit_main'>
            <div class='row'>
                <div class='col-7'>
                    <form action="">
                        <div class='group'>
                            <label for="name_reli">Name: </label>
                            <input type="text" name='name_religion_edit' id='name_reli_edit' value='<?php echo $row['name_religion']?>' class='input_religions'/>
                            <span class='error' id='error_name_edit'></span>
                        </div>
                        <div class='group'>
                            <label for="status_reli_edit">Status: </label>
                            <select name="status_reli_edit" id='status_reli_edit'>
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
                            <span class='error' id='error_stt_edit'></span>
                        </div>
                        <button type="button" id='submit-edit-reli' class='btn-admin-religion'>Edit Religion</button>
                    </form>
                </div>
                <div class='col-5'>
                    <div class='image-reli-edit'>
                        <img src="./../<?php echo $row['avata_religion']?>">
                    </div>
                    <div class='group'>
                        <input
                        ref='inputFile' 
                        type="file" name='img_religion_edit' id='img_reli_edit' class='ip_file'/> 
                        <label for="img_reli_edit" class='lb_file'><i class="fas fa-cloud-upload-alt"></i> Upload Your Image: </label>
                        <span class='error' id='error_image_edit'></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='delete_main'>
            <div class='title-delete'>
                <span>If you want to delete this religion, please click below!</span>
            </div>
            <div class='delete-religion'>
                <button type='button' id='btn-delete-religion' class='btn-admin-religion btn-admin-delete'>Delete</button>
            </div>
            <div class='pop-up-delete'>
                <div class='title-pop-up'>
                    <span>Are you sure you delete this religion ?</span>
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

    </section>
</div>
<?php }?>