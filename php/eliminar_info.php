<?php
  session_start();
  include 'conexion_usuario.php';

  $idInf=$_GET['idInf'];
  $idU=$_GET['idU'];
    //eliminar
  $eliminarInf="DELETE FROM informes WHERE id_informes = '$idInf' and id_usuarios='$idU' ";
  $resultadoEliminarInf = mysqli_query($conexion, $eliminarInf);

  if ($resultadoEliminarInf){
    header("location: ../sesionAdmin.php");
   // echo 'bien';
  }
  else{
    echo '<script>alert("No se pudo eliminar")</script>';
  }

?>