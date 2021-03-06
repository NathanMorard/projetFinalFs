

CREATE DATABASE IF NOT EXISTS projetfs;

-- Création d'un utilisateur mysql 
CREATE USER IF NOT EXISTS student@localhost IDENTIFIED BY "password"; 

-- On donne les droits à l'utilisateur student sur tous les objets de la base infotech
GRANT ALL ON projetfs.* TO student@localhost; 

USE projetfs; 

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(255) UNIQUE, 
    password VARCHAR(255)
); 