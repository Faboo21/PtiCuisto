# PtiCuisto - Plateforme de partage de recettes

Message pour Mr Vallot regardez vos mails vous aurez un compte admin de fournis
Site Fonctionnel : [PtiCuisto](https://dev-leroy223.users.info.unicaen.fr/PtiCuisto/view/page/edito.php)

## Introduction

Bienvenue sur PtiCuisto, la plateforme en ligne où les amateurs de cuisine peuvent partager et découvrir de délicieuses recettes. PtiCuisto offre une expérience conviviale permettant aux utilisateurs de créer un compte, de se connecter, d'ajouter des recettes, de les consulter, de les trier et bien plus encore.

## Fonctionnalités principales

- **Création de compte et authentification :** Les utilisateurs peuvent créer un compte en fournissant leurs informations de base et se connecter pour accéder à l'ensemble des fonctionnalités du site.

- **Ajout de recettes :** Les utilisateurs peuvent partager leurs recettes en ajoutant des détails tels que le titre, les ingrédients, les étapes de préparation, et la catégorie (entrée, plat, dessert).

- **Consulter et trier les recettes :** Les utilisateurs peuvent parcourir les recettes existantes et les trier par titre, ingrédients, ou catégorie pour faciliter la recherche.

- **Gestion des recettes par l'administrateur :** Un administrateur a le pouvoir d'accepter ou de refuser les recettes soumises par les utilisateurs. Il peut également masquer des recettes indésirables.

- **Gestion des utilisateurs par l'administrateur :** L'administrateur a la capacité de bannir des comptes d'utilisateurs indésirables.

- **Commentaires :** Les utilisateurs peuvent laisser des commentaires sur les recettes. Les auteurs peuvent également supprimer leurs propres recettes.

Bien sûr, voici un exemple de section d'installation pour votre fichier README, combinant toutes les étapes dans une seule section :

## Installation

Suivez ces étapes pour installer et configurer le projet localement.

1. **Téléchargement du projet**

   Clonez le projet depuis le dépôt GitHub.

   ```bash
   git clone https://github.com/Faboo21/PtiCuisto
   ```

2. **Création de la base de données**

   - Importez le fichier `bdd.sql` dans votre base de données MySQL.

3. **Configuration de la base de données**

   - Créez un fichier `model/bdd.env`.
   - Ajoutez les informations suivantes au format suivant :

   ```env
   DB_HOST=serveur.bdd.fr
   DB_NAME=bdd_1
   DB_USER=user
   DB_PASS=password
   ```

   Remplacez les valeurs par les informations de votre base de données.

## Technologies utilisées

- **Front-end :**
  - HTML
  - CSS
  - JavaScript
  - Bootstrap

- **Back-end :**
  - PHP
  - MySQL

- [Tableau Kanban](https://iw3.atlassian.net/jira/software/projects/CUISTO/boards/2)
## Contributeurs

- [Fabien LEROY](https://github.com/Faboo21)
- [Eliot PETRUS](https://github.com/EliotPetrus)
- [Mathéo LEVALLOIS](https://github.com/Matheo-Levallois)

## Licence

Ce projet est sous licence [MIT](LICENSE).

---
