<?php 
session_start();

    if(isset($_POST['quantity'])) {
        $quantity = (int)$_POST['quantity'];
    } else {
        header('location:cart.php');
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('location:cart.php');
    }

    if($quantity > 30) {
        echo 'Items exceed limit. Maximum is 30';
    } else if($quantity === 0) {
        echo 'Please enter quantity !';
    } else {
        if(isset($_SESSION['cart'])) {
            $observe = false;

            foreach($_SESSION['cart'] as $key => $value) {
                if($_SESSION['cart'][$key]['id'] == $id) {
                    $_SESSION['cart'][$key]['quantity'] += $quantity;
                    $observe = true;
                    break;
                }
            }

            if(!$observe) {
                $cart = [
                    'id' => $id,
                    'quantity' => $quantity
                ];
                array_push($_SESSION['cart'], $cart);
            }

        } else {
            $_SESSION['cart'] = array();
            $cart = [
                'id' => $id,
                'quantity' => $quantity
            ];
            array_push($_SESSION['cart'], $cart);
        }

        echo count($_SESSION['cart']);
    }

?>