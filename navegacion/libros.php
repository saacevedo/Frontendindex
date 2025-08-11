<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBROS</title>
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
    <!-- <link rel="stylesheet" href="./estilos/styleFrontend.css"> -->
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

        <div class="form-container">
            <a href="../indexadmin.html"><img src="../imagenes/Book.gif" width="100%" height="80px"></a>
            <h3>INGRESAR DATOS</h3>

            <form action="LIBROSadd.php" method="POST"> <!--get y post-->
                <br>
            <input type="text" name="Id_Libro" id="Id_Libro" class="cajatexto" placeholder="Id del Libro" required>
            <input type="text" name="Titulo" id="Titulo" class="cajatexto" placeholder="Titulo del Libro">
            <input type="text" name="Paginas" id="Paginas" class="cajatexto" placeholder="Su total de paginas">
            <input type="text" name="Idioma" id="Idioma" class="cajatexto" placeholder="En que Idioma esta">
            <input type="text" name="Precio" id="Precio" class="cajatexto" placeholder="Su Valor">
            <h5>Fecha de publicacion</h5>
            <input type="date" name="FechaPublicacion" id="FechaPublicacion" class="OptionFecha" placeholder="Fecha Publicacion"><br>
            <!-- <input type="text" name="Nit_Editorial" id="Nit_Editorial" placeholder="Editorial FK"> -->
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
            <button class="Boton" type= "submit"> Registrar libro</button>
            </form>
            </form>
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
                    $sql = "SELECT * FROM libros"; // Cambia esto por tu tabla y campos
                    $stmt=mysqli_query($conn,$sql);
                    // DATOS DE LA EDITORIAL
                    if ($stmt->num_rows > 0) {
                        echo "<h2>DATOS DE LOS LIBROS:</h2>";
                        echo '<table class="results-table">';
                        echo '<thead><tr><th>Nit del libro</th><th>Titulo</th><th>Paginas</th><th>Idioma</th><th>Precio</th><th>FechaPublicacion</th><th>Nit Editorial</th><th>Id Autor</th></tr></thead>';
                        echo '<tbody>';
                        // Recorrer cada fila de resultados
                        while($fila = $stmt->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $fila["Id_Libro"] . "</td>";
                            echo "<td>" . $fila["Titulo"] . "</td>";
                            echo "<td>" . $fila["Paginas"] . "</td>";
                            echo "<td>" . $fila["Idioma"] . "</td>";
                            echo "<td>" . $fila["Precio"] . "</td>";
                            echo "<td>" . $fila["FechaPublicacion"] . "</td>";
                            echo "<td>" . $fila["Nit_Editorial"] . "</td>";
                            echo "<td>" . $fila["Id_Autor"] . "</td>";
                            echo '<td><a href=LIBROSmt.php?Id_Libro='.$fila["Id_Libro"]. ' " class="btn btn-edit">Modificar</a></td>';
                            echo '<td><a href=LIBROSed.php?Id_Libro='.$fila["Id_Libro"]. ' " class="btn btn-delete">Eliminar</a></td>';
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