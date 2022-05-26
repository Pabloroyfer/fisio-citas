<?php
  session_start();
  include 'conexion_usuario.php';

  //print_r($_FILES);
  $informe = $_FILES['fichero']['name'];
  $guardado = $_FILES['fichero']['tmp_name'];
  

  if(!file_exists('../informes')){
    mkdir('../informes',0777,true);
    if(file_exists('../informes')){
      if(move_uploaded_file($guardado, '../informes/'.$informe)){

        $usuario= $_POST["usuario"];
        $query = 'INSERT INTO informes (id_usuarios,informe) VALUES ("'.$usuario.'","'.$informe.'")';
        mysqli_query($conexion, $query) or die(mysqli_connect_error());
        //echo 'El archivo del usuario con ID "'.$usuario.'" se ha subido correctamente';
        header("location: ../sesionAdmin.php");
        exit();
      }
      else{
        //echo 'No se ha guardado, ya has hecho algo mal';
        header("location: ../sesionAdmin.php");
      }
    }
  }else{
    if(move_uploaded_file($guardado, '../informes/'.$informe)){

      $usuario= $_POST["usuario"];
      $query = 'INSERT INTO informes (id_usuarios,informe) VALUES ("'.$usuario.'","'.$informe.'")';
      mysqli_query($conexion, $query) or die(mysqli_connect_error());
      //echo 'El archivo del usuario con ID "'.$usuario.'" se ha subido correctamente';
      header("location: ../sesionAdmin.php");
      exit();
    }
    else{
      //echo 'No se ha guardado, ya has hecho algo mal';
      header("location: ../sesionAdmin.php");
    }
  }

?>