<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTORES</title>
    <link rel="shortcut icon" href="../imagenes/AnimeList.ico">
     
    <link rel="stylesheet" href="../estilos/STYLE.CSS">
</head>
<body>
    <div class="container">

        <h1>AUTORES</h1>
    </div>  
    <div class="form-container">
    <div class="formulario-contenedor">
        <a href="../indexadmin.html"><img src="../imagenes/Book.gif" width="100%" height="80px"></a>
        <form action="AUTORESadd.php" method="POST"> <!--get y post-->
        <input type="text" name="Id_Autor" id="Idautor" class="cajatexto" placeholder="Id del Autor">
        <input type="text" name="Nombre" id="Nombre" class="cajatexto"  placeholder="Ingrese Nombre">
        <input type="text" name="Nacionalidad" id="Nacionalidad" class="cajatexto" placeholder="Ingrese Nacionalidad">
        <button class="Boton" type= "submit"> Registrar Autor</button>
        </form>
    </div>
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

        $sql = "SELECT * FROM autores"; // Cambia esto por tu tabla y campos

        $stmt=mysqli_query($conn,$sql);
        // DATOS DE LA EDITORIAL
        if ($stmt->num_rows > 0) {

            echo "<h2>DATOS DE LOS AUTORES:</h2>";

            echo '<table class="results-table">';

            echo '<thead><tr><th>ID AUTOR</th><th>Nombre del Autor</th><th>Nacionalidad</th></tr></thead>';

            echo '<tbody>';
            // Recorrer cada fila de resultados

            while($fila = $stmt->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila["Id_Autor"] . "</td>";
                echo "<td>" . $fila["Nombre"] . "</td>";
                echo "<td>" . $fila["Nacionalidad"] . "</td>";
                echo '<td><a href=AUTORESMT.php?Id_Autor='.$fila["Id_Autor"]. ' " class="btn btn-edit">Modificar</a></td>';

                echo '<td><a href=AUTORESed.php?Id_Autor='.$fila["Id_Autor"]. ' " class="btn btn-delete">Eliminar</a></td>';

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