# TP3 - Connexion PDO à une base de données MySQL

TP réalisé en BTS CIEL2IR - Lycée St Eloi, dans le cadre du module Développement WEB / PHP + BDD.

L'objectif est de manipuler une base de données MySQL depuis PHP à l'aide des objets **PDO** (PHP Data Objects) : connexion, gestion des erreurs par exceptions, requêtes SQL (INSERT, UPDATE, DELETE, SELECT), et récupération des données d'un formulaire HTML.

## Structure du projet

| Fichier       | Rôle                                                                 |
|---------------|-----------------------------------------------------------------------|
| `index.php`   | Connexion PDO à la BDD (avec `try/catch`), puis INSERT / UPDATE / DELETE / SELECT sur la table `etudiants` |
| `index.html`  | Formulaire de saisie (Nom, Prenom, Telephone)                        |
| `form.php`    | Récupère les champs du formulaire (`$_POST`) et les insère en base    |

## Base de données

- **Nom de la base** : `tp3`
- **Table** : `etudiants`

```sql
CREATE DATABASE IF NOT EXISTS tp3 CHARACTER SET utf8mb4;

USE tp3;

CREATE TABLE IF NOT EXISTS etudiants (
  idEtudiants INT AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(50),
  Prenom VARCHAR(50),
  Numero_telephone VARCHAR(20)
);
