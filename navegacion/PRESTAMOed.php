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
$idp =$_GET['Id_Prestamo'];

// Obtener datos actuales del usuario
$sql = "SELECT Id_Prestamo, FechaPrestamo, FechaDevolucion, Id_Prestamo, Id_Usuario FROM prestamo where Id_Prestamo=$idp";

$resultado =mysqli_query($conn,$sql);

$LIBR = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar registro</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>
<body>


    <div class="form-container">
        <h1>Eliminar</h1>      
        <form action="PRESTAMOeliminar.php" method="post">

            <input type="hidden" name="Id_Prestamo" value="<?php echo ($LIBR['Id_Prestamo']); ?>" readonly>
            <div class="form-group">
                <label for="Id_Prestamo">Id Libro</label><br>
                <input type="text" id="Id_Prestamo" name="Id_Prestamo" value="<?php echo ($LIBR['Id_Prestamo']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="FechaPrestamo">Fecha Prestamo:</label>
                <input type="text" id="FechaPrestamo" name="FechaPrestamo" value="<?php echo ($LIBR['FechaPrestamo']); ?>" readonly>
            </div>
             <div class="form-group">
                <label for="FechaDevolucion">Fecha Devolucion:</label>
                <input type="text" id="FechaDevolucion" name="FechaDevolucion" value="<?php echo ($LIBR['FechaDevolucion']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Id_Usuario">Usuario:</label><br>
                <input type="text" id="Id_Usuario" name="Id_Usuario" value="<?php echo ($LIBR['Id_Usuario']); ?>" readonly>
            </div>
            
            <div class="form-group">
                <a href="prestamo.php" class="btn btn-back">Volver</a>
                <button type="submit" class="btn btn-primary" onclick="if(confirm('¿Estás seguro de que deseas borrar esto?')) { borrarAlgo(); }">Borrar</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>