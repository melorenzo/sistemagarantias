<?php
// Conexión a la base de datos
function conectarDB() {
    $nombreServidor = "localhost";
    $nombreUsuario = "root";
    $passwordBaseDeDatos = "";
    $nombreBaseDeDatos = "sistema_garantias";

    $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Función para registrar un nuevo usuario
function registrarUsuario($usuario, $password, $type) {
    $conn = conectarDB();

    // Verificar si el usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE Usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->fetch_assoc()) {
        $stmt->close();
        $conn->close();
        return false; // Usuario ya existe
    }

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar nuevo usuario
    $sql = "INSERT INTO usuarios (Usuario, Clave, Tipo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $usuario, $hashed_password, $type);
    $stmt->execute();

    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

// Función para cambiar la contraseña de un usuario
function cambiarContrasena($usuario, $new_password) {
    $conn = conectarDB();
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET Clave=? WHERE Usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed_password, $usuario);
    $stmt->execute();

    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

function buscarUsuario($usuario) {
    $conn = conectarDB();
    $sql = "SELECT Usuario FROM usuarios WHERE Usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result(); // Necesario para acceder a num_rows
    $success = $stmt->num_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}
?>