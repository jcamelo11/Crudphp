<!DOCTYPE html>
<html>
<head>
  <title>Crear Programa</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div id="div1" class="container mt-5">
      <br>
      <div id="div2" >
        <?php session_start(); if(! empty($_SESSION['Tipo_usuario'])) { ?>  <?php } ?>
        <div id="div3">
        <?php
          if($_SESSION['Tipo_usuario']=='Admin')
          {
        ?> 
          <div class="card">
            <div class="card-header">
                <h4>Cree el programa </h4>
            </div>
            <div class="card-body">
              <form id="formulario" role="form" method="post" action="guardado_programa.php">
                <div class="cold-md-12">
                  <label class="lgris">Nombre:</label>
                  <input class="form-control" type="text" name="nombre" value="" placeholder="Nombre" required/>
                  <label class="lgris">Tipo Programa:</label>
                  <div class="form-row">
                    <div class="form-group col-xs-2">
                    <select class="form-control" name="Tiposprograma"  required>
                      <option value="presencial" selected>Presencial</option>
                      <option value="virtual" >Virtual</option>
                      <option value="mixta" >Mixta</option>
                    </select>
                    </div>         
                    </div>              
                      <br>
                  <input class="btn btn-primary" type="submit" value="Guardar">
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