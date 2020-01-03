<!-- Action Page Festivals -->

<?php 
    require('dbConn.php');

    function ShowAllFestivals() {
        global $conn;
        $sql = "SELECT * FROM itemfestivals WHERE status = 1 ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function ShowFestivalsById($id) {
        global $conn;
        $sql = "SELECT * FROM itemfestivals WHERE status = 1 and id_reli = '$id' ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function CheckFestivals() {
        if(isset($_GET['f'])) {
            $idReligion = $_GET['f'];
        } else {
            $idReligion = 'all';
        }
        
        $idReligion == 'all' ? $resultF = ShowAllFestivals() : $resultF = ShowFestivalsById($idReligion);
        return $resultF;
    }
    
    function ShowFestivalNews() {
        global $conn;
        
        $sql = "SELECT * FROM itemfestivals ORDER BY id DESC LIMIT 0, 10";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function CheckIdFestivalHeader() {
        if(isset($_GET['f'])) {
            $idReligion = $_GET['f'];
        }

        global $conn;

        if(isset($idReligion)) {
            $sql = "SELECT * FROM religions WHERE id = '$idReligion'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
            if($row == 0) {
                header('location:religions.php');
            }
        }
        
    }

    function GetNameFestivalById() {
        if(isset($_GET['f'])) {
            $idReligion = $_GET['f'];
        } else {
            $idReligion = 'all';
            return 'All Festivals';
        }
        
        global $conn;
        $sql = "SELECT * FROM religions WHERE id = '$idReligion'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['name_religion'];
    }
?>