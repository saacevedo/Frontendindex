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

$idl = $_POST['Id_Libro'];

// Procesar el formulario de actualización

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idl = $_POST['Id_Libro'];
    $tit = $_POST['Titulo'];
    $pag = $_POST['Paginas'];
    $idi = $_POST['Idioma'];
    $pre = $_POST['Precio'];
    $fec = $_POST['FechaPublicacion'];
    $nit = $_POST['Nit_Editorial'];
    $ida = $_POST['Id_Autor'];

   
    $stmt = $conn->prepare("DELETE FROM libros WHERE Id_Libro='$idl'");

    if($stmt->execute()){
        echo "<script>alert('Libro Eliminado');
                     window.location.href='libros.php';
              </script>";
        exit();
    }  
        echo "<scrip>alert('No Elimino')</script>";
}
$conn->close();

?>