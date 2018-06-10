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

  function mostrarVistaCrearPeriferico($params = [])
  {
    $this->smarty->display("crearPeriferico.tlp");
  }

  function mostrarDetalle($periferico, $tipo){
    $this->smarty->assign('descripcion', $periferico['descripcion']);
    $this->smarty->assign('marca', $periferico['marca']);
    $this->smarty->assign('tipo', $tipo['nombre']);
    $this->smarty->display('mostrarDetalle.tpl');
  }
}
 ?>
