<?php 
	session_start();
	require_once '../model/ModelProdutos.php';
	define('MODELPRODUTOS', new ModelProdutos());
	function retorno($mesage='', $type='danger' , $view='index')
	{
		header("location:http://127.0.0.1/ph2full/".$view.".php?flash=".htmlentities(urlencode($mesage))."&type=".htmlentities(urlencode($type)));
	}
	// valida campos do formulario e retorna eles em um array
	function getCampos()
	{
		if (empty($_POST['descricao'])) {
			retorno("Descrição não pode ser vazia.");
		}elseif(filter_var($_POST['descricao'], FILTER_SANITIZE_STRING) !== 0 || !filter_var($_POST['descricao'], FILTER_SANITIZE_STRING) === false){
			$descricao = $_POST['descricao'];
		}else{
			retorno("Descrição invalido.");
		}
		if (empty($_POST['valor_unitario'])) {
			retorno("Valor Unitario não pode ser vazia.");
		}elseif(filter_var($_POST['valor_unitario'], FILTER_VALIDATE_FLOAT) !== 0 || !filter_var($_POST['valor_unitario'], FILTER_VALIDATE_FLOAT) === false){
			$valor_unitario = $_POST['valor_unitario'];
		}else{
			retorno("Valor Unitario invalido.");
		}
		return ['descricao'=>$descricao,'valor_unitario'=>$valor_unitario];
	}
	function incluir()
	{
		$dados = getCampos();
		$response = MODELPRODUTOS::inserir($dados);
		if ($response[0]){
			retorno("Produto Castrado com Sucesso.","success");
		}else{
			retorno("Erro ao cadastrar o produto:".$response[1]);
		}
	}
	function listar()
	{
		$response = MODELPRODUTOS::getAll();
		$dados = null;
		if ($response[0]){
			$produtos =$response[1];
			foreach ($produtos as $produto) {
				$dados['data'][] = [
					'descricao' => $produto->descricao,
					'valor_unitario' => $produto->valor_unitario,
					'opcoes' => "<a class='btn btn-danger' onclick='fn_excluir(".$produto->id.");'>Excluir</a>/<a class='btn btn-warning' href='editar.php?id=".$produto->id."'>Editar</a>"
				];
			}
			return $dados;
		}
	}
	function info()
	{
		if (empty($_POST['id'])) {
			return (['message'=>"Erro na solicitação.",'type'=>'danger']);
		}elseif(filter_var($_POST['id'], FILTER_VALIDATE_INT) !== 0 || !filter_var($_POST['id'], FILTER_VALIDATE_INT) === false){
			$id = $_POST['id'];
			$response = MODELPRODUTOS::getById($id);
			if ($response[0]){
				return $response[1][0];
			}else{				
				return (['message'=>"Erro ao deletar.",'type'=>'danger']);
			}
		}else{
			return (['message'=>"Erro na solicitação.",'type'=>'danger']);
		}
	}
	function atualizar()
	{
		if (empty($_POST['id'])) {
				retorno("01:Erro ao atualizar.",'danger','listar');
		}elseif(filter_var($_POST['id'], FILTER_VALIDATE_INT) !== 0 || !filter_var($_POST['id'], FILTER_VALIDATE_INT) === false){
			$id = $_POST['id'];
			$dados = getCampos();
			$response = MODELPRODUTOS::atualizar($id,$dados);
			if ($response[0]){
				retorno("Produto atualizado com sucesso.",'success','listar');
			}else{				
				retorno("02:Erro ao atualizar.",'danger','listar');
			}
		}else{
			retorno("03:Erro ao atualizar.",'danger','listar');
		}
	}
	function excluir()
	{
		if (empty($_POST['id'])) {
			return (['message'=>"Erro na solicitação.",'type'=>'danger']);
		}elseif(filter_var($_POST['id'], FILTER_VALIDATE_INT) !== 0 || !filter_var($_POST['id'], FILTER_VALIDATE_INT) === false){
			$id = $_POST['id'];
			$response = MODELPRODUTOS::deletar($id);
			if ($response[0]){
				return (['message'=>"Produto deletado com sucesso.",'type'=>'danger']);
			}else{				
				return (['message'=>"Erro ao deletar.",'type'=>'danger']);
			}
		}else{
			return (['message'=>"Erro na solicitação.",'type'=>'danger']);
		}
	}
	$metodo = (isset($_POST['metodo'])) ? $_POST['metodo'] : null;
	switch ($metodo) {
		case 1:
			incluir();
			break;	
		case 2:
			listar();
			break;		
		case 3:
			header('Content-type:application/json;charset=utf-8');
			echo json_encode(excluir());
			break;	
		case 4:
			header('Content-type:application/json;charset=utf-8');
			echo json_encode(info());
			break;
		case 5:
			atualizar();
			break;		
		default:
			header('Content-type:application/json;charset=utf-8');
			echo json_encode(listar());
			break;
	}


 ?>