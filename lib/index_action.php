<?php
    require('dbConn.php');

    // Show Festivals Most (4)
    function ShowFestivalsMost4() {
        global $conn;
        $sql = "SELECT * FROM itemfestivals WHERE highlight = 1 ORDER BY id DESC LIMIT 0, 4";
        $result = mysqli_query($conn, $sql);
        return $result;
    };

    // Show Festivals Most (8)
    function ShowFestivalsMost8() {
        global $conn;
        $sql = "SELECT * FROM itemfestivals WHERE highlight = 1 ORDER BY id DESC LIMIT 5, 19";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    // Show The Best Festival (6)
    function ShowFestivalsBest6() {
        global $conn;
        $sql = "SELECT * FROM itemfestivals WHERE the_best = 1 ORDER BY id DESC LIMIT 0, 6";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    // Show Slider Religion
    function SliderReligion() {
        global $conn;

        $sql = "SELECT * FROM religions";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
?>
