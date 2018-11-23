<?php
	include 'fonctions.php';
	
	
	$reponse = $bdd->query('SELECT * FROM boisson');	
	function get_recettes() {
		global $bdd;
		return $bdd->query('SELECT * FROM ingredients');
	}
	$listIngre = $bdd->query('SELECT Nom_Ingredients FROM ingredients');
?>
<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8" /> 
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Coffee Machine</title>
</head> 
<body> 
	<?php
		updateSugarStocks();
		updateIngStocks();
		addStock();
	?>
	<div class='displays formula'>
		<form method="post" action="test.php">
			Available Drink: <br>
			<?php availableDrinks() ?>
		<br>
			Number of Sugar:<br>
			<?php sucre(); ?>
			<br><input class='btn btn-primary' type="submit" name="submit">
		</form>
			<?php		
				recipe();
				sales();
			?>

	</div>
<div class='container'>
	<div class='row'>
		<div class='col-sm-6'>
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
		</div>
		<div class='col-sm-6'>
			<table>
				<tr>
					<th>CODE</th>
					<th>INGREDIENT</th>
					<th>STOCK</th>
				</tr>
				<?php
					$recettes = get_recettes();
					while ($donnes = $recettes->fetch())
					{
						echo "<tr>
							<td>" . $donnes['Id_Ingredients'] . "</td>
							<td>".$donnes['Nom_Ingredients']. "</td>
							<td>" . $donnes['Stock']. "</td>
						</tr>";
					};
				?>
			</table>
			Add to Stock:
					<form method="post" action="test.php">
						Ingredient:
  							<select name="Ingredientz">
    							<?php
    								while ($option = $listIngre->fetch()){
    								echo '<option value="'.$option["Nom_Ingredients"].'">'.$option["Nom_Ingredients"].'</option>';
    								}
    							?>
  							</select>
  						Quantity:
  						<input type="text" name="qttIng">
 						<br><br>
  						<input class='btn btn-primary' type="submit">
  						
					</form>
	</div>
</div>
		
			
	

