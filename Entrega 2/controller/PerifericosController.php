<?php
require_once "./model/PerifericosModel.php";
require_once "./view/PerifericosView.php";
require_once "SecuredController.php";

class PerifericosController extends SecuredController{

  function __construct(){

    $this->model = new PerifericosModel();
    $this->view = new PerifericosView();
  }
    function mostrarPerifericos($params = [])
  {
    $perifericos = $this->model->obtenerPerifericos();
    $permiso = "";
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $permiso = "administrador";
    }else if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 0){
      $permiso = "usuario";
    }else{
      $permiso = "visitante";
    }
    $tipos = $this->model->obtenerTiposPerifericos();
    $this->view->mostrarPerifericos($perifericos,$tipos, $permiso);
  }

  function crearPeriferico()
  {
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $tiposPerifericos = $this->model->obtenerTiposPerifericos();
      $this->view->mostrarVistaCrearPeriferico($tiposPerifericos);
    }
  }

  function guardarPeriferico()
  {
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $periferico = array($_POST['Titulo'], $_POST['Descripcion'], $_POST['Marca'], $_POST['id']);
      $this->model->insertarPeriferico($periferico);
    }
    PageHelpers::homePage();
  }

  function editarPeriferico(){
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $periferico = array($_POST['Titulo'], $_POST['Descripcion'], $_POST['Marca'], $_POST['id_tipo'], $_POST['id_periferico']);
      $this->model->editarPeriferico($periferico);
    }
    PageHelpers::homePage();
  }

  function borrarPeriferico($params = [])
  {
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $this->model->deletePeriferico($params[0]);
    }
    PageHelpers::homePage();
  }

  function mostrarDetalle($params = [])
  {
    $permiso = "";
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $permiso = "administrador";
    }else if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 0){
      $permiso = "usuario";
    }else{
      $permiso = "visitante";
    }
    $periferico = $this->model->obtenerPeriferico($params[0]);
    $tipoPeriferico = $this->model->obtenerTipoPeriferico($periferico['id_tipo']);
    $tiposPerifericos = $this->model->obtenerTiposPerifericos();
    $this->view->mostrarDetalle($periferico, $tipoPeriferico, $tiposPerifericos, $permiso);
  }
}
 ?>
