<?php

class PageHelpers
{
  public static function homePage()
  {
    header("Location: ".BASEURL."ver");
    die();
  }

  public static function PermisosPage()
  {
    header("Location: ".BASEURL."permisos");
    die();
  }

  public static function loginPage()
  {
    header("Location: ".BASEURL."");
    die();
  }

  public static function logoutPage()
  {
    header("Location: ".BASEURL."/logout");
    die();
  }

}


 ?>
