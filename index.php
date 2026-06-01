<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TRUPER SYSTEM</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f6f8;
            color: #222;
        }

        header {
            background: #111;
            color: white;
            padding: 25px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            color: #ff6a00;
            font-size: 34px;
            letter-spacing: 2px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-weight: bold;
        }

        .hero {
            min-height: 520px;
            background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                        url("https://images.unsplash.com/photo-1503387762-592deb58ef4e");
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero h2 {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 22px;
            max-width: 850px;
            line-height: 1.5;
        }

        .btn {
            margin-top: 35px;
            background: #ff6a00;
            color: white;
            padding: 16px 35px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
        }

        .btn:hover {
            background: #e65f00;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 60px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,.12);
            text-align: center;
        }

        .card h3 {
            color: #ff6a00;
            font-size: 26px;
            margin-bottom: 15px;
        }

        .card p {
            font-size: 17px;
            line-height: 1.5;
        }

        footer {
            background: #111;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header>
    <h1>TRUPER</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="#productos">Productos</a>
        <a href="#nosotros">Nosotros</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<section class="hero">
    <h2>Sistema Profesional TRUPER</h2>
    <p>
        Plataforma web desarrollada con PHP + MySQL para la gestión
        profesional de herramientas, productos y refacciones.
    </p>

    <a href="login.php" class="btn">Inicar sesion</a>
</section>

<section class="cards" id="productos">
    <div class="card">
        <h3>Herramientas</h3>
        <p>Administración profesional de productos TRUPER desde un servidor Ubuntu.</p>
    </div>

    <div class="card">
        <h3>MySQL</h3>
        <p>Base de datos conectada para consultar, agregar, editar y eliminar registros.</p>
    </div>

    <div class="card">
        <h3>Seguridad</h3>
        <p>Validación de usuarios, permisos Linux y administración mediante SSH.</p>
    </div>
</section>

<footer id="nosotros">
    © 2026 TRUPER SYSTEM | PHP + MySQL + Ubuntu Server
</footer>

</body>
</html>
