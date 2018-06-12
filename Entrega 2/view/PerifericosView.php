<?php
require_once './libs/Smarty.class.php';
class PerifericosView{

  private $smarty;

  function __construct(){
    $this->smarty = new Smarty;
  }

  function mostrarPerifericos($periferico){
    $this->smarty->assign("perifericos", $periferico);
    $this->smarty->display("MostrarPerifericos.tpl");
  }

  function mostrarVistaCrearPeriferico($tipos){
    $this->smarty->assign("tipos", $tipos);
    $this->smarty->display("crearPeriferico.tpl");
  }

  function mostrarDetalle($periferico, $tipo, $tipos){
    $this->smarty->assign('id_periferico', $periferico['id']);
    $this->smarty->assign('titulo', $periferico['titulo']);
    $this->smarty->assign('descripcion', $periferico['descripcion']);
    $this->smarty->assign('marca', $periferico['marca']);
    $this->smarty->assign('id_tipo', $periferico['id_tipo']);

    $this->smarty->assign('tipo', $tipo);
    $this->smarty->assign("tipos", $tipos);
    $this->smarty->display('mostrarDetalle.tpl');
  }
}
 ?>
