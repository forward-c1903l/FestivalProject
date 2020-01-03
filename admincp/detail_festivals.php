<?php 
    //Check out the existence of the festival
    $result_festival = CheckIdFestivalGet();

    if($result_festival == false) {
        header('location:festivals.php');
        die();
    }

    $row_fes = mysqli_fetch_assoc($result_festival);

    // SAVE SESSION FESTIVAL CURRENT
    $_SESSION['festival_current'] = $row_fes['id'];
?>

<div class="container">       
    <div class="admin-festivals detail-festivals">
        <div class='title'>
            <h6>Detail Festival</h6>
        </div>
        <div class='festivals_main'>
            <form action="">
                <div class='group'>
                    <label for="name_festival">Name: </label>
                    <input type="text" name='name_festival' id='name_festival' class='input_festival' value='<?php echo $row_fes['name_festival']?>'/>
                    <span class='error' id='error_name'></span>
                </div>
                <div class='row'>
                    <div class='col-md-4 group'>
                        <label for="name_reli">Religions: </label>
                        <select name="name_reli" id="name_reli">
                        <?php 
                            $resultReliFes = ReligionOfFestival($row_fes['id_reli']);
                            $row_reli_fes = mysqli_fetch_assoc($resultReliFes);
                        ?>
                        <option value="<?php echo $row_fes['id_reli']?>"><?php echo $row_reli_fes['name_religion']?></option>
                    <?php 
                        $resultAllReli = SelectAllReligion($row_fes['id_reli']);
                        while($row_all_reli = mysqli_fetch_array($resultAllReli)) {
                    ?>
                    <option value="<?php echo $row_all_reli['id']?>"><?php echo $row_all_reli['name_religion']?></option>
                    <?php }?>
                    </select>
                        <span class='error' id='error_name'></span>
                    </div>
                    <div class='col-md-8 group'>
                        <label for="date_reli" id='date'>Date: </label>

                        <?php 
                            $date = explode('-', $row_fes['date_of_the_festival']);
                            $day = (int)$date[2];
                            $month = (int)$date[1];
                            $year = (int)$date[0];
                        ?>


                        <select name="day" id='day'>
                            <option value='<?php echo $day?>'><?php echo $day?></option>
                            <option value=''>- Day -</option>

                        <?php for($i = 1; $i <= 31; $i++) {
                            if($i !== $day) {
                        ?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>

                        <?php }}?>

                        </select>


                        <select name="month" id='month'>
                            <option value='<?php echo $month?>'><?php echo $month?></option>
                            <option value=''>- Month -</option>
                            <?php for($i = 1; $i <= 12; $i++) {
                                if($i !== $month) {
                            ?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>

                            <?php }}?>

                        </select>


                        <select name="year" id='year'>
                            <option value='<?php echo $year?>'><?php echo $year?></option>
                            <option value=''>- Year -</option>
                            <?php for($i = 2019; $i <= 2040; $i++) {
                                if($i !== $year) {
                            ?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>

                            <?php }}?>
                        </select>

                        <span class='error' id='error_date'></span>
                    </div>
                </div>

                <div class='group'>
                    <label for="place_festival">Place: </label>
                    <input type="text" name='place_festival' id='place_festival' class='input_festival' value='<?php echo $row_fes['place_festival']?>'/>
                    <span class='error' id='error_place'></span>
                </div>
                <div class='group'>
                    <label for="des_festival">Describle: </label>
                    <input type="text" name='des_festival' id='des_festival' class='input_festival' value='<?php echo $row_fes['des_festival']?>'/>
                    <span class='error' id='error_des'></span>
                </div>
                <div class='group'>
                    <label for="content_festival">Content: </label>
                    <textarea rows="4" cols="50" id='content_festival' name='content_festival' value='<?php echo $row_fes['content_festival']?>'>
                        <?php echo $row_fes['content_festival']?>
                    </textarea>
                    <span class='error' id='error_content'></span>
                </div>
                <div class='row'>
                    <div class='col-md-4 group'>
                        <label for="hightlight_fes">HightLight: </label>
                        <select name="hightlight" id="hightlight_fes">
                            <?php 
                                if($row_fes['highlight'] == 0) {
                            ?>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                            <?php } else {?>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="best_fes">The Best: </label>
                        <select name="best" id="best_fes">
                            <?php 
                                if($row_fes['the_best'] == 0) {
                            ?>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                            <?php } else {?>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class='col-md-4 group'>
                        <label for="stt_fes">Status: </label>
                        <select name="best" id="stt_fes">
                            <?php 
                                if($row_fes['status'] == 0) {
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
                <div class='row align-items-center'>
                    <div class='col-md-6 group'>
                        <input
                        ref='inputFile' 
                        type="file" name='img_fes' id='img_fes' class='ip_file'/> 
                        <label for="img_reli" class='lb_file'><i class="fas fa-cloud-upload-alt"></i> Update Image... </label>
                        <span class='error' id='error_image'></span>
                    </div>
                    <div class='col-md-6 image-festival'>
                        <img src="<?php echo './../'.$row_fes['avata_festival']?>" alt="">
                    </div>
                </div>
                <button type="button" id='submit-edit-fes' class='btn-admin-festival btn-edit'>Update Festival</button>
            </form>
        </div>
    </div>
</div>