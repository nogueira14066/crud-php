<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylelogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Montserrat:wght@400;800&family=Open+Sans:wght@400;800&family=Poppins:wght@400;800&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <img src="images/BackgroundEraser_20230901_181326899.png" alt="Assembleia de Deus em Belford Roxo" class="logo" title="Assembleia de Deus em Belford Roxo">
            <div assembleia__div>
                <h1 class="assembleia__h1">Assembleia de Deus em Belford Roxo</h1>
            </div>
        <nav>
            <ul class="nav__links">
                <li><a href="ieadbr.html">Início</a></li>
                <li><a href="faleconosco.html">Contato</a></li>
            </ul>
        </nav>
    </header> 

    <div style="height: 100px;"></div>

    <div id="form">
        <div class="login">
        <h1>Login</h1>
        </div>
        <form name="form" onsubmit="return isvalid()" action="login.php" method="post">
            <label>Usuário: </label>
            <input type="text" id="user" name="user"> <br>
            <label>Senha:</label>
            <input type="password" id="pass" name="pass"> <br>
            <input class="btn" type="submit" id="btn" value="Login" name="submit">
        </form>
    </div>

    <script>
        function isvalid(){
            var user = document.form.user.value;
            var pass = document.form.pass.value;
            if(user.length=="" && pass.length==""){
                alert("Usuário e senha vazios")
            return false
            }
            else{
                if(user.length==""){
                alert("Usuário vazio")
            return false
                }
                if(pass.length==""){
                alert("Senha vazia")
            return false
            }
        }
    }
    </script>
</body>
</html>