<!DOCTYPE html>
<html>
  <head>
    <title>Modificación de Aprendices</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <div id="divconsulta" class="container">
      <br>
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
                                <div class="col mb-3">
                                    <input type="number" name="numid" class="form-control" placeholder="N° de identificación">
                                </div>
                                <div >
                                  <input class="btn btn-primary" type="submit" value="consultar" >
                                  <input  class="btn btn-danger" type="button" onclick="location.href ='menu.php'" value="volver">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
      
        <div id="divconsulta2">
          <?php
          if ($_SERVER['REQUEST_METHOD']==='POST')
          {
              include('funciones.php');
              session_start();
              $vnumid=$_POST['numid'];
              $miconexion=conectar_bd('sena_bd');
              $resultado=consulta($miconexion,"select * from aprindices where apre_numid='{$vnumid}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  $_SESSION['ide1']=$fila->apre_id;
                  ?>
                <form id="formulario2" role="form" method="post" action="actualizar_aprendiz.php">
                    <div class="col-md-12">
                       <strong class="lgris">Datos del aprendiz</strong><br>

                       <label class="lgris">Id:</label>
                       <input class="form-control" type="text" name="ide1" disabled="disabled" value="<?php echo $fila->apre_id?>"/>

                       <label class="lgris">Nombres:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="nombres" required value="<?php echo $fila->apre_nombres ?>"/>

                       <label class="lgris">Apellidos:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="apellidos" value="<?php echo $fila->apre_apellidos ?>" required/>

                       <label class="lgris">Dirección:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="direccion" value="<?php echo $fila->apre_direccion ?>" required/>

                       <label class="lgris">Teléfono:</label>
                       <input class="form-control" type="number" name="telefono" min="9999" max="9999999999" value="<?php echo $fila->apre_telefono ?>" required/>
                       <br>
                       <input class="btn btn-primary" type="submit" value="Actualizar">
                       <br>
                    </div>
                </form>
                <?php
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