<?php	
	$bdd = new PDO('mysql:host=localhost;dbname=machineCafe;charset=utf8','root','');	
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	$insMon = 0;
	$dates = date('l, d F Y');
	
	function availableDrinks (){
		global $bdd;
		$avDrink = $bdd->query('SELECT Nom_Boisson, boisson.Code_Boisson as CodeBoisson
								FROM boisson
								WHERE Nom_Boisson NOT IN (SELECT Nom_Boisson
								FROM boisson
                    			JOIN recette
								ON boisson.Code_Boisson = recette.Id_Boisson
                    			JOIN ingredients
                    			ON ingredients.Id_Ingredients = recette.Id_Ingredients
								WHERE Stock < Qte_Ing)');
		while ($donnes = $avDrink->fetch()){
			echo '<input class="radioDrink radioExp" type="radio" name="drink" value="'.$donnes["CodeBoisson"].'"> '.$donnes["Nom_Boisson"].' ';
		}
		$avDrink->closeCursor();
	};
	function stockSucre(){
		global $bdd;
		$stockSucre = 0;

		$stockSugar = $bdd->query('SELECT Stock FROM ingredients WHERE Nom_Ingredients = "Sucre"');
		$donnees = $stockSugar->fetch();
		$stockSucre = $donnees['Stock'];

		$stockSugar->closeCursor();	
		return $stockSucre;
	}
	function sucre(){
		global $bdd;
		$nbSugar = stockSucre();
		for($i = 0; $i <= $nbSugar && $i< 6; $i++){
			echo '<input class="radioDrink radioExp" type="radio" name="sugar" value="'.$i.'"> '.$i.' ';
		}
	}
	function sales (){
		global $bdd;
		$req_date = $bdd->query('SELECT NOW() as "dateJour"');
		while ($titi = $req_date->fetch()){
			$data = $titi['dateJour'];
		}

		if (isset($_POST['drink']) && isset($_POST['sugar'])){
			$bebida = $_POST['drink'];
			$sugars = $_POST['sugar'];
			
			$sales = $bdd->prepare('INSERT INTO vente (Code_Boisson, Dates, NbSucre)
									VALUES (?,?,?)');
			$sales->execute(array($bebida,$data,$sugars));
	}
}
	function recipe(){
		global $bdd;
		if (isset($_POST['drink']) && isset($_POST['sugar'])){
			$recette = $bdd->prepare('SELECT Nom_Ingredients, Qte_Ing
							FROM recette JOIN ingredients
							ON recette.Id_Ingredients = ingredients.Id_Ingredients
							JOIN boisson
							ON recette.Id_Boisson = boisson.Code_Boisson
							WHERE Id_Boisson = ?');
			$recette->execute(array($_POST['drink']));
			
			while ($toto = $recette->fetch()){
				echo '<p>' .$toto['Nom_Ingredients'] . ' x '.$toto['Qte_Ing'].'</p>';
			 	
			}
		echo "<p>Sucre x ".$_POST['sugar']."</p>";
		}
	}

function updateIngStocks(){
		global $bdd;
		$touched_ing = '';
		if (isset($_POST['drink']) && isset($_POST['sugar'])){
			$recette = $bdd->prepare('SELECT Nom_Ingredients, Qte_Ing
							FROM recette JOIN ingredients
							ON recette.Id_Ingredients = ingredients.Id_Ingredients
							JOIN boisson
							ON recette.Id_Boisson = boisson.Code_Boisson
							WHERE Id_Boisson = ?');
			$recette->execute(array($_POST['drink']));
			
			while ($toto = $recette->fetch()){
				$qteIng = $toto["Qte_Ing"];
				$addedDrink = $toto['Nom_Ingredients'];
				$stockupdate = $bdd->prepare('UPDATE ingredients
												SET Stock = Stock - ?
												WHERE Nom_Ingredients = ?');
				$stockupdate->execute(array($qteIng, $addedDrink));
				$stockupdate->closeCursor();
			}
	}
}
function updateSugarStocks(){
		global $bdd;
		if (isset($_POST['drink']) && isset($_POST['sugar'])){
			$addedSugar = $_POST['sugar'];
			$reqSugar = $bdd->prepare('UPDATE ingredients
										SET Stock = Stock - ?
										WHERE Nom_Ingredients = "Sucre"');
			$reqSugar->execute(array($addedSugar));
			$reqSugar->closeCursor();
		}
	}

	function addStock(){
		global $bdd;
		if (isset($_POST['Ingredientz']) && isset($_POST['qttIng'])){
			$ingToAdd = $_POST['Ingredientz'];
			$qttToAdd = $_POST['qttIng'];
			$toAdd = $bdd->prepare('UPDATE ingredients
									SET Stock = Stock + ?
									WHERE Nom_Ingredients = ?');
			$toAdd->execute(array($qttToAdd, $ingToAdd));
			$toAdd->closeCursor();
		}
	}
?>
