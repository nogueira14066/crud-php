<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assembleia de Deus em Belford Roxo</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .logo {
            width: 125px;
            cursor: pointer;
        }

        li, a {
            font-family: sans-serif;
            font-size: 15px;
            color: black;
            text-decoration: none;
            list-style: none;
            text-transform: uppercase;
        }

        header {
            height: 96px;
            background-color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            top: 0;
            position: fixed;
            z-index: 1;
            width: 100%;
        }

        .nav__links li {
            display: inline-block;
            padding: 0 15px;
            line-height: 30px;
        }

        .assembleia__h1 {
            color: black;
            cursor: default;
            white-space: nowrap;
            margin-left: 20px;
            font-size: 22px;
            font-weight: bold;
        }

        .nav__links li a {
            text-decoration: none;
            color: black;
            padding: 5px 0;
            position: relative;
            font-weight: bold;
        }

        .nav__links li a::after {
            content: '';
            background: #3603b6;
            width: 0;
            height: 2px;
            position: absolute;
            bottom: 0;
            left: 0;
            transition: width 0.5s;
        }

        .nav__links li a:hover::after {
            width: 100%;
        }

        .visita{
            margin-left: 300px;
        }
    </style>
</head>
<body>
    <header>
        <img src="images/BackgroundEraser_20230901_181326899.png" alt="Assembleia de Deus em Belford Roxo" class="logo" title="Assembleia de Deus em Belford Roxo">
        <div class="assembleia__div">
            <h1 class="assembleia__h1">Assembleia de Deus em Belford Roxo</h1>
        </div>
        <nav>
            <ul class="nav__links">
                <li><a href="ieadbr.html">Início</a></li>
                <li><a href="sobre.html">Quem somos</a></li>
            </ul>
        </nav>
    </header>

    <?php require_once 'process.php'; ?>

    <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data1") or die($mysqli->error);
    ?>

<div style="height: 140px;">
</div>
<h1 class="visita">Insira seu nome e endereço para receber uma visita</h1>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th colspan="2">Opções</th>
                        </tr>
                    </thead>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['telefone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="oração.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                                <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Apagar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="process.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input value="<?php echo $name; ?>" type="text" name="name" class="form-control" placeholder="Insira seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Endereço</label>
                        <input value="<?php echo $location ?>" type="text" name="location" class="form-control" placeholder="Insira seu endereço">
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input value="<?php echo $telefone ?>" type="text" name="telefone" class="form-control" placeholder="Insira seu telefone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input value="<?php echo $email ?>" type="text" name="email" class="form-control" placeholder="Insira seu email">
                    </div>
                    <div>
                        <?php if($update == true): ?>
                            <button type="submit" name="update" class="btn btn-warning">Atualizar</button>
                        <?php else: ?>
                            <button type="submit" name="save" class="btn btn-success">Salvar</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
