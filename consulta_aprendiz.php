<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de aprendices</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="container mt-5">
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
                            <div class="row mb-3">
                                <label>Nombre del aprendiz</label>
                                <div class="col">
                                <input type="text" name="nombres" placeholder="Nombres" class="form-control">
                                </div>
                                <div class="col">
                                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit"  class="btn btn-primary">Consultar</button>
                                <input  class="btn btn-danger" type="button" onclick="location.href ='menu.php'" value="volver">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD']==='POST')
        {
            include('funciones.php');
            $vnumid=$_POST['numid'];
            $vnombres=$_POST['nombres'];
            $vapellidos=$_POST['apellidos'];
            $miconexion=conectar_bd('sena_bd');
            $resultado=consulta($miconexion,"select * from aprindices where trim(Apre_numid) like '%{$vnumid}%' and (trim(Apre_nombres) like '%{$vnombres}%' and trim(Apre_apellidos) like '%{$vapellidos}%')");
            if($resultado->num_rows>0)
            {
                while ($fila = $resultado->fetch_object())
                {
                    echo "id: ".$fila->apre_id."<br>"."Tipo de id: ".$fila->apre_tipoid."<br>"."Numero de identificacion: ".$fila->apre_numid."<br>"."Nombres: ".$fila->apre_nombres."<br>"."Apellidos: ".$fila->apre_apellidos."<br>"."Direccion: ".$fila->apre_direccion."<br>"."Telefono: ".$fila->apre_telefono."<br>"."Ficha: ".$fila->apre_ficha."<br>";
                }
            }
            else{
            echo "No existen registros";
                }  
            $miconexion->close();
        }?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>