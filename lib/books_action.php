<!-- Action Page Books -->

<?php 
    require('dbConn.php');

    function CheckIdBook() {
        if(isset($_GET['b'])) {
            $idBook = $_GET['b'];
        } else {
            $idBook = '';
        }
        return $idBook;
    }

    function CheckIdBookHeader() {
        $idBookReceive = CheckIdBook();
        global $conn;

        $sqlCheckIdIntoDB = "SELECT * FROM books WHERE id = '$idBookReceive'";
        $result = mysqli_query($conn, $sqlCheckIdIntoDB);
        $row = mysqli_num_rows($result);
        if($row == 0) {
            header('location:bookstore.php');
        }
    }

    function Books() {
        $idBook = $_GET['b'];

        global $conn;

        $sqlBook = "SELECT * FROM books WHERE id = '$idBook'";
        $result = mysqli_query($conn, $sqlBook);
        return $result;

    }
?>