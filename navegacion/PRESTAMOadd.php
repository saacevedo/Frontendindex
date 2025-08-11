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
$fecp=$_POST['FechaPrestamo'];
$fecd=$_POST['FechaDevolucion'];
$idl=$_POST['Id_Libro'];
$idu=$_POST['Id_Usuario'];
$idp=$_POST['Id_Prestamo'];
//insertamos datos a sql
$stm="INSERT INTO prestamo(FechaPrestamo,FechaDevolucion,Id_Libro,Id_Usuario,Id_Prestamo)VALUES('$fecp','$fecd','$idl','$idu','$idp')";
$stmt=mysqli_query($conn,$stm);
if($stmt){
    echo "<script>alert('dato insertado correctamente');
                 window.location.href='prestamo.php';
          </script>";
    exit();
}  
    echo "<scrip>alert('no inserto')</script>";
?>


