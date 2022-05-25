<?php
  session_start();
  include 'conexion_usuario_be.php';

  $checkbox1 = $_POST['hora'];

  //DIA LUNES
  if(isset($_POST["submit1"])){
    for ($i=0; $i<sizeof($checkbox1); $i++){
      $selected=$checkbox1[$i];
      $query="INSERT INTO citas (cita, id_dias, nombre) VALUES ('".$selected."','1', '".$_SESSION['usuario']."')";
      $query1="UPDATE horas SET libres=NULL, ocupadas='$selected' WHERE id_dias=1 AND libres='$selected';";
      mysqli_query ($conexion, $query) or die(mysqli_connect_error());
      mysqli_query ($conexion, $query1) or die(mysqli_connect_error());
    }
       header("location: ../sesion.php");
       //echo "Insertado". $selected;
       exit();
  }

  //DIA MARTES
    if(isset($_POST["submit2"])){
      for ($i=0; $i<sizeof($checkbox1); $i++){
        $selected=$checkbox1[$i];
        $query="INSERT INTO citas (cita, id_dias, nombre) VALUES ('".$selected."','2', '".$_SESSION['usuario']."')";
        $query1="UPDATE horas SET libres=NULL, ocupadas='$selected' WHERE id_dias=2 AND libres='$selected';";
        mysqli_query ($conexion, $query) or die(mysql_error());
        mysqli_query ($conexion, $query1) or die(mysql_error());
        
      }
         header("location: ../sesion.php");
         //echo "Insertado". $selected;
         exit();
    }
  
  //DIA MIERCOLES
  if(isset($_POST["submit3"])){
    for ($i=0; $i<sizeof($checkbox1); $i++){
      $selected=$checkbox1[$i];
      $query="INSERT INTO citas (cita, id_dias, nombre) VALUES ('".$selected."','3', '".$_SESSION['usuario']."')";
      $query1="UPDATE horas SET libres=NULL, ocupadas='$selected' WHERE id_dias=3 AND libres='$selected';";
      mysqli_query ($conexion, $query) or die(mysql_error());
      mysqli_query ($conexion, $query1) or die(mysql_error());
    }
       header("location: ../sesion.php");
       //echo "Insertado". $selected;
       exit();
  }

  
  //DIA JUEVES
  if(isset($_POST["submit4"])){
    for ($i=0; $i<sizeof($checkbox1); $i++){
      $selected=$checkbox1[$i];
      $query="INSERT INTO citas (cita, id_dias, nombre) VALUES ('".$selected."','4', '".$_SESSION['usuario']."')";
      $query1="UPDATE horas SET libres=NULL, ocupadas='$selected' WHERE id_dias=4 AND libres='$selected';";
      mysqli_query ($conexion, $query) or die(mysql_error());
      mysqli_query ($conexion, $query1) or die(mysql_error());
    }
       header("location: ../sesion.php");
       //echo "Insertado". $selected;
       exit();
  }

  //DIA VIERNES
  if(isset($_POST["submit5"])){
    for ($i=0; $i<sizeof($checkbox1); $i++){
      $selected=$checkbox1[$i];
      $query="INSERT INTO citas (cita, id_dias, nombre) VALUES ('".$selected."','5', '".$_SESSION['usuario']."')";
      $query1="UPDATE horas SET libres=NULL, ocupadas='$selected' WHERE id_dias=5 AND libres='$selected';";
      mysqli_query ($conexion, $query) or die(mysql_error());
      mysqli_query ($conexion, $query1) or die(mysql_error());
    }
       header("location: ../sesion.php");
       //echo "Insertado". $selected;
       exit();
  }
?>