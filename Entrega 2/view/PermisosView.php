<?php
  require_once "./libs/Smarty.class.php";
  class PermisosView{
    private $smarty;
    public function __construct(){
      $this->smarty = new Smarty();
      $this->smarty->assign('title', 'Permisos');
    }
    public function mostrarUsuarios($users){
      $this->smarty->assign('user',$users);
      $this->smarty->display('templates/permisos.tpl');
    }
  }
 ?>
