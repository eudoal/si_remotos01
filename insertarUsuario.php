<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>

  </head>
  <body>
    <h1 text align="center">Introduce tus datos</h1><br>
      <center><form action="listadoUsuarios.php" method="post" onsubmit="return comprobarInsertar()">

        <p text align="center">Email</p>
        <input type="text" value="" id="correo" name="correo">

        <p text align="center">Nombre</p>
        <input type="text" value="" id="nombre" name="nombre">

        <p text align="center">Apellidos</p>
        <input type="text" value="" id="apellidos" name="apellidos">

        <p text align="center">Edad</p>
        <input type="text" value="" id="edad" name="edad">

        <p text align="center">Curso</p>
        <input type="text" value="" id="curso" name="curso"><br><br>

        <input type="submit" name="Registros" value="Registrarse">
      </form></center>

      <script src="comprobarInsertar.js"></script>
  </body>
</html>
