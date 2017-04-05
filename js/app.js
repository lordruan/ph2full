
var app = angular.module('mainModule',[]);
app.controller('mainController', ['$scope','$http', '$window', function($scope,$http,$window) {
	$scope.pessoa = null;
	$scope.unidades = null;
	$scope.pontuacao = 10;
	$scope.numberWords = 0;
	$scope.salvar =  function () {
		$http.post(
			'http://127.0.0.1/join-asbr/landing-page/service/servico.php',
			{
				model: 'usuarios',
				metodo: 'inserir',
				pessoa: $scope.pessoa,
				token: '285084093b9dcb94036a4d15cbc29953' //servi�o
			}
		).then(
		function (cadastrado) {
			//
		},
		function (response) {
			$window.alert('Erro no Servi�o');
		}
		);
	}
	$scope.countWords = function() {
		$scope.numberWords = $scope.pessoa.nome.trim().split(/\s+/).length;
	}
	$scope.unidadesGen = function() {
		//obter unidade via get do webservice
		$http.post(
			'http://127.0.0.1/join-asbr/landing-page/service/servico.php',
			{
				model: 'unidades',
				metodo: 'regiaoid',
				regiao_id: $scope.pessoa.regiao,
				token: '285084093b9dcb94036a4d15cbc29953' //servi�o
			}
		).then(
		function (response) {
			$scope.unidades = response.data;

		},
		function (response) {
			$window.alert('Erro no Servi�o');
		}
		);
	}
}]);
/*
Sul - Porto Alegre, Curitiba
Sudeste - S�o Paulo, Rio de Janeiro, Belo Horizonte
Centro-Oeste - Bras�lia
Nordeste - Salvador, Recife
Norte - N�o possui disponibilidade
toke endpoint a25637559aae35328a269e024c020ef8

*/