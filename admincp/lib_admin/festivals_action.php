<?php 
    require('./../lib/dbConn.php');

    function CheckGetUrlFes(){
        if(isset($_GET['ac'])) {
            $action = $_GET['ac'];
            if($action == 'add') {
                return 1;// Add Festival
            } else if($action == 'detail'){
                return 2;// Detail Festival
            }
        } else {
            return 0; //All festivals
        }
    }

    function AllFestivals() {
        global $conn;
        $sql = "SELECT * FROM itemfestivals ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
        mysqli_close($conn);
    }

    function FestivalOfReligion($idReli) {
        global $conn;
        $sql = "SELECT id, name_religion FROM religions WHERE id='$idReli'";
        $result = mysqli_query($conn, $sql);
        return $result;
        mysqli_close($conn);
    }

    function SelectAllReligion($select = 'all') {
        global $conn;
        if($select == 'all') {
            $sql = "SELECT id, name_religion FROM religions";
            $result = mysqli_query($conn, $sql);
            return $result;
        } else {
            $sql = "SELECT id, name_religion FROM religions WHERE id != '$select'";
            $result = mysqli_query($conn, $sql);
            return $result;
        }
        mysqli_close($conn);
    }

    function CheckIdReligion($id) {
        global $conn;
        $sql = "SELECT * FROM religions WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            return false;
        } else return true;
    }

    function AddFestivals($name, $idReli, $date, $place, $des, $content, $hightlight, $best) {
        global $conn;

        //Get user login
        $id_user = $_SESSION['userLogin']['id'];

        $sql = "INSERT INTO itemfestivals 
            (id_reli, name_festival, date_of_the_festival, place_festival, des_festival, content_festival, highlight, the_best, id_user)
            values 
            ('$idReli', '$name', '$date', '$place', '$des', '$content', '$hightlight', '$best', '$id_user')";
        $result = mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }

    function AddImageFestival($ex, $id_reli, $id) {
        global $conn;
        $url = 'upload/religions/'.$id_reli.'/'.$id.'/'.$id.'.'.$ex;

        $sql = "UPDATE itemfestivals SET avata_festival= '$url' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function DeleteFestival($arr) {
        global $conn;

        $error = '';
        foreach($arr as $key=> $value) {
            $sql = "SELECT id, id_reli FROM itemfestivals WHERE id='$value'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 0) {

            } else {
                $row = mysqli_fetch_assoc($result);
               //delete folder
                $dir_religion = './../upload/religions/'.$row['id_reli'];
                if(is_dir($dir_religion)) {
                    $dir_fes = './../upload/religions/'.$row['id_reli'].'/'.$row['id'];
                    if(is_dir($dir_fes)) {

                        //remove file before delete folder
                        foreach(scandir($dir_fes) as $file) {
                            if ('.' === $file || '..' === $file) continue;
                            if (is_dir("$dir_fes/$file")) rmdir_recursive("$dir_fes/$file");
                            else unlink("$dir_fes/$file");
                        }
                        rmdir($dir_fes);
                    } 
                } 
            }
        }

        foreach($arr as $key=> $value) {
            $sql = "DELETE FROM itemfestivals WHERE id='$value'";
            $result = mysqli_query($conn, $sql);
        }

        return "Success Delete";
        mysqli_close($conn);

    }

    function CheckIdFestivalGet() {
        global $conn;
        if(isset($_GET['ac']) && $_GET['ac'] == 'detail' && isset($_GET['id'])) {
            $sql = "SELECT * FROM itemfestivals WHERE id={$_GET['id']}";
            $result = mysqli_query($conn, $sql);
            
            return mysqli_num_rows($result) == 0 ?  false : $result;
        }
    }

    function ReligionOfFestival($id_reli) {
        global $conn;
        $sql = "SELECT name_religion FROM religions WHERE id='$id_reli'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function UpdateFestivals($id, $name, $idReli, $date, $place, $des, $content, $hightlight, $best, $stt) {
        global $conn;

        $sql = "UPDATE itemfestivals SET 
                                        name_festival = '$name',
                                        id_reli = '$idReli',
                                        date_of_the_festival = '$date',
                                        place_festival = '$place',
                                        des_festival = '$des',
                                        content_festival = '$content',
                                        highlight = '$hightlight',
                                        the_best = '$best',
                                        status = '$stt'
                                        WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        //Result url image
        $sql = "SELECT avata_festival FROM itemfestivals WHERE id='$id'";
        $result_img = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result_img);
        return $row['avata_festival'];
    }

    function GetFestivalOld($id) {
        global $conn;
        $sql = "SELECT id_reli, content_festival FROM itemfestivals WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function UpdateUrlImg($id, $url) {
        global $conn;
        $sql = "UPDATE itemfestivals SET avata_festival = '$url' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
    }
?>