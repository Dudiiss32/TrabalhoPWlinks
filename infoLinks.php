<?php
session_start();

echo "<link rel='stylesheet' href='./CssLinks/infoLinks.css'>";

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
        echo '<b> Título do site: </b>'. $title;
        echo "<br>";
        echo '<b>Descrição do site: </b>'. $description;
        echo "<br>";
        echo '<b>Linguagem do site: </b>'. $language;
        echo "<br>";
        echo "<b>Imagem do site: </b><br> <img src='$image' alt='imagem da logo do(a) $title' width='100px'>";
        echo "<br>";
        if(isset($info->authorName)){
            echo '<b>Nome do autor: </b>'. $autor;
        }
        echo "<br>";
        echo "</div>";
    }
} else {
    echo "Nenhum link salvo";
}

echo "<button><a href='index.php'>Voltar para a página inicial</a></button>";


