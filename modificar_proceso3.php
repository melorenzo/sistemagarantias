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
$Id_proceso =  $_SESSION['Id_Procesohtml'];

if ($Id_proceso) {
    // Conectar a la base de datos
    $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

    // Validar la conexión de base de datos.
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consultar los datos existentes de la garantía
    $sql = sprintf("SELECT * FROM garantias_cargadas WHERE Id_proceso = '%s'", mysqli_real_escape_string($conn, $Id_proceso));
    $resultado = $conn->query($sql);

    if ($row = mysqli_fetch_array($resultado)) {
        // Asignar los valores actuales a las variables
        $tipo = $row['Tipo_garantia'];
        $proveedor = $row['Proveedor'];
        $aseguradora = $row['Compania_Aseguradora'];
        $monto = $row['Monto'];
        $fecha = $row['Fecha_Carga'];
        $observaciones = $row['observaciones'];
    }

    mysqli_close($conn);
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

        <form method="post" action="modificar_proceso3.php" class="form_contact">
    <h2>Modificar Garantía</h2>
    <!-- Incluir el id_garantia oculto para enviarlo con el formulario -->
    <input type="hidden" name="id_garantia" value="<?php echo $id_garantia; ?>">

    <!-- Resto del formulario prellenado -->
    <div class="user_info">
        <label for="names">Tipo de Garantía</label>
        <input type="radio" name="boton_adjudicacion" value="Adjudicacion" <?php echo ($tipo == 'Adjudicacion') ? 'checked' : ''; ?>> Adjudicacion
        <input type="radio" name="boton_oferta" value="Oferta" <?php echo ($tipo == 'Oferta') ? 'checked' : ''; ?>> Oferta

        <label for="names">Proveedor</label>
        <input type="text" name="Proveedor" value="<?php echo $proveedor; ?>">

        <label for="names">Compañía Aseguradora</label>
        <input type="text" name="Aseguradora" value="<?php echo $aseguradora; ?>">

        <label for="names">Monto</label>
        <input type="text" name="Monto" value="<?php echo $monto; ?>">

        <label>Fecha</label>
        <input type="date" name="fecha_garantia" value="<?php echo $fecha; ?>" required>

        <label>Observaciones</label>
        <input type="text" name="observaciones" value="<?php echo $observaciones; ?>" required>

        <button class="button" name="btnModificar" data-toggle="modal" data-target="#myModal"><span>Modificar Proceso</span></button>
    </div>
</form>


    </section>

</body>
</html>

<?php
if (isset($_POST['btnModificar'])) {
    $adjudicacion = $_POST['boton_adjudicacion'];
    $oferta = $_POST['boton_oferta'];
    $proveedor = $_POST['Proveedor'];
    $aseguradora = $_POST['Aseguradora'];
    $monto = $_POST['Monto'];
    $fecha = $_POST['fecha_garantia'];
    $observaciones = $_POST['observaciones'];

    if ($adjudicacion == "") {
        $tipo = $oferta;
    } else {
        $tipo = $adjudicacion;
    }

    // Conectar a la base de datos
    $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

    // Validar la conexión de base de datos.
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar el registro existente
    $sql = sprintf("UPDATE garantias_cargadas SET Tipo_garantia = '%s', Proveedor = '%s', Compania_Aseguradora = '%s', Monto = '%s', Fecha_Carga = '%s', observaciones = '%s' WHERE Id_proceso = '%s'",
        mysqli_real_escape_string($conn, $tipo),
        mysqli_real_escape_string($conn, $proveedor),
        mysqli_real_escape_string($conn, $aseguradora),
        mysqli_real_escape_string($conn, $monto),
        mysqli_real_escape_string($conn, $fecha),
        mysqli_real_escape_string($conn, $observaciones),
        mysqli_real_escape_string($conn, $Id_proceso));

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success' role='alert'><h4>El proceso se modificó correctamente 🚨</h4><a href='pagina2.php' ><button class='button'><span>Inicio</span></button></a></div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
