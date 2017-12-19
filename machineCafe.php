<?php
	include 'fonctions.php';
?>
<!DOCTYPE html> 
<html> 
<head> 
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8" /> 
	<title>Coffee Machine</title>
</head> 
<body> 
	<h1>•••••••••••••••••••••••••••••••••••••••••<br>THE COFFEE MACHINE<br>•••••••••••••••••••••••••••••••••••••••••</h1>
		<!-- adds the date on the page -->
	<p class='dia'><b>Today is: <?= $dates; ?></b></p>
	<div class="container">
		<div class='displays formula'>
			<form method="post" action="machineCafe.php">
				<!--hidden fields to compute new stocks at each interaction -->
				<input type="hidden" name="stockEau" value="<?= $stock['Eau']; ?>">
				<input type="hidden" name="stockCafe" value="<?= $stock['Cafe']; ?>">
				<input type="hidden" name="stockThe" value="<?= $stock['Thé']; ?>">
				<input type="hidden" name="stockSucre" value="<?= $stock['Sucre']; ?>">
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
  				<br><input class='btn btn-lg btn-primary' type="submit" name="submit">
			</form>
		
			
		</div>
	</div>	
	<?php
	// Verifies if the variable $_POST is defined and echo of all the different 
	// $_POST variables(if defined)
		if (isset($_POST['drink']) && isset($_POST['nbsucre'])){
			echo preparerBoisson($_POST['drink'], $_POST['nbsucre'], $_POST['stockEau'], $_POST['stockCafe'], $_POST['stockThe'], $_POST['stockSucre']);
		}
	?>
<br>

		
	<!-- adds a table with information about the drinks -->	
		
		<table>
			<tr>
				<th>DRINK</th>
				<th>PRICE</th>
				<th>STOCK EAU</th>
				<th>STOCK CAFE</th>
				<th>STOCK THE</th>
				<th>STOCK SUCRE</th>
			</tr>
			<tr>
				<td>Expresso</td>
				<td>50cts</td>
				<!-- Fills the cells with the variables from an array -->
				<td><?= $stock['Eau'] ?></td>
				<td><?= $stock['Cafe'] ?></td>
				<td><?= $stock['Thé'] ?></td>
				<td><?= $stock['Sucre'] ?></td>
			</tr>
			<tr>
				<td>Tea</td>
				<td>50cts</td>
				<td><?= $stock['Eau'] ?></td>
				<td><?= $stock['Cafe'] ?></td>
				<td><?= $stock['Thé'] ?></td>
				<td><?= $stock['Sucre'] ?></td>
			</tr>
			<tr>
				<td>Latte</td>
				<td>60cts</td>
				<td><?= $stock['Eau'] ?></td>
				<td><?= $stock['Cafe'] ?></td>
				<td><?= $stock['Thé'] ?></td>
				<td><?= $stock['Sucre'] ?></td>
			</tr>
			<tr>
				<td>Hot Chocolate</td>
				<td>60cts</td>
				<td><?= $stock['Eau'] ?></td>
				<td><?= $stock['Cafe'] ?></td>
				<td><?= $stock['Thé'] ?></td>
				<td><?= $stock['Sucre'] ?></td>
			</tr>
		</table>
	<br>
	<p>En attente</p>
	<!-- adds the information about how much was inserted in the machine -->		
	<p><b>Inserted Money: <?= $insMon?></b></p>
	
</body> 
</html>