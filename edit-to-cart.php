<?php 
    session_start();
    require('./lib/edit-to-cart_action.php');

    if(isset($_POST['quantity']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $quantity = (int)$_POST['quantity'];

        if($quantity == 0) {
            echo 'Please enter quantity !';
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
            echo $total;
        }
    } else if(isset($_GET['id']) && isset($_GET['action'])) {
        $id = $_GET['id'];
        $action = $_GET['action'];
        if($action == 'delete') {

            foreach($_SESSION['cart'] as $key => $value) {
                if($_SESSION['cart'][$key]['id'] == $id) {
                    unset($_SESSION['cart'][$key]);
                }
                $_SESSION['cart'] = array_values($_SESSION['cart']);// Fix index session cart
            }

            header('location:cart.php');
        }
    }

    
?>