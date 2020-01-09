<?php 
    require('./../lib/dbConn.php');

    function CheckGetUrl(){
        if(isset($_GET['ac'])) {
            $action = $_GET['ac'];
            if($action == 'edit') {
                return 1;// Edit book category
            } else {
                return 0; //All book category
            }
        }
    }

    function AllBookCategory() {
        global $conn;
        $sql = "SELECT * FROM book_category ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        return mysqli_num_rows($result) == 0 ? 0 : $result;
        mysqli_close($conn);
    }

    function AddBookCate($name) {
        global $conn;

        // Check Name Book Cate
        $sql = "SELECT * FROM book_category WHERE name_book_cate = '$name'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo "This Book Category Name already exists!";
            die();
        }

        //Add Name Book Category
        $sql = "INSERT INTO book_category (name_book_cate, id_cate_book_category) values ('$name', 3)";
        $result = mysqli_query($conn, $sql);

        //return id 
        return mysqli_insert_id($conn);
        mysqli_close($conn);
    }

    function AddBookCategoryDB($name, $id) {
        global $conn;
        $pathLink = 'bookstore.php?b='.$id;

        $sql = "INSERT INTO category (name_cate, link_cate, id_parent) values ('$name', '$pathLink', 3)";
        $result = mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
        mysqli_close($conn);
    }

    function UpdateIdCateBook($id, $id_cate) {
        global $conn;
        $sql = "UPDATE book_category SET id_cate_book_category = '$id_cate' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function CheckActionEditId() {
        global $conn;
        if(!isset($_GET['id'])) {
            return false;
        } else {
            if($_GET['id'] == 0) {
                return false;
            } else {
                $id = $_GET['id'];
                // check id in db
                $sql = "SELECT * FROM book_category WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) == 0){
                    return false;
                } else {
                    return $result;
                }
            }
        }
        mysqli_close($conn);
    }

    function UpdateNameStt($id, $name, $stt){
        global $conn;
        // Check Name Book Category
        //neu name new va id co trong database => chi thay doi stt
        $sql = "SELECT * FROM book_category WHERE name_book_cate = '$name' AND id='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            //update stt
            $sql = "UPDATE book_category SET status='$stt' WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
        } else {
            //check name new co trong database chua 
            $sql = "SELECT * FROM book_category WHERE name_book_cate = '$name'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                echo "This book category name already exists!";
                die();
            } else {
                $sql = "UPDATE book_category SET name_book_cate='$name', status='$stt' WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
            }
        }

        $sql = "UPDATE book_category SET name_book_cate='$name', status='$stt' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        // Get Id Category of the book category
        $sql = "SELECT id_cate_book_category FROM book_category WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row_result = mysqli_fetch_assoc($result);


        // Update Name & STT Category
        $sql = "UPDATE category SET name_cate='$name', status_cate='$stt' WHERE id={$row_result['id_cate_book_category']}";
        $result = mysqli_query($conn, $sql);
        
        mysqli_close($conn);
    }

    function DeleteBookCategory($id) {
        global $conn;

        //get id_cate_book_category
        $sql = "SELECT id_cate_book_category FROM book_category WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row_id_cate = mysqli_fetch_assoc($result);

        //delete book category
        $sql = "DELETE FROM book_category WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        //delete category book cate
        $sql = "DELETE FROM category WHERE id={$row_id_cate['id_cate_book_category']}";
        $result = mysqli_query($conn, $sql);

        //delete folder
        if(is_dir('./../upload/books/'.$id)) {
            if ($files = glob('./../upload/books/'.$id."/*")) {
            } else {
                rmdir('./../upload/books/'.$id);
            }
        }
        mysqli_close($conn);

    }

    function CheckIdBookCateInBook($id) {
        global $conn;

        $sql = "SELECT * FROM books WHERE id_category='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            return true;
        } else {
            return false;
        }

        mysqli_close($conn);
    }
?>