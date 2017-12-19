<?php
	$stockExp = 20;
	$stockThe = 10;
	$stockLat = 10;
	$stockCho = 10;
	$insMon = 0;
	$dates = date('l, d F Y');
	$expresso = array('');
	$recettes = array(
					'Expresso' => array(
										'Café' => 1,
										'Eau' => 1),
					'Thé' => array(
									'Eau' => 3,
									'Thé' => 1),
					'Cafe Long' => array(
										'Eau' => 2,
										'Café' => 2));

	function preparerBoisson ($boisson, $nbsucre){
		global $recettes;
		preparer($recettes[$boisson]);
		echo $nbsucre.' sucre';
	}
	function preparer ($recette){
		foreach ($recette as $key => $value) {
			echo $value.' * '.$key.', ';
		};
	};

?>