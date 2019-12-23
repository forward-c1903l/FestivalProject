<?php 
require('./lib/add-to-cart_action.php');
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



    if(isset($_SESSION['cart'])) {
        $status = false;
        foreach($_SESSION['cart'] as $key => $value){
            if($_SESSION['cart'][$key]['id'] == $id) {
                $quantityCurrent = $_SESSION['cart'][$key]['quantity'] + $quantity;
                $status = true;
                // Check inventory item in the database with quantity
                $check = CheckQuantity($id, $quantityCurrent);
                $_SESSION['error-add-to-cart'] = $check;

                if(empty($check)) {
                    $_SESSION['cart'][$key]['quantity'] = $quantityCurrent;

                    //Save Session success true
                    $_SESSION['success-add-to-cart'] = true;
                    header("location:books.php?b=".$id);

                    break;
                } else {
                    $_SESSION['success-add-to-cart'] = false;
                    header("location:books.php?b=".$id."&status=1");
                }
                
            }
        }

        if(!$status) {
            $check = CheckQuantity($id, $quantity);
            $_SESSION['error-add-to-cart'] = $check;

            // Process empty cart and item's cart (without id Books)
            if(empty($check)) {
                $cart = [
                    'id' => $id,
                    'quantity' => $quantity
                ];
    
                array_push($_SESSION['cart'], $cart);
    
                //Save Session success true
                $_SESSION['success-add-to-cart'] = true;
                header("location:books.php?b=".$id);
    
            } else {
                $_SESSION['success-add-to-cart'] = false;
                header("location:books.php?b=".$id."&status=1");
            }
        }

    } else {
        $_SESSION['cart'] = array();

        $check = CheckQuantity($id, $quantity);
        $_SESSION['error-add-to-cart'] = $check;

         // Process empty cart and item's cart (without id Books)
        if(empty($check)) {
            $cart = [
                'id' => $id,
                'quantity' => $quantity
            ];

            array_push($_SESSION['cart'], $cart);

            //Save Session success true
            $_SESSION['success-add-to-cart'] = true;
            header("location:books.php?b=".$id);

        } else {
            $_SESSION['success-add-to-cart'] = false;
            header("location:books.php?b=".$id."&status=1");
        }

    }
?>