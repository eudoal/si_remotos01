<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Borrar Usuario</title>
  </head>
  <body>
    <h1 text align="center">Introduce tu Email para borrar tu usuario<br></h1>

    <center><form action="listadoUsuarios.php" method="post" onsubmit="return comprobarInsertar()">

          <input type="text" name="correo" id="correo" placeholder="Email">

      <input type="submit" name="eliminar" value="Borrar usuario">
    </form></center>

  <script src="comprobarInsertar.js"></script>
  </body>
</html>
