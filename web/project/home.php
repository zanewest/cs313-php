<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
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
            <img src="img/logo.png" class="rounded img-fluid img-responsive" style="max-width: 800px; margin-left: auto; margin-right: auto;" alt="Responsive image">
        </div>
        <div class="row text-center" style="width:80%; margin-left:auto; margin-right: auto;">
            <h1 class="mt-3">Jeremy Martinez</h1>
            <p class="lead col-md-12">Here at Pure Addiction Outfitters we are focusing on the quality of hunts rather than the quantity of hunts. With limited booking for each hunt we are focusing on making the hunt more personable and focusing on harvesting the best trophy we can possibly hunt rather than focusing on filling multiple tags. </p>
        </div>
    </div>
    
    <?php
      // create session if not already created
        if (!is_array($_SESSION)) {
            session_set_cookie_params(60 * 24, '/');
            session_start();
            }
        $_SESSION['test'] = 'This text is pulled from a sessions variable just to demonstrate a small sample of proficiency with sessions. The cart is not yet functional.'
    ?>
    
  <?php include("footer.html");?>

</body>

</html>
