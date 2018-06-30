<?php
require_once "./model/CategoriasModel.php";
require_once "./view/CategoriasView.php";
require_once "SecuredController.php";

class CategoriaController extends SecuredController{

  function __construct(){

    $this->model = new CategoriasModel();
    $this->view = new CategoriasView();
  }
    function mostrarCategorias($params = [])
  {
    $categorias = $this->model->obtenerCategorias();
    $permiso = "";
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $permiso = "administrador";
    }else if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 0){
      $permiso = "usuario";
    }else{
      $permiso = "visitante";
    }
    $this->view->mostrarCategorias($categorias,$permiso);
  }

  function crearCategoria()
  {
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $tiposCategorias = $this->model->obtenerTiposCategorias();
      $this->view->mostrarVistaCrearCategoria($tiposCategorias);
    }
  }

  function guardarCategoria()
  {
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $categoria = array($_POST['nombre']);
      $this->model->insertarCategoria($categoria);
    }
    PageHelpers::categoriasPage();
  }

  function editarCategoria(){
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $categoria = array($_POST['nombre'], $_POST['id_categoria']);
      $this->model->editarCategoria($categoria);
    }
    PageHelpers::categoriasPage();
  }

  function borrarCategoria($params = [])
  {
    session_start();
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
      $this->model->deleteCategoria($params[0]);
    }
    PageHelpers::categoriasPage();
  }

  function mostrarDetalleCategoria($params = [])
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
    $categoria = $this->model->obtenerCategoria($params[0]);
    $this->view->mostrarDetalleCategoria($categoria, $permiso);
  }
}
 ?>
