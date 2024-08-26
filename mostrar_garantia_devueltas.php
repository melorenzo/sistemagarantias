<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: index.php');
}
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
   $sql = "SELECT * FROM garantias_cargadas WHERE Devuelta ='Devuelta' ORDER BY Proceso" ;
   $stmt = $conn->prepare($sql);
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
<body>

    <section class="form_wraptabla">
        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Sistema<br>De Garantias</h2>
                <a href="pagina2.php" ><button class="button-atras">Atras</button></a>
                <a href="informe_garantias_devueltas.php" ><button class="button-atras">Descargar</button></a>
            </section>
        </section>
        <table class="table table-striped">
  <thead>
    <tr class="fuelte">
      <th scope="col">Usuario</th>
      <th scope="col">Nro Proceso</th>
      <th scope="col">Tipo de Garantia</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Compania Aseguradora</th>
      <th scope="col">Monto</th>
      <th scope="col">Fecha de Carga</th>
    </tr>
  </thead>
  <?php 
    while ($row = mysqli_fetch_assoc($resultado)) {
        $Proceso= $row['Proceso'];
        $Tipo_Garantia= $row['Tipo_garantia'];
        $Proveedor= $row['Proveedor'];
        $Compania= $row['Compania_Aseguradora'];
        $Monto= $row['Monto'];
        $Fecha_Carga= $row['Fecha_Carga'];
        $Usuario_Carga= $row['Usuario_Carga'];
      
      // Verificando si el usuario existe en la base de datos.
     ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo  $Usuario_Carga;  ?></th>
      <td><?php echo  $Proceso;  ?></td>
      <td><?php echo  $Tipo_Garantia;  ?></td>
      <td><?php echo  $Proveedor;  ?></td>
      <td><?php echo  $Compania;  ?></td>
      <td><?php echo  $Monto;  ?></td>
      <td><?php echo  $Fecha_Carga;  ?></td>

    </tr>
  </tbody>
  <?php

};
?>
</table>

    </section>      
    <footer>
    <div class="user_abajo">
    <p class="text_sesion_tabla">Estas conectado como: <span class="fuelte"><?php echo  $_SESSION['usuario'];  ?></span><br></p>
    </div>
</footer>

</body>
</html>