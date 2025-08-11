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
$nit =$_GET['Nit_Editorial'];

// Obtener datos actuales del usuario
$sql = "SELECT Nit_Editorial, NomEditorial FROM editorial where Nit_Editorial= '$nit'";
$resultado =mysqli_query($conn,$sql);
$LIBR = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Editorial</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>
<body>
    <div class="container">
        <h1>Editar</h1>      
        <form action="EDITORIALmod.php" method="post">
            <input type="hidden" name="Nit_Editorial" value="<?php echo ($LIBR['Nit_Editorial']); ?>">



            <div class="form-group">
                <label for="nombre">Nombre Editorial:</label><br>
                <input type="text" id="NomEditorial" name="NomEditorial" value="<?php echo ($LIBR['NomEditorial']); ?>" required>
            </div>

            <div class="form-group">
                <a href="editorial.php" class="btn btn-back">Volver</a>|
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>