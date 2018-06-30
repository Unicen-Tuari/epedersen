<?php
require_once "Controller.php";
class SecuredController extends Controller
{
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
