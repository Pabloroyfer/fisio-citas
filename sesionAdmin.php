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
    <link rel="shortcut icon" href="imagenes/logoTransparente.ico" type="image/x-icon">
    <title>PimpoFisio</title>
    <style>
        @import url(estilos/estilo.css);
        @import url(estilos/estiloAdmin.css);
    </style>
</head>
<body class="body_admin">
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
        <div class="sesiones usuario">
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
                <?php
                    $cita= "SELECT t1.fecha, t1.id_dias, t2.cita, t2.nombre, t2.id_citas
                    FROM semana AS t1 JOIN citas AS t2 ON t1.id_dias = t2.id_dias";

                    $resultado = mysqli_query($conexion, $cita);
                    while($row = $resultado-> fetch_array()){
                        echo '<div class="mostrar_citas">';
                        echo "<p>Tienes cita el ". $row['fecha'] ." a las ".$row['cita']. " ¡Te esperamos ".$row['nombre']. "!</p>";
                        echo '</div>';
                        echo '<div class="gestion">';
                        //echo '<a class="link">Cambiar</a>';
                        echo '<a href="php/eliminar_admin.php?idC='. $row['id_citas'];
                        echo '> class="link">Eliminar</a>';
                        echo '</div>';
                    }    
                    mysqli_free_result($resultado);
                ?>
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
                <form class="fich" action="php/informes.php" method="post" enctype="multipart/form-data">
                    <label for="usuario" >ID usuario<input type="text" name="usuario" class="id_usuario"></label>
                    <input type="file" class="file" name="fichero">
                    <button class="gestion_informes_admin" type="submit" name="submit_informe" value="subir">
                        <a href="php/informes.php" class="inf"><i class="doc" alt="subir archivo"></i></a>
                    </button>
                </form>
            </section>
        </article>
        <!-- CALENDARIO -->
        <article class="calendario ad">
            <h2 class="semana_titulo">Calendario</h2>
            <h3>Agosto</h3>
                <ol class="semanal">
                    <li></li>
                    <?php
                        //variable
                        $dias="SELECT dias FROM semana";
                        $resultado = mysqli_query($conexion, $dias);
                        while($row = $resultado->fetch_array()){
                    ?>
                        <li class="dia"><?php echo $row[0];?></li>
                    <?php 
                        } 	
                        mysqli_free_result($resultado);
                        echo '<li class="dia finde">Sábado</li>';
                        echo '<li class="dia finde">Domingo</li>';
                    ?>
                    
                    
                    <li class="fijas">Horas</li>
                    <?php
                        //fecha
                        $fecha="SELECT DATE_FORMAT(fecha,'%d-%m') fecha FROM semana";
                        $resultado = mysqli_query($conexion, $fecha);
                        while($row = $resultado->fetch_array()){
                    ?>
                        <li class="num_ad"><?php echo $row["fecha"];?></li>
                    <?php 
                        } 
                        mysqli_free_result($resultado);
                        echo '<li class="num_ad">06-08</li>';
                        echo '<li class="num_ad">07-08</li>';
                    
                       
                        //las 9 horas
                        echo '<li class="fijas">09.00h</li>';
                    
                        //lunes
                        $cita="SELECT * FROM citas WHERE id_dias=1 and cita like '09:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="lunes">'. 
                            $row["nombre"].'</li>';
                        } 
                        mysqli_free_result($resultado);

                        //martes
                        $cita="SELECT * FROM citas WHERE id_dias=2 and cita like '09:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="martes">'. 
                            $row["nombre"].'</li>';
                        } 
                        mysqli_free_result($resultado);

                        //miercoles
                        $cita="SELECT * FROM citas WHERE id_dias=3 and cita like '09:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="miercoles">'. 
                            $row["nombre"].'</li>';
                    
                        } 
                        mysqli_free_result($resultado);

                        //jueves
                        $cita="SELECT * FROM citas WHERE id_dias=4 and cita like '09:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="jueves">'. 
                            $row["nombre"].'</li>';
                    
                        } 
                        mysqli_free_result($resultado);
                        
                        //viernes
                        $cita="SELECT * FROM citas WHERE id_dias=5 and cita like '09:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="viernes">'. 
                            $row["nombre"].'</li>';    
                        } 
                        mysqli_free_result($resultado);


                         //las 10 horas
                         echo '<li class="fijas">10.00h</li>';

                         //lunes
                         $cita="SELECT * FROM citas WHERE id_dias=1 and cita like '10:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="lunes">'. 
                             $row["nombre"].'</li>';
                         } 
                         mysqli_free_result($resultado);

                         //martes
                         $cita="SELECT * FROM citas WHERE id_dias=2 and cita like '10:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="martes">'. 
                             $row["nombre"].'</li>';
                         } 
                         mysqli_free_result($resultado);

                         //miercoles
                         $cita="SELECT * FROM citas WHERE id_dias=3 and cita like '10:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="miercoles">'. 
                             $row["nombre"].'</li>';
                     
                         } 
                         mysqli_free_result($resultado);

                         //jueves
                         $cita="SELECT * FROM citas WHERE id_dias=4 and cita like '10:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="jueves">'. 
                             $row["nombre"].'</li>';
                     
                         } 
                         mysqli_free_result($resultado);

                         //viernes
                         $cita="SELECT * FROM citas WHERE id_dias=5 and cita like '10:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="viernes">'. 
                             $row["nombre"].'</li>';    
                         } 
                         mysqli_free_result($resultado);


                        //las 11 horas
                         echo '<li class="fijas">11.00h</li>';
                    

                        //lunes
                        $cita="SELECT * FROM citas WHERE id_dias=1 and cita like '11:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="lunes">'. 
                            $row["nombre"].'</li>';
                        } 
                        mysqli_free_result($resultado);

                        //martes
                        $cita="SELECT * FROM citas WHERE id_dias=2 and cita like '11:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="martes">'. 
                            $row["nombre"].'</li>';
                        } 
                        mysqli_free_result($resultado);

                        //miercoles
                        $cita="SELECT * FROM citas WHERE id_dias=3 and cita like '11:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="miercoles">'. 
                            $row["nombre"].'</li>';
                    
                        } 
                        mysqli_free_result($resultado);

                        //jueves
                        $cita="SELECT * FROM citas WHERE id_dias=4 and cita like '11:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="jueves">'. 
                            $row["nombre"].'</li>';
                    
                        } 
                        mysqli_free_result($resultado);
                        
                        //viernes
                        $cita="SELECT * FROM citas WHERE id_dias=5 and cita like '11:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="viernes">'. 
                            $row["nombre"].'</li>';    
                        } 
                        mysqli_free_result($resultado);

                         //las 12 horas
                         echo '<li class="fijas">12.00h</li>';
                    

                         //lunes
                         $cita="SELECT * FROM citas WHERE id_dias=1 and cita like '12:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="lunes">'. 
                             $row["nombre"].'</li>';
                         } 
                         mysqli_free_result($resultado);
 
                         //martes
                         $cita="SELECT * FROM citas WHERE id_dias=2 and cita like '12:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="martes">'. 
                             $row["nombre"].'</li>';
                         } 
                         mysqli_free_result($resultado);
 
                         //miercoles
                         $cita="SELECT * FROM citas WHERE id_dias=3 and cita like '12:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="miercoles">'. 
                             $row["nombre"].'</li>';
                     
                         } 
                         mysqli_free_result($resultado);
 
                         //jueves
                         $cita="SELECT * FROM citas WHERE id_dias=4 and cita like '12:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="jueves">'. 
                             $row["nombre"].'</li>';
                     
                         } 
                         mysqli_free_result($resultado);
                         
                         //viernes
                         $cita="SELECT * FROM citas WHERE id_dias=5 and cita like '12:00 horas'";
                         $resultado = mysqli_query($conexion, $cita);
                         while($row = $resultado->fetch_array()){
                             echo '<li class="viernes">'. 
                             $row["nombre"].'</li>';    
                         } 
                         mysqli_free_result($resultado);


                        //las 13 horas
                        echo '<li class="fijas">13.00h</li>';
                    
                        //lunes
                        $cita="SELECT * FROM citas WHERE id_dias=1 and cita like '13:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="lunes">'. 
                            $row["nombre"].'</li>';
                        } 
                        mysqli_free_result($resultado);

                        //martes
                        $cita="SELECT * FROM citas WHERE id_dias=2 and cita like '13:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="martes">'. 
                            $row["nombre"].'</li>';
                        } 
                        mysqli_free_result($resultado);

                        //miercoles
                        $cita="SELECT * FROM citas WHERE id_dias=3 and cita like '13:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="miercoles">'. 
                            $row["nombre"].'</li>';
                    
                        } 
                        mysqli_free_result($resultado);

                        //jueves
                        $cita="SELECT * FROM citas WHERE id_dias=4 and cita like '13:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="jueves">'. 
                            $row["nombre"].'</li>';
                    
                        } 
                        mysqli_free_result($resultado);
                        
                        //viernes
                        $cita="SELECT * FROM citas WHERE id_dias=5 and cita like '13:00 horas'";
                        $resultado = mysqli_query($conexion, $cita);
                        while($row = $resultado->fetch_array()){
                            echo '<li class="viernes">'. 
                            $row["nombre"].'</li>';    
                        } 
                        mysqli_free_result($resultado);

                    ?>
                </ol>
        </article>
    </main>
    <footer>
        <p>Proyecto realizado por Pablo Rodríguez Fernández</p>
    </footer>   
    <script src="js/interactividad_admin.js"></script>
    <script src="js/confirmacion_informe.js"></script>
</body>
</html>