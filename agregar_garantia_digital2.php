<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: index.php');
}
$proceso = $_SESSION['Nro_Procesohtml'];

// Datos para conectar a la base de datos.
$nombreServidor = "localhost";
$nombreUsuario = "root";
$passwordBaseDeDatos = "";
$nombreBaseDeDatos = "sistema_garantias";

// Crear conexión con la base de datos.
$conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

// Validar la conexión de base de datos y traer los Id_proceso de los procesos
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = sprintf("SELECT Nro_Proceso FROM procesos WHERE Nro_Proceso = '$proceso'");
$resultado = $conn->query($sql);
if ($row = mysqli_fetch_array($resultado)) {
    $Nro_proceso = $row['Nro_Proceso'];
} else {
    $Id_proceso = null;
}

mysqli_free_result($resultado);
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
    <title>Sistema Garantías</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>
<navbar>
    <div class="sesion">
        <p class="text_sesion">Estás conectado como: <span class="fuelte"><?php echo $_SESSION['usuario']; ?></span><br></p>
    </div>
</navbar>
<body>

    <section class="form_wrap2">
        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Sistema<br>De Garantías</h2>
                <a href="pagina2.php"><button class="button-atras" type="button">Atrás</button></a>
            </section>
        </section>
        <form method="post" action="agregar_garantia_digital2.php" class="form_contact">
            <h2>Cargar Garantía</h2>
            <p class="text_sesion">Usted está trabajando en el Proceso N°: <span class="fuelte"><?php echo $proceso; ?></span><br></p>
            
            <div class="user_info">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Garantía</th>
                            <th>Proveedor</th>
                            <th>Seleccione:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($Nro_proceso) {
                            $sql = sprintf("SELECT * FROM garantias_cargadas WHERE Devuelta = '' AND Proceso = '%s'", $Nro_proceso);
                            $resultado = $conn->query($sql);
                            while ($row = mysqli_fetch_array($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $row['Tipo_garantia'] . "</td>";
                                echo "<td>" . $row['Proveedor'] . "</td>";
                                echo "<td><input type='radio' name='Devuelta' value=''></td>";
                                echo "</tr>";
                                $Id_proceso = $row['Id_proceso'];
                            }
                            mysqli_free_result($resultado);
                        } else {
                            echo "<tr><td colspan='2'>No se encontraron garantías para este proceso.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="button-container">
                    <button class="button" name="btncargar" data-toggle="modal" data-target="#myModal"><span>Seleccionar Garantia</span></button>
                </div>
            </div>
        </form>
    </section>

</body>
</html>

<?php
  
  if(isset($_POST['btncargar']))
{
  // Obtengo los datos cargados en el formulario de login.
  $nro_proceso = $_POST['Nro_Procesohtml'];
  $Proceso= "";
  // Verificando si el usuario existe en la base de datos.
if($Proceso == $nro_proceso){
  // Redirecciono al usuario a la página de carga del sitio.
  $_SESSION['Id_Procesohtml']= $Id_proceso;
  header("HTTP/1.1 302 Moved Temporarily"); 
  header("Location: agregar_garantia_digital3.php"); 
}else{
  echo "<div class='alert alert-danger' role='alert'><h4>El Numero de Proceso  es incorrecto, vuelva a intenarlo.🚨</h4></div>";
  
}

}

?>