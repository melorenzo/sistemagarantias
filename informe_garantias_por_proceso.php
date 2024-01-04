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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta segura para evitar inyecciones SQL.
$sql = "SELECT * FROM garantias_cargadas WHERE Devuelta = '' AND Proceso= '$proceso'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultado = $stmt->get_result();

// Incluye la biblioteca TCPDF
require_once('TCPDF-main/tcpdf.php');

// Crear nueva instancia de TCPDF
$pdf = new TCPDF();

// Establecer el título del informe
$pdf->SetTitle('Informe de Tabla en PDF');

// Establecer la orientación de la página a paisaje (landscape)
$pdf->SetPageOrientation('L');  // 'L' indica landscape

// Agregar una página al PDF
$pdf->AddPage();

// Configurar el formato de fuente
$pdf->SetFont('helvetica', '', 12);

// Crear la tabla con los datos
$html = '<body>
    <section class="form_wraptabla">
        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Sistema De Garantias</h2>
                <h4>Inventario de Garantias</h4>
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
            <tbody>';

while ($row = $resultado->fetch_assoc()) {
    $Usuario_Carga = $row["Usuario_Carga"];
    $Proceso = $row["Proceso"];
    $Tipo_Garantia = $row["Tipo_garantia"];
    $Proveedor = $row["Proveedor"];
    $Compania = $row["Compania_Aseguradora"];
    $Monto = $row["Monto"];
    $Fecha_Carga = $row["Fecha_Carga"];

    $html .= '<tr>
                <th scope="row">' . $Usuario_Carga . '</th>
                <td>' . $Proceso . '</td>
                <td>' . $Tipo_Garantia . '</td>
                <td>' . $Proveedor . '</td>
                <td>' . $Compania . '</td>
                <td>' . $Monto . '</td>
                <td>' . $Fecha_Carga . '</td>
            </tr>';
}


// Escribir la tabla en el PDF
$pdf->writeHTML($html, true, false, false, false, '');

// Nombre del archivo PDF
$nombreArchivo = 'Garantia del Proceso N° '.$proceso.'.pdf';

// Salida del PDF (descarga)
$pdf->Output($nombreArchivo, 'D');
?>
