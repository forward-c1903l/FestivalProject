<!-- Action Page Festivals -->

<?php 
    require('dbConn.php');

    function CheckIdFestivalGet() {
        if(isset($_GET['p'])) {
            $idFestival = $_GET['p'];
        } else {
            $idFestival = '';
        }
        return $idFestival;
    }

    function CheckFestivalById() {
        $idFestivalReceive = CheckIdFestivalGet();
        global $conn;

        $sqlCheckIdIntoDB = "SELECT * FROM itemfestivals WHERE id = '$idFestivalReceive' AND status = 1";
        $result = mysqli_query($conn, $sqlCheckIdIntoDB);
        $row = mysqli_num_rows($result);
        if($row == 0) {
            header('location:religions.php');
        }
    }

    function Festival() {
        global $conn;

        $id = CheckIdFestivalGet();

        $sql = "SELECT * FROM itemfestivals WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function SimilarFestivals8() {
        global $conn;
        $result = Festival();

        $rowFestival = mysqli_fetch_assoc($result);
        $idReli = $rowFestival['id_reli'];

        $sqlIdReli = "SELECT * FROM itemfestivals WHERE id_reli = '$idReli' ORDER BY id LIMIT 0, 8";
        $resultIdReli = mysqli_query($conn, $sqlIdReli);
        return $resultIdReli;
    }
?>