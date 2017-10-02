<?php
//naming and starting a session
session_name("shop");
session_start();
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>The Hunt is On!</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <?php
       $items = array(
           array("name" => "Guided Elk Hunt", "price" => "3999.00", "description" => "Early Kaibab"),
           array("name" => "Guided Deer Hunt", "price" => "3499.00", "description" => "Early Kaibab"),
           array("name" => "Guided Antelope Hunt", "price" => "2999.00", "description" => "Early Kaibab")
       );
       $action = (isset($_POST['action'])) ? $_POST['action'] : "";
       switch ($action) {
           case "additem":
               //check item id
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
       // set total to 0
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
            <div id="banner">
                <a id="banner" href="#">
                    <img src="https://imgur.com/TrrLZqL.png" alt="Quantum" style="width:300px;height:80px;">
                </a>
            </div>
            <div class="links" style="background-color:#172d45 ">
                <table>
                    <td>
                        <a href="hello.html">Home</a>
                    </td>
                </table>
            </div>
            <br>
            <div class="basic">

                <h1>Available Guides!</h1>
                <div class="items">
                    <div class="item">
                        <img src="img/item-1.jpg">
                        <div>
                            <h4>Elk Hunt $3999.00</h4>
                            <p>Early Kaibab Hunt</p>
                            <form method="post" action="index.php">
                                <input name="action" value="additem" style="display: none;">
                                <input name="itemid" value="0" style="display: none;">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="item">
                        <img class="item-image" src="img/item-2.jpg">
                        <div class="item-info">

                            <h4 class="card-title">Deer Hunt $3499.00</h4>
                            <p class="card-text">Early Kaibab Hunt</p>
                            <form method="post" action="index.php">
                                <input name="action" value="additem" style="display: none;">
                                <input name="itemid" value="0" style="display: none;">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="item">
                        <img class="item-image" src="img/item-3.jpg">
                        <div class="item-info">

                            <h4 class="card-title">Antelope Hunt $2999.00</h4>
                            <p class="card-text">Early Kaibab Hunt</p>
                            <form method="post" action="index.php">
                                <input name="action" value="additem" style="display: none;">
                                <input name="itemid" value="0" style="display: none;">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                    <form method="post" action="index.php">
                        <br>
                        <input name="action" value="clearcart" style="display: none;">
                        <button type="submit" class="btn btn-danger">Clear Cart</button>
                    </form>
                    <br>
                    <form method="post" action="cart.php" class="form-inline">
                        <button type="submit" class="btn btn-primary">View Cart</button>
                        <div>
                            <br>
                            <strong><?php echo "Cart total: $" . $cart_total; ?></strong>
                        </div>
                    </form>
                </div>
            </div>

    </body>

    </html>
