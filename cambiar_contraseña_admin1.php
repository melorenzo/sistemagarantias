<?php
session_start();
if ($_SESSION['type'] != "admin") {
    header('location: index.php', true, 302);
}
?>
<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Sistema de Garantias</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/stylelog.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Sistema de Garantias</h1><!--<span>Pen <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span>-->
</div>
<div class="rerun"><a href="pagina1.php">Atras</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Cambiar contraseña de Usuario</h1>
    <form method="post" action="cambiar_contraseña_admin1.php" name="ingresar">
    <div class="input-container">
        <input name="usuario" type="#{type}" id="#{label}" required="required"/>
        <label for="#{label}">Nombre de Usuario</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input name="new_password" type="password" id="#{label}" required="required"/>
        <label for="#{label}">Nuevo Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button name="btnregistrar"><span>Registrar</span></button>
      </div>
      <!--<div class="footer"><a href="#">Forgot your password?</a></div>-->
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"><a href="pagina1.php"></a></div>
    
  </div>
</div>
<!-- Portfolio--><a id="portfolio" href="https://chat.whatsapp.com/IYKC4UbsReH0pNtpSn5eo2" title="Escribinos por Whatsapp"><i class="fa fa-whatsapp"></i></a>
<!-- CodePen--><a id="codepen" href="https://matiaslorenzo.ar/" title="Sitio Web del Diseñador"><i class="fa fa-globe"></i></a>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="/js/scriptlog.js"></script>

</body>
</html>

<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usuario'], $_POST['new_password'])) {
    $usuario = $_POST['usuario'];
    $new_password = $_POST['new_password'];

    if (buscarUsuario($usuario)) {
        if (cambiarContrasena($usuario, $new_password)) {
            echo "<div class='alert alert-success' role='alert'><h4>Contraseña actualizada correctamente.<a href='index.php'>Inicio</a></h4></div>";
          } else {
            echo "<div class='alert alert-danger' role='alert'><h4>Error al intentar actualizar la contraseña. <a href='registrar.php'>Inténtelo de nuevo.🚨</a></h4></div>";
          }
    }else {
        echo $usuario, "<div class='alert alert-danger' role='alert'><h4>Usuario no encontrado. <a href='registrar.php'>Inténtelo de nuevo.🚨</a></h4></div>";
    }
}
?>