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

  function MostrarDetalle($periferico){
    $this->smarty->assign('id', $tarea['id']);
    $this->smarty->assign('descripcion', $tarea['descripcion']);
    $this->smarty->assign('marca', $tarea['marca']);
  }
}
 ?>
