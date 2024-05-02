<?php

session_start();
if(isset($_POST['link']) && !empty($_POST['link'])){
    $link = $_POST['link'];
    $_SESSION['links'] = $_SESSION['links'] ?? [];
    $_SESSION['links'][] = $link;
    foreach($_SESSION['links'] as $indice => $link){
        header("location:infoLinks.php?indice=$indice");
    }
    
}else{
    header('location:index.php');
} 
