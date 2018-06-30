<?php

$acciones = [
  "" => "LoginController#login",
  "registrarse" => "LoginController#registrarse",
  "registrarUsuario" => "LoginController#registrarUsuario",
  "login" => "LoginController#login",
  "verificarUsuario" => "LoginController#validarLogin",
  "logout" => "LoginController#logout",
  "permisos" => "PermisosController#mostrarUsuarios",
  "actualizarUsuario" => "PermisosController#actualizarUsuario",
  "borrarUsuario" => "PermisosController#borrarUsuario",
  "perifericos" => "PerifericosController#mostrarPerifericos",
  "crearPeriferico" => "PerifericosController#crearPeriferico",
  "guardarPeriferico" => "PerifericosController#guardarPeriferico",
  "editarPeriferico" => "PerifericosController#editarPeriferico",
  "borrarPeriferico" => "PerifericosController#borrarPeriferico",
  "detalle" => "PerifericosController#mostrarDetalle",
  "perifericosOrdenados" => "PerifericosController#listaOrdenada",
  "categorias" => "CategoriaController#mostrarCategorias",
  "crearCategoria" => "CategoriaController#crearCategoria",
  "guardarCategoria" => "CategoriaController#guardarCategoria",
  "editarCategoria" => "CategoriaController#editarCategoria",
  "borrarCategoria" => "CategoriaController#borrarCategoria",
  "detalleCategoria" => "CategoriaController#mostrarDetalleCategoria"

];
?>
