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
$idp = $_POST['Id_Prestamo'];

// Procesar el formulario de actualización

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $idp = $_POST['Id_Prestamo'];
    $fecp = $_POST['FechaPrestamo'];
    $fecd = $_POST['FechaDevolucion'];
    // $idl = $_POST['Id_Libro'];
    // $idu = $_POST['Id_Usuario'];

    $stmt = $conn->prepare("UPDATE prestamo SET FechaPrestamo='$fecp', FechaDevolucion='$fecd' WHERE Id_Prestamo='$idp'");

    if ($stmt->execute()) {
        $mensaje = "";
        $clase_mensaje = "success";
    } else {
        $mensaje = "Error al actualizar el Prestamo: " . $stmt->error;
        $clase_mensaje = "error";
    }

    $stmt->close();
}
// Obtener datos actuales del usuario

$sql = "SELECT Id_Prestamo, FechaPrestamo, FechaDevolucion, Id_Libro, Id_Usuario FROM prestamo WHERE Id_Prestamo ='$idp'";
$resultado = mysqli_query($conn,$sql);
$LIBR = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prestamo</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>

<body>
        <?php if (isset($mensaje)): ?>
            <div class="message <?php echo $clase_mensaje; ?>">
            <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
    
        <div class="form-container">
            
        <form action="PRESTAMOmod.php" method="post">
            <input type="hidden" name="Id_Prestamo" value="<?php echo ($LIBR['Id_Prestamo']); ?>">
            <h1>Prestamo</h1>  
            <div class="form-group">
                <input type="text" id="Id_Prestamo" name="Id_Prestamo" value="<?php echo ($LIBR['Id_Prestamo']); ?>" readonly>
            </div>
            <h1>Modificado</h1>  
            <div class="form-group">
                <label for="nombre">Prestamo:</label><br>
                <input type="text" id="FechaPrestamo" name="FechaPrestamo" value="<?php echo ($LIBR['FechaPrestamo']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="nombre">Devolucion:</label><br>
                <input type="text" id="FechaDevolucion" name="FechaDevolucion" value="<?php echo ($LIBR['FechaDevolucion']); ?>" readonly>
            </div>

            <div class="form-group">
                <a href="prestamo.php" class="btn btn-back">Volver</a>
                <!-- <button type="submit" class="btn btn-primary">Modificar</button> -->
            </div>
        </form>
    </div>
    </div>
    </div>
    <div class="container">

            <!--mostrar los datos de los libros creados-->

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
                    // Consulta SQL
                    
                    $sql = "SELECT
                                u.Nombre,
                                l.Titulo,
                                o.Id_Prestamo
                            FROM
                                prestamo AS p
                            JOIN
                                usuarios AS u ON p.Id_Usuario = u.Id_Usuario
                            JOIN
                                libros AS l ON p.Id_Libro = l.Id_Libro
                            JOIN
	                            prestamo AS o ON p.Id_Prestamo = o.Id_Prestamo"; // Cambia esto por tu tabla y campos
                    $stmt=mysqli_query($conn,$sql);
                    if ($stmt->num_rows > 0) {
                        echo "<h2>PRESTAMOS:</h2>";
                        echo '<table class="results-table">';
                        echo '<thead><tr><th>Id Prestamo</th><th>Nombre</th><th>Titulo</th></tr></thead>';
                        echo '<tbody>';
                        // Recorrer cada fila de resultados
                        while($fila = $stmt->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $fila["Id_Prestamo"] . "</td>";
                            echo "<td>" . $fila["Nombre"] . "</td>";
                            echo "<td>" . $fila["Titulo"] . "</td>";
                            echo "</tr>";
                        }
                        echo '</tbody></table>';
                    } else {
                        echo '<p class="no-results">No se encontraron resultados.</p>';
                    }
                ?>
        </div>
</body>
</html>
<?php
$conn->close();
?>