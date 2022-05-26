<?php
  session_start();
  include 'conexion_usuario.php';
  $idC=$_GET['idC'];
  $cita=$_GET['cita'];

    //eliminar
  $eliminar="DELETE FROM citas WHERE id_citas = '$idC'";
  $resultadoEliminar = mysqli_query($conexion, $eliminar);
    //actualizar
  $actualizar="UPDATE horas t1, horas t2 SET t1.libres=t1.ocupadas, t1.ocupadas=t2.libres WHERE t1.id_horas=t2.id_horas AND t1.ocupadas= '$cita';";
  $resultadoAztualizar = mysqli_query($conexion, $actualizar);

  if ($resultadoEliminar){
    header("location: ../sesion.php");
  }
  else{
    echo '<script>alert("No se pudo eliminar")</script>';
  }

?>