<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <?php 
    include("head.html");
    ?>
    <script src="js/passwordscheck.js"></script>
</head>

<body>
    <?php 
    include("header.html");
    ?>

    <div class="container" style="max-width: 300px; margin-left: auto; margin-right: auto;">
        <div class="center">
            <img src="img/logo.png" class="rounded img-fluid img-responsive" style="max-width: 300px; margin-left: auto; margin-right: auto;" alt="Responsive image">
        </div>
        <div class="row text-center" style="width:100%; margin-left:auto; margin-right: auto;">
            <h1 class="mt-3">Sign Up</h1>

            <form id="mainForm form-sign" action="createAccount.php" method="POST">

                <input type="text" id="txtUser" name="txtUser" class="form-control form-top" placeholder="Username" required autofocus>

                <br />

                <input type="password" id="txtPassword" name="txtPassword" class="form-control form-mid" placeholder="Password" required>

                <br />

                <input type="password" id="txtPasswordVerify" name="txtConfirmPassword" class="form-control form-bottom" placeholder="Confirm Password" required>

                <br />

                <input class="btn btn-lg btn-secondary btn-block" style="background-color: grey; color: white;" type="submit" value="Create Account" />

            </form>
        </div>
    </div>


    <?php include("footer.html");?>

</body>

</html>
