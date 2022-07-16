<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste - Tier List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>

    <main>
    <h1>Liste</h1>
   <ul>
   <?php
        // Connexion à MySQL
        include('cnx.php');

        // Préparation d'une requête SQL
        // Sélectionner les champs id et nom dans la table liste
        $requete = $bdd->prepare( 'SELECT id, nom FROM liste' );
        // Exécuter la requête
        $requete->execute();
        
        // Traitement du résultat de la requête
        while ( $donnees = $requete->fetch() ) {
            echo '<li><a href="categories.php?id='.$donnees['id'].'">'.$donnees['nom'].'</a></li>';
        }
        
        // Terminer le traitement de la requête
        $requete->closeCursor(); 

        // Déconnexion de MySQL
        $bdd = null;
        ?>
   </ul>
    </main>

    <script src="js/script.js"></script>
</body>
</html>