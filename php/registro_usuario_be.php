<?php
    include 'conexion_be.php';

    $nombre = $_POST ['nombre'];
    $correo = $_POST ['correo'];
    $contrasena = $_POST ['contrasena'];

    $query = "INSERT INTO usuarios (nombre, correo, contrasena) 
              VALUES ('$nombre','$correo', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo '
            <script>
                alert("usuario almacenado correctamente");
            </script>
        ';
    }

?>