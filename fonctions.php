<?php
	
		$insMon = 0;
		$dates = date('l, d F Y');
		$expresso = array('');
		$stock = array(
						'Eau' => 15,
						'Cafe' => 25,
						'Thé' => 18,
						'Sucre' => 14,
					);
	
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

	function preparerBoisson ($boisson, $nbsucre, $stockEau, $stockCafe, $stockThe, $stockSucre){
		global $recettes;
		global $stock;
		preparer($recettes[$boisson]);
		echo '<p class="recet"> • '.$nbsucre.' sucre;';
		$stock['Sucre'] = $stockSucre - $nbsucre;
			if ($boisson === 'Expresso'){
				$stock['Eau'] = $stockEau - 1;
				$stock['Cafe'] = $stock['Cafe'] - 1;
			}else if ($boisson === 'Thé'){
				$stock['Eau'] = $stockEau - 3;
				$stock['Thé'] = $stockThe - 1;
			}else if ($boisson === 'Cafe Long'){
				$stock['Eau'] = $stockEau - 2;
				$stock['Cafe'] = $stockCafe - 2;
			};
	}
	function preparer ($recette){
		foreach ($recette as $key => $value) {
			echo '<p class="recet"> • '.$value.' * '.$key.'; </p>';	
		};		
	};

?>