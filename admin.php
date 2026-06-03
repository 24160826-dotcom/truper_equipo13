<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO herramientas(nombre, precio, stock)
            VALUES ('$nombre', '$precio', '$stock')";

    mysqli_query($conn, $sql);

    header("Location: admin.php");
    exit();
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];

    mysqli_query($conn, "DELETE FROM herramientas WHERE id=$id");

    header("Location: admin.php");
    exit();
}

$resultado = mysqli_query($conn, "SELECT * FROM herramientas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel TRUPER</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f4f6f8;
    color:#222;
}

.header{
    background:#111;
    color:white;
    padding:22px 50px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    color:#ff6a00;
    font-size:32px;
    font-weight:bold;
    letter-spacing:2px;
}

.header a{
    color:white;
    text-decoration:none;
    background:#ff6a00;
    padding:10px 18px;
    border-radius:8px;
    font-weight:bold;
}

.container{
    padding:40px 60px;
}

.card{
    background:white;
    padding:30px;
    border-radius:16px;
    box-shadow:0 8px 25px rgba(0,0,0,.10);
    margin-bottom:30px;
}

h1{
    color:#222;
    margin-bottom:10px;
}

.usuario{
    color:#555;
    margin-bottom:20px;
}

h2{
    color:#ff6a00;
    margin-bottom:20px;
}

.form-grid{
    display:grid;
    grid-template-columns:2fr 1fr 1fr auto;
    gap:15px;
}

input{
    padding:13px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
}

button{
    padding:13px 25px;
    background:#ff6a00;
    color:white;
    border:none;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    background:#e65f00;
}

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:12px;
}

th{
    background:#111;
    color:white;
    padding:14px;
    text-align:center;
}

td{
    background:white;
    padding:13px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover td{
    background:#f9f1eb;
}

.eliminar{
    color:white;
    background:#d62828;
    padding:8px 14px;
    border-radius:7px;
    text-decoration:none;
    font-weight:bold;
}

.eliminar:hover{
    background:#a4161a;
}

.badge{
    background:#ff6a00;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:14px;
}

@media(max-width:800px){
    .form-grid{
        grid-template-columns:1fr;
    }

    .container{
        padding:25px;
    }

    .header{
        padding:20px;
        flex-direction:column;
        gap:15px;
    }
}
</style>

</head>
<body>

<div class="header">
    <div class="logo">TRUPER</div>
    <a href="logout.php">Cerrar sesion</a>
</div>

<div class="container">

    <div class="card">
        <h1>Panel de Administración - herramientas</h1>
        <p class="usuario">
            Usuario activo:
            <span class="badge"><?php echo $_SESSION['usuario']; ?></span>
        </p>
    </div>

    <div class="card">
        <h2>Agregar herramienta</h2>

        <form method="POST" class="form-grid">
            <input type="text" name="nombre" placeholder="Nombre de la herramienta" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <button type="submit" name="guardar">Guardar</button>
        </form>
    </div>

    <div class="card">
        <h2>Lista de herramientas</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>

            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
            ?>

            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td>$<?php echo number_format($fila['precio'], 2); ?></td>
                <td><?php echo $fila['stock']; ?></td>
                <td>
                    <a
                    class="eliminar"
                    href="admin.php?eliminar=<?php echo $fila['id']; ?>"
                    onclick="return confirm('¿Seguro que deseas eliminar esta herramienta?')">
                        Eliminar
                    </a>
                </td>
            </tr>

            <?php
                }
            } else {
                echo "
                <tr>
                    <td colspan='5'>No hay herramientas registradas</td>
                </tr>";
            }
            ?>

        </table>
    </div>

</div>

</body>
</html>

