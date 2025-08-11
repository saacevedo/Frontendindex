<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESTAMO</title>
    <link rel="shortcut icon" href="./imagenes/AnimeList.ico" type="image/x-icon">
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
  $sql = "select Id_Libro,Titulo from libros";
  $sql1 = "select Id_Usuario,Nombre from usuarios";
  $consulta = mysqli_query($conn,$sql);
  $consulta1 = mysqli_query($conn,$sql1);
  ?>
    <div class="form-container">
    <a href="../indexadmin.html"><img src="../imagenes/Book.gif" width="100%" height="80px"></a>
    <h3>PRESTAMO DE LIBRO</h3>

        <form action="PRESTAMOadd.php" method="POST"><br><br> <!--get y post-->
        <label for="">Fecha Prestamo</label>
        <input type="date" name="FechaPrestamo" class="OptionFecha" placeholder="Fecha de prestamo" required><br>
        
        <label for="">Fecha Devolucion</label>
        <input type="date" name="FechaDevolucion" class="OptionFecha" placeholder="Fecha de devolucion" required>
        <br>
        <select name="Id_Libro" Class="Option">
            <option value="" selected disabled>Codigo del libro</option>
            <?php
                while($row=mysqli_fetch_array($consulta)){?>
                <option value=" <?php echo $row['Id_Libro'] ?> " >
                <?php echo $row['Titulo']?>
                </option>
                <?php }
            ?>
        </select><br>
        <select name="Id_Usuario" Class="Option">
            <option value="" selected disabled>Cedula Usuario</option>
            <?php
                while($row=mysqli_fetch_array($consulta1)){?>
                <option value=" <?php echo $row['Id_Usuario'] ?> " >
                <?php echo $row['Nombre']?>
                </option>
                <?php }
            ?>
        </select><br>
        <input type="text" name="Id_Prestamo" class="cajatexto" placeholder="Numero de Prestamo" required>
        <button class="Boton" type= "submit"> Finalizar Registro</button><br>
        
        </form>
        
        <div id="results">
        </div>
    </div>
    <div class=""><img src="../imagenes/Bannner.png" alt="" width="150" height="700"></div>
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
                    $sql = "SELECT * FROM prestamo"; // Cambia esto por tu tabla y campos
                    $stmt=mysqli_query($conn,$sql);
                    if ($stmt->num_rows > 0) {
                        echo "<h2>HISTORIAL DE PRESTAMOS:</h2>";
                        echo '<table class="results-table">';
                        echo '<thead><tr><th>Id del prestamo</th><th>Fecha Prestamo</th><th>Fecha Devolucion</th><th>Libro prestado</th><th>Cedula del Usuario</th></tr></thead>';
                        echo '<tbody>';
                        // Recorrer cada fila de resultados
                        while($fila = $stmt->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $fila["Id_Prestamo"] . "</td>";
                            echo "<td>" . $fila["FechaPrestamo"] . "</td>";
                            echo "<td>" . $fila["FechaDevolucion"] . "</td>";
                            echo "<td>" . $fila["Id_Libro"] . "</td>";
                            echo "<td>" . $fila["Id_Usuario"] . "</td>";
                            echo '<td><a href=PRESTAMOmt.php?Id_Prestamo='.$fila["Id_Prestamo"]. ' " class="btn btn-edit">Modificar</a></td>';
                            echo '<td><a href=PRESTAMOed.php?Id_Prestamo='.$fila["Id_Prestamo"]. ' " class="btn btn-delete">Eliminar</a></td>';
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