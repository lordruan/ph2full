<?php 
require_once 'database.php';

class ModelProdutos
{
	public function getAll($ativo = true)
	{
		$model = new Database();
		$response = $model->getAll('produtos',$ativo);
		return $response;
	}
	public function getById($id='')
	{
		if (!empty($id)){
			$model = new Database();
			$response = $model->byId('produtos',$id);
			return $response;
		}
	}
	public function atualizar($id, $dados)
	{
		if (!empty($id))
		if (!empty($dados))
		{			
			$model = new Database();
			$update = self::tratarUpdate($dados);
			$response = $model->edit('produtos',$update,$id);
			return $response;
		}
	}
	public function inserir($dados)
	{
		if (!empty($dados)){
			$model = new Database();
			$insersao = self::tratarInsert($dados);
			$response = $model->inserir('produtos',$insersao['campos'],$insersao['valores']);
			return $response;
		}
	}
	public function deletar($id='')
	{
		if (!empty($id)){
			$model = new Database();
			$response = $model->delete('produtos',$id);
			return $response;
		}
	}
	private function tratarUpdate($dados='')
	{	
		$campos_valores = [
			"`descricao` = '".$dados['descricao']."'",
			"`valor_unitario` =".$dados['valor_unitario']
		];		
		return self::preparaValores($campos_valores);
	}
	private function tratarInsert($dados='')
	{	
		$campos = [
			"`descricao`",
			"`valor_unitario`",
		];		
		$valores =array();
		$valores[] = "'".$dados['descricao']."'";
		$valores[] = $dados['valor_unitario'];
		return ['campos'=>self::preparaValores($campos),'valores'=>self::preparaValores($valores)];
	}
	private function preparaValores($dados)
    {
        return implode(',', $dados);
    }
}