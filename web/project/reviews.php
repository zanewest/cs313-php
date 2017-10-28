<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reviews</title>
    <?php 
    $activeTab = 3;
    include("head.html");
    ?>
</head>

<body>
    <!-- Add header nav -->
    <?php include("header.html"); ?>

    <div class="container">
        <h1>Reviews</h1>
        <?php
                require('dbConnect.php');
                $statement = $db->prepare("SELECT username, body FROM comments");
                $statement->execute();
                // Go through each result
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="panel panel-default panel-body" style="background: #fbf6e5;"><table class="table"> <tr><td class="col-xs-2">' . $row['username'] . '</td>';
                    echo '<td>' . $row['body'] . '</td></tr></table></div>';
            }
            ?>
    </div>

    <?php include("footer.html");?>

   

    <form class="container" id="mainForm" action="insertReview.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="username">
        </div>
        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Comments" rows="3" name="body"></textarea>
        </div>
        <input class="btn btn-lg btn-secondary btn-block" style="background-color: grey; color: white;" type="submit" value="Submit">
    </form>


</body>

</html>
