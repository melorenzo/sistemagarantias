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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <form method="post" action="cargar_proceso.php"class="form_contact">
            <h2>Cargar Garantia</h2>
            <div class="user_info">

                <label>Nro de Expediente</label>
                <input type="text" name="Nro_Expediente" required>

                <label>Nro de Proceso</label>
                <input type="text" name="Nro_Proceso" required>

                <label>Fecha</label>
                <input type="date" name="fecha_carga" required>

                
                <div class="button-container">
                    <button class="button" name="btnabrir" data-toggle="modal" data-target="#myModal"><span>Abrir Proceso</span></button>
                    <a href="pagina2.php" ><button class="button"  type="button">Atras</button></a>
                </div>
            </div>
        </form>
    </section>

</body>
</html>

<?php
  if(isset($_POST['btnabrir']))
{
  // Obtengo los datos cargados en el formulario de login.
  $expediente = $_POST['Nro_Expediente'];
  $proceso = $_POST['Nro_Proceso'];
  $fecha = $_POST['fecha_carga'];
  $usuario= $_SESSION['usuario'];
   
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
   
  // Caragr en la Base de datos
  $sql = sprintf("INSERT INTO procesos (Nro_Expediente, Nro_Proceso, Fecha_Carga, Usuario_Carga) VALUES ('$expediente', '$proceso',  '$fecha', '$usuario')");
  $resultado = $conn->query($sql);
  if (mysqli_query($conn, $sql)) {
   echo "<div class='alert alert-success' role='alert'><h4>El Proceso se Cargo Correctamente 🚨</h4></div>"; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
 


?>



 
 