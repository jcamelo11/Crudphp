<!DOCTYPE html>
<html>
  <head>
    <title>Consulta de Programa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <div id="divconsulta" class="container mt-5">
      <br>
      <div class="card" id="div2">
        <div class="card-header" id="div4">
          <h4>Ingrese los criterios de busqueda</h4>
        </div>
        <div class="card-body">
          <form id="formulario" role="form" method="post" >
            <div class="form-row mb-3">
              <label class="lgris">Nombre:</label>
              <input class="form-control" type="text" name="nombre" value="" placeholder="Nombre" required/>
            </div>
              <div class="form-row">
                <div class="form-group col-xs-2">
                  <label class="lgris">Tipo Programa:</label>
                  <input class="form-control"  type="text" name="tipo" value="" placeholder="Tipo" />
                </div>         
              </div>              
                <br>
              <input class="btn btn-primary" type="submit" value="Consultar programa">
              <input  class="btn btn-danger" type="button" onclick="location.href ='menu.php'" value="volver">
            
          </form>
            <br>
        </div>

        
      </div>
      <div id="divconsulta2">
        <?php
        if ($_SERVER['REQUEST_METHOD']==='POST')
        {
          include('funciones.php');
          $vnombre=$_POST['nombre'];
          $vtipo=$_POST['tipo'];
          $miconexion=conectar_bd('sena_bd');
          $resultado=consulta($miconexion,"select * from programa where trim(programa_nombre) like '%{$vnombre}%' and (trim(programa_tipo) like '%{$vtipo}%')");
          if($resultado->num_rows>0)
            {
              while ($fila = $resultado->fetch_object())
                {
                  echo "Nombre: ".$fila->programa_nombre."<br>"."Especializacion: ".$fila->programa_tipo."<br>";
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