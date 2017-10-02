<?php
session_name("shop");
session_start();

  $items = array(
           array("name" => "Guided Elk Hunt", "price" => "3999.00", "description" => "Early Kaibab"),
           array("name" => "Guided Deer Hunt", "price" => "3499.00", "description" => "Early Kaibab"),
           array("name" => "Guided Antelope Hunt", "price" => "2999.00", "description" => "Early Kaibab")
       );

       $action = (isset($_POST['action'])) ? $_POST['action'] : "";

       switch ($action) {
           case "additem":
               $itemid = (isset($_POST['itemid'])) ? $_POST['itemid'] : "";
               if ($itemid != "") {
                   if ($_SESSION['cart'] == "") {
                       $_SESSION['cart'] = array($items[$itemid]);
                   } else {
                       array_push($_SESSION['cart'], $items[$itemid]);
                   }
               }
               break;
           case "clearcart":
               $_SESSION['cart'] = "";
               break;
       }
       $cart_total = 0;
       if ($_SESSION['cart'] != '') {
           foreach ($_SESSION['cart'] as $key => $value) {
               $cart_total = $cart_total + $value['price'];
               $name = $value['name'];
               $price = $value['price'];
               $desc = $value['description'];
           }
       }
       ?>
