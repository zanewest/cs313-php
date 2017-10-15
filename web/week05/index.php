
<?php
//connect to db
try
  {
  $user = 'postgres';
  $password = '141220Aa';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=pureaddictiondb', $user, $password);
} catch (PDOException $ex)
  {
  echo 'Error!: ' . $ex->getMessage();
  die();
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
