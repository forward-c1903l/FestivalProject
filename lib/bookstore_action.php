<!-- Action Page BookStore -->

<?php 
    require('dbConn.php');

    function ShowBookById($id) {
        global $conn;
        $sql = "SELECT * FROM books WHERE status = 1 and id_category = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function ShowAllBooks() {
        global $conn;
        $sql = "SELECT * FROM books WHERE status = 1";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function CheckBooks() {
        if(isset($_GET['b'])) {
            $idBookCategory = $_GET['b'];
        } else {
            $idBookCategory = 'all';
        }
        
        $idBookCategory == 'all' ? $resultB = ShowAllBooks() : $resultB = ShowBookById($idBookCategory);
        return $resultB;
    }

    function CheckIdBookHeader() {
        if(isset($_GET['b'])) {
            $idBookCategory = $_GET['b'];
        }

        global $conn;

        if(isset($idBookCategory)) {
            $sql = "SELECT * FROM book_category WHERE id = '$idBookCategory'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
            if($row == 0) {
                header('location:bookstore.php');
            }
        }
        
    }

    function GetNameBookCategoryById() {
        if(isset($_GET['b'])) {
            $idBookCategory = $_GET['b'];
        } else {
            $idBookCategory = 'all';
            return 'All Festivals';
        }
        
        global $conn;
        $sql = "SELECT * FROM book_category WHERE id = '$idBookCategory'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['name_book_cate'];
    }
?>