<!DOCTYPE html>
<html>
<head>
    <title>Eliminacion de Aprendices</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div id="divconsulta" class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ingrese criterio de busqueda
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" name="formulario" role="form">
                            <div class="row mb-3">
                                <label>Identificación</label>
                                <div class="col">
                                    <input type="number" name="numid" class="form-control" placeholder="N° de identificación">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input class="btn btn-primary" type="submit" value="Eliminar" >
                                <input  class="btn btn-danger" type="button" onclick="location.href ='menu.php'" value="volver">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      <div id="divconsulta">
          <?php
          if ($_SERVER['REQUEST_METHOD']==='POST')
          {
              include('funciones.php');
              $vnumid=$_POST['numid'];
              $miconexion=conectar_bd('sena_bd');
              $resultado=consulta($miconexion,"select * from aprindices where apre_numid='{$vnumid}'");
              $resultado2=consulta($miconexion,"delete from aprindices where apre_numid='{$vnumid}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  echo  "id: ".$fila->apre_id."<br>"."Tipo de id: ".$fila->apre_tipoid."<br>"."Numero de identificacion: ".$fila->apre_numid.
                  "<br>"."Nombres: ".$fila->apre_nombres."<br>"."Apellidos: ".$fila->apre_apellidos."<br>"."Direccion: ".$fila->apre_direccion.
                  "<br>"."Telefono: ".$fila->apre_telefono."<br>"."Ficha: ".$fila->apre_ficha."<br>";
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