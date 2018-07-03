<?php
require_once "Model.php";
class CategoriasModel extends Model{

  function obtenerCategorias()
  {
    $sentencia = $this->db->prepare ( "SELECT * from tipo");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function obtenerCategoria($id_categoria)
  {
    $sentencia = $this->db->prepare ("SELECT * FROM tipo WHERE id=?");
    $sentencia->execute([$id_categoria]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function obtenerTiposCategorias(){
    $sentencia = $this->db->prepare ("SELECT * FROM tipo");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function obtenerTipoCategoria($id_categoria)
  {
    $sentencia = $this->db->prepare ("SELECT * FROM tipo WHERE id=?");
    $sentencia->execute([$id_categoria]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function insertarCategoria($categoria){
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare("INSERT INTO tipo (nombre) VALUES (?)");
    $sentencia->execute($categoria);
    $this->db->commit();
    return $this->db->lastInsertId();
  }

  function editarCategoria($categoria){
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare("UPDATE tipo SET nombre=? WHERE id=?");
    $sentencia->execute($categoria);
    $this->db->commit();
    return $this->db->lastInsertId();
  }

  function deleteCategoria($id_categoria)
  {
    $sentencia = $this->db->prepare("DELETE FROM tipo WHERE id=?");
    $sentencia->execute([$id_categoria]);
  }
}
 ?>
