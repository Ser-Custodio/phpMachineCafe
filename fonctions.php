<?php
	$expresso = array('');
	$recettes = array(
					'expresso' => array(
										'cafe' => 1,
										'eau' => 1),
					'thé' => array(
									'eau' => 3,
									'the' => 1),
					'cafe long' => array(
										'eau' => 2,
										'cafe' => 2));

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