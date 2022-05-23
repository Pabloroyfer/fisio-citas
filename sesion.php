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
        @import url(estilos/estiloSesion.css);
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="body">
    <!-- HEADER --> 

    <header>
        <a href="#" class="logo"><img src="imagenes/logoTransparente.png" alt="Logo"></a>
        <!-- SESION -->
        <div class="sesiones usuario">
            <div>
                <p>Hola</p>
                <p><?php echo $_SESSION['usuario'];?></p>
            </div>               
            <a class="cerrar" href="php/cerrar_sesion.php">Cerrar sesion</a>
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
        <article id="cita">
            <h1>Pedir cita</h1>
            <section class="citas">
                <article class="fisio">
                    <div class="fisio_img">
                        <img src="imagenes/modelo1.jpg" alt="imagen MariJose">
                    </div>
                    <div class="fisio_info">
                        <h2>MariJose</h2>
                        <a class="pedir_cita" href="#!">PEDIR CITA</a>
                    </div>
                </article>
                <article class="fisio">
                    <div class="fisio_img">
                        <img src="imagenes/modelo1.jpg" alt="imagen Mary">
                    </div>
                    <div class="fisioe_info">
                        <h2>Pepe</h2>
                        <a class="pedir_cita" href="#!">PEDIR CITA</a>
                    </div>
                </article>
            </section>
            <section class="calendario">
                    <h2 class="semana_titulo">Semana 1 de agosto</h2>
                    <ol>
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


                            //variable
                            $dias="SELECT DATE_FORMAT(fecha,'%d-%m') fecha FROM semana";
                            $resultado = mysqli_query($conexion, $dias);
                            while($row = $resultado->fetch_array()){
                        ?>
                            <li class="num"><?php echo $row["fecha"];?></li>
                        <?php 
                            } 
                            //echo "<p>Se han leído " . 
                           // $resultado->num_rows . " filas</p>";	
                           // mysqli_free_result($resultado);
                           echo '<li class="num finde">06-08</li>';
                           echo '<li class="num finde">07-08</li>';
                        ?>
                    </ol>
            </section>
            <section class="horario lun">
                <h2 class="horas_titulo">Horas disponibles</h2>
                <div>
                    <?php 
                    //SELECT t1.dias, t2.libres
                    //FROM semana AS t1 JOIN horas AS t2 ON t1.id_dias = t2.id_dias 
                    //WHERE t1.id_dias=1;
                        $horas='SELECT libres from horas WHERE id_dias = "1" and libres is not null';
                        $resultado = mysqli_query($conexion, $horas);
                        while($row = $resultado->fetch_array()){
                    ?>
                    <form action="php/mostrar_semana_be.php" method="post">
                        <label id="pepita"><input class="seleccionL"  type="radio" name="hora[]" value="1"/><?php echo $row[0];?></label><br>
                    
                    <?php
                        } 
                    ?>
                        <input class="enviar" id="enviar1" type="submit" name="submit1" value="Enviar"/>   
                    </form>
                    <div id="respuesta"></div>
                    <?php
                        echo "<p>Se han leído " . 
                        $resultado->num_rows . " filas</p>";	
                        mysqli_free_result($resultado);
                    ?>
                </div>
            </section>
            <section class="horario mar">
                <h2 class="horas_titulo">Horas disponibles</h2>
                <div>
                    <?php 
                        $horas='SELECT libres from horas WHERE id_dias = "2" AND libres is not null';
                        $resultado = mysqli_query($conexion, $horas);
                        while($row = $resultado->fetch_array()){
                    ?>
                    <form action="php/mostrar_semana_be.php" method="post">
                        <input class="seleccionM" type="radio" name="hora[]" value="1"/><?php echo $row[0];?><br>                   
                    <?php 
                        } 
                    ?>
                        <input class="enviar" type="submit" name="submit2" value="Enviar"/>   
                    </form>
                    <?php
                        echo "<p>Se han leído " . 
                        $resultado->num_rows . " filas</p>";	
                        mysqli_free_result($resultado);
                    ?>
                </div>
            </section>
            <section class="horario mier">
                <h2 class="horas_titulo">Horas disponibles</h2>
                <div>
                    <?php 
                        $horas='SELECT libres from horas WHERE id_dias = "3" AND libres is not null';
                        $resultado = mysqli_query($conexion, $horas);
                        while($row = $resultado->fetch_array()){
                    ?>
                    <form action="php/mostrar_semana_be.php" method="post">
                        <input class="seleccionMi" type="radio" name="hora[]" value="1"/><?php echo $row[0];?><br>
                    
                    <?php 
                        } 
                    ?>
                        <input class="enviar" type="submit" name="submit3" value="Enviar"/>   
                    </form>
                    <?php
                        echo "<p>Se han leído " . 
                        $resultado->num_rows . " filas</p>";	
                        mysqli_free_result($resultado);
                    ?>
                </div>
            </section>
            <section class="horario jue">
            <h2 class="horas_titulo">Horas disponibles</h2>
                <div>
                    <?php 
                        $horas='SELECT libres from horas WHERE id_dias = "4" AND libres is not null';
                        $resultado = mysqli_query($conexion, $horas);
                        while($row = $resultado->fetch_array()){
                    ?>
                    <form action="php/mostrar_semana_be.php" method="post">
                        <input class="seleccionJ" type="radio" name="hora[]" value="1"/><?php echo $row[0];?><br>            
                    <?php 
                        } 
                    ?>
                        <input class="enviar" type="submit" name="submit4" value="Enviar"/>   
                    </form>
                    <?php
                        echo "<p>Se han leído " . 
                        $resultado->num_rows . " filas</p>";	
                        mysqli_free_result($resultado);
                    ?>
                </div>
            </section>
            <section class="horario vie">
                <h2 class="horas_titulo">Horas disponibles</h2>
                <div>
                    <?php 
                        $horas='SELECT libres from horas WHERE id_dias = "5" AND libres is not null';
                        $resultado = mysqli_query($conexion, $horas);
                        while($row = $resultado->fetch_array()){
                    ?>
                    <form action="php/mostrar_semana_be.php" method="post">
                        <input class="seleccionV" type="radio" name="hora[]" value="1"/><?php echo $row[0];?><br>
                    
                    <?php 
                        } 
                    ?>
                        <input class="enviar" type="submit" name="submit5" value="Enviar"/>   
                    </form>
                    <?php
                        echo "<p>Se han leído " . 
                        $resultado->num_rows . " filas</p>";	
                        mysqli_free_result($resultado);
                    ?>
                </div>
            </section>
           
        </article>
        <!-- MIS CITAS -->
        <article class="mostrar">
            <h1>Mis Citas</h1>
            <section class="mostrar_cita">
                <?php
                    $cita= "SELECT t1.fecha, t1.id_dias, t2.cita, t2.nombre, t2.id_citas
                    FROM semana AS t1 JOIN citas AS t2 ON t1.id_dias = t2.id_dias 
                    WHERE t2.nombre='".$_SESSION['usuario']."'";

                    if (!isset($resultado)){
                        echo '<div class="mostrar_citas">
                        <p>Todavía no tienes citas</p> </div>';
                    }
                    $resultado = mysqli_query($conexion, $cita);
                    while($row = $resultado-> fetch_array()){
                        echo '<div class="mostrar_citas">';
                        echo "<p>Tienes cita el ". $row['fecha'] ." a las ".$row['cita']. " ¡Te esperamos ".$row['nombre']. "!</p>";
                        echo '</div>';
                        echo '<div class="gestion">';
                        echo '<a class="link">Cambiar</a>';
                        echo '<a class="link" href=\"php/eliminar.php?idC=\"'. $row['id_citas'].
                        '>Eliminar</a>';
                        echo '</div>';
                    }
                    mysqli_free_result($resultado);
                ?>
            </section>
        </article>
        <!-- MIS INFORMES -->
        <article class="informes">
            <h1>Mis Informes</h1>
            <section class="mostrar_informe">
                <div class="mostrar_informes">
                    <p>En estos momentos no tiene informes</p>
                </div>
                <div class="gestion_informes">
                <i class="doc"></i>
                </div>
            </section>
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
    
    <script src="js/interactividad_usuario.js"></script>
    <script src="js/confirmacion_eliminar.js"></script>
    <script>/*
        $('#enviar1').click(function(){
            var ruta=seleccionL;
            $.ajax({
                url:'mostrar_semana_be.php',
                type:'POST',
                data: ruta,
            })
            .done(function(res){
                $('#respuesta').html(res)
            })
            .fail(function () {
                console.log("error");
            })
            .always(function(){
                console.log("complete");
            })
        })*/
    </script>
    
</body>
</html>