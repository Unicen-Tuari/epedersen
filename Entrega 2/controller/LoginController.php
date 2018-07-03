<?php
require_once "./model/UsuarioModel.php";
require_once "./view/LoginView.php";

class LoginController
{
  private $model;
  private $view;
  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new UsuarioModel();
  }
  public function login()
  {
    $this->view->mostrarLogin();
  }
  public function registrarse(){
    $this->view->mostrarRegistrarse();
  }
  public function registrarUsuario(){
    $userName = $_POST['usuario'];
    $password = $_POST['password'];
    if (!empty($userName) && !empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $value = array($userName,$password);
        $this->model->registrarUsuario($value);
        $this->validarLogin();
    }
  }
  public function validarLogin()
  {
      $userName = $_POST['usuario'];
      $password = $_POST['password'];
      if(!empty($userName) && !empty($password)){
        $user = $this->model->getUser($userName);
        if((!empty($user)) && password_verify($password, $user[0]['password'])) {
            session_start();
            $_SESSION['USER'] = $userName;
            $_SESSION['ADMIN'] = $user[0]['admin'];
            $_SESSION['LAST_ACTIVITY'] = time();
            PageHelpers::homePage();
        }
        else{
            $this->view->mostrarLogin('Usuario o Password incorrectos');
        }
      }
  }
  public function logout()
  {
    session_start();
    session_destroy();
    PageHelpers::loginPage();
  }
}
 ?>
