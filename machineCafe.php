<?php
	include 'fonctions.php';
	$stockExp = 20;
	$stockThe = 10;
	$stockLat = 10;
	$stockCho = 10;
	$insMon = 0;
	$dates = date('l, d F Y');
	$recette = array(
					'expresso' => array(
										'cafe' => 1,
										'eau' => 1),
					'the' => array(
									'eau' => 3,
									'the' => 1),
					'cafeLong' => array(
										'eau' => 2,
										'cafe' => 2));
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
				Drink: <input type="text" name="drink">
  				<br><br>
  				Number of Sugar: <input type="text" name="nbsucre">
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