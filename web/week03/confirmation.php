<?php
$street1 = htmlspecialchars($_POST['street1']);
$street2 = htmlspecialchars($_POST['street2']);
$city = htmlspecialchars($_POST['city']);
$state = $_POST["state"];
$zip = htmlspecialchars($_POST['zip']);
?>

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
       session_name("shop");
       session_start();
       $action = (isset($_POST['action'])) ? $_POST['action'] : "";
       switch ($action) {
           case "removeitem":
               $itemid = (isset($_POST['itemid'])) ? $_POST['itemid'] : "";
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


      <div style="padding-top: 15px">
         <div>
            <h1>Confirmation</h1>
            <h1>Thank you for your order!</h1>
         </div>

         <table>
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
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
                    }
                }
                ?>
            </tbody>
            <tfoot>
               <tr>
                  <th></th>
                  <th style="text-align:right;">Total</th>
                  <th><?php echo "$" . $cart_total; ?></th>
                  <th></th>
               </tr>
            </tfoot>
         </table>
         <div  style="max-width: 300px; border-style: solid; margin: auto; border-radius: 10px">
            <h2>Sending Order To:</h2><br>
            <strong><?php echo $street1 . "<br>" . $street2 . "<br>" . $city . "<br>" . $state . $zip ?></strong>
         </div>
      </div>

   </body>
</html>