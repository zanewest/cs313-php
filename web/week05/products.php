<?php
			$statement = $db->prepare("SELECT product_name, product_description, product_price FROM product");
			$statement->execute();
			// Go through each result
			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				echo '<table> <tr><td>' . $row['product_name'] . '</td>';
        echo '<td>' . $row['product_description'] . '</td>';
        echo '<td>' . '$' . $row['product_price'] . '</td> </table>';
			}
      ?>