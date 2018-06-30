<?php
require_once './libs/Smarty.class.php';
class CategoriasView{

  private $smarty;

  function __construct(){
    $this->smarty = new Smarty;
  }

  function mostrarCategorias($categoria,$permiso){
    $this->smarty->assign("categorias", $categoria);
    $this->smarty->assign("permiso", $permiso);
    $this->smarty->display("MostrarCategorias.tpl");
  }

  function mostrarVistaCrearCategoria($tipos){
    $this->smarty->assign("tipos", $tipos);
    $this->smarty->display("crearCategoria.tpl");
  }

  function mostrarDetalleCategoria($categoria,  $permiso){
    $this->smarty->assign('permiso', $permiso);
    $this->smarty->assign('id_categoria', $categoria['id']);
    $this->smarty->assign('nombre', $categoria['nombre']);
    $this->smarty->display('mostrarDetalleCategoria.tpl');
  }
}
 ?>
