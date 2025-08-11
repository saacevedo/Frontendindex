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
// Obtener el ID 

$idp = $_POST['Id_Prestamo'];

// Procesar el formulario de actualización

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fecp = $_POST['FechaPrestamo'];
    $fecd = $_POST['FechaDevolucion'];
    $idl = $_POST['Id_Libro'];
    $idu = $_POST['Id_Usuario'];
    $idp = $_POST['Id_Prestamo'];

   
    $stmt = $conn->prepare("DELETE FROM prestamo WHERE Id_Prestamo='$idp'");

    if($stmt->execute()){
        echo "<script>alert('Prestamo Eliminado');
                     window.location.href='prestamo.php';
              </script>";
        exit();
    }  
        echo "<scrip>alert('No Elimino')</script>";
}
$conn->close();

?>