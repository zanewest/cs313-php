<?php
session_name("shop");
session_start();
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Cart</title>
      <link rel="stylesheet" href="styles.css">
   </head>
   <body>
       <?php
       $products = array(
           array("name" => "Guided Hunt", "price" => "3999.00", "description" => "Elk"),
           array("name" => "Guided Hunt", "price" => "20.00", "description" => "Deer"),
           array("name" => "Guided Hunt", "price" => "35.00", "description" => "Antelope")
       );
       $action = (isset($_GET['action'])) ? $_GET['action'] : "";
       switch ($action) {
           case "removeitem":
               $itemid = (isset($_GET['itemid'])) ? $_GET['itemid'] : "";
               if ($itemid != "") {
                   if ($_SESSION['cart'] == "") {
                       echo "Nothing to Remove";
                   } else {
                       unset($_SESSION['cart'][$itemid]);
                       $_SESSION['cart'] = array_values($_SESSION['cart']);
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

                <?php
                if ($_SESSION['cart'] != '') {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $name = $value['name'];
                        $price = $value['price'];
                        $desc = $value['description'];
                        echo '<tr>';
                        echo '<td>';
                        echo $name;
                        echo '</td><td>';
                        echo $desc;
                        echo '</td><td>';
                        echo $price;
                        echo '</td><td><a href="cart.php?action=removeitem&itemid=' . $key . '"">X</a></td>';
                    }
                }
                ?>
       
         <form method="post" action="index.php">
            <button type="submit">Continue Shopping</button>
         </form>
         <br>
         <form method="post" action="checkout.php">
            <button type="submit">Checkout</button>
         </form>
   </body>
</html>
