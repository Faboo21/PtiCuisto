CREATE TABLE PC_UTILISATEUR (
    UTI_Id INT PRIMARY KEY AUTO_INCREMENT,
    UTI_Pseudo VARCHAR(255) NOT NULL UNIQUE,
    UTI_Mail VARCHAR(255) NOT NULL UNIQUE,
    UTI_Prenom VARCHAR(255),
    UTI_Nom VARCHAR(255),
    UTI_DateInscription DATE NOT NULL,
    UTI_TypeUser INT,
    UTI_Statut INT
);

CREATE TABLE PC_CATEGORIE (
    CAT_Id INT PRIMARY KEY AUTO_INCREMENT,
    CAT_Intitule VARCHAR(255) NOT NULL,
    CAT_Detail TEXT
);

CREATE TABLE PC_INGREDIENT (
    ING_Id INT PRIMARY KEY AUTO_INCREMENT,
    ING_Intitule VARCHAR(255) NOT NULL,
    ING_Detail TEXT
);

CREATE TABLE PC_RECETTE (
    REC_Id INT PRIMARY KEY AUTO_INCREMENT,
    REC_Titre VARCHAR(255) NOT NULL,
    REC_Contenu TEXT NOT NULL,
    REC_Resum TEXT,
    CAT_Id INT,
    REC_DateInscription DATE NOT NULL,
    REC_Image VARCHAR(500),
    REC_DateCreation DATE NOT NULL,
    REC_DateModification DATE,
    UTI_Id INT,
    FOREIGN KEY (CAT_Id) REFERENCES PC_CATEGORIE(CAT_Id),
    FOREIGN KEY (UTI_Id) REFERENCES PC_UTILISATEUR(UTI_Id)
);

CREATE TABLE PC_RECETTE_INGREDIENT (
    REC_Id INT,
    ING_Id INT,
    PRIMARY KEY (REC_Id, ING_Id),
    FOREIGN KEY (REC_Id) REFERENCES PC_RECETTE(REC_Id),
    FOREIGN KEY (ING_Id) REFERENCES PC_INGREDIENT(ING_Id)
);

CREATE TABLE PC_TAG (
    TAG_Id INT PRIMARY KEY AUTO_INCREMENT,
    TAG_Intitule VARCHAR(255) NOT NULL
);

CREATE TABLE PC_RECETTE_TAG (
    REC_Id INT,
    TAG_Id INT,
    PRIMARY KEY (REC_Id, TAG_Id),
    FOREIGN KEY (REC_Id) REFERENCES PC_RECETTE(REC_Id),
    FOREIGN KEY (TAG_Id) REFERENCES PC_TAG(TAG_Id)
);

-- Insertions pour la table PC_UTILISATEUR --------------------------
INSERT INTO PC_UTILISATEUR (UTI_Pseudo, UTI_Mail, UTI_Prenom, UTI_Nom, UTI_DateInscription, UTI_TypeUser, UTI_Statut) VALUES 
('ChefPierre', 'pierre@example.com', 'Pierre', 'Dumont', '2023-01-01', 1, 1),
('CuisiniereEmma', 'emma@example.com', 'Emma', 'Boulanger', '2023-01-10', 2, 1),
('CuisineAnna', 'anna@example.com', 'Anna', 'Martin', '2023-02-05', 2, 1),
('GourmetJohn', 'john@example.com', 'John', 'Doe', '2023-02-10', 2, 1),
('TesteurGustatif', 'test@example.com', 'Testeur', 'McTest', '2023-02-15', 2, 1),
('PaulCulinarian', 'paul@example.com', 'Paul', 'Simon', '2023-02-20', 1, 1),
('RecetteRachel', 'rachel@example.com', 'Rachel', 'Ray', '2023-02-25', 2, 1),
('GourmetGary', 'gary@example.com', 'Gary', 'Chef', '2023-03-01', 2, 1),
('CulinaireCarl', 'carl@example.com', 'Carl', 'Cuisinier', '2023-03-05', 1, 1),
('DeliceDelia', 'delia@example.com', 'Delia', 'Plat', '2023-03-10', 2, 1);

-- Insertions pour la table PC_CATEGORIE------------------------------------------------------
INSERT INTO PC_CATEGORIE (CAT_Intitule, CAT_Detail) VALUES 
('Desserts', 'Délicieux desserts sucrés'),
('Plats Principaux', 'Recettes principales pour le déjeuner et le dîner'),
('Entrées', 'Délicieux début de repas'),
('Petits Déjeuners', 'La meilleure façon de commencer la journée'),
('Déjeuners', 'Repas de midi pour continuer la journée'),
('Dîners', 'Repas du soir copieux'),
('Encas', 'Petites bouchées entre les repas'),
('Boissons', 'Des cocktails aux mocktails'),
('Salades', 'Mélange frais de légumes et de protéines'),
('Pains', 'Des baguettes aux petits pains et tout le reste');

