<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <?php 
    include("head.html");
    ?>
</head>

<body>
    <?php 
    include("header.html");
    ?>

    <div class="container">
        <div class="center">
            <img src="img/logo.png" class="rounded img-fluid img-responsive" style="max-width: 300px; margin-left: auto; margin-right: auto;" alt="Responsive image">
        </div>
        <div class="row text-center" style="width:100%; margin-left:auto; margin-right: auto;">
            <h1 class="mt-3">Sign Ups</h1>
            
            <form id="mainForm" action="createAccount.php" method="POST">

                <label for="txtUser">Username</label>
                <input type="text" id="txtUser" name="txtUser" placeholder="Username">

                <br /><br />

                <label for="txtPassword">Password</label>
                <input type="password" id="txtPassword" name="txtPassword" placeholder="Password">

                <br /><br />

                <input type="submit" value="Create Account" />

            </form>
        </div>
    </div>


        <?php include("footer.html");?>

</body>

</html>
