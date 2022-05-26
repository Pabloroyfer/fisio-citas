<?php
  session_start();
  include 'conexion_usuario.php';

  //Variables login
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];
  $contrasena = hash('sha512', $contrasena);

  //Validar usuario
  $validar_login = mysqli_query ($conexion, "SELECT * FROM usuarios 
                                            WHERE correo = '$correo' and contrasena = '$contrasena'");


  //Bla
  if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $correo;
    if ($correo == "admin"){
      header("location: ../sesionAdmin.php");
      exit();
    }else{
      header("location: ../sesion.php");
      exit();
    }
  }
  else{
    echo '
      <script>
        alert("Usuario no existe, verifique los datos introducidos");
        window.location = "../index.php";
      </script>
    ';
    exit();
  }

?>