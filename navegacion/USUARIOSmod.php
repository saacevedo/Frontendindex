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
$idu = $_POST['Id_Usuario'];

// Procesar el formulario de actualización

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idu = $_POST['Id_Usuario'];
    $fec = $_POST['FechaRegistro'];
    $nom = $_POST['Nombre'];
    $cor = $_POST['CorreoUsuario'];
    $tel = $_POST['Telefono'];
    $obs = $_POST['Observaciones'];
    

    $stmt = $conn->prepare("UPDATE usuarios SET Id_Usuario='$idu', FechaRegistro='$fec', Nombre='$nom', CorreoUsuario='$cor', Telefono='$tel', Observaciones='$obs' WHERE Id_Usuario='$idu'");

    if ($stmt->execute()) {
        $mensaje = "✔ Actualizado correctamente";
        $clase_mensaje = "success";
    } else {
        $mensaje = "Error al actualizar el usuario: " . $stmt->error;
        $clase_mensaje = "error";
    }

    $stmt->close();
}
// Obtener datos actuales del usuario

$sql = "SELECT Id_Usuario, FechaRegistro, Nombre, CorreoUsuario, Telefono, Observaciones FROM usuarios WHERE Id_Usuario ='$idu'";
$resultado = mysqli_query($conn,$sql);
$LIBR = $resultado->fetch_assoc();

// if($conn->connect_error){
//         echo "<script>alert('error de conexion')<script>";
//         }
//         $sql = "select Nit_Editorial,NomEditorial from editorial";
//         $sql1 = "select Id_Autor,Nombre from autores";
//         $consulta = mysqli_query($conn,$sql);
//         $consulta1 = mysqli_query($conn,$sql1);
// ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>

<body>
    <div class="container">
        <h1></h1>
        <?php if (isset($mensaje)): ?>
<div class="message <?php echo $clase_mensaje; ?>">
    <?php echo $mensaje; ?>
</div>
<?php endif; ?>
    
        <div class="container">
        <h1></h1>      
        <form action="USUARIOSmod.php" method="post">
            <input type="hidden" name="Id_Usuario" value="<?php echo ($LIBR['Id_Usuario']); ?>">
        
            <div class="form-group">
                <label for="Id_Usuario">Cedula:</label><br>
                <input type="text" id="Id_Usuario" name="Id_Usuario" value="<?php echo ($LIBR['Id_Usuario']); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label for="FechaRegistro">FechaRegistro:</label><br>
                <input type="text" id="FechaRegistro" name="FechaRegistro" value="<?php echo ($LIBR['FechaRegistro']); ?>" readonly>
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
                <!-- <button type="submit" class="btn btn-primary">Guardar Cambios</button> -->
            </div>
        </form>
    </div>
    </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>