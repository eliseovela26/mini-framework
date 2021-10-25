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
    <h2>REGISTRATE </h2>
    <form  action="/register" enctype="multipart/form-data" method="POST">

        <div class=" w3l-form-group">
            <label>Nombre:</label>
            <div class="group">
                <i class="fas fa-user"></i>
                <input type="text" id="name" name="name"  class="form-control" placeholder="Nombre Completo" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <label>Email:</label>
            <div class="group">
                <i class="fas fa-user"></i>
                <input type="text" id="email" name="email"  class="form-control" placeholder="Correo electronico" required="required" />

            </div>
        </div>
        <div class=" w3l-form-group">
            <label>Contraseña:</label>
            <div class="group">
                <i class="fas fa-unlock"></i>
                <input type="password"  id="password" name="password" class="form-control" placeholder="Contraseña" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <label>Contraseña:</label>
            <div class="group">
                <i class="fas fa-unlock"></i>
                <input type="password"  id="password_r" name="password_r" class="form-control" placeholder="vuelve a ingresar la contraseña:" required="required" />
            </div>
        </div>
        <button type="submit" id="btn_users_save" name="btn_users_save">Registrar</button>
    </form>
    <p class=" w3l-register-p">iniciar sesión<a href="/login" class="register"> LOGIN</a></p>

</div>
<footer>
    <p class="copyright-agileinfo"> &copy; www <a href="http://w3layouts.com">sss</a></p>
</footer>
</body>
</html>