<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unheval/Login</title>
    <link rel="stylesheet" href="/css/login/style.css">
    <link rel="stylesheet" href="/css/login/fontawesome-all.css">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
</head>
<body>
    <h1>UNHEVAL</h1>
    <div class=" w3l-login-form">
        <h2>iniciar sesión </h2>

        <form  action="" method="POST">

            <div class=" w3l-form-group">
                <label>Email:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="email" name="email"  class="form-control" placeholder="Nombre de Usuario" required="required" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Contraseña:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password"  id="password" name="password" class="form-control" placeholder="Contraseña" required="required" />
                </div>
            </div>
            <div class="forgot">
                <a href="#">¿Has olvidado tu contraseña?</a>
                <p><input type="checkbox">Recuérdame</p>
            </div>
            <button type="submit">ingresar</button>
        </form>
        <p class=" w3l-register-p">¿No tienes acceso?<a href="/register" class="register"> Registrarse</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; www <a href="http://w3layouts.com">sss</a></p>
    </footer>
</body>
</html>