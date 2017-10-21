<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <?php 
    include("head.html");
    ?>
</head>

<body>
    <?php 
    include("header.html");
    ?>

    <div class="container">
        <h1>Cart (Coming Soon)</h1>
        <?php
        // create session if not already created
            if (!is_array($_SESSION)) {
                session_set_cookie_params(60 * 24, '/');
                session_start();
                }
            echo '<div class="panel panel-default panel-body" style="background: #fbf6e5;">' . $_SESSION['product_name'] . '<br> </div>';
            echo '<div class="panel panel-default panel-body" style="background: #fbf6e5;">' . $_SESSION['test'];
        ?>
    </div>
    
  <?php include("footer.html");?>

</body>

</html>
