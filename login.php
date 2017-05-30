<!DOCTYPE html>
<html>

<header>
    <link rel="stylesheet" type="text/css" href="styles.css">
</header>

<body>

    <h1 class="tituloPagina">Iniciar sesion</h1>
    <form action="./verificarUsuario.php" method="GET">
        <div class="cajaTexto">
            <label for="emailU"> Email:</label><br>
            <input type="text" name="emailU" id="emailU"><br>

            <label for="passwordU"> Password:</label><br>
            <input type="text" name="passwordU" id="passwordU"><br>
        </div>
        <button class="boton" type="button" onclick="">Entrar</button>

    </form>

</body>




</html>