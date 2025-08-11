<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion Con Xammp AUTORES</title>
    <!-- <link rel="stylesheet" href="./estilos/styleFrontend.css"> -->
    <!-- <link rel="stylesheet" href="./estilos/styleBiblioteca.css"> -->
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>
<body>
   
    <div class="container">

        <h1>EDITORIALES</h1>

    </div>    


    <div class="form-container">
        <a href="../indexadmin.html"><img src="../imagenes/Book.gif" width="100%" height="80px"></a>
        <h3>INGRESAR DATOS</h3>

        <form action="EDITORIALadd.php" method="POST" enctype="multipart/form-data">
            <input type="text" id="Nit_Editorial" name="Nit_Editorial" placeholder="Ingresa Nit Editorial" require>
            <input type="text" id="NomEditorial" name="NomEditorial" placeholder="Ingresa Nombre" require>
            <button type="submit">Registrar</button>
        </form>
        

    </div>
    <div class=""><img src="../imagenes/Bannner.png" alt="" width="150" height="700"></div>
    <div class="container">

            <!--mostrar los datos de los clientes creados-->

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

        $sql = "SELECT * FROM editorial"; // Cambia esto por tu tabla y campos

        $stmt=mysqli_query($conn,$sql);
        // DATOS DE LA EDITORIAL
        if ($stmt->num_rows > 0) {

            echo "<h2>DATOS DE LA EDITORIAL:</h2>";

            echo '<table class="results-table">';

            echo '<thead><tr><th>Nit de la Editorial</th><th>Nombre de la editorial</th></tr></thead>';

            echo '<tbody>';
            // Recorrer cada fila de resultados

            while($fila = $stmt->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila["Nit_Editorial"] . "</td>";
                echo "<td>" . $fila["NomEditorial"] . "</td>";
                echo '<td><a href=EDITORIALmt.php?Nit_Editorial='.$fila["Nit_Editorial"]. ' " class="btn btn-edit">Modificar</a></td>';

                echo '<td><a href=EDITORIALed.php?Nit_Editorial='.$fila["Nit_Editorial"]. ' " class="btn btn-delete">Eliminar</a></td>';
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