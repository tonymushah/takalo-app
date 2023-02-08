CREATE TABLE Utilisateur (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nomUtilisateur VARCHAR(255) NOT NULL,
  mdp VARCHAR(255) NOT NULL
);

CREATE TABLE Category (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255) NOT NULL
);

CREATE TABLE Objet (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nomObjet VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  proprietaireId INT NOT NULL,
  idCategory INT NOT NULL,
  prixObjet DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (proprietaireId) REFERENCES Utilisateur(id),
  FOREIGN KEY (idCategory) REFERENCES Category(id)
);

CREATE TABLE Echange (
  id INT AUTO_INCREMENT PRIMARY KEY,
  objetId INT NOT NULL,
  demandeurId INT NOT NULL,
  accepteurId INT NOT NULL,
  idObjetDemandeur INT NOT NULL,
  idObjetAccepteur INT NOT NULL,
  status ENUM('pending', 'accepted', 'declined') NOT NULL,
  FOREIGN KEY (objetId) REFERENCES Objet(id),
  FOREIGN KEY (demandeurId) REFERENCES Utilisateur(id),
  FOREIGN KEY (accepteurId) REFERENCES Utilisateur(id),
  FOREIGN KEY (idObjetDemandeur) REFERENCES Objet(id),
  FOREIGN KEY (idObjetAccepteur) REFERENCES Objet(id)
);
  
CREATE TABLE GalerieObjet (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idObjet INT NOT NULL,
  lienPhoto VARCHAR(255) NOT NULL,
  FOREIGN KEY (idObjet) REFERENCES Objet(id)
);


INSERT INTO Utilisateur (nomUtilisateur, mdp) VALUES 
  ('utilisateur1', 'mdp1'),
  ('utilisateur2', 'mdp2'),
  ('utilisateur3', 'mdp3');

INSERT INTO Category (nom) VALUES
  ('Electroniques'),
  ('Livres'),
  ('Vêtements'),
  ('Meubles'),
  ('Jouets'),
  ('Cosmétiques'),
  ('Sports');


INSERT INTO Echange (objetId, demandeurId, accepteurId, idObjetDemandeur, idObjetAccepteur, status) VALUES
  (1, 2, 1, 4, 2, 'pending'),
  (2, 3, 2, 5, 3, 'accepted');

INSERT INTO GalerieObjet (idObjet, lienPhoto) VALUES
  (1, 'D:/ITU/Mr Rojo/Examen/Examen-32h-7Fev-2023-S3/Photos/England.jpg'),
  (1, 'D:/ITU/Mr Rojo/Examen/Examen-32h-7Fev-2023-S3/Photos/Mountain.jpg'),
  (2, 'D:/ITU/Mr Rojo/Examen/Examen-32h-7Fev-2023-S3/Photos/Norway.jpg');

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO Objet (nomObjet, description, proprietaireId, idCategory, prixObjet) VALUES
  ('iPhone 12', 'Smartphone Apple iPhone 12 avec écran OLED de 6,1 pouces et double caméra arrière', 1, 1, 799),
  ('MacBook Pro', 'Ordinateur portable Apple MacBook Pro avec processeur M1 et écran Retina de 16 pouces', 2, 1, 1999),
  ('Apple Watch Series 6', 'Montre connectée Apple Watch Series 6 avec GPS intégré et fonctionnalités de santé', 3, 1, 399),
  ('AirPods Pro', 'Écouteurs sans fil Apple AirPods Pro avec réduction active du bruit et fonctionnalité de détection de l''oreille', 4, 1, 249),
  ('Nintendo Switch', 'Console de jeu portable Nintendo Switch avec écran LCD de 6,2 pouces et plusieurs jeux préinstallés', 5, 1, 299);

INSERT INTO Objet (nomObjet, description, proprietaireId, idCategory, prixObjet) VALUES
  ('Le Seigneur des Anneaux', 'Livre épique de J.R.R. Tolkien, qui suit les aventures d''un hobbit nommé Frodon et de ses compagnons pour détruire l''Anneau Unique', 1, 2, 20),
  ('Harry Potter à l''école des sorciers', 'Premier livre de la série Harry Potter, qui suit les aventures du jeune sorcier Harry à l''école de Poudlard', 2, 2, 15),
  ('1984', 'Roman dystopique de George Orwell sur une société futuriste gouvernée par un régime totalitaire', 3, 2, 12),
  ('Le Petit Prince', 'Livre philosophique pour enfants de Antoine de Saint-Exupéry sur l''importance des relations humaines', 4, 2, 8),
  ('Orgueil et Préjugés', 'Roman de Jane Austen sur les préjugés sociaux et les amours et les déceptions des sœurs Bennet', 5, 2, 18);

INSERT INTO Objet (nomObjet, description, proprietaireId, idCategory, prixObjet) VALUES
  ('T-shirt en coton', 'T-shirt confortable en coton avec un design simple et élégant', 1, 3, 15),
  ('Jeans skinny', 'Jeans skinny ajusté avec une coupe élégante pour un look décontracté', 2, 3, 50),
  ('Robe de soirée', 'Robe de soirée en soie avec une coupe élégante et un design de dentelle', 3, 3, 120),
  ('Manteau d''hiver', 'Manteau d''hiver en duvet d''oie avec une coupe douillette et un col en fourrure', 4, 3, 200);

INSERT INTO Objet (nomObjet, description, proprietaireId, idCategory, prixObjet) VALUES
  ('Canapé en cuir', 'Canapé en cuir de couleur noire avec des coussins confortables.', 1, 1, 500.00),
  ('Table basse en verre', 'Table basse en verre avec un plateau en verre fumé.', 1, 1, 200.00),
  ('Lit King Size', 'Lit King Size en bois massif avec un design élégant.', 2, 1, 1000.00),
  ('Armoire en bois', 'Armoire en bois avec des portes en verre et des étagères intérieures.', 2, 1, 700.00),
  ('Bureau en verre', 'Bureau en verre avec un plateau en verre fumé et des pieds en acier.', 3, 1, 300.00),
  ('Voiture télécommandée', 'Voiture télécommandée avec des fonctionnalités de vitesse et de direction.', 4, 2, 50.00),
  ('Lego Star Wars', 'Jeu de construction Lego Star Wars avec des personnages et des vaisseaux.', 5, 2, 80.00),
  ('Poupée Barbie', 'Poupée Barbie avec des vêtements et des accessoires.', 6, 2, 30.00),
  ('Jouet en peluche', 'Jouet en peluche avec un design mignon et doux au toucher.', 7, 2, 20.00),
  ('Jeux de société', 'Jeu de société avec des règles simples et amusantes.', 8, 2, 40.00),
  ('Rouge à lèvres', 'Rouge à lèvres avec une longue tenue et une couleur brillante.', 9, 3, 20.00),
  ('Fond de teint', 'Fond de teint avec une couvrance légère et une finition mate.', 10, 3, 30.00),
  ('Mascara', 'Mascara avec un effet volumisant et allongeant pour les cils.', 11, 3, 15.00),
  ('Eyeliner', 'Eyeliner avec une formule waterproof et une pointe précise pour un tracé parfait.', 12, 3, 10.00),
  ('Poudre compacte', 'Poudre compacte avec une couvrance légère et une finition naturelle.', 13, 3, 25.00),
  ('Ballon de football', 'Ballon de football en cuir avec une conception professionnelle.', 14, 4, 30.00),
  ('Raquette de tennis', 'Raquette de tennis avec une construction légère et une prise en main confortable.', 15, 4, 40.00);
-----------------------------------------------------------------------------------------------------------------------------------------------------------
