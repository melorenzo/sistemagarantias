<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: index.php');
}
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
    <p class="text_sesion">Estas conectado como: <?php echo  $_SESSION['usuario'];  ?></p>
    </div>
</navbar>
<body>

    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Sistema<br>De Garantias</h2>
            </section>
            
        </section>
        <div class="container">     
        <a href="cargar_proceso.php" ><button class="button"  type="button">Nuevo Proceso</button></a>
        <a href="cargar_garantia.php" ><button class="button"  type="button">Caragar Garantia</button></a>
        <a href="salir.php" ><button class="button"  type="button">Cerrar Sesion</button></a>
        </div>
    </section>

</body>
</html>
