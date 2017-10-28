 <?php 
    try{
        
        if (isset($_POST['username'], $_POST['body'])) {
        $username = $_POST['username'];
        $body = $_POST['body'];
        

       // echo '<div class="container"><div class="panel panel-default panel-body" style="background: #fbf6e5;"><table class="table"><tr><td class="col-xs-2">' . $username . '</td>';
        //echo '<td>' . $body . '</td></tr></table></div></div>';
       
        //this isn't working and I can't figure out why, status 500 when I run it. :(
        require("dbConnect.php");
   
        $sql = 'INSERT INTO comments(username, body) VALUES(:username, :body)';
        $stmt = $db->prepare($sql);
    
        // pass values to the statement
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':body', $body);
        
        // execute the insert statement
        $stmt->execute();
        
            header("Location: reviews.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
         }
    }
    catch (Exception $ex)
    {
        echo "Error with DB. Details: $ex";
        die();
    }
    ?>