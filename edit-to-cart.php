<?php 
    session_start();
    require('./lib/edit-to-cart_action.php');

    if(isset($_POST['changes'])) {
        $id = $_POST['changes']['id'];
        $quantity = (int)$_POST['changes']['value'];

        if($quantity == 0) {
            $resultCheck = [
                'status' => false,
                'error' => 'Please enter quantity !'
            ];
            echo json_encode($resultCheck);
        } else {

            // Total Update
            $total = 0;
            foreach($_SESSION['cart'] as $key => $value) {
                if($_SESSION['cart'][$key]['id'] == $id) {
                    $_SESSION['cart'][$key]['quantity'] = $quantity;
                    break;
                }
            }

            // Update Total
            foreach($_SESSION['cart'] as $key => $value) {
                $resultBook = UpdateTotal($_SESSION['cart'][$key]['id']);
                $row = mysqli_fetch_assoc($resultBook);

                $total = $total + ($row['price_book'] * $_SESSION['cart'][$key]['quantity']);
            }

            $resultCheck = [
                'status' => true,
                'total' => number_format($total,0,",",".")
            ];

            echo json_encode($resultCheck);
        }
    } else if(isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $completed = false;
        foreach($_SESSION['cart'] as $key => $value) {
            if($_SESSION['cart'][$key]['id'] == $id) {
                unset($_SESSION['cart'][$key]);
                $completed = true;
            }
            $_SESSION['cart'] = array_values($_SESSION['cart']);// Fix index session cart
        }

        if($completed) {
            echo 'Success';
        }

    }

    
?>