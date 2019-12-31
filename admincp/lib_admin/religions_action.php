<?php 
    require('./../lib/dbConn.php');

    function CheckGetUrl(){
        if(isset($_GET['ac'])) {
            $action = $_GET['ac'];
            if($action == 'add') {
                return 1;// Add religions
            } else if($action == 'edit'){
                return 2;// Edit religions
            }
        } else {
            return 0; //All religions
        }
    }

    function AllReligions() {
        global $conn;
        $sql = "SELECT * FROM religions";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function AddReligionFullDB($extension, $id) {
        global $conn;
        $pathImage ='upload/religions/'.$id.'/'.$id.'.'.$extension;
        //Add Religion
        $sql = "UPDATE religions SET avata_religion = '$pathImage' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
    }

    function UpdateIdCateReligion($id, $id_cate) {
        global $conn;
        $sql = "UPDATE religions SET id_cate_religion = '$id_cate' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
    }

    function AddReligionCategoryDB($name, $id) {
        global $conn;
        $pathLink = 'religions.php?f='.$id;

        $sql = "INSERT INTO category (name_cate, link_cate, id_parent) values ('$name', '$pathLink', 2)";
        $result = mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }

    function AddNameReligionFirst($name) {
        global $conn;

        //Add Name Religion
        $sql = "INSERT INTO religions (name_religion, id_cate_religion) values ('$name', 2)";
        $result = mysqli_query($conn, $sql);

        //return id 
        return mysqli_insert_id($conn);
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
                $sql = "SELECT * FROM religions WHERE id='$id'";
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
        $sql = "UPDATE religions SET name_religion='$name', status='$stt' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        // Get Id Category of the religion
        $sql = "SELECT id_cate_religion, avata_religion FROM religions WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row_result = mysqli_fetch_assoc($result);


        // Update Name & STT Category
        $sql = "UPDATE category SET name_cate='$name', status_cate='$stt' WHERE id={$row_result['id_cate_religion']}";
        $result = mysqli_query($conn, $sql);
        
        mysqli_close($conn);
        return $row_result['avata_religion'];
    }


    // DELETE
    function DeleteReligion($id) {
        global $conn;

        //get id_cate_religion
        $sql = "SELECT id_cate_religion, avata_religion FROM religions WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row_id_cate = mysqli_fetch_assoc($result);

        //delete religion
        $sql = "DELETE FROM religions WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        //delete category religion
        $sql = "DELETE FROM category WHERE id={$row_id_cate['id_cate_religion']}";
        $result = mysqli_query($conn, $sql);

        //delete image
        $status_delete = unlink('./../'.$row_id_cate['avata_religion']);
        mysqli_close($conn);
    }
?>