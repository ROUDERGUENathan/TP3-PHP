<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Confirmation inscription</title>
</head>
<body>
    <?php
        $serveur = 'localhost';
        $db = 'tp3';
        $utilisateur = 'root';
        $mot_passe = '';

        try {
            $connexion = new PDO("mysql:host=$serveur;dbname=$db", $utilisateur, $mot_passe);
            if ($connexion) echo 'Connexion réussie';
        }
        catch (PDOException $event) {
            die('<br/>Erreur : '.$event->getMessage());
        }

        // Récupération des champs du formulaire
        $username = $_POST["username"];
        $surname = $_POST["surname"];
        $phone_number = $_POST["phone_number"];

        // Insertion en BDD
        $inserer = "INSERT INTO etudiants (Nom,Prenom,Numero_telephone) VALUES ('$username','$surname','$phone_number')";
        $inserer = $connexion->exec($inserer);

        if ($inserer) {
            echo '<br/>Insertion effectuee';
            echo '<h3>Vous avez bien ete inscrit</h3>';
            echo '<p>Nom : '.$username.'</p>';
            echo '<p>Prenom : '.$surname.'</p>';
            echo '<p>Telephone : '.$phone_number.'</p>';
        } else {
            $table_erreurs = $connexion->errorInfo();
            echo '<br/>Erreur : '.$table_erreurs[2];
        }
    ?>
</body>
</html>
