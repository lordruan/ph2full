<?php 
require_once 'database.php';

class ModelProdutos
{
	public function getAll()
	{
		$model = new Database();
		$response = $model->getAll('produtos');
		if ($response[0]){
			return $response[1];
		}
		return $response[1];
	}
	public function inserir($dados)
	{
		if (!empty($dados)){
			$insersao = self::tratarInsert($dados);
			$model = new Database();
			$response = $model->inserir('produtos',$insersao[0],$insersao[1]);
			if ($response[0]){
				return $response[1]);
			}
			return $response[1];
		}
	}
	private function tratarInsert($dados='')
	{
		$campos = [
			"`descricao`",
			"`valor_unitario`",
		];		
		$valores =array();
		$valores[] = "'".$dados->descricao."'";
		$valores[] = "'".$dados->valor_unitario."'";
		return [self::preparaValores($campos),self::preparaValores($valores)];
	}
	private function preparaValores($dados)
    {
        return implode(',', $dados);
    }
    private function tratarData($data)
    {
    	return explode('/', $data);
    }
    public function tratarDateHtml($dados)
	{
		$dados_array = explode('T', $dados);
		return explode('-', $dados_array[0]);
	}

}