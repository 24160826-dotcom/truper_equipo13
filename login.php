<?php
session_start();

if(isset($_POST['entrar'])){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Usuario de prueba
    if($correo == "24160717@itoaxaca.edu.mx" && $password == "12345"){

        $_SESSION['usuario'] = $correo;

        header("Location: admin.php");
        exit();

    }else{

        $error = "Correo o contraseña incorrectos";

    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login TRUPER</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background-image:url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200');
    background-size:cover;
    background-position:center;
}

body::before{
    content:'';
    position:absolute;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.55);
}

.login-box{
    position:relative;
    z-index:1;

    width:400px;
    background:white;

    padding:40px;
    border-radius:15px;

    box-shadow:0 0 25px rgba(0,0,0,.3);
}

.logo{
    text-align:center;
    color:#ff6a00;
    font-size:48px;
    font-weight:bold;
    margin-bottom:10px;
}

.titulo{
    text-align:center;
    margin-bottom:25px;
    color:#333;
}

.input-box{
    margin-bottom:15px;
}

.input-box input{
    width:100%;
    padding:14px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:8px;

    background:#ff6a00;
    color:white;

    font-size:18px;
    cursor:pointer;

    margin-top:10px;
}

.btn:hover{
    background:#e55d00;
}

.error{
    background:#ffd6d6;
    color:#b00000;

    padding:10px;
    border-radius:8px;

    margin-bottom:15px;
    text-align:center;
}

.back{
    text-align:center;
    margin-top:20px;
}

.back a{
    text-decoration:none;
    color:#ff6a00;
    font-weight:bold;
}

.back a:hover{
    text-decoration:underline;
}

</style>

</head>

<body>

<div class="login-box">

    <div class="logo">
        TRUPER
    </div>

    <h1 class="titulo">
        Iniciar Sesión
    </h1>

    <?php
    if(isset($error)){
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="POST">

        <div class="input-box">

            <input
            type="email"
            name="correo"
            placeholder="Correo institucional"
            required>

        </div>

        <div class="input-box">

            <input
            type="password"
            name="password"
            placeholder="Contraseña"
            required>

        </div>

        <button type="submit" name="entrar" class="btn">
            INGRESAR
        </button>

    </form>

    <div class="back">
        <a href="index.php">← Volver al inicio</a>
    </div>

</div>

</body>
</html>
