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
$nit=$_POST['Nit_Editorial'];
$nombre=$_POST['NomEditorial'];
//insertamos datos a sql
$stm="INSERT INTO editorial(Nit_Editorial,NomEditorial)VALUES('$nit','$nombre')";
$stmt=mysqli_query($conn,$stm);
if($stmt){
    echo "<script>alert('dato insertado correctamente');
                 window.location.href='editorial.php';
          </script>";
    exit();
}  
    echo "<scrip>alert('no inserto')</script>";
?>


