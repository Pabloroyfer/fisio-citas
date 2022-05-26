<?php
  session_start();
  include 'conexion_usuario.php';
  $idCi=$_GET['idCi'];
  $cita=$_GET['cita'];
    //eliminar
  $eliminarI="DELETE FROM citas WHERE id_citas = '$idCi'";
  $resultadoEliminarI = mysqli_query($conexion, $eliminarI);
    //actualizar
  $actualizarI="UPDATE horas t1, horas t2 SET t1.libres=t1.ocupadas, t1.ocupadas=t2.libres WHERE t1.id_horas=t2.id_horas AND t1.ocupadas= '$cita';";
  $resultadoAztualizarI = mysqli_query($conexion, $actualizarI);

  if ($resultadoEliminarI){
    header("location: ../sesionAdmin.php");
  }
  else{
    echo '<script>alert("No se pudo eliminar")</script>';
  }

?>