<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if( isset($_GET['id']) ) {
        if( !empty($_GET['id']) ) {
            // on mémorise l’id reçu en GET
            $id_cat = $_GET['id'];
            // on fait la requête SQL
            // Connexion à MySQL
            include('cnx.php');

            // Récupération du nom de la liste
            $requete = $bdd->prepare( 'SELECT nom, id FROM liste WHERE id = :id_cat' );
            // Exécuter la requête
            $requete->execute(array(
                'id_cat' => $id_cat
            ));
            
            // Traitement du résultat de la requête
            while ( $donnees = $requete->fetch() ) {
                $titre = $donnees['nom'];
            }
            
            // Terminer le traitement de la requête
            $requete->closeCursor();

            // Déconnexion de MySQL
            $bdd = null;
        }
    }
    ?>
    <title><?php echo $titre; ?> - Tier List </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <main>
        <h1><?php echo $titre; ?></h1>
        <ul>
            <!-- Récupération des catégories -->
            <?php
            include('cnx.php');
            $requete = $bdd->prepare('SELECT nom, id FROM categories WHERE id_cat =:id_cat');

            $requete->execute(array(
                'id_cat' => $id_cat
            ));

            while($donnees = $requete->fetch() ) {
                $nom = $donnees['nom'];
                $id = $donnees['id'];

            echo '<li><a href="classement.php?id='.$donnees['id'].'&nom='.$donnees['nom'].'">'.$donnees['nom'].'</a></li>';

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