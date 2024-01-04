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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>
<navbar>
    <div class="sesion">
    <p class="text_sesion">Estas conectado como: <span class="fuelte"><?php echo  $_SESSION['usuario'];  ?></span><br></p>
    </div>
</navbar>
<body>

    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Sistema<br>De Garantias</h2>
            </section>
            <!--<section class="info_items">
                <p><span class="fa fa-envelope"></span> info.contact@gmail.com</p>
                <p><span class="fa fa-mobile"></span> +1(585) 902-8665</p>
            </section>-->
        </section>

        <form method="post" action="mostrar_garantia.php" class="form_contact">
            <h2>Buscar Garantia</h2>
            <div class="user_info">
                <label for="names">Ingrese el Nro de Proceso</label>
                <input type="text" name="Nro_Procesohtml">

                <div class="button-container">
                    <button class="button" name="btnmostrar"><span>Buscar Proceso</span></button>
                    <a href="pagina2.php" ><button class="button"  type="button">Atras</button></a>
                </div>
            </div>
        </form>

    </section>

</body>
</html>
<?php
  
  if(isset($_POST['btnmostrar']))
{
  // Obtengo los datos cargados en el formulario de login.
  $nro_proceso = $_POST['Nro_Procesohtml'];
  $Proceso= "";
   
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
  $sql = sprintf("SELECT Nro_Proceso FROM procesos WHERE Nro_Proceso = '$nro_proceso'");
  $resultado = $conn->query($sql);
  while ($row = mysqli_fetch_array($resultado)) {
    $Proceso= $row['Nro_Proceso'];
  };
  // Verificando si el usuario existe en la base de datos.
if($Proceso == $nro_proceso){
  // Redirecciono al usuario a la página de carga del sitio.
  $_SESSION['Nro_Procesohtml']= $nro_proceso;
  header("HTTP/1.1 302 Moved Temporarily"); 
  header("Location: mostrar_garantia_2.php"); 
}else{
  echo "<div class='alert alert-danger' role='alert'><h4>El Numero de Proceso  es incorrecto, vuelva a intenarlo.🚨</h4></div>";
  
}

}

 
?>