angular.module('controller', [])

	.controller('mainController', function($scope, $http, $modal, $log, Password, Client) {

		$scope.loading = true;

		Password.all().success(function(data) {
			$scope.passwords = data;
			$scope.loading = false;
		});

		$scope.edit = function (id) {

			Password.get(id).success(function(data) {

				var modalInstance = $modal.open({
					templateUrl: '/modals/password/edit',
					controller: 'modalEditController',
					resolve: {
						modalData: function () {
							return data;
						},
					}
				});

				modalInstance.result.then(function (items) {
					$scope.passwords = items;
				}, function () {
					$log.info('Modal dismissed at: ' + new Date());
				});

			});

		};

		$scope.create = function () {

			Client.all().success(function(data) {

				var modalInstance = $modal.open({
					templateUrl: '/modals/password/create',
					controller: 'modalCreateController',
					resolve: {
						clients: function () {
							return data;
						},
					}
				});

				modalInstance.result.then(function (items) {
					$scope.passwords = items;
				}, function () {
					$log.info('Modal dismissed at: ' + new Date());
				});

			});

		};

		$scope.deletePassword = function(id) {
			$scope.loading = true;

			Password.destroy(id).success(function(data) {

				Password.all().success(function(getData) {
					$scope.passwords = getData;
					$scope.loading = false;
				});

			});

		};

	}).controller('modalEditController', function ($scope, $modalInstance, modalData, Password) {

		$scope.modalData = modalData;

		$scope.ok = function () {

			$scope.loading = true;
			Password.update($scope.modalData).success(function(data) {

				Password.all().success(function(getData) {
					$scope.loading = false;
					$modalInstance.close(getData);
				});

			}).error(function(data) {
				console.log(data);
			});

		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};

	}).controller('modalCreateController', function ($scope, $modalInstance, clients, Password) {

		$scope.clients = clients;

		$scope.ok = function () {

			$scope.loading = true;

			Password.save($scope.modalData).success(function(data) {

				Password.all().success(function(getData) {
					$scope.loading = false;
					$modalInstance.close(getData);
				});

			}).error(function(data) {
				console.log(data);
			});

		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};

	});
