<?php	
	$insMon = 0;
	$dates = date('l, d F Y');
	$expresso = array('');
	$stock = array('Eau' => 10,
					'Cafe' => 10,
					'Thé' => 10,
					'Sucre' => 10);
	$recettes = array(	'Expresso' => array('Café' => 1,
											'Eau' => 1),
						'Thé' => array(	'Eau' => 3,
										'Thé' => 1),
						'Cafe Long' => array(	'Eau' => 2,
												'Café' => 2));
	function preparerBoisson ($boisson, $nbsucre, $stockEau, $stockCafe, $stockThe, $stockSucre){
		global $recettes;
		global $stock;
		$sucrePrint = '';
		$sucrePrint .= preparer($recettes[$boisson]) . '<p class="recet"> • '.$nbsucre.' * Sucre;';
		$stock['Sucre'] = $stockSucre - $nbsucre;
			if ($boisson === 'Expresso'){
				$stock['Eau'] = $stockEau - $recettes['Expresso']['Eau'];
				$stock['Cafe'] = $stockCafe - $recettes['Expresso']['Café'];
				$stock['Thé'] = $stockThe - 0;
			}else if ($boisson === 'Thé'){
				$stock['Eau'] = $stockEau - $recettes['Thé']['Eau'];
				$stock['Thé'] = $stockThe - $recettes['Thé']['Thé'];
				$stock['Cafe'] = $stockCafe - 0;
			}else if ($boisson === 'Cafe Long'){
				$stock['Eau'] = $stockEau - $recettes['Cafe Long']['Eau'];
				$stock['Cafe'] = $stockCafe - $recettes['Cafe Long']['Café'];
				$stock['Thé'] = $stockThe - 0;
			};
		return $sucrePrint;
	};
	function preparer ($recette){
		$liste = '';
		foreach ($recette as $key => $value) {
			$liste = $liste . '<p class="recet"> • '.$value.' * '.$key.'; </p>';
		};	
		return $liste;	
	};

?>
