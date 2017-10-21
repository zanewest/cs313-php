<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reviews</title>
    <?php 
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

    <?php 
    try{
        
        if (isset($_POST['username'], $_POST['body'])) {
        $username = $_POST['username'];
        $body = $_POST['body'];
        
        echo '<div class="container"><div class="panel panel-default panel-body" style="background: #fbf6e5;"><table class="table"><tr><td class="col-xs-2">' . $username . '</td>';
        echo '<td>' . $body . '</td></tr></table></div></div>';
       
        //this isn't working and I can't figure out why, status 500 when I run it. :(
        require("dbConnect.php");
        
        $sql = 'INSERT INTO comments(username, body) VALUES(:username, :body)';
        $stmt = $this->pdo->prepare($sql);
        
        // pass values to the statement
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':body', $body);
        
        // execute the insert statement
        $stmt->execute();
        
        $commentId = $db->lastInsertId("comments_id_seq");
         }
    }
    catch (Exception $ex)
    {
        echo "Error with DB. Details: $ex";
        die();
    }
    ?>

    <form class="container" action="reviews.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="username">
        </div>
        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Comments" rows="3" name="body"></textarea>
        </div>
        <input type="submit" value="Submit">
    </form>


</body>

</html>
