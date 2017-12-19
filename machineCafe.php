<?php
	include 'fonctions.php';
?>
<!DOCTYPE html> 
<html> 
<head> 
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8" /> 
	<title>Coffee Machine</title>
</head> 
<body> 
	<h1>•••••••••••••••••••••••••••••••••••••••••<br>THE COFFEE MACHINE<br>•••••••••••••••••••••••••••••••••••••••••</h1>
	<br>	
	<!-- adds the date on the page -->
		<p class='dia'><b>Today is: <?= $dates; ?></b></p>
	<!-- adds a table with information about the drinks -->	
		<table>
			<tr>
				<th>DRINK</th>
				<th>PRICE</th>
				<th>STOCK</th>
			</tr>
			<tr>
				<td>Expresso</td>
				<td>50cts</td>
				<td><?= $stockExp ?></td>
			</tr>
			<tr>
				<td>Tea</td>
				<td>50cts</td>
				<td><?= $stockThe ?></td>
			</tr>
			<tr>
				<td>Latte</td>
				<td>60cts</td>
				<td><?= $stockLat ?></td>
			</tr>
			<tr>
				<td>Hot Chocolate</td>
				<td>60cts</td>
				<td><?= $stockCho ?></td>
			</tr>
		</table>
	<br>
	<p>En attente</p>
	<!-- adds the information about how much was inserted in the machine -->		
	<p><b>Inserted Money: <?= $insMon?></b></p>
	<div class="container">
		<div class='displays'>
			<form method="post" action="machineCafe.php">
				Drink: <br>
				<input type="radio" name="drink" value="Expresso">Expresso
				<input type="radio" name="drink" value="Cafe Long">Cafe Long
				<input type="radio" name="drink" value="Thé">Thé
  				<br><br>
  				Number of Sugar:<br>
  				<input type="radio" name="nbsucre" value="0">0
  				<input type="radio" name="nbsucre" value="1">1
  				<input type="radio" name="nbsucre" value="2">2
  				<input type="radio" name="nbsucre" value="3">3
  				<input type="radio" name="nbsucre" value="4">4
  				<input type="radio" name="nbsucre" value="5">5
  				<br><br><input type="submit" name="submit">
			</form>
			<br><br>
			<?php
				if (isset($_POST['drink']) && isset($_POST['nbsucre'])){
					echo preparerBoisson($_POST['drink'], $_POST['nbsucre']);
			};
			?>

		</div>
	</div>
</body> 
</html>