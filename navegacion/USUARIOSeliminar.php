<?php

$servername="localhost";//nombre del servidor de la ejecuccion del proyecto
$username="root";//nombre del usuario con que se ingresa al motor de la base de datos
$password="";//contraseña con que se ingresa al motor de la base de datos
$dbname="libreriamanga";//nombre de la base de datos creada y/o seleccionada para utilizar

$conn=new mysqli($servername,$username,$password,$dbname);
// verificar conexion a la base de datos
if($conn->connect_error){
    echo "<script>alert('error de conexion')</script>";
}
// Obtener el ID del usuario a editar

$idu = $_POST['Id_Usuario'];

// Procesar el formulario de actualización

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fec = $_POST['FechaRegistro'];
    $idu = $_POST['Id_Usuario'];
    $nom = $_POST['Nombre'];
    $cor = $_POST['CorreoUsuario'];
    $tel = $_POST['Telefono'];
    $obs = $_POST['Observaciones'];

   
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE Id_Usuario='$idu'");

    if($stmt->execute()){
        echo "<script>alert('Usuario Eliminado');
                     window.location.href='usuarios.php';
              </script>";
        exit();
    }  
        echo "<scrip>alert('No Elimino')</script>";
}
$conn->close();

?>