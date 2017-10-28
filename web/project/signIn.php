<?php
/**********************************************************
* File: signIn.php
* Author: Br. Burton
* 
* Description: This page has a form for the user to sign in.
*
* In this case, to show another approach, we will have this
* page have two purposes, it will have the form for signing
* in, but it will also have the logic to check a username
* and password and redirect the user to the home page if
* everything checks out. Thus it will post to itself.
***********************************************************/
// If you have an earlier version of PHP (earlier than 5.5)
// You need to download and include password.php.
//require("password.php"); // used for password hashing.
session_start();
$badLogin = false;
// First check to see if we have post variables, if not, just
// continue on as always.
if (isset($_POST['txtUser']) && isset($_POST['txtPassword']))
{
	// they have submitted a username and password for us to check
	$username = $_POST['txtUser'];
	$password = $_POST['txtPassword'];
	// Connect to the DB
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT password FROM login WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];
		// now check to see if the hashed password matches
		if (password_verify($password, $hashedPasswordFromDB))
		{
			// password was correct, put the user on the session, and redirect to home
			$_SESSION['username'] = $username;
			header("Location: home.php");
			die(); // we always include a die after redirects.
		}
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}
// If we get to this point without having redirected, then it means they
// should just see the login form.
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Sign In</title>
        <?php 
        $activeTab = 5;
    include("head.html");
    ?>
    </head>

    <body>
        <?php 
    include("header.html");
    ?>
        <div class="container center" style="max-width: 300px; margin-left: auto; margin-right: auto;">

            <?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

                <div class="center">
                    <img src="img/logo.png" class="rounded img-fluid img-responsive" style="max-width: 300px; margin-left: auto; margin-right: auto;" alt="Responsive image">
                </div>

                <h1>Sign In</h1>

                <form id="mainForm" action="home.php" method="POST">


                    <input type="text" class="form-control form-top" id="txtUser" name="txtUser" placeholder="Username">
                    <br />


                    <input type="password" class="form-control form-bottom" id="txtPassword" name="txtPassword" placeholder="Password">

                    <br />

                    <input class="btn btn-lg btn-secondary btn-block" style="background-color: grey; color: white;" type="submit" value="Sign In" />

                </form>

                <br /> Or <a href="signUp.php">Sign up</a> for a new account.

        </div>
        <?php include("footer.html");?>
    </body>

    </html>
