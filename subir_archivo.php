<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: index.php');
}
$proceso=  $_SESSION['Nro_Procesohtml'];
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
    <p class="text_sesion">Estas conectado como: <span class="fuelte"><?php echo  $_SESSION['usuario'];  ?></span><br></p>
    </div>
</navbar>
<body>

    <section class="form_wrap2">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Sistema<br>De Garantias</h2>
            </section>
            
        </section>
        <form action="subir_archivo.php" method="post" enctype="multipart/form-data" class="form_contact">
            <h2>Cargar Garantia</h2>
                <p class="text_sesion">Usted esta trabajando en el Proceso N°: <span class="fuelte"><?php echo  $proceso;  ?></span><br></p>
            <div class="user_info">  
                <label for="garantia_digital">Seleccione un archivo PDF:</label>
                <input type="file" name="garantia_digital" accept=".pdf">
                <div class="button-container">
                    <button class="button" type="submit" name="btncargar" data-toggle="modal" data-target="#myModal"><span>Cargar Garantia</span></button>
                    <a href="pagina2.php" ><button class="button"  type="button">Salir sin Cargar Garantia</button></a>
                    <a href="pagina2.php" ><button class="button"  type="button">Atras</button></a>
                </div>
            </div>
        </form>
    </section>

</body>
</html>

<?php
  if(isset($_POST['btncargar']))
{
  $adjudicacion = $_POST['boton_adjudicacion'];
  $proveedor = $_POST['Proveedor'];
  $oferta = $_POST['boton_oferta'];
  $aseguradora = $_POST['Aseguradora'];
  $monto = $_POST['Monto'];
  $fecha = $_POST['fecha_garantia'];
  $usuario= $_SESSION['usuario'];
  $garantia= $_POST['grantia_digital'];

  if($adjudicacion == ""){ $tipo=$oferta; }else{$tipo=$adjudicacion;};
   
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
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se seleccionó un archivo
    if (isset($_FILES['garantia_digital']) && $_FILES['garantia_digital']['error'] === UPLOAD_ERR_OK) {
        // Ruta de destino para guardar el archivo
        $directorio_destino = '/garantias/garantias/GarantiasDigitales/';
        // Verificar si el directorio existe, si no, créalo
        if (!file_exists($directorio_destino)) {
            mkdir($directorio_destino, 0777, true); // Cambia los permisos según sea necesario
        }
        $nombre_archivo = $_FILES['garantia_digital']['name'];
        $ruta_destino = $directorio_destino . $nombre_archivo;

        // Mover el archivo a la ubicación deseada
        if (move_uploaded_file($_FILES['garantia_digital']['tmp_name'], $ruta_destino)) {
            // Caragr en la Base de datos
            $sql = sprintf("UPDATE garantias_cargadas SET Nombre_Archivo = '$nombre_archivo', Ubicacion = '$directorio_destino' WHERE Proceso = '$proceso'");
        } else {
            echo 'Error al subir el archivo.';
        }
    } else {
        echo 'No se seleccionó ningún archivo o hubo un error en la carga.';
    }
}
  if (mysqli_query($conn, $sql)) {
    echo "<div class='alert alert-success' role='alert'><h4>El archivo se Cargo Correctamente 🚨</h4></div>";  
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
 


?>