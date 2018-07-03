<?php
define('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/login');
define('LOGOUT', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/logout');

class SecuredController
{
  protected $view;
  protected $model;

  function __construct()
  {
    session_start();
    if(isset($_SESSION['USER'])){
      if (time() - $_SESSION['LAST_ACTIVITY'] > 100000000000009) {
        PageHelpers::loginPage();
        die();
      }
      $_SESSION['LAST_ACTIVITY'] = time();
    }
    else {
      PageHelpers::logoutPage();
      die();
    }
  }
}
 ?>
