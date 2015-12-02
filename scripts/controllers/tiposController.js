senacNoticias.controller('tipos', function($scope, $location, $http, $routeParams, $route){
	var service = 'services/tipos/index.php';
	$scope.editar_tipo = false;
	editarTipo($routeParams.id_tipo);

	$scope.noticias = function(){
		$location.path('/');
	};

	$scope.adicionarNoticias = function(){
		$location.path('/adicionar-tipo');
	};

	$scope.listaTipos = function(){
		$location.path('/tipos');
	};

	$http.get(service).success(function(resposta){
		$scope.tipos = resposta;
	});

	$scope.salvarTipo = function(tipo){
		if(tipo != null){
			$http.post(service, tipo).then(function(resposta){
				resultado(resposta);
			});
		}
	};

	$scope.editarTipo = function(tipo){
		$http.put(service, tipo).then(function(resposta){
			resultado(resposta);
		});
	};

	$scope.deletarTipo = function(tipo){
		if(confirm("Você realmente deseja deletar esse tipo?")){
			$http.delete(service, {
				params: {id: tipo.id}
			}).then(function(resposta){
				resultado(resposta);
				$route.reload();
			});
		}
	};

	function editarTipo(id){
		if(id > 0){
			$scope.editar_tipo = true;
			$http.get(service, {
				params: {id: id}
			}).success(function(resposta){
				$scope.tipo = resposta.tipo;
			});
		}
	}

	function resultado(resposta){
		if(resposta.data.sucesso == true){
			if(confirm(resposta.data.msg)){
				$location.path('/tipos');
				return;
			}
		}
		alert(resposta.data.msg);
	}
});