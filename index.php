<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion PDO à une BDD</title>
</head>
<body>
    <h3>PDO : connexion à une BDD mySQL</h3>
    <?php
        $serveur = 'localhost';
        $db = 'tp3';
        $utilisateur = 'root';
        $mot_passe = '';

        //1 Se connecter au serveur (avec gestion des erreurs par exceptions)
        try {
            $connexion = new PDO("mysql:host=$serveur;dbname=$db", $utilisateur, $mot_passe);
            if ($connexion) echo 'Connexion réussie';
        }
        catch (PDOException $event) {
            die('<br/>Erreur : '.$event->getMessage());
        }

        //3 Insérer des données
        $name = 'BOLANOS';
        $surname = 'Amandine';
        $phone_number = '0606060606';
        $inserer = "INSERT INTO etudiants (Nom,Prenom,Numero_telephone) VALUES ('$name','$surname','$phone_number')";
        $inserer = $connexion->exec($inserer);
        if ($inserer) echo '<br/>Insertion effectuee';
        else {
            $table_erreurs = $connexion->errorInfo();
            echo '<br/>Erreur : '.$table_erreurs[2];
        }

        //4 Modifier des données
        $name = 'VAUBOURG';
        $surname = 'Mandel';
        $phone_number = '0606060616';
        $modifier = "UPDATE etudiants
                SET Nom='$name',Prenom='$surname',Numero_telephone='$phone_number'
                WHERE idEtudiants>2";
        $modifier = $connexion->exec($modifier);
        if ($modifier) echo '<br/>Modification effectuée';
        else {
            $table_erreurs = $connexion->errorInfo();
            echo '<br/>Erreur : '.$table_erreurs[2];
        }

        //5 Supprimer des données
        $supprimer = "DELETE FROM etudiants WHERE idEtudiants>2";
        $supprimer = $connexion->exec($supprimer);
        if ($supprimer) echo '<br/>Suppression effectuée';
        else {
            $table_erreurs = $connexion->errorInfo();
            echo '<br/>Erreur : '.$table_erreurs[2];
        }

        //6 Afficher des données
        $afficher = "SELECT * FROM etudiants";
        $afficher = $connexion->query($afficher);
        while ($res = $afficher->fetch(PDO::FETCH_OBJ))
            var_dump($res);
    ?>
</body>
</html>
