<script>
	app.controller("controllerConsultarComissoes", function($scope, $http) {
	    $scope.listaVendas = [];
	    $scope.listaProdutos = [];

	   function getVendas() {
		    $http.get('/vendas/index.php/Vendas/get_Vendas').then(function(response) {
		    	$scope.listaVendas = response.data;
		    }, function(error){
		    	console.log(error);
		    });
	    }

	    $scope.openModalProdutos = function(objProdutos) {
	    	$http.get('/vendas/index.php/Vendas/get_vendas_itens').then(function(response) {
		    	$scope.listaProdutos = response.data;
	    		$("#modal-produtos").modal('show');
		    }, function(error){
		    	console.log(error);
		    });
	    }

	    getVendas();
	});
</script>
<div ng-app="appVendas" ng-controller="controllerConsultarComissoes">
	<h3>Consulta de Comissões</h3>
	<table class="table">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th>Cliente</th>
				<th>Vendedor</th>
				<th width="10%">Dt. Venda</th>
				<th width="10%">Vl. Venda</th>
				<th width="10%">Vl. Comissao</th>
				<th width="5%"></th>
			</tr>
		</thead>
		<tbody>
			<tr ng-show="listaVendas.length==0">
				<td colspan="7" class="text-center">Nenhuma venda!</td>
			</tr>
			<tr ng-repeat="v in listaVendas">
				<td class="text-center" ng-bind="v.i_venda"></td>
				<td ng-bind="v.nome_cliente"></td>
				<td ng-bind="v.nome_vendedor"></td>
				<td class="text-center" ng-bind="v.dt_venda"></td>
				<td class="text-center" ng-bind="v.vl_total_comissao | number : 2"></td>
				<td class="text-right" ng-bind="v.vl_total_venda | number : 2"></td>
				<td class="text-center">
					<button class="btn btn-sm btn-light" ng-click="openModalProdutos(v)"><i class="fas fa-search"></i></button>
				</td>
			</tr>
		</tbody>
	</table>

	<div id="modal-produtos" class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Produtos</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table class="table">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th>Produto</th>
						<th width="10%">Qtd.</th>
						<th width="10%">Vl. Unitário</th>
						<th width="10%">Vl. Total</th>
						<th width="10%">Vl. Comissao</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="p in listaProdutos">
						<td class="text-center" ng-bind="p.i_produto"></td>
						<td ng-bind="p.descricao"></td>
						<td class="text-center" ng-bind="p.qtd"></td>
						<td class="text-right" ng-bind="p.vl_unitario | number : 2"></td>
						<td class="text-right" ng-bind="p.vl_total | number : 2"></td>
						<td class="text-right" ng-bind="p.vl_comissao | number : 2"></td>
					</tr>
				</tbody>
			</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
