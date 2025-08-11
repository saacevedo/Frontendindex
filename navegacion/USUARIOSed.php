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
$idu =$_GET['Id_Usuario'];

// Obtener datos actuales del usuario
$sql = "SELECT FechaRegistro, Id_Usuario, Nombre, CorreoUsuario, Telefono, Observaciones FROM usuarios where Id_Usuario=$idu";

$resultado =mysqli_query($conn,$sql);

$LIBR = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>
<body>


    <div class="form-container">
        <h1>❗❌Atencion solo el Admin puede eliminar este tipo de registros❌❗</h1>      
        <form action="USUARIOSeliminar.php" method="post">

            <input type="hidden" name="Id_Usuario" value="<?php echo ($LIBR['Id_Usuario']); ?>">
            
            <div class="form-group">
                <label for="FechaRegistro">FechaRegistro:</label><br>
                <input type="text" id="FechaRegistro" name="FechaRegistro" value="<?php echo ($LIBR['FechaRegistro']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="Id_Usuario">Cedula</label><br>
                <input type="text" id="Id_Usuario" name="Id_Usuario" value="<?php echo ($LIBR['Id_Usuario']); ?>" readonly>
            </div>
            
             <div class="form-group">
                <label for="Nombre">Nombre:</label><br>
                <input type="text" id="Nombre" name="Nombre" value="<?php echo ($LIBR['Nombre']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="CorreoUsuario">CorreoUsuario:</label><br>
                <input type="text" id="CorreoUsuario" name="CorreoUsuario" value="<?php echo ($LIBR['CorreoUsuario']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono:</label><br>
                <input type="text" id="Telefono" name="Telefono" value="<?php echo ($LIBR['Telefono']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Observaciones">Observaciones:</label><br>
                <input type="text" id="Observaciones" name="Observaciones" value="<?php echo ($LIBR['Observaciones']); ?>" readonly>
            </div>
            
            <div class="form-group">
                <a href="usuarios.php" class="btn btn-back">Volver</a>
                <button type="submit" class="btn btn-primary" onclick="if(confirm('¿Estás seguro de que deseas borrar esta info?')) { borrarAlgo(); }">Borrar</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>