var senacNoticias = angular.module('senacNoticias', ['ngRoute']);

senacNoticias.config(['$routeProvider',
	function($routeProvider) {

		$routeProvider.
			when('/', {
				templateUrl: 'views/noticias/index.html',
				controller: 'noticias'
			})

			.when('/adicionar-noticia', {
				templateUrl: 'views/noticias/editar.html',
				controller: 'noticias'
			})

			.when('/editar-noticia/:id_noticia', {
				templateUrl: 'views/noticias/editar.html',
				controller: 'noticias'
			}).

			when('/tipos', {
				templateUrl: 'views/tipos/index.html',
				controller: 'tipos'
			}).

			when('/adicionar-tipo', {
				templateUrl: 'views/tipos/editar.html',
				controller: 'tipos'
			}).

			when('/editar-tipo/:id_tipo', {
				templateUrl: 'views/tipos/editar.html',
				controller: 'tipos'
			}).

			otherwise({
				redirectTo: '/'
			});
	}
]);