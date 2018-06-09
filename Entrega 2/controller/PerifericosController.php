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

  function crearPeriferico($params = [])
  {
    $this->perifericosView->mostrarVistaCrearPeriferico();
  }

  function guardarPeriferico($params = [])
  {
    $periferico = [
      'id' => $_POST['id'],
      'descripcion' => $_POST['descripcion'],
      'marca' => $_POST['marca']
    ];
    $this->perifericosModel->insertarPeriferico($periferico);
    PageHelpers::homePage();
  }

  function borrarPeriferico($params = [])
  {
    $this->perifericosModel->deletePeriferico($params[0]);
    PageHelpers::homePage();
  }
}
 ?>
