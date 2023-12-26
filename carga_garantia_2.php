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
        <form method="post" action="carga_garantia_2.php"class="form_contact">
            <h2>Cargar Garantia</h2>
                <p class="text_sesion">Usted esta trabajando en el Proceso N°: <span class="fuelte"><?php echo  $proceso;  ?></span><br></p>
            <div class="user_info">

            <label for="names">Tipo de Garantia</label>
            <div class="Boton_radio">
            <label for="Si">Adjudicacion</label>
                <input type="radio" name="boton_adjudicacion" name="fav_language" value="Adjudicacion">
                <label for="Si">Oferta</label>
                <input type="radio" name="boton_oferta" name="fav_language" value="Oferta">
            </div>    

                <label for="names">Proveedor</label>
                <input type="text" name="Proveedor">

                <label for="names">Compania Aseguradora</label>
                <input type="text" name="Aseguradora">

                <label for="names">Monto</label>
                <input type="text" name="Monto">

                <label>Fecha</label>
                <input type="date" name="fecha_garantia" required>

                
                <div class="button-container">
                    <button class="button" name="btncargar" data-toggle="modal" data-target="#myModal"><span>Cargar Garantia</span></button>
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
  $sql = sprintf("SELECT Proceso FROM garantias_cargadas WHERE Nro_Proceso = '$proceso'");
  $resultado = $conn->query($sql);
  while ($row = mysqli_fetch_array($resultado)) {
    $Proceso= $row['Nro_Proceso'];
  };
  // Verificando si el usuario existe en la base de datos.
if($proceso == $Proceso){
    echo "<div class='alert alert-danger' role='alert'><h4>La Garantia de ese Proceso  ya esta cargada.🚨</h4></div>";
}
else{
  // Caragr en la Base de datos
  $sql = sprintf("INSERT INTO garantias_cargadas (Tipo_garantia, Proveedor, Compania_Aseguradora, Monto, Fecha_Carga, Usuario_Carga, Proceso) VALUES ('$tipo', '$proveedor', '$aseguradora',  '$monto', '$fecha', '$usuario', '$proceso' )");
  if (mysqli_query($conn, $sql)) {
   header("HTTP/1.1 302 Moved Temporarily"); 
   header("Location: pagina2.php"); 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
}
 


?>