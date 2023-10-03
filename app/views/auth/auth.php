<!-- auth.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <!-- Enlace a hojas de estilo, bibliotecas de JavaScript, etc. según tus necesidades -->
</head>
<body>
    <div class="container">
        <section class="section">
            <h1 class="title">Inicio de Sesión</h1>
            <!-- Formulario de Inicio de Sesión -->
            <?php include 'login.php'; ?>
        </section>
        <section class="section">
            <h1 class="title">Crear Usuario</h1>
            <!-- Formulario de Creación de Usuario -->
            <?php include 'register.php'; ?>
        </section>
        <section class="section">
            <h1 class="title">Recuperar Contraseña</h1>
            <!-- Formulario de Recuperación de Contraseña -->
            <?php include 'password_recovery.php'; ?>
        </section>
    </div>
</body>
</html>
