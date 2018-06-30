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
  "ver" => "PerifericosController#mostrarPerifericos",
  "crear" => "PerifericosController#crearPeriferico",
  "guardar" => "PerifericosController#guardarPeriferico",
  "editar" => "PerifericosController#editarPeriferico",
  "borrar" => "PerifericosController#borrarPeriferico",
  "detalle" => "PerifericosController#mostrarDetalle"
];
?>
