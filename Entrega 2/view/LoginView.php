<?php
class LoginView
{
  protected $smarty;

  function __construct()
  {
    $this->smarty = new Smarty();
    $this->smarty->assign('titulo', 'Perifericos');
  }

  function mostrarLogin($error = ''){
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/index.tpl');
  }

  function mostrarRegistrarse($error = ''){
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/indexRegistrarse.tpl');
  }

}

 ?>
