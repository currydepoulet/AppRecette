CREATE DATABASE recettes;

USE recettes;

CREATE TABLE ingredients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    categorie_id INT,
    FOREIGN KEY (categorie_id) REFERENCES categories(id),
    CONSTRAINT uc_ingredient_nom UNIQUE (nom)
);


CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    CONSTRAINT uc_categorie_nom UNIQUE (nom)
);


CREATE TABLE recettes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    CONSTRAINT uc_recette_nom UNIQUE (nom)
);


CREATE TABLE recette_ingredient (
    recette_id INT,
    ingredient_id INT,
    PRIMARY KEY (recette_id, ingredient_id),
    FOREIGN KEY (recette_id) REFERENCES recettes(id),
    FOREIGN KEY (ingredient_id) REFERENCES ingredients(id)
);
