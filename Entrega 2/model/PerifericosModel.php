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
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function obtenerPeriferico($id_periferico)
  {
    $sentencia = $this->db->prepare ("SELECT * FROM periferico WHERE id=?");
    $sentencia->execute([$id_periferico]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function obtenerTiposPerifericos(){
    $sentencia = $this->db->prepare ( "SELECT * FROM tipo");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function obtenerTipoPeriferico($id_periferico)
  {
    $sentencia = $this->db->prepare ("SELECT * FROM tipo WHERE id=?");
    $sentencia->execute([$id_periferico]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function insertarPeriferico($periferico){
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare("INSERT INTO periferico (titulo, descripcion, marca, id_tipo) VALUES (?,?,?,?)");
    $sentencia->execute($periferico);
    $this->db->commit();
    return $this->db->lastInsertId();
  }

  function editarPeriferico($periferico){
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare("UPDATE periferico SET titulo=?, descripcion=?, marca=?, id_tipo=? WHERE id=?");
    $sentencia->execute($periferico);
    $this->db->commit();
    return $this->db->lastInsertId();
  }

  function deletePeriferico($id_periferico)
  {
    $sentencia = $this->db->prepare("DELETE FROM periferico WHERE id=?");
    $sentencia->execute([$id_periferico]);
  }
}
 ?>
