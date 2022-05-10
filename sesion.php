<?php
    session_start();
    include 'php/conexion_be.php';

    if (!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Primero debes iniciar sesión");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }
    //header("location: index.php");
?>
<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PimpoFisio</title>
    <style>
        @import url(estilos/estilo.css);
        @import url(estilos/estiloSesion.css);
    </style>
</head>
<body class="body">
    <!-- HEADER --> 

    <header>
        <a href="#" class="logo"><img src="imagenes/logoTransparente.png" alt="Logo"></a>
        <!-- SESION -->
        <div class="sesiones usuario">
            <div><a>Hola</a>
            <a><?php echo $_SESSION['usuario'];?></a></div>               
            <a class="cerrar" href="php/cerrar_sesion.php">Cerrar sesión</a>
        </div>
        <!-- NAV -->
        <nav class="nav"> 
            <a class="nav-toggle"><i class="barra_menu"></i></a>
            <ul class="nav-menu nav-menu_visible">
                <li class="nav-menu-item"><a href="index.html" class="nav-menu-link">Inicio</a></li>
                <li class="nav-menu-item"><a href="#cita" class="nav-menu-link">Pedir cita</a></li>
                <li class="nav-menu-item"><a href="#misCitas" class="nav-menu-link">Mis citas</a></li>
                <li class="nav-menu-item"><a href="#informes" class="nav-menu-link">Mis informes</a></li>
                <li class="nav-menu-item"><a href="#contacto" class="nav-menu-link">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- PEDIR CITA -->
        <article>
            <h1>Pedir cita</h1>
            <section class="MariJose">
                <div class="MariJose_img">
                    <img src="imagenes/modelo1.jpg" alt="imagen MariJose>
                </div>
                <div class="MariJose_info">
                    <h2>MariJose</h2>
                    <a href="#!">loremIpsum</a>
                </div>
            </section>

        </article>
        <!-- MIS CITAS -->
        <article>
            <h1>Mis Citas</h1>
        </article>
        <!-- MIS INFORMES -->
        <article>
            <h1>Mis Informes</h1>
        </article>
        <!-- CONTACTO -->
        <article id="contacto" class="contacto">
            <h1>CONTACTO</h1> 
                <section>
                <div>
                    <img src="imagenes/Icon ionic-ios-mail.png" width="50px" alt="email">
                    <p>info@pimpofisio.com</p>
                </div>
                <div>
                    <img src="imagenes/Icon awesome-phone.png" width="50px" alt="telefono">
                    <a href="tel:+3491623223"><p>(+34) 916 295 848</p></a>
                </div>
            </section>
        </article>


        <?php
              /*  //Buscamos los nombres de usuario 
                $consulta = "SELECT correo FROM usuarios WHERE correo = '$correo'";
                //Guardamos el nombre en una variable
                $resultado = mysqli_query ($conexion, $consulta);
                //mostramos el array de nombres guardado
                while($row=mysqli_fetch_assoc($resultado)){*/
                //Mostramos el resultado de esa fila concreta
            ?>
            <?php 
                //}
              //  mysqli_free_result($resultado);
            ?>
    </main>
    <footer>
        <p>Proyecto realizado por Pablo Rodríguez Fernández</p>
    </footer>   
</body>
</html>