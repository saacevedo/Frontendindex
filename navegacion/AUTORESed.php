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
$ida =$_GET['Id_Autor'];

// Obtener datos actuales del usuario
$sql = "SELECT Id_Autor, Nombre, Nacionalidad FROM autores where Id_Autor=$ida";

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
    <link rel="shortcut icon" href="../imagenes/AnimeList.ico">
</head>
<body>
    <div class="form-container">
        <h1>Eliminar </h1>      
        <form action="AUTORESeliminar.php" method="post">

            <input type="hidden" name="Id_Autor" value="<?php echo ($LIBR['Id_Autor']); ?>">

            <div class="form-group">

                <label for="Id_Autor">Id Autor</label><br>

                <input type="text" id="Id_Autor" name="Id_Autor" value="<?php echo ($LIBR['Id_Autor']); ?>" readonly>

            </div>
            <div class="form-group">

                <label for="Nombre">Nombre:</label><br>

                <input type="text" id="Nombre" name="Nombre" value="<?php echo ($LIBR['Nombre']); ?>" readonly>

            </div>
             <div class="form-group">

                <label for="Nacionalidad">Nacionalidad:</label><br>

                <input type="text" id="Nacionalidad" name="Nacionalidad" value="<?php echo ($LIBR['Nacionalidad']); ?>" readonly>

            </div>
            <div class="form-group">

                <a href="autores.php" class="btn btn-back">Volver</a>

                <button type="submit" class="btn btn-primary" onclick="if(confirm('¿Estás seguro de que deseas borrar el dato?')) { borrarAlgo(); }">Borrar</button>

            </div>

        </form>

    </div>

</body>

</html>


 

<?php

$conn->close();

?>