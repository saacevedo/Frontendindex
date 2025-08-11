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

$ida = $_POST['Id_Autor'];

// Procesar el formulario de actualización

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ida = $_POST['Id_Autor'];
    $nom = $_POST['Nombre'];
    $nac = $_POST['Nacionalidad'];
   
    $stmt = $conn->prepare("DELETE FROM autores WHERE Id_Autor='$ida'");

    if($stmt->execute()){
        echo "<script>alert('Autor Eliminado');
                     window.location.href='autores.php';
              </script>";
        exit();
    }  
        echo "<scrip>alert('No Elimino')</script>";
}
$conn->close();

?>