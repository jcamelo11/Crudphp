<?php
session_start();
?>
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <title>Registro de aprendices</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
            <?php if(! empty($_SESSION['Tipo_usuario']))  ?> 
                <div class="card">
                    <div class="card-header">
                        <h4>Registrar Aprendiz
                        </h4>
                    </div>
                    <?php
                    if($_SESSION['Tipo_usuario']='Admin'){
                    
                    ?>
                    <div class="card-body">
                        <form method="POST" action="guardado_aprendiz.php">
                            <div class="row mb-3">
                                <label>Identificación</label>
                                <div class="col">
                                    <select class="form-control" name="tipoid">
                                        <option>CC</option>
                                        <option>TI</option>
                                        <option>RC</option>
                                        <option>PEP</option>
                                    </select>
                                </div>
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
                            <div class="row mb-3">
                                <div class=" col-md-6">
                                    <label>Teléfono</label>
                                    <input type="number" name="telefono" class="form-control" placeholder="Teléfono">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                                </div>
                                <div class=" col-md-2">
                                    <label for="inputZip">Ficha</label>
                                    <input type="number" class="form-control" name="fic" placeholder="Ficha">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit"  class="btn btn-primary">Guardar</button>
                                <input  class="btn btn-danger" type="button" onclick="location.href ='menu.php'" value="volver">
                            </div>
                        </form>
                        <?php
                            }
                            else
                            {
                                echo "No tiene permisos para realizar esta acción";
                            }
            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>