-- Insertions pour la table PC_INGREDIENT----------------------------------------
INSERT INTO PC_INGREDIENT (ING_Id,ING_Intitule, ING_Detail) VALUES 
(1,'Sucre', 'Substance granulée sucrée'),
(2,'Poulet', 'Viande de volaille'),
(3,'Farine', 'Ingrédient principal de la plupart des pâtisseries'),
(4,'Beurre', 'Produit laitier utilisé en pâtisserie et cuisine'),
(5,'Lait', 'Liquide laitier'),
(6,'Sel', 'Utilisé pour assaisonner et la conservation'),
(7,'Oeufs', 'Agent liant courant en pâtisserie'),
(8,'Fromage', 'Produit laitier utilisé dans de nombreux plats'),
(9,'Boeuf', 'Viande rouge'),
(10,'Tomate', 'Fruit souvent confondu avec un légume');

-- Insertions pour la table PC_RECETTE (En supposant des IDs de catégorie de 1 à 10 et des IDs d'utilisateur de 1 à 10)--------------------------------
INSERT INTO PC_RECETTE (REC_Titre, REC_Contenu, REC_Resum, CAT_Id, REC_DateInscription, REC_Image, REC_DateCreation, REC_DateModification, UTI_Id) VALUES 
('Salade de Poulet', 'Mélangez le poulet avec des légumes...', 'Délicieuse salade de poulet', 3, '2023-02-01', 'salade_poulet.jpg', '2023-02-01', '2023-02-03', 1),
('Gâteau à la Vanille', 'Mélangez farine, sucre, oeufs...', 'Délicieux gâteau à la vanille', 1, '2023-02-10', 'gateau_vanille.jpg', '2023-02-10', NULL, 2),
('Soupe de Tomates', 'Mixez les tomates, ajoutez du sel...', 'Délicieuse soupe chaude de tomates', 2, '2023-03-01', 'soupe_tomate.jpg', '2023-03-01', '2023-03-02', 3),
('Omelette au Fromage', 'Battez les oeufs, ajoutez du fromage...', 'Omelette délicieuse et fromagère', 4, '2023-03-05', 'omelette.jpg', '2023-03-05', NULL, 4),
('Tacos au Boeuf', 'Cuisinez le boeuf, servez dans des tacos...', 'Tacos mexicains au boeuf', 5, '2023-03-10', 'tacos_boeuf.jpg', '2023-03-10', '2023-03-12', 5),
('Toast Beurré', 'Étalez du beurre sur du pain, toastez...', 'Simple toast beurré', 6, '2023-03-15', 'toast_beurre.jpg', '2023-03-15', NULL, 6),
('Milkshake', 'Mixez du lait et des arômes...', 'Milkshake crémeux', 7, '2023-03-20', 'milkshake.jpg', '2023-03-20', '2023-03-22', 7),
('Sandwich au Fromage Grillé', 'Fromage entre deux tranches de pain, grille...', 'Sandwich au fromage fondu', 8, '2023-03-25', 'sandwich_fromage.jpg', '2023-03-25', NULL, 8),
('Salade César', 'Laitue, croûtons, vinaigrette...', 'Salade César classique', 9, '2023-04-01', 'salade_cesar.jpg', '2023-04-01', '2023-04-03', 9),
('Pain Maison', 'Pétrissez farine, eau, levure...', 'Pain fraîchement cuit', 10, '2023-04-05', 'pain_maison.jpg', '2023-04-05', NULL, 10);

-- Insertions pour la table PC_RECETTE_INGREDIENT (Liaison des recettes à leurs principaux ingrédients)
INSERT INTO PC_RECETTE_INGREDIENT (REC_Id, ING_Id) VALUES 
(1, 2),  -- Salade de Poulet contient du Poulet
(2, 1),  -- Gâteau à la Vanille contient du Sucre
(3, 10), -- Soupe de Tomates contient de la Tomate
(4, 7),  -- Omelette au Fromage contient des Oeufs
(5, 9),  -- Tacos au Boeuf contient du Boeuf
(6, 3),  -- Toast Beurré contient de la Farine (base de pain)
(7, 5),  -- Milkshake contient du Lait
(8, 8),  -- Sandwich au Fromage Grillé contient du Fromage
(9, 2),  -- Salade César contient du Poulet
(10, 3); -- Pain Maison contient de la Farine

-- Insertions pour la table PC_TAG -----------------------
INSERT INTO PC_TAG (TAG_Intitule) VALUES 
('Sucré'),
('Salé'),
('Végétalien'),
('Végétarien'),
('Sans Lait'),
('Sans Gluten'),
('Riche en Protéines'),
('Faible en Glucides'),
('Rapide'),
('Bio');

-- Insertions pour la table PC_RECETTE_TAG (Liaison des recettes à des tags spécifiques)
INSERT INTO PC_RECETTE_TAG (REC_Id, TAG_Id) VALUES 
(1, 2),  -- Salade de Poulet est Salée
(1, 7),  -- Salade de Poulet est Riche en Protéines
(2, 1),  -- Gâteau à la Vanille est Sucré
(3, 2),  -- Soupe de Tomates est Salée
(3, 9),  -- Soupe de Tomates est Rapide
(4, 2),  -- Omelette au Fromage est Salée
(4, 7),  -- Omelette au Fromage est Riche en Protéines
(5, 2),  -- Tacos au Boeuf est Salé
(6, 1),  -- Toast Beurré est Sucré
(7, 1),  -- Milkshake est Sucré
(8, 2),  -- Sandwich au Fromage Grillé est Salé
(9, 2),  -- Salade César est Salée
(9, 7),  -- Salade César est Riche en Protéines
(10, 10);-- Pain Maison est Bio
