<?php
    session_start();
    if (isset($_SESSION['usuario'])){
        header("location: sesion.php");
    }
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
    </style>
</head>
<body class="body">
       <!-- HEADER --> 
    
    <header>
        <a href="#" class="logo"><img src="imagenes/logoTransparente.png" alt="Logo"></a>
        <!-- SESION -->
        <div class="desplegableSesion">
            <span class="cierreSesion">&#10006;</span>
            <div>
                <form class="sesion" action="php/login_usuario.php" method="POST">
                    <input type="text" placeholder="Correo Electrónico" name="correo">
                    <input type="text" placeholder="Contraseña" name="contrasena">
                    <button class="entrar">Entrar</button>
                </form>
            </div>
            <div>
                <form  class="registro" action="php/registro_usuario.php" method="POST">
                    <input type="text" placeholder="Nombre" name="nombre">
                    <input type="text" placeholder="Correo Electrónico" name="correo">
                    <input type="text" placeholder="Contraseña" name="contrasena">
                    <button class="registrarse">Regístrarse</button>
                </form>
            </div>
        </div>   
        <!-- NAV -->
        <nav class="nav"> 
            <a class="nav-toggle"><i class="barra_menu"></i></a>
            <ul class="nav-menu nav-menu_visible">
                <li class="nav-menu-item"><a href="#" class="nav-menu-link">Inicio</a></li>
                <li class="nav-menu-item"><a href="#servicios" class="nav-menu-link">Servicios</a></li>
                <li class="nav-menu-item"><a href="#tarifas" class="nav-menu-link">Tarifas y Bonos</a></li>
                <li class="nav-menu-item"><a href="#cita" class="nav-menu-link">¡Pide cita!</a></li>
                <li class="nav-menu-item"><a href="#contacto" class="nav-menu-link">Contacto</a></li>
            </ul>
        </nav>
        <div class="sesiones">
            <a class="inicio">Inciar sesión</a>
            <a class="nuevo">Regístrate</a>
        </div>
    </header>
        
    <main>

        <!-- TRABAJO -->

        <article id="cita" class="trabajo">
            <h1>Tu fisioterapeuta a domicilio</h1>
            <div class="domicilio">
                <section class="trabajando">
                    <img src="imagenes/Trabajando.jpg" alt="Foto trabajando">
                </section>
                <section class="cita">
                    <h2>Tu cita al momento</h2>
                    <p>Con los mejores profesionales</p>
                    <p>Sin necesidad de acudir a ningún sitio</p>
                    <p>nosotros nos desplazamos por ti</p>
                </section>
            </div>
            <a class="pedir_cita">¡PIDE TU CITA!</a>
        </article>

        <!-- COVID -->

        <article class="">
            <section class="covid">

                <h2>MEDIDAS ANTICOVID</h2>
                <p>Cumplimos todos los protocoles</p>
                <a class="protocolo">VER PROTOCOLOS</a>
                <!-- Interactividad aparezca un desplegable para el protocolo -->
            </section>
            <div class="desplegableCovid">
                <span class="cierreCovid">&#10006;</span>
                <h3>Tu seguridad, nuestra prioridad</h3>
                <p>Nuestros profesionales han recibido formación específica sobre el coronavirus 
                    y aplican continuamente un estricto protocolo higiénico/sanitario.</p>
                <p>Por favor, llamanos para posponer tu cita si tienes o has tenido síntomas, o si has estado en 
                    contacto estrecho con alguien con síntomas en los últimos 7 días.</p>
                <p>Uso de mascarilla en todo momento</p>
                <p>Desinfección de manos, brazos y zonas de contacto</p>
            </div>
        </article>

        <!-- SERVICIOS Y TARIFAS -->

        <article class="todo">
            <!-- Servicios -->
            <section id="servicios" class="servicios">
                <h1>Servicios</h1>
                <article class="caja">
                    <div class="individual">
                        <div class="delante">
                            <img src="imagenes/crecimiento.jpg" alt="">
                        </div>
                        <div class="detras">
                            <h2 class="nivel">ELEVA TU NIVEL</h2>
                            <p>Con tu fisioterapeuta particular, elevaras tu nivel</p>
                            <p>Mejora de hábitos y recuperación</p>
                            <p>100% enfocado en ti y tus necesidades</p>
                        </div>
                    </div>
                </article>
                <article class="caja">
                    <div class="individual">
                        <div class="delante">
                            <img src="imagenes/recuperacion.png" alt="">
                        </div>
                        <div class="detras">
                            <h2 class="rehabilitacion">REHABILITACION</h2>
                            <p>Recupera tu vida con menos frustración</p>
                            <p>Nos adaptamos a tus horarios y a tus necesidades</p>
                        </div>
                    <div>
                </article>
                <article class="caja">
                    <div class="individual">
                        <div class="delante">
                            <img src="imagenes/terapia_manual.jpg" alt="">
                        </div>
                        <div class="detras">
                            <h2 class="tratamiento">TRATAMIENTOS 100% MANUALES</h2>
                            <p>Bla bla</p>
                            <p>Blo blo</p>
                        </div>               
                    </div>
                </article>
                <article class="caja">
                    <div class="individual">
                        <div class="delante">
                            <img src="imagenes/madridMapa.jpg" alt="">
                        </div>
                    <div class="detras">
                        <h2 class="lugar">¿DONDE NOS ENCUENTRAS?</h2>
                        <p>Nos desplazamos por todo Madrid</p>
                        <p>¡También estamos ya en Granada!</p>
                    </div>
                </article>
            </section>
            <!-- Tarifas -->
            <section id="tarifas" class="tarifas">
                <h1>Tarifas</h1>
                <article class="tarifas_caja">
                    <section class="tarjeta">
                        <div class="tarjeta_img">
                            <img src="imagenes/masaje.png" alt="">
                        </div>
                        <div class="tarjeta_info">
                            <h2>OFERTA BONOS</h2>
                            <p>10 SESIONES POR</p>
                            <p>300 €</p>
                            <span>Te ahorras dos sesiones</span>
                            <p>LOS BONOS NO CADUCAN</p>
                            <p>Se pueden compartir</p>
                            <button>¡LO QUIERO!</button>
                        </div>
                    </section>
                    <section class="tarjeta">
                        <div class="tarjeta_img">
                            <img src="imagenes/masaje.png" alt="">
                        </div>
                        <div class="tarjeta_info">
                            <h2>SERVICIOS PARA CLUBES Y EMPRESAS</h2>
                            <p>Reduce absentismo y bajas</p>
                            <p>Contamos con camillas y sillas de masaje plegables de alta calidad</p>
                            <p>Aumenta la productividad previniendo molestias</p>
                        </div>
                    </section>
                    <section class="tarjeta">
                        <div class="tarjeta_img">
                            <img src="imagenes/masaje.png" alt="">
                        </div>
                        <div class="tarjeta_info">
                            <h2>OFERTA NUEVOS CLIENTES</h2>
                            <p>PRIMERA SESIÓN</p>
                            <P>30€</P>
                            <p>TRATAMIENTOS DE 50 MINUTOS</p>
                            <p>*Precio habitual 37€</p>
                        </div>
                    </section>
                </article>
                <a class="pedir_cita" href="cita.html">¡PIDE CITA YA!</a>
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
        <a href="politica_privacidad.html">Politica de privacidad</a>
    </footer>
</body>
<script src="js/interactividad.js"></script>
</html>