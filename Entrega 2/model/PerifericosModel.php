<?php
class PerifericosModel{

  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'
               .'dbname=bd_perifericos;charset=utf8'
            , 'root', '');
  }

  function obtenerPerifericos()
  {
    $sentencia = $this->db->prepare ( "SELECT * from periferico");
    $sentencia->execute();
    return $sentencia->fetchAll();
  }

  // function obtenerPeriferico($id_periferico)
  // {
  //   $sentencia = $this->db->prepare ("SELECT * from periferico where id=?");
  //   $sentencia->execute([$id_periferico]);
  //   return $sentencia->fetch();
  // }
  //
  // function insertarPeriferico($periferico){
  //   $this->db->beginTransaction();
  //   $sentencia = $this->db->prepare("INSERT INTO periferico (id, descripcion, marca, id_tipo) VALUES (?,?,?,?)");
  //   $sentencia = execute([$periferico['id'], $periferico['descripción'], $periferico['marca'], $periferico['id_tipo']]);
  //   $this->db->commit();
  //   return $this->db->lastInsertId();
  // }

}
 ?>