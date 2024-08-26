<?php
session_start();
if ($_SESSION['type'] != "user"){header("Location: index.php");}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Garantias</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>
<navbar>
    <div class="sesion">
    <p class="text_sesion">Estas conectado como: <sapn class="fuelte"><?php echo  $_SESSION['usuario'];  ?>&nbsp; <?php echo  $_SESSION['type'];  ?></span></p>
    </div>
</navbar>
<body>

<section class="form_wrap">
    <section class="cantact_info">
        <section class="info_title">
            <span class="fa fa-user-circle"></span>
            <h2>Sistema<br>De Garantias</h2>
            <a href="cambiar_contraseña.php"><button class="button-inicio" type="button">Cambiar Contraseña</button></a>
            <a href="salir.php"><button class="button-inicio" type="button">Cerrar Sesion</button></a>
        </section>
    </section>
    <div class="menu">
    <div class="tittle">
        <h3>Bienvenidos al Sistema de Garantias</h3>
    </div>
        <div class="column">
            <a href="cargar_proceso.php"><button class="button" type="button">Nuevo Proceso</button></a>
            <a href="cargar_garantia.php"><button class="button" type="button">Cargar Garantia</button></a>
            <a href="editar_garantia.php"><button class="button" type="button">Devolucion de Garantia</button></a>
            <a href="descargar_garantia_digital.php"><button class="button" type="button">Descargar Garantia Digital</button></a>
        </div>
        <div class="column">
            <a href="mostrar_garantia.php"><button class="button" type="button">Mostrar Garantias x Nro de Proceso</button></a>
            <a href="mostrar_garantia_todas.php"><button class="button" type="button">Mostrar Todas las Garantias</button></a>
            <a href="mostrar_garantia_devueltas.php"><button class="button" type="button">Garantías dadas de baja</button></a>
            <a href="agregar_garantia_digital.php"><button class="button" type="button">Agregar Garantia Digital</button></a>
            <!--<a href="modificar_proceso.php"><button class="button" type="button">Modificar un Proceso</button></a>-->
        </div>
    </div>
</section>




</body>
</html>