<div class="container">       
    <div class="admin-festivals">
        <div class='title'>
            <h6>Add Festival</h6>
        </div>
        <div class='festivals_main'>
            <form action="">
                <div class='group'>
                    <label for="name_festival">Name: </label>
                    <input type="text" name='name_festival' id='name_festival' class='input_festival'/>
                    <span class='error' id='error_name'></span>
                </div>
                <div class='row'>
                    <div class='col-md-4 group'>
                        <label for="name_reli">Religions: </label>
                        <select name="name_reli" id="name_reli">
                    <?php 
                        $resultAllReli = SelectAllReligion();
                        while($row_all_reli = mysqli_fetch_array($resultAllReli)) {
                    ?>
                    <option value="<?php echo $row_all_reli['id']?>"><?php echo $row_all_reli['name_religion']?></option>
                    <?php }?>
                    </select>
                        <span class='error' id='error_name'></span>
                    </div>
                    <div class='col-md-8 group'>
                        <label for="date_reli" id='date'>Date: </label>
                        <select name="day" id='day'>
                            <option value=''>- Day -</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <select name="month" id='month'>
                            <option value=''>- Month -</option>
                            <option value="1">January</option>
                            <option value="2">Febuary</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="year" id='year'>
                            <option value=''>- Year -</option>
                            <option value="2040">2040</option>
                            <option value="2039">2039</option>
                            <option value="2038">2038</option>
                            <option value="2037">2037</option>
                            <option value="2036">2036</option>
                            <option value="2035">2035</option>
                            <option value="2034">2034</option>
                            <option value="2033">2033</option>
                            <option value="2032">2032</option>
                            <option value="2031">2031</option>
                            <option value="2030">2030</option>
                            <option value="2029">2029</option>
                            <option value="2028">2028</option>
                            <option value="2027">2027</option>
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                        <span class='error' id='error_date'></span>
                    </div>
                </div>
                <div class='group'>
                    <label for="place_festival">Place: </label>
                    <input type="text" name='place_festival' id='place_festival' class='input_festival'/>
                    <span class='error' id='error_place'></span>
                </div>
                <div class='group'>
                    <label for="des_festival">Describe: </label>
                    <input type="text" name='des_festival' id='des_festival' class='input_festival'/>
                    <span class='error' id='error_des'></span>
                </div>
                <div class='group'>
                    <label for="content_festival">Content: </label>
                    <textarea rows="4" cols="50" id='content_festival' name='content_festival'>
                    </textarea>
                    <span class='error' id='error_content'></span>
                </div>
                <div class='row'>
                    <div class='col-md-6 group'>
                        <label for="hightlight_fes">HightLight: </label>
                        <select name="hightlight" id="hightlight_fes">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class='col-md-6 group'>
                        <label for="best_fes">The Best: </label>
                        <select name="best" id="best_fes">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class='group'>
                    <input
                    ref='inputFile' 
                    type="file" name='img_fes' id='img_fes' class='ip_file'/> 
                    <label for="img_reli" class='lb_file'><i class="fas fa-cloud-upload-alt"></i> Upload Your Image... </label>
                    <span class='error' id='error_image'></span>
                </div>
                <button type="button" id='submit-add-fes' class='btn-admin-festival'>Add Festival</button>
            </form>
        </div>
    </div>
</div>