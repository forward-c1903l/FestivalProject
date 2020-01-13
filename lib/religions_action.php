<!-- Action Page Festivals -->

<?php 
    require('dbConn.php');

    function ShowAllFestivals($page) {
        $offset = $page*5;
        global $conn;
        $sql = "SELECT * FROM itemfestivals WHERE status = 1 ORDER BY id DESC LIMIT $offset, 5";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function ShowFestivalsById($id, $page) {
        $offset = $page*5;
        global $conn;
        $sql = "SELECT * FROM itemfestivals WHERE status = 1 and id_reli = '$id' ORDER BY id DESC LIMIT $offset, 5";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function CheckPageFestivals() {
        return isset($_GET['page']) ? $_GET['page'] - 1 : 0 ;
    }

    function CheckFestivals($page) {
        if(isset($_GET['f'])) {
            $idReligion = $_GET['f'];
        } else {
            $idReligion = 'all';
        }
        
        $_SESSION['religion_user'] = $idReligion;

        $idReligion == 'all' ? $resultF = ShowAllFestivals($page) : $resultF = ShowFestivalsById($idReligion, $page);
        return $resultF;
    }
    
    function ShowFestivalNews() {
        global $conn;
        
        $sql = "SELECT * FROM itemfestivals WHERE status = 1 ORDER BY id DESC LIMIT 0, 10";
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
                die();
            } else {
                return $idReligion;
            }
        }
        
    }

    function CountPages($id) {
        global $conn;
        $sql_default = "SELECT count(*) as total FROM itemfestivals";
        $sql = $id == null 
                ? "SELECT count(*) as total FROM itemfestivals" 
                :"SELECT count(*) as total FROM itemfestivals WHERE id_reli='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
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