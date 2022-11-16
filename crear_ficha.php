<!DOCTYPE html>
<html>
  <head>
    <title>Crear Ficha</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="estilos.css">
  </head>
<body>
  <div id="div1" class="container mt-5">
    <div id="div2" >
      <?php session_start(); if(! empty($_SESSION['Tipo_usuario'])) { ?>  <?php } ?>
      <div id="div3" class="row">
        <?php
        if($_SESSION['Tipo_usuario']=='Admin')
        {
        ?>
        <div class="card">
          <div class="card-header">
            <h4>Crear la ficha</h4>
          </div>
          <div class="card body">
            <form id="formulario" role="form" method="post" action="guardado_ficha.php">
              <div class="cold-md-12">
                  <div class="row mb-3">
                      <label >Numero:</label>
                      <div class="col">
                          <input class="form-control" type="number" name="nombre" min="9999" max="9999999999" value="" placeholder="Numero" required/>
                      </div>
              </div>
              <div class="cold-md-12">
                  <div class="row mb-3">
                      <label class="lgris">Nombre del programa:</label>
                      <div class="col">
                        <?php 
                        include('funciones.php');
                        $miconexion=conectar_bd('sena_bd');
                        $consulta = "SELECT * FROM programa";
                        $resultado = mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));
                        
                        ?>
                        <select class="form-control" name="progra">
                          <option value="" selected></option>
                          <?php while ($opcion = $resultado -> fetch_object()) { ?>
                          <option value="<?php echo $opcion->programa_id;?>"><?php echo $opcion->programa_nombre;?></option>
                          <?php } ?>
                        </select>
                    </div>
              </div>
                    <div class="mb-3">
                      <input class="btn btn-primary" type="submit" value="Guardar" >
                      <input  class="btn btn-danger" type="button" onclick="location.href ='menu.php'" value="volver">
                    </div>
            </form>
          </div>
        </div>
        
        <?php
        }
        else
        {
          echo "No tiene permisos para realizar esta acción";
        }
        ?>
        <br>
      </div>
    </div>
  </div>
</body>
</html>