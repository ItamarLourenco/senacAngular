senacNoticias.controller("noticias", function($scope, $http, $location, $routeParams, $route){
	var service = 'services/noticias/index.php';
	var serviceTipo = 'services/tipos/index.php';

	$scope.editar_noticias = false;
	$scope.tipos = null;
	editarUsuario($routeParams.id_noticia);

	$http.get(service).success(function(resposta){
		$scope.noticias = resposta;

		$scope.tipos = $http.get(serviceTipo).success(function(resposta){
			$scope.tipos = resposta;
		});

	});

	$scope.adicionarNoticias = function(){
		$location.path('/adicionar-noticia');
	};

	$scope.listaNoticias = function(){
		$location.path('/');
	};

	$scope.salvarNoticia = function(noticia){
		if(noticia != null){
			$http.post(service, noticia).then(function(resposta){
				resultado(resposta);
			});
		}
	};

	$scope.editarNoticia = function(noticia){
		$http.put(service, noticia).then(function(resposta){
			resultado(resposta);
		});
	};

	$scope.deletarNoticia = function(noticia){
		if(confirm("Você realmente deseja deletar essa notícia?")){
			$http.delete(service, {
				params: {id: noticia.id}
			}).then(function(resposta){
				resultado(resposta);
				$route.reload();
			});
		}
	};

	$scope.gerenciarTipos = function(){
		$location.path('/tipos');
	};

	function editarUsuario(id){
		if(id > 0){
			$scope.editar_noticias = true;
			$http.get(service, {
				params: {id: id}
			}).success(function(resposta){
				$scope.noticia = resposta.noticia;
			});
		}
	};


	function resultado(resposta){
		if(resposta.data.sucesso == true){
			if(confirm(resposta.data.msg)){
				$location.path('/');
				return;
			}
		}
		alert(resposta.data.msg);
	}

});