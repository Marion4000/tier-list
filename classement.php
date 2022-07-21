<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php 
    if( isset($_GET['id']) ) {
        if( !empty($_GET['id']) ) {

            $id = $_GET['id'];
            $nom_cat = $_GET['nom'];

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
<body class="classement">
<?php include('includes/header.php'); ?>
    <main>
        <h1> Tier list <?php echo$nom_cat; ?></h1>
        <!-- Tableau classement -->
        <div>
            <p>S</p>
            <p>A</p>
            <p>B</p>
            <p>C</p>
            <p>D</p>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div>
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

                // Récupération du nom de la liste
                $requete = $bdd->prepare( 'SELECT nom, img FROM elements WHERE id_list = :id_list' );
                // Exécuter la requête
                $requete->execute(array(
                    'id_list' => $id_list
                ));
                
                // Traitement du résultat de la requête
                while ( $donnees = $requete->fetch() ) {
                    $nom = $donnees['nom'];
                    $img = $donnees['img'];

                    $contenu = '<figure>';
                    $contenu .= '<img src="images/'.$nom_cat.'/'.$img.'" alt="'.$nom.'">';
                    $contenu .= '<figcaption>'.$nom.'</figcaption>';
                    $contenu .= '</figure>';
                echo $contenu; 
                }
                
                // Terminer le traitement de la requête
                $requete->closeCursor();

                // Déconnexion de MySQL
                $bdd = null;
            }
        }
        ?>
        </div>   

        <!-- Voter  -->
        <a href="formulaire.php">Voter !</a>
    </main>
    <script src="js/script.js"></script>
</body>
</html>