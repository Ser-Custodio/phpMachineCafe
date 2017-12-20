$(document).ready(function(){
	let numEau = parseInt($('.stockEau').val());
	let numCafe = parseInt($('.stockCafe').val());
	let numThe = parseInt($('.stockThe').val());	
	let numSugar = parseInt($('.stocksugar').val());
	console.log(numSugar);
	switch (numSugar){
		case 0:
			$('.sugarRad1, .sugarRad2, .sugarRad3, .sugarRad4, .sugarRad5').attr('disabled', 'disabled');	
			break;
		case 1:
			$('.sugarRad2, .sugarRad3, .sugarRad4, .sugarRad5').attr('disabled', 'disabled');	
			break;
		case 2:
			$('.sugarRad3, .sugarRad4, .sugarRad5').attr('disabled', 'disabled');	
			break;
		case 3:
			$('.sugarRad4, .sugarRad5').attr('disabled', 'disabled');	
			break;
		case 4:
			$('.sugarRad5').attr('disabled', 'disabled');	
			break;
		default:
			console.log('plenty of sugar');
	}
	if (numEau === 0){
		$('.radioDrink').attr('disabled', 'disabled');	
		$('.stockWater').css('color', 'red');
	}else if(numEau < 2){
		$('.radioLong').attr('disabled', 'disabled');	
		$('.radioThe').attr('disabled', 'disabled');	
	}else if(numEau < 3){
		$('.radioThe').attr('disabled', 'disabled');	
	}
	if (numCafe === 0){
		$('.radioCafe, .radioLong').attr('disabled', 'disabled');	
		$('.stockCoffee').css('color', 'red');
	}else if(numCafe < 2){
		$('.radioLong').attr('disabled', 'disabled');	
	}
	if (numThe === 0){
		$('.radioThe').attr('disabled', 'disabled');
		$('.stockTea').css('color', 'red');
	}

})