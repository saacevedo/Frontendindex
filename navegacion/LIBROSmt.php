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
$sql = "SELECT Id_Libro, Titulo, Paginas, Idioma, Precio, FechaPublicacion FROM libros where Id_Libro= '$idl'";
$resultado =mysqli_query($conn,$sql);
$LIBR = $resultado->fetch_assoc();
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
 <?php
        $servername="localhost"; //nombre del seervidor de la ejecucion del proyecto
        $username="root"; //nombre del usuario con que se ingresa al motor de la base de datos
        $pass=""; //contraseña con que se ingresa al motor de la base de datos
        $dbname="libreriamanga"; //nombre de la base de datos creada y/o seleccionadapara utilizar

        $conn=new mysqli($servername,$username,$pass,$dbname);
        if($conn->connect_error){
        echo "<script>alert('error de conexion')<script>";
        }
        $sql = "select Nit_Editorial,NomEditorial from editorial";
        $sql1 = "select Id_Autor,Nombre from autores";
        $consulta = mysqli_query($conn,$sql);
        $consulta1 = mysqli_query($conn,$sql1);
    ?>
    
    <div class="container">
        <h1>Editar Libro</h1>      
        <form action="LIBROSmod.php" method="post">
            <input type="hidden" name="Id_Libro" value="<?php echo ($LIBR['Id_Libro']); ?>">

            <div class="form-group">
                <label for="Id_Libro">Id Libro:</label><br>
                <input type="text" id="Id_Libro" name="Id_Libro" value="<?php echo ($LIBR['Id_Libro']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="Titulo">Titulo:</label><br>
                <input type="text" id="Titulo" name="Titulo" value="<?php echo ($LIBR['Titulo']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Paginas">Paginas:</label><br>
                <input type="text" id="Paginas" name="Paginas" value="<?php echo ($LIBR['Paginas']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Idioma">Idioma:</label><br>
                <input type="text" id="Idioma" name="Idioma" value="<?php echo ($LIBR['Idioma']); ?>" required>
            </div>

            <div class="form-group">
                <label for="Precio">Precio:</label><br>
                <input type="text" id="Precio" name="Precio" value="<?php echo ($LIBR['Precio']); ?>" required>
            </div>

            <div class="form-group">
                <label for="FechaPublicacion">Fecha Publicacion:</label><br>
                <input type="text" id="FechaPublicacion" name="FechaPublicacion" value="<?php echo ($LIBR['FechaPublicacion']); ?>" required>
            </div>            
<select name="Nit_Editorial" Class="Option">
                <option value="" selected disabled>Nit Editorial</option>
                <?php
                    while($row=mysqli_fetch_array($consulta)){?>
                    <option value=" <?php echo $row['Nit_Editorial'] ?> " >
                    <?php echo $row['NomEditorial']?>
                    </option>
                    <?php }
                ?>
            </select><br>        
            <select name="Id_Autor" Class="Option">
                <option value="" selected disabled>Id Autor</option>
                <?php
                    while($row=mysqli_fetch_array($consulta1)){?>
                    <option value=" <?php echo $row['Id_Autor'] ?> " >
                    <?php echo $row['Nombre']?>
                    </option>
                    <?php }
                ?>
            </select><br>
            
                <a href="libros.php" class="btn btn-back">Volver</a>
                <button type="submit" class="btn btn-primary">Modificar</button>
            
            
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>