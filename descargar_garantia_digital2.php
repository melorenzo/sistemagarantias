<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: index.php');
}
$proceso=  $_SESSION['Nro_Procesohtml'];
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
   $sql = "SELECT * FROM garantias_cargadas WHERE Proceso=?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $proceso);
   $stmt->execute();
   $resultado = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Garantias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/stylelog.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>
<!--<navbar>
    <div class="sesion">
    <p class="text_sesion">Estas conectado como: <span class="fuelte"><?php echo  $_SESSION['usuario'];  ?></span><br></p>
    </div>
</navbar>-->

<body>

    <section class="form_wraptabla">
        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Sistema<br>De Garantias</h2>
            </section>
        </section>
        <table class="table table-striped">
  <thead>
    <tr class="fuelte">
      <th scope="col">Usuario</th>
      <th scope="col">Tipo de Garantia</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Compania Aseguradora</th>
      <th scope="col">Monto</th>
      <th scope="col">Fecha de Carga</th>
      <th scope="col">Descargar Garantia Digital</th>
    </tr>
  </thead>
  <?php 
    while ($row = mysqli_fetch_array($resultado)) {
        $Proceso= $row['Proceso'];
        $Tipo_Garantia= $row['Tipo_garantia'];
        $Proveedor= $row['Proveedor'];
        $Compania= $row['Compania_Aseguradora'];
        $Monto= $row['Monto'];
        $Fecha_Carga= $row['Fecha_Carga'];
        $Usuario_Carga= $row['Usuario_Carga'];
      
      // Verificando si el usuario existe en la base de datos.
    if($proceso == $Proceso){ ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo  $Usuario_Carga;  ?></th>
      <td><?php echo  $Tipo_Garantia;  ?></td>
      <td><?php echo  $Proveedor;  ?></td>
      <td><?php echo  $Compania;  ?></td>
      <td><?php echo  $Monto;  ?></td>
      <td><?php echo  $Fecha_Carga;  ?></td>
      <td><form action='descargar_garantia_digital2.php' method='post'>
          <button name="btndescargar"type='submit'>Descargar</button>
          </form>
      </td>  
    </tr>
  </tbody>
  <?php
}
};
?>
</table>

    </section>
    <div class="button-container-tabla">
                    <a href="pagina2.php" ><button class="button"><span>Atras</span></button></a>
                </div>
            </div>
    <div class="button-container-tabla2">
                    <a href="descargar_garantia_por_nro .php" ><button class="button"><span>Descargar</span></button></a>
                </div>
            </div>        
    <footer>
    <div class="user_abajo">
    <p class="text_sesion_tabla">Estas conectado como: <span class="fuelte"><?php echo  $_SESSION['usuario'];  ?></span><br></p>
    </div>
</footer>

</body>
</html>

<?php
  if(isset($_POST['btndescargar']))
{  
  // Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "sistema_garantias";
  while ($row = mysqli_fetch_array($resultado)) {
    $Proceso= $row['Nro_Proceso'];
  };
  // Verificando si el usuario existe en la base de datos.
if($proceso == $Proceso){
    // Realiza la consulta para obtener el nombre del archivo
$id_archivo = $proceso; // Cambia esto con el ID correcto del archivo que deseas descargar
$sql = "SELECT Nombre_Archivo FROM garantias_digitales WHERE Proceso = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_archivo);
$stmt->execute();
$stmt->bind_result($nombre_archivo);

// Obtiene el resultado
if ($stmt->fetch()) {
// Definir el directorio de destino
$directorio_destino =  'GarantiasDigitales' . DIRECTORY_SEPARATOR;

// Verificar si el directorio existe, si no, créalo
if (!file_exists($directorio_destino)) {
    mkdir($directorio_destino, 0777, true); // Cambia los permisos según sea necesario
}

$nombre_archivo = 'Trabajo_final_módulo_3.pdf';  // Sustituir con el nombre real del archivo

// Ruta completa del archivo
$ruta_completa = $directorio_destino . $nombre_archivo;
$ruta_completa_formateada = str_replace('\\', '/', $ruta_completa);

if (file_exists($ruta_completa)) {
  // Configurar las cabeceras para la descarga
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="' . basename($ruta_completa_formateada) . '"');
  header('Content-Length: ' . filesize($ruta_completa_formateada));
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Expires: 0');

  // Leer el archivo y enviarlo al navegador
  readfile($ruta_completa_formateada);
  exit; 
} else {
    // Manejar el caso en el que el archivo no existe
    echo 'El archivo no se encontró.';
    echo $ruta_completa;
}
} 
// Cierra la conexión y la declaración
$stmt->close();
$conn->close();
}
}
 


?>