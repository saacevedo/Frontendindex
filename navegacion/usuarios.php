<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion Con Xammp USUARIOS</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>
<body>

   
    
    <div class="form-container">
        
        <a href="../indexadmin.html"><img src="../imagenes/Book.gif" width="100%" height="80px"></a>
        <h3>INGRESAR DATOS</h3>

        <form action="USUARIOSadd.php" method="POST"> <!--get y post-->
        <h5>Fecha de registro Usuario</h5>
        <input type="date" name="FechaRegistro" id="FechaRegistro" class="OptionFecha"  placeholder="Ingrese Fecha Registro"><br>    
        <input type="text" name="Id_Usuario" id="Id_Usuario" class="cajatexto" placeholder="Ingrese Cedula">
        <input type="text" name="Nombre" id="Nombre" class="cajatexto" placeholder="Ingrese Nombre">
        <input type="text" name="CorreoUsuario" id="CorreoUsuario" class="cajatexto"  placeholder="Ingrese Correo">
        <input type="text" name="Telefono" id="Telefono" class="cajatexto"  placeholder="Ingrese su telefono" required>
        <input type="text" name="Observaciones" id="Observaciones" class="cajatexto"  placeholder="Ingrese sus Observaciones">
        <button class="" type= "submit"> Ingresar Usuario</button>
        </form>
    </div>
    <div class=""><img src="../imagenes/Bannner.png" alt="" width="150" height="700"></div>
    <div class="container">

            <!--mostrar los datos de los usuarios creados-->

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
                    $sql = "SELECT * FROM usuarios"; // Cambia esto por tu tabla y campos
                    $stmt=mysqli_query($conn,$sql);
                    // DATOS DE LA EDITORIAL
                    if ($stmt->num_rows > 0) {
                        echo "<h2>DATOS DE LOS USUARIOS:</h2>";
                        echo '<table class="results-table">';
                        echo '<thead><tr><th>FechaRegistro</th><th>Cedula</th><th>Nombre</th><th>Correo</th><th>Telefono</th><th>Observaciones</th></tr></thead>';
                        echo '<tbody>';
                        // Recorrer cada fila de resultados
                        while($fila = $stmt->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $fila["FechaRegistro"] . "</td>";
                            echo "<td>" . $fila["Id_Usuario"] . "</td>";
                            echo "<td>" . $fila["Nombre"] . "</td>";
                            echo "<td>" . $fila["CorreoUsuario"] . "</td>";
                            echo "<td>" . $fila["Telefono"] . "</td>";
                            echo "<td>" . $fila["Observaciones"] . "</td>";
                            echo '<td><a href=USUARIOSmt.php?Id_Usuario='.$fila["Id_Usuario"]. ' " class="btn btn-edit">Modificar</a></td>';
                            echo '<td><a href=USUARIOSed.php?Id_Usuario='.$fila["Id_Usuario"]. ' " class="btn btn-delete">Eliminar</a></td>';
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