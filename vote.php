<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    if( isset($_GET['id']) && isset($_GET['nom']) ) {
        if( !empty($_GET['id']) && isset($_GET['nom']) ) {

            $id = $_GET['id'];
            $nom_liste = $_GET['nom'];

            // on fait la requête SQL
            // Connexion à MySQL
            include('cnx.php');

            // Récupération du nom de la liste
            $requete = $bdd->prepare( 'SELECT nom FROM categories WHERE id = :id' );
            // Exécuter la requête
            $requete->execute(array(
                'id' => $id
            ));
            
            // Traitement du résultat de la requête
            while ( $donnees = $requete->fetch() ) {
                $titre = $donnees['nom'];
            }

        // Terminer le traitement de la requête
        $requete->closeCursor();

        // Déconnexion de MySQL
        $bdd = null;
        }}
   
   ?>
    <title><?php echo $titre; ?> - Tier List </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="formulaire">
<?php include('includes/header.php'); ?>

<!-- Récupération de tous les éléments de la liste  -->
<?php
        if( isset($_GET['id']) ) {
            if( !empty($_GET['id']) ) {
                // on mémorise l’id reçu en GET
                $id_list = $_GET['id'];
                $nom_cat = $_GET['nom'];
                // on fait la requête SQL
                // Connexion à MySQL
                include('cnx.php');

                // Récupération du nom et des images des éléments de la liste
                $requete = $bdd->prepare( 'SELECT nom, img,id FROM elements WHERE id_list = :id_list' );
                // Exécuter la requête
                $requete->execute(array(
                    'id_list' => $id_list
                ));
                
                // Traitement du résultat de la requête
                while ( $donnees = $requete->fetch() ) {
                    $nom = $donnees['nom'];
                    $img = $donnees['img'];
                    $id = $donnees['id'];

                    $contenu = '<figure>';
                    $contenu .= '<img src="images/'.$nom_cat.'/'.$img.'" alt="'.$nom.'">';
                    $contenu .= '<figcaption>'.$nom.'</figcaption>';
                    $contenu .= '</figure>';
                    // Formulaire
                    $contenu .= '<form action="formulaire.php?nom='.$nom.'&id='.$id.'" method="post">';
                    $contenu .= '<input type="radio" name="'.$id.'" value="1">S<br>';
                    $contenu .= '<input type="radio" name="'.$id.'" value="2">A<br>';
                    $contenu .= '<input type="radio" name="'.$id.'" value="3">B<br>';
                    $contenu .= '<input type="radio" name="'.$id.'" value="4">C<br>';
                    $contenu .= '<input type="radio" name="'.$id.'" value="5">D<br>';
                    $contenu .= '<input type="submit" value="Valider">';
                    $contenu .= '</form>';
                echo $contenu; 
             
                }}
                
                // Terminer le traitement de la requête
                $requete->closeCursor();

                // Déconnexion de MySQL
                $bdd = null;
            }
        ?>
    
</body>
</html>