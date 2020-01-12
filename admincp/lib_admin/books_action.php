<?php 
    require('./../lib/dbConn.php');

    function CheckGetUrl(){
        if(isset($_GET['ac'])) {
            $action = $_GET['ac'];
            if($action == 'add') {
                return 1;// Add Books
            } else if($action == 'detail'){
                return 2;// Detail Books
            }
        } else {
            return 0; //All Bookss
        }
    }

    function AllBooks() {
        global $conn;
        $sql = "SELECT * FROM books ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function BookOfCategory($idCategory) {
        global $conn;
        $sql = "SELECT id, name_book_cate FROM book_category WHERE id='$idCategory'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function SelectAllCategory($select = 'all') {
        global $conn;
        if($select == 'all') {
            $sql = "SELECT id, name_book_cate FROM book_category";
            $result = mysqli_query($conn, $sql);
            return $result;
        } else {
            $sql = "SELECT id, name_book_cate FROM book_category WHERE id != '$select'";
            $result = mysqli_query($conn, $sql);
            return $result;
        }
        mysqli_close($conn);
    }

    function CheckIdCategory($id) {
        global $conn;
        $sql = "SELECT * FROM book_category WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            return false;
        } else return true;
    }

    function AddBooks($name, $idCate, $author, $price, $des, $inventory, $content, $date) {
        global $conn;
        //Get user login
        $id_user = $_SESSION['userLogin']['id'];

        $sql = "INSERT INTO books 
            (name_book, author, price_book, des_book, content_book, inventory, id_category, id_user, date_posted)
            values 
            ('$name', '$author', '$price', '$des', '$content', '$inventory', '$idCate', '$id_user', '$date')";
        $result = mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }

    function AddImageBooks($ex, $id_category, $id) {
        global $conn;
        $url = 'upload/books/'.$id_category.'/'.$id.'/'.$id.'.'.$ex;

        $sql = "UPDATE books SET avata_book= '$url' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function CheckIdBookGet() {
        global $conn;
        if(isset($_GET['ac']) && $_GET['ac'] == 'detail' && isset($_GET['id'])) {
            $sql = "SELECT * FROM books WHERE id={$_GET['id']}";
            $result = mysqli_query($conn, $sql);
            
            return mysqli_num_rows($result) == 0 ?  false : $result;
        }
    }

    function CategoryOfBook($id_category) {
        global $conn;
        $sql = "SELECT name_book_cate FROM book_category WHERE id='$id_category'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function UserPosted($iduser) {
        global $conn;
        $sql = "SELECT fullname FROM user WHERE id='$iduser'";
        $result = mysqli_query($conn, $sql);
        return $result;
        mysqli_close($conn);
    }

    function GetCategoryOld($id) {
        global $conn;
        $sql = "SELECT id_category FROM books WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function UpdateBooks($id, $name, $idCate, $author, $price, $des, $inventory, $content, $stt) {
        global $conn;
        $sql = "UPDATE books SET 
                                        name_book = '$name',
                                        id_category = '$idCate',
                                        author = '$author',
                                        price_book = '$price',
                                        des_book = '$des',
                                        inventory = '$inventory',
                                        content_book = '$content',
                                        status = '$stt'
                                        WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        //Result url image
        $sql = "SELECT avata_book FROM books WHERE id='$id'";
        $result_img = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result_img);
        return $row['avata_book'];
    }

    function UpdateUrlImg($id, $url) {
        global $conn;
        $sql = "UPDATE books SET avata_book = '$url' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
    }

    function DeleteBook($arr) {
        global $conn;

        $error = array();
        foreach($arr as $key=> $value) {
            $sql = "SELECT id, id_category, name_book FROM books WHERE id='$value'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 0) {

            } else {
                $row = mysqli_fetch_assoc($result);
                $name_book = $row['name_book'];
                $id = $row['id'];

                //check book trong inventory.neu book da duoc mua va su dung thi khong xoa duoc
                $sql = "SELECT * FROM invoice_details WHERE id_book='$id'";
                $result_book_inven = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result_book_inven) == 0) {
                    //delete folder
                    $dir_category = './../upload/books/'.$row['id_category'];
                    if(is_dir($dir_category)) {
                        $dir_book = './../upload/books/'.$row['id_category'].'/'.$row['id'];
                        if(is_dir($dir_book)) {

                            //remove file before delete folder
                            foreach(scandir($dir_book) as $file) {
                                if ('.' === $file || '..' === $file) continue;
                                if (is_dir("$dir_book/$file")) rmdir_recursive("$dir_book/$file");
                                else unlink("$dir_book/$file");
                            }
                            rmdir($dir_book);
                        }
                        //delete book
                        $sql = "DELETE FROM books WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                    }
                } else { 
                    $book_error = [
                        'name' => $name_book,
                        'error' => 'can not delete !'
                    ];
                    array_push($error, $book_error);
                }

            }
        }

        if(empty($error)) {
            echo "Success Delete";
        } else {
            echo json_encode($error);
        }
        mysqli_close($conn);
    }
?>