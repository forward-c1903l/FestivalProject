<!-- CHECK USER ADMIN -->

<?php 
    require('./../lib/dbConn.php');

    function CheckUserAdmin() {
        global $conn;
        if(!isset($_SESSION['userLogin'])) {
            header('location:./../index.php');
            die();
        } else {
            $idUSer = $_SESSION['userLogin']['id'];
            $sql = "SELECT * FROM user WHERE id='$idUSer' AND id_role = 3";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 0){
                
            } else {
                header('location:./../index.php');
                die();
            }
        }
    }
?>