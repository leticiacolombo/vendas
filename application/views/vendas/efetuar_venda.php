<script>
	$(document).ready(function() { 
    	$('.js-example-basic-single').select2();
    });

	app.controller("controllerEfetivarVenda", function($scope, $http) {
	    $scope.objVenda = {
	    	produtos : []
	    };
	    $scope.objProduto = {};
	    $scope.listaClientes = [];
	    $scope.listaVendedores = [];
	    $scope.listaProdutos = [];

	   function getClientes() {
		    $http.get('/vendas/index.php/Clientes/get_clientes').then(function(response) {
		    	$scope.listaClientes = response.data;
		    }, function(error){
		    	console.log(error);
		    });
	    }

	    function getVendedores() {
		    $http.get('/vendas/index.php/Vendedores/get_vendedores').then(function(response) {
		    	$scope.listaVendedores = response.data;
		    }, function(error){
		    	console.log(error);
		    });
	    }

	    function getProdutos() {
		    $http.get('/vendas/index.php/Produtos/get_produtos').then(function(response) {
		    	$scope.listaProdutos = response.data;
		    }, function(error){
		    	console.log(error);
		    });
	    }

	    $scope.calculaValores = function() {
	    	$scope.objProduto.vl_total = $scope.objProduto.qtd * $scope.objProduto.vl_unitario;
	    }

	    $scope.adicionarProduto = function() {
	    	if ($scope.form_produtos.produto.$error.required) { swal('Oops...', 'Selecione o Produto', 'error'); }

	    	if ($scope.form_produtos.$valid){
		    	$scope.objVenda.produtos.push($scope.objProduto);
		    	$scope.objProduto = {};
	    	}
	    }

	    $scope.deleteProduto = function(index) {
	    	$scope.objVenda.produtos.splice(index, 1);
	    }

	    $scope.toSave = function() {
	    	if ($scope.form_venda.cliente.$error.required) { swal('Oops...', 'Selecione o Cliente', 'error'); }
	    	if ($scope.form_venda.vendedor.$error.required) { swal('Oops...', 'Selecione o Vendedor', 'error'); }

	    	if ($scope.form_venda.$valid){
				if ($scope.objVenda.produtos.length > 0) {
					$http.post('set_venda', $scope.objVenda).then(function(response) {
				    	
				    }, function(error){
				    	console.log(error);
				    });
				} else {
					swal('Oops...', 'Adicione pelo menos um produto', 'error');
				}
	    	}
	    }

	    $scope.selecionaProduto = function() {
	    	$scope.objProduto.vl_unitario = $scope.objProduto.produto.vl_produto;
	    	$scope.calculaValores();
	    }

	    getClientes();
	    getVendedores();
	    getProdutos();
	});
</script>
<div ng-app="appVendas" ng-controller="controllerEfetivarVenda">
	<h3>Nova Venda</h3>
	<form id="form_venda" name="form_venda" ng-submit=toSave()>
		<div class="row">
			<div class="form-group col-sm-2">
			    <label for="i_venda">Cód. Venda</label>
			    <input type="text" class="form-control" id="i_venda" ng-model="objVenda.i_venda" disabled>
			</div>	
		</div>
		<div class="row">
			<div class="form-group col-sm-12">
			    <label for="cliente">Cliente</label>
			    <select class="js-example-basic-single form-control" name="cliente" id="cliente" ng-model="objVenda.cliente" ng-options="c as c.nome for c in listaClientes track by c.i_cliente" ng-required="true">
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm-12">
			    <label for="vendedor">Vendedor</label>
			    <select class="js-example-basic-single form-control" name="vendedor" id="vendedor" ng-model="objVenda.vendedor" ng-options="c as c.nome for c in listaVendedores track by c.i_vendedor" ng-required="true" ng-change="calculaValores()">
				</select>
			</div>	
		</div>
	</form>
	<h5>Adicionar Produtos</h5>
	<form id="form_produtos" name="form_produtos" ng-submit="adicionarProduto()" class="needs-validation">
		<div class="row">
			<div class="form-group col-sm-12">
			    <label for="produto">Produto</label>
			    <select class="js-example-basic-single form-control" id="produto" name="produto" ng-model="objProduto.produto" ng-options="c as c.descricao for c in listaProdutos track by c.i_produto" ng-required="true" ng-change="selecionaProduto()">
				</select>
			</div>	
		</div>
		<div class="row">
			<div class="form-group col-sm-4">
			    <label for="qtd">Quantidade</label>
			    <input type="number" class="form-control text-right" name="qtd" ng-model="objProduto.qtd" ng-change="calculaValores()" ng-required="true" min="1">
				</select>
			</div>
			<div class="form-group col-sm-4">
			    <label for="vl_unitario">Vl. Unitário</label>
			    <input type="text" class="form-control text-right" name="vl_unitario" ng-model="objProduto.vl_unitario" ng-change="calculaValores()" ui-number-mask="2" ng-required="true">
				</select>
			</div>
			<div class="form-group col-sm-4">
			    <label for="vl_total">Vl. Total</label>
			    <input type="text" class="form-control text-right" name="vl_total" ng-model="objProduto.vl_total" disabled ui-number-mask="2" ng-required="true">
				</select>
			</div>
		</div>
		<div class="text-right">
			<button type="submit" class="btn btn-primary">Adicionar Produto</button>
		</div>
	</form>
	<h5>Produtos da Venda</h5>
	<table class="table">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th>Produto</th>
				<th width="10%">Qtd.</th>
				<th width="10%">Vl. Unitário</th>
				<th width="10%">Vl. Total</th>
				<th width="5%"></th>
			</tr>
		</thead>
		<tbody>
			<tr ng-show="objVenda.produtos.length==0">
				<td colspan="7" class="text-center">Nenhum produto adicionado!</td>
			</tr>
			<tr ng-repeat="p in objVenda.produtos">
				<td class="text-center" ng-bind="p.produto.i_produto"></td>
				<td ng-bind="p.produto.descricao"></td>
				<td class="text-center" ng-bind="p.qtd"></td>
				<td class="text-right" ng-bind="p.vl_unitario | number : 2"></td>
				<td class="text-right" ng-bind="p.vl_total | number : 2"></td>
				<td class="text-center">
					<button class="btn btn-danger" ng-click="deleteProduto($index)">&times;</button>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="text-right">
		<button type="submit" class="btn btn-success" form="form_venda">Salvar Venda</button>
	</div>
</div>
