<?php

function get_db() {
	$db = NULL;
	try {
		// default Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');
		if (!isset($dbUrl) || empty($dbUrl)) {
			$dbUrl = "postgres://postgres:mniDnb16@localhost:5432/postgres";
		}
		// Get the various parts of the DB Connection from the URL
		$dbopts = parse_url($dbUrl);
		$dbHost = $dbopts["ec2-50-19-105-113.compute-1.amazonaws.com"];
		$dbPort = $dbopts["5432"];
		$dbUser = $dbopts["gymwblcnmjdaqd"];
		$dbPassword = $dbopts["3802346cf03391ca22c0e54f3b73cb317263ed98acebcdc9d92c36f014be32bc"];
		$dbName = ltrim($dbopts["path"],'/');
		// Create the PDO connection
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $ex) {
		// If this were in production, you would not want to echo
		// the details of the exception.
		echo "Error connecting to DB. Details: $ex";
		die();
	}
	return $db;
}
?>

<!DOCTYPE html>
<html>

	<head>
		<title>CS313 Project 1 - Pure Addiction Outfitters Store</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="index.js"></script>
	</head>

	<body>
		<header id="banner">
			<img id="leftFloat" src="img/icon.png" alt="Home Page Icon" height="105" width="205">
			<h1 id="rightFloat">Pure Addiction Outfitters<h1>
		</header>

		<nav>
        <h2>Store</h2>
        <button onclick="sortByProducts()">Products</button>
        <button onclick="sortByClothing()">Clothing</button>
		</nav>

		<article>
      <h1>Clothing</h1>
        
			<?php
			$statement = $db->prepare("SELECT product_name, product_description, product_price FROM product");
			$statement->execute();
			// Go through each result
			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				echo '<table> <tr><td>' . $row['product_name'] . '</td>';
        echo '<td>' . $row['product_description'] . '</td>';
        echo '<td>' . '$' . $row['product_price'] . '</td> </table>';
				/*echo '<td>' . $row['user_email'] . '</td></tr>';*/
			}
      ?>
      <br>
<h1> Services </h1>
      <?php
			$statement = $db->prepare("SELECT service_name, service_description, service_price FROM service");
			$statement->execute();
			// Go through each result
			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				echo '<table> <tr><td>' . $row['service_name'] . '</td>';
        echo '<td>' . $row['service_description'] . '</td>';
        echo '<td>' . '$' . $row['service_price'] . '</td> </table>';
				/*echo '<td>' . $row['user_email'] . '</td></tr>';*/
			}
      ?>

      </table>
      
     



		</article>
	</body>
</html>
