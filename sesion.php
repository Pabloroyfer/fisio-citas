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
                        <h2>Mary</h2>
                        <a class="pedir_cita" href="#!">PEDIR CITA</a>
                    </div>
                </article>
            </section>
           
            <section class="calendario">
                <span class="cierreCale">&#10006;</span>
                <h2 class="semana_titulo">Semana 1 de agosto de MariJose</h2>
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
            
                <!--Primer fisio-->
                <article class="horario lun">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>
                        <form action="php/mostrar_semana_be.php" method="post">
                        <?php 

                            $horas='SELECT libres from horas WHERE id_dias = "1" and id_horas="1" and id_fisioterapeuta=1 and libres is not null';
                            //$horas='SELECT * FROM semana 
                              //      JOIN horas ON horas.id_dias=semana.id_dias 
                                //    CROSS JOIN fisioterapeutas 
                                  //  WHERE semana.id_dias="1" AND horas.id_horas="1" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"';
                            $resultado1 = mysqli_query($conexion, $horas);
                            while($row = $resultado1->fetch_array()){
                        ?>
                            <label><input class="seleccionL"  type="radio" name="hora[]" value="09:00"/><?php echo $row["libres"];?></label><br> 
                        <?php
                            } 

                            $horas='SELECT libres from horas WHERE id_dias = "1" and id_horas="2" and id_fisioterapeuta=1 and libres is not null';
                            //$horas='SELECT * FROM semana 
                              //      JOIN horas ON horas.id_dias=semana.id_dias 
                                //    CROSS JOIN fisioterapeutas 
                                  //  WHERE semana.id_dias="1" AND horas.id_horas="2" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"';
                            $resultado2 = mysqli_query($conexion, $horas);
                            while($row = $resultado2->fetch_array()){
                        ?>
                            <label><input class="seleccionL"  type="radio" name="hora[]" value="10:00"/><?php echo $row["libres"];?></label><br>
                        <?php 
                            }

                            $horas='SELECT libres from horas WHERE id_dias = "1" and id_horas="3" and id_fisioterapeuta=1 and libres is not null';
                           //$horas='SELECT * FROM semana 
                             //       JOIN horas ON horas.id_dias=semana.id_dias 
                               //     CROSS JOIN fisioterapeutas 
                                 //   WHERE semana.id_dias="1" AND horas.id_horas="3" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"'; 
                           $resultado3 = mysqli_query($conexion, $horas);
                            while($row = $resultado3->fetch_array()){
                        ?>
                            <label><input class="seleccionL"  type="radio" name="hora[]" value="11.00"/><?php echo $row["libres"];?></label><br>
                        <?php 
                            }
                        ?>
                            <input class="enviar" type="submit" name="submit1" value="Enviar"/>  
                            </form>
                        <?php
                            mysqli_free_result($resultado1);	
                            mysqli_free_result($resultado2);	             
                            mysqli_free_result($resultado3);	
                        ?>

                    </div>
                </article>
                <article class="horario mar">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>
                        <form action="php/mostrar_semana_be.php" method="post">
                        <?php 

                            $horas='SELECT libres from horas WHERE id_dias = "2" and id_horas="4" and id_fisioterapeuta=1 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //JOIN horas ON horas.id_dias=semana.id_dias 
                            //CROSS JOIN fisioterapeutas 
                            //WHERE semana.id_dias="2" AND horas.id_horas="4" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"'; 
                            $resultado1 = mysqli_query($conexion, $horas);
                            while($row = $resultado1->fetch_array()){
                        ?>
                            <label><input class="seleccionM"  type="radio" name="hora[]" value="09:00"/><?php echo $row["libres"];?></label><br> 
                        <?php
                            } 
                            $horas='SELECT libres from horas WHERE id_dias = "2" and id_horas="4" and id_fisioterapeuta=1 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //JOIN horas ON horas.id_dias=semana.id_dias 
                            //CROSS JOIN fisioterapeutas 
                            //WHERE semana.id_dias="2" AND horas.id_horas="5" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"'; 
                            $resultado2 = mysqli_query($conexion, $horas);
                            while($row = $resultado2->fetch_array()){
                        ?>
                            <label><input class="seleccionM"  type="radio" name="hora[]" value="10:00"/><?php echo $row["libres"];?></label><br> 
                        <?php
                            } 
                        ?>
                            <input class="enviar" type="submit" name="submit2" value="Enviar"/>  
                            </form>
                        <?php
                            mysqli_free_result($resultado1);
                            mysqli_free_result($resultado2);

                        ?>

                    </div>
                </article>
                <article class="horario mier">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>
                        <form action="php/mostrar_semana_be.php" method="post">
                        <?php 

                            $horas='SELECT libres from horas WHERE id_dias = "3" and id_horas="6" and id_fisioterapeuta=1 and libres is not null';

                            //$horas='SELECT * FROM semana 
                            //JOIN horas ON horas.id_dias=semana.id_dias 
                            //CROSS JOIN fisioterapeutas 
                            //WHERE semana.id_dias="3" AND horas.id_horas="6" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"';
                            $resultado1 = mysqli_query($conexion, $horas);
                            while($row = $resultado1->fetch_array()){
                        ?>
                            <label><input class="seleccionMi"  type="radio" name="hora[]" value="11:00"/><?php echo $row["libres"];?></label><br> 
                        <?php
                            } 

                            $horas='SELECT libres from horas WHERE id_dias = "3" and id_horas="7" and id_fisioterapeuta=1 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //        JOIN horas ON horas.id_dias=semana.id_dias 
                            //        CROSS JOIN fisioterapeutas 
                            //        WHERE semana.id_dias="3" AND horas.id_horas="7" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"';
                            $resultado2 = mysqli_query($conexion, $horas);
                            while($row = $resultado2->fetch_array()){
                        ?>
                            <label><input class="seleccionMi"  type="radio" name="hora[]" value="12:00"/><?php echo $row["libres"];?></label><br>
                        <?php 
                            }

                            $horas='SELECT libres from horas WHERE id_dias = "3" and id_horas="8" and id_fisioterapeuta=1 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //        JOIN horas ON horas.id_dias=semana.id_dias 
                            //        CROSS JOIN fisioterapeutas 
                            //        WHERE semana.id_dias="3" AND horas.id_horas="8" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"';
                            $resultado3 = mysqli_query($conexion, $horas);
                            while($row = $resultado3->fetch_array()){
                        ?>
                            <label><input class="seleccionMi"  type="radio" name="hora[]" value="13.00"/><?php echo $row["libres"];?></label><br>
                        <?php 
                            }
                        ?>
                            <input class="enviar" type="submit" name="submit3" value="Enviar"/>  
                            </form>
                        <?php
                            mysqli_free_result($resultado1);	
                            mysqli_free_result($resultado2);	     
                            mysqli_free_result($resultado3);	
                        ?>

                    </div>
                </article>
                <article class="horario jue">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>


                    </div>
                </article>
                <article class="horario vie">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>
                        <form action="php/mostrar_semana_be.php" method="post">
                        <?php 

                            $horas='SELECT libres from horas WHERE id_dias = "5" and id_horas="10" and id_fisioterapeuta=1 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //        JOIN horas ON horas.id_dias=semana.id_dias 
                            //        CROSS JOIN fisioterapeutas 
                            //        WHERE semana.id_dias="5" AND horas.id_horas="10" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"';
                            $resultado1 = mysqli_query($conexion, $horas);
                            while($row = $resultado1->fetch_array()){
                        ?>
                            <label><input class="seleccionV"  type="radio" name="hora[]" value="09:00"/><?php echo $row["libres"];?></label><br> 
                        <?php
                            } 

                            $horas='SELECT libres from horas WHERE id_dias = "5" and id_horas="11" and id_fisioterapeuta=1 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //        JOIN horas ON horas.id_dias=semana.id_dias 
                            //        CROSS JOIN fisioterapeutas 
                            //        WHERE semana.id_dias="5" AND horas.id_horas="11" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="1"';
                            $resultado2 = mysqli_query($conexion, $horas);
                            while($row = $resultado2->fetch_array()){
                        ?>
                            <label><input class="seleccionV"  type="radio" name="hora[]" value="12:00"/><?php echo $row["libres"];?></label><br>
                        <?php 
                            }
                        ?>
                            <input class="enviar" type="submit" name="submit5" value="Enviar"/>  
                            </form>
                        <?php
                            mysqli_free_result($resultado1);	
                            mysqli_free_result($resultado2);	     
                        ?>

                    </div>
                </article>
            </section>
            <!-- Otro fisio -->
            <section class="calendario">
                <span class="cierreCale">&#10006;</span>

                <h2 class="semana_titulo">Semana 1 de agosto de Mary</h2>
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
                
                <article class="horario lun">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>
                        <form action="php/mostrar_semana_be.php" method="post">
                            <?php 
                        $horas='SELECT libres from horas WHERE id_dias = "1" and id_horas="1" and id_fisioterapeuta=2 and libres is not null';
                        //$horas='SELECT * FROM semana 
                        //        JOIN horas ON horas.id_dias=semana.id_dias 
                        //        CROSS JOIN fisioterapeutas 
                        //        WHERE semana.id_dias="1" AND horas.id_horas="1" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"';
                        $resultado1 = mysqli_query($conexion, $horas);
                        while($row = $resultado1->fetch_array()){
                    ?>
                        <label><input class="seleccionL"  type="radio" name="hora[]" value="09:00"/><?php echo $row["libres"];?></label><br> 
                    <?php
                        } 

                        $horas='SELECT libres from horas WHERE id_dias = "1" and id_horas="2" and id_fisioterapeuta=2 and libres is not null';
                        //$horas='SELECT * FROM semana 
                        //        JOIN horas ON horas.id_dias=semana.id_dias 
                        //        CROSS JOIN fisioterapeutas 
                        //        WHERE semana.id_dias="1" AND horas.id_horas="2" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"';
                        $resultado2 = mysqli_query($conexion, $horas);
                        while($row = $resultado2->fetch_array()){
                            ?>
                        <label><input class="seleccionL"  type="radio" name="hora[]" value="10:00"/><?php echo $row["libres"];?></label><br>
                    <?php 
                        }

                        $horas='SELECT libres from horas WHERE id_dias = "1" and id_horas="3" and id_fisioterapeuta=2 and libres is not null';
                       //$horas='SELECT * FROM semana 
                       //         JOIN horas ON horas.id_dias=semana.id_dias 
                       //         CROSS JOIN fisioterapeutas 
                       //         WHERE semana.id_dias="1" AND horas.id_horas="3" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"'; 
                       $resultado3 = mysqli_query($conexion, $horas);
                        while($row = $resultado3->fetch_array()){
                            ?>
                        <label><input class="seleccionL"  type="radio" name="hora[]" value="11.00"/><?php echo $row["libres"];?></label><br>
                    <?php 
                        }
                    ?>
                        <input class="enviar" type="submit" name="submit1" value="Enviar"/>  
                        </form>
                    <?php
                        mysqli_free_result($resultado1);	
                        mysqli_free_result($resultado2);	             
                        mysqli_free_result($resultado3);	
                        ?>
                    </div>
                </article>
                <article class="horario mar">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>
                        <form action="php/mostrar_semana_be.php" method="post">
                        <?php 

                            $horas='SELECT libres from horas WHERE id_dias = "2" and id_horas="4" and id_fisioterapeuta=2 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //JOIN horas ON horas.id_dias=semana.id_dias 
                            //CROSS JOIN fisioterapeutas 
                            //WHERE semana.id_dias="2" AND horas.id_horas="4" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"'; 
                            $resultado1 = mysqli_query($conexion, $horas);
                            while($row = $resultado1->fetch_array()){
                        ?>
                            <label><input class="seleccionM"  type="radio" name="hora[]" value="09:00"/><?php echo $row["libres"];?></label><br> 
                        <?php
                            } 
                            $horas='SELECT libres from horas WHERE id_dias = "2" and id_horas="4" and id_fisioterapeuta=2 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //JOIN horas ON horas.id_dias=semana.id_dias 
                            //CROSS JOIN fisioterapeutas 
                            //WHERE semana.id_dias="2" AND horas.id_horas="5" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"'; 
                            $resultado2 = mysqli_query($conexion, $horas);
                            while($row = $resultado2->fetch_array()){
                        ?>
                            <label><input class="seleccionM"  type="radio" name="hora[]" value="10:00"/><?php echo $row["libres"];?></label><br> 
                        <?php
                            } 
                        ?>
                            <input class="enviar" type="submit" name="submit2" value="Enviar"/>  
                            </form>
                        <?php
                            mysqli_free_result($resultado1);
                            mysqli_free_result($resultado2);

                        ?>

                    </div>
                </article>
                <article class="horario mier">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>
                        <form action="php/mostrar_semana_be.php" method="post">
                        <?php 
                                    
                            $horas='SELECT libres from horas WHERE id_dias = "3" and id_horas="6" and id_fisioterapeuta=2 and libres is not null';
                            
                            //$horas='SELECT * FROM semana 
                            //JOIN horas ON horas.id_dias=semana.id_dias 
                            //CROSS JOIN fisioterapeutas 
                            //WHERE semana.id_dias="3" AND horas.id_horas="6" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"';
                            $resultado1 = mysqli_query($conexion, $horas);
                            while($row = $resultado1->fetch_array()){
                        ?>
                            <label><input class="seleccionMi"  type="radio" name="hora[]" value="11:00"/><?php echo $row["libres"];?></label><br> 
                        <?php
                            } 
                            
                            $horas='SELECT libres from horas WHERE id_dias = "3" and id_horas="7" and id_fisioterapeuta=2 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //        JOIN horas ON horas.id_dias=semana.id_dias 
                            //        CROSS JOIN fisioterapeutas 
                            //        WHERE semana.id_dias="3" AND horas.id_horas="7" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"';
                            $resultado2 = mysqli_query($conexion, $horas);
                            while($row = $resultado2->fetch_array()){
                        ?>
                            <label><input class="seleccionMi"  type="radio" name="hora[]" value="12:00"/><?php echo $row["libres"];?></label><br>
                        <?php 
                            }
                            
                            $horas='SELECT libres from horas WHERE id_dias = "3" and id_horas="8" and id_fisioterapeuta=2 and libres is not null';
                            //$horas='SELECT * FROM semana 
                            //        JOIN horas ON horas.id_dias=semana.id_dias 
                            //        CROSS JOIN fisioterapeutas 
                            //        WHERE semana.id_dias="3" AND horas.id_horas="8" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"';
                            $resultado3 = mysqli_query($conexion, $horas);
                            while($row = $resultado3->fetch_array()){
                        ?>
                            <label><input class="seleccionMi"  type="radio" name="hora[]" value="13.00"/><?php echo $row["libres"];?></label><br>
                        <?php 
                            }
                        ?>
                            <input class="enviar" type="submit" name="submit3" value="Enviar"/>  
                            </form>
                        <?php
                            mysqli_free_result($resultado1);	
                            mysqli_free_result($resultado2);	     
                            mysqli_free_result($resultado3);	
                            ?>
                            </div>
                </article>
                <article class="horario jue">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>

                        <form action="php/mostrar_semana_be.php" method="post">
                    <?php 
                        $horas='SELECT libres from horas WHERE id_dias = "4" and id_horas="9" and id_fisioterapeuta=2 and libres is not null';
                        //$horas='SELECT * FROM semana 
                        //            JOIN horas ON horas.id_dias=semana.id_dias 
                        //            CROSS JOIN fisioterapeutas 
                        //            WHERE semana.id_dias="4" AND horas.id_horas="9" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"';
                        $resultado1 = mysqli_query($conexion, $horas);
                        while($row = $resultado1->fetch_array()){
                    ?>
                            <label><input class="seleccionJ"  type="radio" name="hora[]" value="09:00"/><?php echo $row["libres"];?></label><br> 
                    <?php
                        } 
                        ?>
                            <input class="enviar" type="submit" name="submit4" value="Enviar"/>  
                        </form>
                    <?php
                        mysqli_free_result($resultado1);
                    ?>

                    </div>
                </article>
                <article class="horario vie">
                    <h2 class="horas_titulo">Horas disponibles</h2>
                    <div>
                    <form action="php/mostrar_semana_be.php" method="post">
                        <?php 

                        $horas='SELECT libres from horas WHERE id_dias = "5" and id_horas="10" and id_fisioterapeuta=2 and libres is not null';
                        //$horas='SELECT * FROM semana 
                        //        JOIN horas ON horas.id_dias=semana.id_dias 
                        //        CROSS JOIN fisioterapeutas 
                        //        WHERE semana.id_dias="5" AND horas.id_horas="10" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"';
                        $resultado1 = mysqli_query($conexion, $horas);
                        while($row = $resultado1->fetch_array()){
                            ?>
                        <label><input class="seleccionV"  type="radio" name="hora[]" value="09:00"/><?php echo $row["libres"];?></label><br> 
                    <?php
                        } 
                        
                        $horas='SELECT libres from horas WHERE id_dias = "5" and id_horas="11" and id_fisioterapeuta=2 and libres is not null';
                        //$horas='SELECT * FROM semana 
                        //        JOIN horas ON horas.id_dias=semana.id_dias 
                        //        CROSS JOIN fisioterapeutas 
                        //        WHERE semana.id_dias="5" AND horas.id_horas="11" AND horas.libres is not null AND fisioterapeutas.id_fisioterapeuta="2"';
                        $resultado2 = mysqli_query($conexion, $horas);
                        while($row = $resultado2->fetch_array()){
                    ?>
                        <label><input class="seleccionV"  type="radio" name="hora[]" value="12:00"/><?php echo $row["libres"];?></label><br>
                    <?php 
                        }
                    ?>
                        <input class="enviar" type="submit" name="submit5" value="Enviar"/>  
                        </form>
                    <?php
                        mysqli_free_result($resultado1);	
                        mysqli_free_result($resultado2);	     
                    ?>

                    </div>
                </article>
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
                    
                    $resultado = mysqli_query($conexion, $cita);
                    while($row = $resultado-> fetch_array()){
                        echo '<div class="mostrar_citas">';
                        echo "<p>Tienes cita el ". $row['fecha'] ." a las ".$row['cita']. " horas. ¡Te esperamos ".$row['nombre']. "!</p>";
                        echo '</div>';
                        echo '<div class="gestion">';
                        //echo '<a class="link">Cambiar</a>';
                        echo '<a class="link" href="php/eliminar.php?idC='. $row["id_citas"].
                        '&cita='.$row["cita"].'">Eliminar</a>';
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
            <?php
                //Buscamos los nombres de usuario 
                $consulta = "SELECT t1.id, t1.nombre, t2.informe FROM usuarios AS t1 JOIN informes AS t2 ON t1.id = t2.id_usuarios WHERE t1.nombre='".$_SESSION['usuario']."'";
                //Guardamos el nombre en una variable
                $resultado = mysqli_query ($conexion, $consulta);
                //mostramos el array de nombres guardado
                while($row=mysqli_fetch_assoc($resultado)){
                    //Mostramos el resultado de esa fila concreta
                    echo '<div class="mostrar_informes">';
                    echo '<p class="inf"> Tiene un nuevo informe '.$row['nombre'] .'</p>';
                    echo '<div class="gestion_informes"><i class="doc"></i></div>';
                    echo '</div>';
                    echo '<div class="info_muestra"><span class="cierreInfo">&#10006;</span><embed class="info" src="informes/'
                    .$row['informe'].
                    '"type="text/txt"></embed></div>';
                }
            ?>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</body>
</html>