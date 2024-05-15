<?php
session_start();

require 'vendor/autoload.php';
use Embed\Embed;

if(isset($_POST['limpar'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CssLinks/index.css">
    <title>Links importantes</title>
</head>
<body>
    <h1>Links para salvar</h1>
    <form action="links.php" method="post" id="form1">
        <input type="text" placeholder="Digite um link para salvar" name="link">
        <br>
        <button type="submit">Ver informações do link</button>
    </form>
</body>
</html>

<?php

    echo "<p>Links salvos: </p>";
    if(isset($_SESSION['links']) && !empty($_SESSION['links'])) {
        $embed = new Embed();
        
        echo "<ul>";
        foreach($_SESSION['links'] as $indice => $link) {
            $info = $embed->get($link);
            echo "<li>$info->title <button><a href='infoLinks.php?indice=$indice'>Ver informações do link</a></button></li>";
        }
        echo "</ul>";
    }
?>

<form method="post" id="formLimpar">
    <button type="submit" name="limpar">Limpar links salvos</button>
</form>