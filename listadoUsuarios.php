<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista Usuarios</title>
  </head>
  <style>
table, th, td {
  border: 2px solid black;
  border-collapse: collapse;
}

th {
  background-color: #0D9D0F;
  }
td {
  background-color: #9FE99F;
  text-align: center;
}
</style>
  <body>
    <h1 text align="center">Listado de usuarios</h1>



  </body>
  <?php

    $conector = new mysqli("localhost", "root", "", "juegos");

  if (isset($_POST["Registros"])) {
     if ($conector->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $conector->connect_errno;
      }else  {
        $registro = "INSERT INTO juegos.usuarios (correo, nombre, apellidos, edad, curso)
        VALUES ('$_POST[correo]', '$_POST[nombre]', '$_POST[apellidos]', '$_POST[edad]','$_POST[curso]')";

        if ($conector->query($registro) === TRUE) {
          echo "<br><h1 align = center>Registro Completado</h1><br>";
        }else {
          ?>
          <center><img src="8C1.gif" alt="AGGGGHHHHHH" /></center>
          <?php
          echo "<br><h1 align = center>Registo Fallido</h1><br>";

        }

    }
}

if (isset($_POST["eliminar"])) {

  if ($conector->connect_errno) {
     echo "Fallo al conectar a MySQL: " . $conector->connect_errno;
   }
   else {

     $correo=$_POST["correo"];
     $buscarUsuario = "SELECT * FROM usuarios WHERE correo = '$_POST[correo]' ";
     $result = $conector->query($buscarUsuario);
     $count = mysqli_num_rows($result);

     if ($count == 0) {
       echo "<br><h1 align = center>No hay usuario que borrar</h1><br>";
       ?>
       <center><img src="8C1.gif" /></center>
       <?php
       echo "<h1 align = center>Por favor, introduce un Email válido</h1><br>";
    }
        else {
        $borrar = "DELETE FROM usuarios WHERE correo = '$_POST[correo]'";

          if ($conector->query($borrar) === TRUE) {
            echo "<br><h1 align = center>Has sido borrado</h1><br>";
          }
        }
  }
}

if (isset($_POST["actualizar"])) {
   if ($conector->connect_errno) {
      echo "Fallo al conectar a MySQL: " . $conector->connect_errno;
    }

    else {

      $correo=$_POST["correo"];
      $buscarUsuario = "SELECT * FROM usuarios WHERE correo = '$_POST[correo]' ";
      $result = $conector->query($buscarUsuario);
      $count = mysqli_num_rows($result);

      if ($count == 0) {
        echo "<br><h1 align = center>No hay usuario que Actualizar</h1>";
        ?>
        <center><img src="meme_pc_wtf.gif" /></center>
        <?php
        echo "<h1 align = center>Por favor, introduce un Email válido</h1><br>";

     }

    else  {
      $actualiza = "UPDATE usuarios SET nombre= '$_POST[newNombre]', apellidos= '$_POST[newApellidos]', edad= '$_POST[newEdad]', curso= '$_POST[newCurso]' WHERE correo = '$_POST[correo]'";

      if ($conector->query($actualiza) === TRUE) {
        echo "<br><h1 align = center>Actualización Correcta</h1><br>";
      }
  }
}
}
    ?>
    <table style="width:60%" align="center">
    <tr>
        <th >CORREO</th>
        <th >NOMBRE</th>
        <th >APELLIDOS</th>
        <th >EDAD</th>
        <th >CURSO</th>
        <th >PUNTUACIÓN</th>
    </tr>
    <?php
    $resultado = $conector->query("SELECT * from usuarios");
    while($fila=$resultado->fetch_assoc()){

        echo "<tr>"."<td>"
        .$fila['correo']."</td>"."<td>"
        .$fila['nombre']."</td>"."<td>"
        .$fila['apellidos']."</td>"."<td>"
        .$fila['edad']."</td>"."<td>"
        .$fila['curso']."</td>"."<td>"
        .$fila['puntuacion']."</td>"."</tr>";
    }

    ?>

    </table>
    <table style="width:33%" align="center">
      <br></br>
    <tr>
        <th ><a href="actualizarUsuario.php">Actualizar usuario</a></th>
        <th ><a href="borrarUsuario.php">Borrar usuario</a></th>
        <th ><a href="insertarUsuario.php">Nuevo usuario</a></th>
    </tr>
</table>
<br></br>
<br></br>
</html>
