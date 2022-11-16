<!DOCTYPE html>
<html>
  <head>
    <title>Modificación de Fichas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <div id="divconsulta" class="container">
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
                                <label>Número de fichas </label>
                                <div class="col mb-3">
                                <input class="form-control" type="number" name="nombre"  value="" placeholder="Numero" required/>
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
              $vnombre=$_POST['nombre'];
              $miconexion=conectar_bd('sena_bd');
              $resultado=consulta($miconexion,"select * from fichas where ficha_numero='{$vnombre}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  $_SESSION['ide1']=$fila->ficha_numero;
                  ?>
                <form id="formulario2" role="form" method="post" action="actualizar_ficha.php">
                    <div class="col-md-12">
                       <strong class="lgris">Datos de la Ficha</strong><br>

                       <label class="lgris">Numero de Ficha:</label>
                       <input class="form-control" type="number" name="nombre" min="9999" max="9999999999" value="<?php echo $fila->ficha_numero ?>" required/>

                       <label class="lgris">Programa:</label>
                       <input class="form-control" type="text" name="fp" min="1" max="999999999999" value="<?php echo $fila->ficha_programa ?>" required/>

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