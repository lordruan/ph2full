<?php 
	include '../model/ModelProdutos';
	function retorno($mesage='', $type='danger')
	{
		header("location:http://127.0.0.1/ph2full/index.php?flash=".htmlentities(urlencode($mesage))."&type=".htmlentities(urlencode($type)));
	}
	function incluir()
	{
		# code...
	}
	$mtd = (isset($_GET['metodo'])) ? $_GET['metodo'] : null;
	$metodo = (filter_var($mtd, FILTER_VALIDATE_INT) === 0 || !filter_var($mtd, FILTER_VALIDATE_INT) === false) ? $mtd : retorno("Erro na url.");
	switch ($metodo) {
		case 1:
			incluir();
			break;
		
		default:
			# code...
			break;
	}


 ?>