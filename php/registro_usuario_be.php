<?php
    include 'conexion_be.php';

    //Variables registro
    $nombre = $_POST ['nombre'];
    $correo = $_POST ['correo'];
    $contrasena = $_POST ['contrasena'];

    //Encriptar contraseña
    $contrasena = hash('sha512', $contrasena);

    //Para insertar los usuarios
    $query = "INSERT INTO usuarios (nombre, correo, contrasena) 
              VALUES ('$nombre','$correo', '$contrasena')";

    //Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
    if (mysqli_num_rows($verificar_correo) >0 ){
        echo'
            <script>
                alert ("Correo ya registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
        ';
        //evitar que siga ejecutandose el codigo siguiente
        exit();
    }
    

    //Ejecutar el registro de usuarios
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
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
    }

    mysqli_close($conexion);

?>