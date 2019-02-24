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
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }
    .form-signin .checkbox {
      font-weight: 400;
    }
    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
</style>
<body>
    <form class="form-signin" method="post" action="/vendas/index.php/login/logar"">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <label for="usuario" class="sr-only">E-mail</label>
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Email" required autofocus>
        <label for="senha" class="sr-only">Senha</label>
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
</body>
</html>