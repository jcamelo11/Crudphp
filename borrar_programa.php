<!DOCTYPE html>
<html>
  <head>
    <title>Eliminacion de Programas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <div id="divconsulta" class="container mt-5">
      <div id="div2" class="card">
          <div class="card-header">
            <h4>Ingrese criterio de busqueda</h4>
          </div>
          <div id="div4" class="card-body">
                <form method="POST" name="formulario" role="form">
                  <div class="row mb-3">
                      <label>Nombre del programa</label>
                      <div class="col">
                      <input class="form-control" type="text" name="programa_nombre" value="" placeholder="Nombre" />
                      </div>
                  </div>
                  <div class="mb-3">
                      <input class="btn btn-primary" type="submit" value="Eliminar" >
                      <input  class="btn btn-danger" type="button" onclick="location.href ='menu.php'" value="volver">
                  </div>
                </form>
          </div>
        <div id="divconsulta">
        <?php
        if ($_SERVER['REQUEST_METHOD']==='POST')
        {
            include('funciones.php');
            $vnombre=$_POST['programa_nombre'];
            $miconexion=conectar_bd('sena_bd');
            $resultado=consulta($miconexion,"select * from programa where programa_nombre='{$vnombre}'");
            $resultado2=consulta($miconexion,"delete from programa where programa_nombre='{$vnombre}'");
            if($resultado->num_rows>0)
            {
                $fila = $resultado->fetch_object();
                echo "id: ".$fila->programa_id."<br>"."Nombre del programa:".$fila->programa_nombre."<br>"."Tipo: ".$fila->programa_tipo."<br>";
                if($resultado2)
                echo "<br> Datos borrados exitosamente";
            }
          else{
              echo "No existen registros";
              }
          $miconexion->close();
          }?>
          </div>
      </div>
    </div>
  </body>
</html>