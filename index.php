<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    
    <title>Formulario</title>

</head>
<body>
    
    <section>
    <div class="left-login">
            <h1>Iniciar sesión <br> con tu usuario  y <span>contraseña</span></h1>
            <img clas="left-login-img"src="img/Login.svg">
        </div>
            <div class="contenedor">
                <div class="formulario">
                    <h2>Iniciar <span>sesión</span></h2>
                    <form id="formulario" method="post" action="menu.php">
                        <div class="input">
                            <input type="text" placeholder="Usuario" name="usuario" value="" required >
                        </div>
                        <div class="input">
                            <input type="password" placeholder="Contraseña" name="clave" value="" required>
                        </div>
                        <div class="input">
                            <input type="submit" value="Iniciar">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
