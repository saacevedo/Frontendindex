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

$nit = $_POST['Nit_Editorial'];

// Procesar el formulario de actualización

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nit = $_POST['Nit_Editorial'];
    $nombre = $_POST['NomEditorial'];
   
    $stmt = $conn->prepare("DELETE FROM editorial WHERE Nit_Editorial='$nit'");

    if($stmt->execute()){
        echo "<script>alert('Editorial Eliminado');
                     window.location.href='editorial.php';
              </script>";
        exit();
    }  
        echo "<scrip>alert('No Elimino')</script>";
}
$conn->close();

?>