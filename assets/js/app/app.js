var app = angular.module('angularTable', ['angularUtils.directives.dirPagination']);


app.controller("Userctrl", function($scope) {
    $scope.nombre = "Nombre";
    $scope.apellido = "Usuario";
});

app.controller('listdata',function($scope, $http){
	$scope.users = []; //declare an empty array
	$scope.entryLimit=10;
	$scope.valor=0;
	//http://calotpropiedades.com/calotkpi/view/metricar/actions.php
	//http://localhost/prueba/calotkpi/view/metricar/actions.php
	//http://calotpropiedades.com/calotkpi/view/metricar/actions.php
	$http.get("http://localhost/sistemas/calotkpi/iniciosesion/view/metricar/actions.php").success(function(response){ 
		$scope.users = response;  //ajax request to fetch data into $scope.data
	});
	
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	};
	
 	$scope.delNom = function(id_m) {
		$scope.valor = prompt('Ingrese su Metrica:','');
       // if ( confirm("Seguro que desea agregar el valor?") ) {
		 $http.get("http://calotpropiedades.com/calotkpi/view/metricar/cpo.php?val="+$scope.valor+"&id_m="+id_m).then(function(response) {
				//$scope.myData = response.data.records;
				console.log(response.data);
			});
         //}
     };
	

	
	
});
/*
				echo '{"fecha": "' . $registros[$i]["FECHA"] . '", "nombres": "' . $registros[$i]["INT"] . '", "email": "' . $registros[$i]["EMAIL"] . '", "te": "' . $registros[$i]["TE"] . '", "v": "' . $registros[$i]["V"] . '", "fc": "' . $registros[$i]["F/C"] . '", "w-a": "' . $registros[$i]["W-A"] . '", "mail": "' . $registros[$i]["MAIL"] . '", "1erll": "' . $registros[$i]["1er LL"] . '", "2doll": "' . $registros[$i]["2do LL"] . '", "2domail": "' . $registros[$i]["2do MAIL"] . '", "est": "' . $registros[$i]["EST"] . '", "dir": "' . $registros[$i]["DIR"] . '"},'."\n";
*/