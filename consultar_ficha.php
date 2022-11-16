<!DOCTYPE html>
<html>
  <head>
    <title>Consulta de ficha</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <div id="divconsulta" class="container mt-5">
      <br>
      <div id="div2" class="card">
        <div class="card-header">
          <h4>Ingrese criterio de busqueda</h4>
        </div>
          <div id="div4" class="card-body">
            <form method="POST" name="formulario" role="form">
              <div class="row mb-3">
              <input class="form-control" type="number" name="nombre"  value="" placeholder="Número" required/>
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
          $vnombre=$_POST['nombre'];
          $miconexion=conectar_bd('sena_bd');
          $resultado=consulta($miconexion,"select * from fichas, programa where ficha_programa=programa_id and trim(ficha_numero) like '%{$vnombre}%'");
          if($resultado->num_rows>0)
            {
              while ($fila = $resultado->fetch_object())
                {
                  echo "Ficha: ".$fila->ficha_numero."<br>"."Nombre del Programa: ".$fila->programa_nombre."<br>";
                }
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