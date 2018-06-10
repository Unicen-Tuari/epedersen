<?php
require_once "./model/PerifericosModel.php";
require_once "./view/PerifericosView.php";

class PerifericosController {

  private $perifericosModel;
  private $perifericosView;

  function __construct(){

    $this->perifericosModel = new PerifericosModel();
    $this->perifericosView = new PerifericosView();
  }
    function mostrarPerifericos($params = [])
  {
    $perifericos = $this->perifericosModel->obtenerPerifericos();
    $this->perifericosView->mostrarPerifericos($perifericos);
  }

  function crearPeriferico()
  {
    $tiposPerifericos = $this->perifericosModel->obtenerTiposPerifericos();
    $this->perifericosView->mostrarVistaCrearPeriferico($tiposPerifericos);
  }

  function guardarPeriferico()
  {
    $periferico = array($_POST['Titulo'], $_POST['Descripcion'], $_POST['Marca'], $_POST['id']);
    $this->perifericosModel->insertarPeriferico($periferico);
    PageHelpers::homePage();
  }

  function editarPeriferico(){
    $periferico = array($_POST['Titulo'], $_POST['Descripcion'], $_POST['Marca'], (int)$_POST['id_tipo'], (int)$_POST['id_periferico']);
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    // $this->perifericosModel->editarPeriferico($periferico);
  }

  function borrarPeriferico($params = [])
  {
    $this->perifericosModel->deletePeriferico($params[0]);
    PageHelpers::homePage();
  }

  function mostrarDetalle($params = [])
  {
    $periferico = $this->perifericosModel->obtenerPeriferico($params[0]);
    $tipoPeriferico = $this->perifericosModel->obtenerTipoPeriferico($periferico['id_tipo']);
    $tiposPerifericos = $this->perifericosModel->obtenerTiposPerifericos();
    $this->perifericosView->mostrarDetalle($periferico, $tipoPeriferico, $tiposPerifericos);
  }
}
 ?>
