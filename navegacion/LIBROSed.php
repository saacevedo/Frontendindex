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
$idl =$_GET['Id_Libro'];

// Obtener datos actuales del usuario
$sql = "SELECT Id_Libro, Titulo, Paginas, Idioma, Precio, FechaPublicacion FROM libros where Id_Libro=$idl";

$resultado =mysqli_query($conn,$sql);

$LIBR = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libro</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>
<body>


    <div class="form-container">
        <h1>❗❌Atencion solo el Admin puede eliminar este tipo de registros❌❗</h1>     
        <form action="LIBROSeliminar.php" method="post">

            <input type="hidden" name="Id_Libro" value="<?php echo ($LIBR['Id_Libro']); ?>">
            <div class="form-group">
                <label for="Id_Libro">Id Libro</label><br>
                <input type="text" id="Id_Libro" name="Id_Libro" value="<?php echo ($LIBR['Id_Libro']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Titulo">Titulo:</label><br>
                <input type="text" id="Titulo" name="Titulo" value="<?php echo ($LIBR['Titulo']); ?>" readonly>
            </div>
             <div class="form-group">
                <label for="Paginas">Paginas:</label><br>
                <input type="text" id="Paginas" name="Paginas" value="<?php echo ($LIBR['Paginas']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Idioma">Idioma:</label><br>
                <input type="text" id="Idioma" name="Idioma" value="<?php echo ($LIBR['Idioma']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Precio">Precio:</label><br>
                <input type="text" id="Precio" name="Precio" value="<?php echo ($LIBR['Precio']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="FechaPublicacion">FechaPublicacion:</label><br>
                <input type="text" id="FechaPublicacion" name="FechaPublicacion" value="<?php echo ($LIBR['FechaPublicacion']); ?>" readonly>
            </div>
            
            <div class="form-group">
                <a href="libros.php" class="btn btn-back">Volver</a>
                <button type="submit" class="btn btn-primary" onclick="if(confirm('¿Estás seguro de que deseas borrar el dato?')) { borrarAlgo(); }">Borrar</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>