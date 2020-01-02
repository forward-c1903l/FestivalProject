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
        $sql = "SELECT * FROM itemfestivals";
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

    function SelectAllReligion() {
        global $conn;
        $sql = "SELECT id, name_religion FROM religions";
        $result = mysqli_query($conn, $sql);
        return $result;
        mysqli_close($conn);
    }

    function CheckIdReligion($id) {
        global $conn;
        $sql = "SELECT * FROM religions WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            return false;
        } else return true;
        mysqli_close($conn);
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
        mysqli_close($conn);
    }

    function AddImageFestival($ex, $id_reli, $id) {
        global $conn;
        $url = 'upload/religions/'.$id_reli.'/'.$id.'/'.$id.'.'.$ex;

        $sql = "UPDATE itemfestivals SET avata_festival= '$url' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
?>