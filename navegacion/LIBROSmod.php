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
$idl = $_POST['Id_Libro'];

// Procesar el formulario de actualización

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idl = $_POST['Id_Libro'];
    $tit = $_POST['Titulo'];
    $pag = $_POST['Paginas'];
    $idi = $_POST['Idioma'];
    $pre = $_POST['Precio'];
    $fec = $_POST['FechaPublicacion'];
    // $nit = $_POST['Nit_Editorial'];
    // $ida = $_POST['Id_Autor'];
    

    $stmt = $conn->prepare("UPDATE libros SET Id_Libro='$idl', Titulo='$tit', Paginas='$pag', Idioma='$idi', Precio='$pre', FechaPublicacion='$fec' WHERE Id_Libro='$idl'");

    if ($stmt->execute()) {
        $mensaje = "✔ Actualizado correctamente";
        $clase_mensaje = "success";
    } else {
        $mensaje = "Error al actualizar el Libro: " . $stmt->error;
        $clase_mensaje = "error";
    }

    $stmt->close();
}
// Obtener datos actuales del usuario

$sql = "SELECT Id_Libro, Titulo, Paginas, Idioma, Precio, FechaPublicacion FROM libros WHERE Id_Libro ='$idl'";
$resultado = mysqli_query($conn,$sql);
$LIBR = $resultado->fetch_assoc();

// if($conn->connect_error){
//         echo "<script>alert('error de conexion')<script>";
//         }
//         $sql = "select Nit_Editorial,NomEditorial from editorial";
//         $sql1 = "select Id_Autor,Nombre from autores";
//         $consulta = mysqli_query($conn,$sql);
//         $consulta1 = mysqli_query($conn,$sql1);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>

<body>
    <div class="container">
        <h1>LIBRO</h1>
        <?php if (isset($mensaje)): ?>
<div class="message <?php echo $clase_mensaje; ?>">
    <?php echo $mensaje; ?>
</div>
<?php endif; ?>
    
        <div class="container">
        <h1></h1>      
        <form action="LIBROSmod.php" method="post">
            <input type="hidden" name="Id_Libro" value="<?php echo ($LIBR['Id_Libro']); ?>">

            <div class="form-group">
                <label for="Id_Libro">Id Libro:</label><br>
                <input type="text" id="Id_Libro" name="Id_Libro" value="<?php echo ($LIBR['Id_Libro']); ?>" readonly>
            </div>
        
            <div class="form-group">
                <label for="Titulo">Titulo libro:</label><br>
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