<?php
require_once "Model.php";
class UsuarioModel extends Model
{
  function getUser($userName){
    $sentencia = $this->db->prepare( "select * from usuario where usuario = ? limit 1");
    $sentencia->execute([$userName]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function registrarUsuario($value){
    $sentencia = $this->db->prepare( "insert into usuario(usuario, password) values(?,?)");
    $sentencia->execute($value);
  }
  function getUsers(){
    $sentencia = $this->db->prepare( "select id_usuario, usuario, admin from usuario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function actualizarUsuario($value){
    $sentencia = $this->db->prepare( "update usuario set usuario = ?, admin = ? where id_usuario = ?");
    $sentencia->execute($value);
  }
  function borrarUsuario($id){
    $sentencia = $this->db->prepare( "delete from usuario where id_usuario=?");
    $sentencia->execute($id);
  }
}
 ?>
