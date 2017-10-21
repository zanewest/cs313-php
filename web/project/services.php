<html>

<head>
    <title>Services</title>
    <?php 
    include("head.html");
    ?>
</head>
<body>
    <?php
    include("header.html");
    ?>
        <div class="container">
            <h1> Services </h1>
            <?php
    require('dbConnect.php');
                $statement = $db->prepare("SELECT service_name, service_description, service_price FROM service");
                $statement->execute();
                // Go through each result
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="panel panel-default panel-body" style="background: #fbf6e5;"><table class="table"> <tr><td class="col-xs-2">' . $row['service_name'] . '</td>';
                    echo '<td>' . $row['service_description'] . '</td>';
                    echo '<td>' . '$' . $row['service_price'] . '</td><td><button class="addbtn">Add</button></td> </tr> </table></div>';
            }
            ?>
        </div>

      <?php include("footer.html");?>

</body>


</html>
