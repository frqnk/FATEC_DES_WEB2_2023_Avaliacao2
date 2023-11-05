<?php
    require_once('header.php');
    require_once('dados_banco.php');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        header('location: cadastro.php');
    }


    try {
        $dsn = "mysql:host=$servername;dbname=$dbname";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    $aluno = $_POST['aluno'];
    $placa = $_POST['placa'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['nome']) and !empty($_POST['placa'])) {
            $sql = "INSERT INTO veiculos (aluno, placa) VALUES ('$aluno', '$placa')";
            $conn->exec($sql);
            header('location: cadastro_placa.php');
        }
    }

    $conn = NULL;
?>

<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <title>
            Portaria Fatec
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body {
                font: 14px sans-serif;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="page-header">
            <h1>
                <?php echo $_SESSION["username"]; ?>
                <br>
            </h1>
        </div>
        <p>
            Aluno: <b><?php echo $aluno; ?></b> cadastrado com sucesso.
            <br>
            <br>
            <a href="principal.php" class="btn btn-primary">
                Voltar
            </a>
            <br>
            <br>
        </p>
    </body>
</html>