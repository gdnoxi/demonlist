<?php
// Verificar si el usuario ha seleccionado un modo (oscuro o claro) y actualizar la cookie
if (isset($_POST['theme'])) {
    $theme = $_POST['theme'];
    setcookie('theme', $theme, time() + (86400 * 30), "/"); // Cookie válida por 30 días
    header("Location: " . $_SERVER['PHP_SELF']); // Redirigir para evitar reenviar el formulario
    exit();
}

// Comprobar si la cookie está establecida y obtener el valor
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light'; // Por defecto es 'light'
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demonlist Estilo Pointercrate</title>
    <style>
        body {
            background-color: <?= $theme == 'dark' ? '#222' : '#f5f5f5' ?>;
            color: <?= $theme == 'dark' ? '#ddd' : '#000' ?>;
            font-family: 'Arial', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .demon-entry {
            display: flex;
            align-items: center;
            background-color: <?= $theme == 'dark' ? '#333' : '#fff' ?>;
            border: 1px solid <?= $theme == 'dark' ? '#555' : '#ddd' ?>;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, border-color 0.3s;
        }

        .demon-entry img {
            width: 120px;
            height: 120px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 20px;
        }

        .demon-info {
            flex: 1;
        }

        .demon-info h2 {
            margin: 0;
            font-size: 1.5em;
        }

        .demon-info p {
            margin: 5px 0;
        }

        .demon-number {
            font-size: 2em;
            font-weight: bold;
            margin-right: 20px;
        }

        .creator {
            font-style: italic;
            color: <?= $theme == 'dark' ? '#ccc' : '#777' ?>;
        }

        .guidelines {
            margin-top: 40px;
            padding: 20px;
            background-color: <?= $theme == 'dark' ? '#333' : '#fff' ?>;
            border-radius: 10px;
            border: 1px solid <?= $theme == 'dark' ? '#555' : '#ddd' ?>;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, border-color 0.3s;
        }

        .guidelines h2 {
            margin-top: 0;
        }

        /* Estilos para el botón de cambio de tema */
        .dark-mode-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: <?= $theme == 'dark' ? '#ddd' : '#333' ?>;
            color: <?= $theme == 'dark' ? '#333' : '#fff' ?>;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dark-mode-toggle:hover {
            background-color: <?= $theme == 'dark' ? '#bbb' : '#555' ?>;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>GDPS Demonlist</h1>

        <div class="demon-entry">
            <div class="demon-number">#1</div>
            <img src="https://i.ytimg.com/vi/9fsZ014qB3s/mqdefault.jpg" alt="Imagen del nivel 1">
            <div class="demon-info">
                <h2>Tidal Wave</h2>
                <p class="creator">por OniLink</p>
            </div>
        </div>

        <div class="demon-entry">
            <div class="demon-number">#2</div>
            <img src="https://i.ytimg.com/vi/9fsZ014qB3s/mqdefault.jpg" alt="Imagen del nivel 2">
            <div class="demon-info">
                <h2>Acheron</h2>
                <p class="creator">por ryamu</p>
            </div>
        </div>

        <div class="demon-entry">
            <div class="demon-number">#3</div>
            <img src="https://i.ytimg.com/vi/9fsZ014qB3s/mqdefault.jpg" alt="Imagen del nivel 3">
            <div class="demon-info">
                <h2>Silent Clubstep</h2>
                <p class="creator">por TheRealSailent</p>
            </div>
        </div>

        <div class="demon-entry">
            <div class="demon-number">#4</div>
            <img src="https://i.ytimg.com/vi/9fsZ014qB3s/mqdefault.jpg" alt="Imagen del nivel 4">
            <div class="demon-info">
                <h2>Avernus</h2>
                <p class="creator">por PockeWindfish</p>
            </div>
        </div>

        <div class="guidelines">
            <h2>Guidelines</h2>
            <p>All demonlist operations are carried out following strict guidelines and rules to ensure fairness...</p>
        </div>
    </div>

    <!-- Formulario oculto para alternar entre modo claro y oscuro -->
    <form method="POST" id="themeForm">
        <input type="hidden" name="theme" value="<?= $theme == 'dark' ? 'light' : 'dark' ?>">
        <button type="submit" class="dark-mode-toggle">
            <?= $theme == 'dark' ? 'Modo Claro' : 'Modo Oscuro' ?>
        </button>
    </form>

</body>
</html>
