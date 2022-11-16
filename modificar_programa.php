<!DOCTYPE html>
<html>
<head>
  <title>Modificación de Programas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilos.css">
  <script src="js/bootstrap.js"></script>
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
                    <input class="btn btn-primary" type="submit" value="Consultar" >
                    <input  class="btn btn-danger" type="button" onclick="location.href ='menu.php'" value="volver">
                </div>
              </form>
        </div>
      </div>
      <div id="divconsulta2">
        <?php
        if ($_SERVER['REQUEST_METHOD']==='POST')
        {
            include('funciones.php');
            session_start();
            $vnombre=$_POST['programa_nombre'];
            $miconexion=conectar_bd('sena_bd');
            $resultado=consulta($miconexion,"select * from programa where programa_nombre='{$vnombre}'");
            if($resultado->num_rows>0)
            {
                $fila = $resultado->fetch_object();
                $_SESSION['ide1']=$fila->programa_id;
                ?>
              <form id="formulario2" role="form" method="post" action="actualizar_programa.php">
                  <div class="col-md-12">
                      <strong class="lgris">Datos del Programa</strong><br>

                      <label class="lgris">Id:</label>
                      <input class="form-control" type="text" name="ide1" disabled="disabled" value="<?php echo $fila->programa_id?>"/>

                      <label class="lgris">Nombres:</label>
                      <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre de programa" />

                      <label class="lgris">Tipo Programa:</label>
                      <input class="form-control" type="text" name="tipo" value="<?php echo $fila->programa_tipo ?>" required/>

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
</body>
</html>