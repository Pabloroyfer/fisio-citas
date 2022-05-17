<?php
  session_start();
  include 'conexion_usuario_be.php';

  $checkbox1 = $_POST['hora'];

  if(isset($_POST["submit"])){
    for ($i=0; $i<sizeof($checkbox1); $i++){
      $selected=$checkbox1[$i];
      $query="INSERT INTO citas (usuario) VALUES ('".$selected."')";
      mysqli_query ($conexion, $query) or die(mysql_error());
    }
    echo "Insertado";
  }
  else{
    echo 'No ha pasado ni flores';
  }

 /* if (isset($_POST['hora'])){
  echo $_POST['hora']; // Muestra el valor de la casilla de verificación marcada.
    echo '
        <script>
            alert("usuario almacenado correctamente");
            window.location = "../sesion.php";
        </script>
    ';
}
else{
    echo '
        <script>
            alert("Intentalo de nuevo, usuario no almacenado");
            window.location = "../index.php";
        </script>
    ';
}*/
  
?>