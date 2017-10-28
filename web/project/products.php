<html>

<head>
    <title>Products</title>
    <?php 
    $activeTab = 1;
    include("head.html");
    ?>
</head>

<body>
    <?php
    include("header.html");
    ?>
        <div class="container">
            <!-- Work here -->
            <h1>Clothing</h1>
            <?php
            
            // create session if not already created
                if (!is_array($_SESSION)) {
                    session_set_cookie_params(60 * 24, '/');
                    session_start();
                    }

                //connect to DB
                require('dbConnect.php');
                //prepare statement for security
                $statement = $db->prepare("SELECT product_name, product_description, product_price FROM product");
                $statement->execute();
                // Go through each result and display the products in the database
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="panel panel-default panel-body" style="background: #fbf6e5;"><table class="table"> <tr><td class="col-xs-2">' . $row['product_name'] . '</td>';
                    echo '<td class="col-xs-10">' . $row['product_description'] . '</td>';
                    echo '<td class="col-xs-1">' . '$' . $row['product_price'] . '</td><td><button class="addbtn">Add</button></td> </tr> </table></div>';
                    $_SESSION['product_name'] = $row['product_name']; 
                    }
            ?>
        </div>

        <!--add footer -->
        <?php include("footer.html");?>

</body>

</html>
