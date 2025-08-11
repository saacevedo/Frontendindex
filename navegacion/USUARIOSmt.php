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
$sql = "SELECT Id_Usuario, FechaRegistro, Nombre, CorreoUsuario, Telefono, Observaciones FROM usuarios where Id_Usuario= '$idu'";
$resultado =mysqli_query($conn,$sql);
$LIBR = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>
<body>

    
    <div class="form-container">
        <h1>Editar Usuario</h1>      
        <form action="USUARIOSmod.php" method="post">
            <input type="hidden" name="Id_Usuario" value="<?php echo ($LIBR['Id_Usuario']); ?>">

            <div class="form-group">
                <label for="FechaRegistro">FechaRegistro:</label><br>
                <input type="text" id="FechaRegistro" name="FechaRegistro" value="<?php echo ($LIBR['FechaRegistro']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Id_Usuario">Cedula:</label><br>
                <input type="text" id="Id_Usuario" name="Id_Usuario" value="<?php echo ($LIBR['Id_Usuario']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="Nombre">Nombre:</label><br>
                <input type="text" id="Nombre" name="Nombre" value="<?php echo ($LIBR['Nombre']); ?>" required>
            </div>

            

            <div class="form-group">
                <label for="CorreoUsuario">CorreoUsuario:</label><br>
                <input type="text" id="CorreoUsuario" name="CorreoUsuario" value="<?php echo ($LIBR['CorreoUsuario']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Telefono">Telefono:</label><br>
                <input type="text" id="Telefono" name="Telefono" value="<?php echo ($LIBR['Telefono']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Observaciones">Observaciones:</label><br>
                <input type="text" id="Observaciones" name="Observaciones" value="<?php echo ($LIBR['Observaciones']); ?>" required>
            </div>
            

            <div class="form-group">
                <a href="usuarios.php" class="btn btn-back">Volver</a>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
            
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>