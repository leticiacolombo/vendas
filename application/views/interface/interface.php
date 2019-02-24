<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Sistema - Vendas</title>
	
	<script src="/vendas/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="/vendas/node_modules/select2/dist/js/select2.full.min.js"></script>
	<script src="/vendas/node_modules/angular/angular.min.js"></script>
	<script src="/vendas/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/vendas/node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/vendas/node_modules/angular-input-masks/releases/angular-input-masks-standalone.min.js"></script>
	<link rel="stylesheet" href="/vendas/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/vendas/node_modules/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="/vendas/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>
<script type="text/javascript">
	var app = angular.module("appVendas", ['ui.utils.masks']);
</script>
<style type="text/css">
	.has-error {
		border-color: #dc3545;
	}
</style>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
		<a class="navbar-brand" href="#">Navbar</a>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/vendas/index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/vendas/index.php/Vendas/efetuar_venda">Nova Venda</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/vendas/index.php/Vendas/consultar_comissao">Comissões</a>
				</li>
			</ul>
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<a class="nav-link" href="/vendas/index.php/Login/logout">Sign out</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container" style="margin-top: 65px;">
		<?php $this->load->view($pagina); ?>
	</div>
</body>
</html>