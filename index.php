<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Sistema de Garantias</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/stylelog.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Ingreso Sistema de Garantias</h1><!--<span>Pen <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span>-->
</div>
<!--<div class="rerun"><a href="">Rerun Pen</a></div>-->
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method="post" action="index.php" name="ingresar">
      <div class="input-container">
        <input name="usuario" type="#{type}" id="#{label}" required="required"/>
        <label for="#{label}">Nombre de Usuario</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input name="pass" type="password" id="#{label}" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button name="btningresar"><span>Entrar</span></button>
      </div>
      <!--<div class="footer"><a href="#">Forgot your password?</a></div>-->
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    
  </div>
</div>
<!-- Portfolio--><a id="portfolio" href="https://chat.whatsapp.com/IYKC4UbsReH0pNtpSn5eo2" title="Escribinos por Whatsapp"><i class="fa fa-whatsapp"></i></a>
<!-- CodePen--><a id="codepen" href="http://www.infocompras.gq/" title="Sitio Web"><i class="fa fa-globe"></i></a>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="/js/scriptlog.js"></script>

</body>
</html>

<?php
  session_start();
  if(isset($_POST['btningresar']))
{
  // Obtengo los datos cargados en el formulario de login.
  $usuario = $_POST['usuario'];
  $password = $_POST['pass'];
   
  // Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "sistema_garantias";
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
   
  // Consulta segura para evitar inyecciones SQL.
  $sql = sprintf("SELECT * FROM usuarios WHERE Usuario='%s' AND Clave='%s'", mysqli_real_escape_string($usuario), mysqli_real_escape_string($password));
  $resultado = $conn->query($sql);
   
  // Verificando si el usuario existe en la base de datos.
  if($resultado){
    // Guardo en la sesión el email del usuario.
    $_SESSION['usuario'] = $usuario;
     
    // Redirecciono al usuario a la página principal del sitio.
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: pagina1.php"); 
  }else{
    echo 'El email o password es incorrecto, <a href="index.php">vuelva a intenarlo</a>.<br/>';
  }
}
 
?>