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
$idl=$_POST['Id_Libro'];
$tit=$_POST['Titulo'];
$pag=$_POST['Paginas'];
$idi=$_POST['Idioma'];
$pre=$_POST['Precio'];
$fec=$_POST['FechaPublicacion'];
$nit=$_POST['Nit_Editorial'];
$ida=$_POST['Id_Autor'];
//insertamos datos a sql
$stm="INSERT INTO libros(Id_Libro,Titulo,Paginas,Idioma,Precio,FechaPublicacion,Nit_Editorial,Id_Autor)VALUES('$adl','$tit','$pag','$idi','$pre','$fec','$nit','$ida')";
$stmt=mysqli_query($conn,$stm);
if($stmt){
    echo "<script>alert('dato insertado correctamente');
                 window.location.href='libros.php';
          </script>";
    exit();
}  
    echo "<scrip>alert('no inserto')</script>";
?>


