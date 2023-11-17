CREATE DATABASE  worldcup;
USE worldcup;

CREATE TABLE stade (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_stade VARCHAR(255) NOT NULL,
    lieu VARCHAR(255) NOT NULL
);



CREATE TABLE groupe (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    id_stade INT,
    FOREIGN KEY (id_stade) REFERENCES stade(id) ON DELETE CASCADE
);
CREATE TABLE equipe (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_equipe VARCHAR(255) NOT NULL,
    jours_cles VARCHAR(255),
    population INT,
    continent VARCHAR(255),
    logo VARCHAR(255),
    id_groupe INT,
    FOREIGN KEY (id_groupe) REFERENCES groupe(id) ON DELETE CASCADE
);
-- Insert data into the stade table
INSERT INTO stade (nom_stade, lieu) VALUES
('Stade One', 'City One'),
('Stade Two', 'City Two'),
('Stade Three', 'City Three');
-- Insert data into the groupe table
INSERT INTO groupe (nom, id_stade) VALUES
('Groupe A', 1),
('Groupe B', 2),
('Groupe C', 3);
-- Insert data into the equipe table
INSERT INTO equipe (nom_equipe, jours_cles, population, continent, logo, id_groupe) VALUES
('Équipe One', 'Monday', 1000000, 'Europe', 'logo1.png', 1),
('Équipe Two', 'Tuesday', 800000, 'Asia', 'logo2.png', 1),
('Équipe Three', 'Wednesday', 1200000, 'North America', 'logo3.png', 2),
('Équipe Four', 'Thursday', 500000, 'South America', 'logo4.png', 2),
('Équipe Five', 'Friday', 700000, 'Africa', 'logo5.png', 3),
('Équipe Six', 'Saturday', 600000, 'Oceania', 'logo6.png', 3);
