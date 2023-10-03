<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>
<body>
<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-one-third">
                    <div class="box">
                        <h1 class="title has-text-centered">Recuperación de Contraseña</h1>
                        <form action="procesar_recuperacion.php" method="post">
                            <div class="field">
                                <label class="label">Correo Electrónico</label>
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="Correo Electrónico" required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary is-fullwidth" type="submit">Enviar Correo de Recuperación</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
