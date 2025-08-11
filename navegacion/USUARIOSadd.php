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
$fec=$_POST['FechaRegistro'];
$idu=$_POST['Id_Usuario'];
$nom=$_POST['Nombre'];
$cor=$_POST['CorreoUsuario'];
$tel=$_POST['Telefono'];
$obs=$_POST['Observaciones'];
//insertamos datos a sql
$stm="INSERT INTO usuarios(FechaRegistro,Id_Usuario,Nombre,CorreoUsuario,Telefono,Observaciones)VALUES('$fec','$idu','$nom','$cor','$tel','$obs')";
$stmt=mysqli_query($conn,$stm);
if($stmt){
    echo "<script>alert('dato insertado correctamente');
                 window.location.href='usuarios.php';
          </script>";
    exit();
}  
    echo "<scrip>alert('no inserto')</script>";
?>


