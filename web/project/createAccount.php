<?php
// get the data from the POST
$username = $_POST['txtUser'];
$password = $_POST['txtPassword'];
if (!isset($username) || $username == ""
	|| !isset($password) || $password == "")
{
    echo "got here";
	header("Location: signUp.php");
	die(); // we always include a die after redirects.
}
// Let's not allow HTML in our usernames. It would be best to also detect this before
// submitting the form and preven the submission.
echo "got heres";
$username = htmlspecialchars($username);
// Get the hashed password.
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
// Connect to the database
echo "got here before db";
require("dbConnect.php");

// this breaks the code but dont know why TODO $db = get_db();
echo "got here after db";
$query = 'INSERT INTO login(username, password) VALUES(:username, :password)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
// **********************************************
// NOTICE: We are submitting the hashed password!
// **********************************************
$statement->bindValue(':password', $hashedPassword);
$statement->execute();
// finally, redirect them to the sign in page

echo "got here2";
header("Location: signIn.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
?>