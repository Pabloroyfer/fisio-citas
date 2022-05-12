<?php
    session_start();
    include 'php/conexion_usuario_be.php';

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
        <!-- NAV -->
        <nav class="nav"> 
            <a class="nav-toggle"><i class="barra_menu"></i></a>
            <ul class="nav-menu nav-menu_visible">
                <li class="nav-menu-item"><a href="index.html" class="nav-menu-link">Inicio</a></li>
                <li class="nav-menu-item"><a href="#citas" class="nav-menu-link">citas</a></li>
                <li class="nav-menu-item"><a href="#informes" class="nav-menu-link">informes</a></li>
                <li class="nav-menu-item"><a href="#calendario" class="nav-menu-link">calendario</a></li>
            </ul>
        </nav>
        <!-- SESION -->
        <div class="sesiones admin">
            <div><a>Hola</a>
            <a><?php echo $_SESSION['usuario'];?></a></div>               
            <a class="cerrar" href="php/cerrar_sesion.php">Cerrar sesión</a>
        </div>
    </header>
        
    <main>
        <!-- CITAS -->
        <article class="mostrar">
            <h1>Citas</h1>
            <section class="mostrar_cita">
                <div class="mostrar_citas">
                    <p>Leida cita</p>
                </div>
                <div class="gestion">
                    <button>Cambiar</button>
                    <button>Eliminar</button>
                </div>
            </section>
        </article>
        <!-- INFORMES -->
        <article class="informes">
            <h1>Mis Informes</h1>
            <section class="informes_cabecera">
                <h3 class="paciente">Pacientes</h3>
                <h3 class="info">Informes</h3>
            </section>
            <section class="mostrar_informe">
                <div class="mostrar_informes">
                    <p>En estos momentos no tiene informes</p>
                </div>
                <div class="gestion_informes">
                <i class="doc"></i>
                </div>
            </section>
        </article>
        <!-- CALENDARIO -->
        <article class="calendario">
            <h2 class="semana_titulo">Calendario</h2>
            <h3>Agosto</h3>
                <ol class="semanal">
                    <li></li>
                    <li class="dia">Lunes</li>
                    <li class="dia">Martes</li>
                    <li class="dia">Miercoles</li>
                    <li class="dia">Jueves</li>
                    <li class="dia">Viernes</li>
                    <li class="dia">Sabado</li>
                    <li class="dia">Domingo</li>
                    
                    <li class="fijas">Horas</li>
                    <li class="num ad">1</li>
                    <li class="num ad">2</li>
                    <li class="num ad">3</li>
                    <li class="num ad">4</li>
                    <li class="num ad">5</li>
                    <li class="num ad">6</li>
                    <li class="num ad">7</li>

                    
                    <li class="fijas">09.00h</li>
                    <li class="relleno">Quien</li>
                    <li class="relleno">Quien</li>
                    <li class="relleno">Quien</li>
                    <li class="relleno">Quien</li>
                    <li class="relleno">Quien</li>
                    <li class="fijas">10.00h</li>
                    <li class="relleno">Quien</li>
                    <li class="fijas">11.00h</li>
                    <li class="relleno">Quien</li>
                    <li class="fijas">12.00h</li>
                    <li class="relleno">Quien</li>
                    <li class="fijas">13.00h</li>
                    <li class="relleno">Quien</li>
                    <li class="fijas">14.00h</li>
                    <li class="relleno">Quien</li>
                    <li class="fijas">15.00h</li>
                    <li class="relleno">Quien</li>



                    <!--Ocupadas con php y un foreach y un select a la base-->
                </ol>
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