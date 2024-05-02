<?php
session_start();

require 'vendor/autoload.php';
use Embed\Embed;

echo "<h1>Informações do Link </h1>";

if(isset($_SESSION['links']) && !empty($_SESSION['links'])) {

    if(isset($_GET['indice'])){
        $indice = $_GET['indice'];
        $link = $_SESSION['links'][$indice];
        $embed = new Embed();
        $info = $embed->get($link);
        $title = $info->title;
        $description = $info->description;
        $language = $info->language;
        $image = $info->image;
        $autor = $info->authorName;
        
        echo "<div class='links'>";
        echo "<br>";
        echo 'Título do site: '. $title;
        echo "<br>";
        echo 'Descrição do site: '. $description;
        echo "<br>";
        echo 'Linguagem do site: '. $language;
        echo "<br>";
        echo "Imagem do site: <br> <img src='$image' alt='imagem da logo do(a) $title' width='100px'>";
        echo "<br>";
        if(isset($info->authorName)){
            echo 'Nome do autor: '. $autor;
        }
        echo "<br>";
        echo "</div>";
    }
} else {
    echo "Nenhum link salvo";
}

echo "<button><a href='index.php'>Voltar para a página inicial</a></button>";


