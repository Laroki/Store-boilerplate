CREATE DATABASE boutique CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE boutique;

CREATE TABLE utilisateur (
  id      INT(3) NOT NULL AUTO_INCREMENT,
  pseudo  VARCHAR(20) NOT NULL,
  email   VARCHAR(255) NOT NULL,
  mdp     VARCHAR(255) NOT NULL,
  type    VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id)

)ENGINE=INNODB;

INSERT INTO utilisateur (
  pseudo,
  email,
  mdp,
  type
) VALUES (
  'admin',
  'admin@boutique.fr',
  '$2y$10$JLQVIj9Rvp9VpNgCAAhDrOZNSSh13.OfZBwX3CifDglC6x9poX80W',
  'admin'
);

CREATE TABLE categorie (
  id INT(3) NOT NULL AUTO_INCREMENT,
  titre VARCHAR(50) NOT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)ENGINE=INNODB;

CREATE TABLE article (
  id INT(3) NOT NULL AUTO_INCREMENT,
  id_categorie INT(3) NOT NULL,
  titre VARCHAR(50) NOT NULL,
  description TEXT DEFAULT NULL,
  prix DECIMAL(18,2) NOT NULL,
  image VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
)ENGINE=INNODB;