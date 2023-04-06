<?php

    $route = $_SERVER['REQUEST_URI'];

    if($route === '/') {
        echo 'Voici la page d\'acceil.';
    }
    elseif ($route === '/signup') {
        require 'controller/user.php';
        $user = new User();
        $user -> singup();
    }
    elseif ($route === '/new') {
        require 'controller/annonce.php';
        $annonce = new Annonce();
        $annonce -> add_annonce();
    }
    else {
        echo "<script>alert('Vous êtes perdus'); window.location = './'</script>";
        //echo 'Vous êtes perdus';
    }
?>