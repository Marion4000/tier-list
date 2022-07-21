<?php
if( isset($_GET['nom'])&& isset($_GET['id']) ) {
    if( !empty($_GET['nom']&& isset($_GET['id'])) ) {
        // on mémorise l’nom reçu en GET
        $nom = $_GET['nom'];
        $id = $_GET['id'];
        echo $nom;
        $id = $_POST[$id];
        // affichage de la note 
        echo $id;

    }
}
?>

<!-- Faire revenir à la page précédente -->
