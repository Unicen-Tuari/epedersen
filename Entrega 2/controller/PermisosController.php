<?php
require_once "./model/UsuarioModel.php";
require_once "./view/PermisosView.php";
require_once "SecuredController.php";

class PermisosController extends SecuredController
{
    function __construct()
    {
        $this->view = new PermisosView();
        $this->model = new UsuarioModel();
    }
    public function mostrarUsuarios(){
      session_start();
      if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == 1){
        $users = $this->model->getUsers();
        $this->view->mostrarUsuarios($users);
      }
    }
    public function actualizarUsuario(){
      $values = array($_POST['usuario'],(int)$_POST['admin'],(int)$_POST['id']);
      $this->model->actualizarUsuario($values);
      PageHelpers::PermisosPage();
    }
    public function borrarUsuario($params = []){
      $this->model->borrarUsuario([$params[0]]);
      PageHelpers::PermisosPage();
    }
}
