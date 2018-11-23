<?php
	include 'fonctions.php';

	
	
	$show = '';

	$reponse = $bdd->query('SELECT * FROM boisson');
	$newStock = $bdd->query('SELECT * FROM ingredients');
?>
<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8" /> 
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- 	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Coffee Machine</title>
</head> 
<body> 
<!-- 	<h1>•••••••••••••••••••••••••••••••••••••••••<br>THE COFFEE MACHINE<br>•••••••••••••••••••••••••••••••••••••••••</h1> -->
		<!-- adds the date on the page -->
	<!-- <p class='dia'><b>Today is: <?= $dates; ?></b></p> -->
	<?php
	// Verifies if the variable $_POST is defined and echo of all the different 
	// $_POST variables(if defined)
		if (isset($_POST['drink']) && isset($_POST['nbsucre'])){
			$show .= preparerBoisson($_POST['drink'], $_POST['nbsucre'], $_POST['stockEau'], $_POST['stockCafe'], $_POST['stockThe'], $_POST['stockSucre']);
		}
	?>
	<div class="container">
		<div class='displays formula'>
			<form method="post" action="machineCafe.php">
				<!--hidden fields to compute new stocks at each interaction -->
				<input class='stockEau' type="hidden" name="stockEau" value="<?= $stock['Eau']; ?>">
				<input class='stockCafe' type="hidden" name="stockCafe" value="<?= $stock['Cafe']; ?>">
				<input class='stockThe' type="hidden" name="stockThe" value="<?= $stock['Thé']; ?>">
				<input class='stocksugar' type="hidden" name="stockSucre" value="<?= $stock['Sucre']; ?>">
  				<!-- End of hidden fields -->
  				Drink: <br>
				<input class='radioDrink radioExp' type="radio" name="drink" value="Expresso">Expresso
				<input class='radioDrink radioLong' type="radio" name="drink" value="Cafe Long">Café Long
				<input class='radioDrink radioThe' type="radio" name="drink" value="Thé">Thé
  				<br>
  				Number of Sugar:<br>
  				<input class="sugarRad" type="radio" name="nbsucre" value="0" checked>0
  				<input class="sugarRad1" type="radio" name="nbsucre" value="1">1
  				<input class="sugarRad2" type="radio" name="nbsucre" value="2">2
  				<input class="sugarRad3" type="radio" name="nbsucre" value="3">3
  				<input class="sugarRad4" type="radio" name="nbsucre" value="4">4
  				<input class="sugarRad5" type="radio" name="nbsucre" value="5">5
  				<br><input class='btn btn-lg btn-primary' type="submit" name="submit">
			</form>
		</div>
	</div>	
	<?php
	global $show;
	echo $show; 
	?>	
	<!-- adds a table with information about the drinks -->	
		<table>
			<tr>
				<th>CODE</th>
				<th>DRINK</th>
				<th>PRICE</th>
			</tr>
			<?php
				while ($donnes = $reponse->fetch())
				{
					echo "<tr>
						<td>" . $donnes['Code_Boisson'] . "</td>
						<td>".$donnes['Nom_Boisson']. "</td>
						<td>" . $donnes['Prix_Vente']. "</td>
					</tr>";
				};
			?>
			
		</table>
			<?php
				$reponse->closeCursor();
			?>
	<br>	<br>
		<table>
			<tr>
				<th>CODE</th>
				<th>INGREDIENT</th>
				<th>STOCK</th>
			</tr>
			<?php
				while ($stockShow = $newStock->fetch())
				{
					echo "<tr>
						<td>" . $stockShow['Id_Ingredients'] . "</td>
						<td>".$stockShow['Nom_Ingredients']. "</td>
						<td>" . $stockShow['Stock']. "</td>
					</tr>";
				};
			?>
			
		</table>
			<?php
				$newStock->closeCursor();
			?>
<!-- 	<p>En attente</p> -->
	<!-- adds the information about how much was inserted in the machine -->		
<!-- 	<p><b>Inserted Money: <?= $insMon?></b></p> -->
	
</body> 
</html>