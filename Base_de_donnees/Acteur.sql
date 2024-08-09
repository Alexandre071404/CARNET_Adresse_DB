DROP TABLE IF EXISTS `Acteur`;
CREATE TABLE Acteur(idP INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, DateN Date,Lieux_de_naissance VARCHAR(100) NOT NULL,Film_connu VARCHAR(100));

INSERT INTO `Acteur` (`idP`, `nom`, `prenom`,`DateN`,`Lieux_de_naissance`,`Film_connu`) VALUES
(1, 'Dujardin', 'Jean','1972-06-19','Rueil-Malmaison','The Artist'),
(2, 'Cotillard', 'Marion','1975-09-30','Paris','Inception'),
(3, 'Cannet', 'Guillaume','1973-04-10','Boulogne-Billancourt','Les petits mouchoirs'),
(4, 'Watson', 'Emma','1990-04-15','Paris','La Saga Harry Potter'),
(5, 'Monroe', 'Marilyne','1926-06-01','Los Angeles','Le Prince et la Danseuse'),
(6, 'Deneuve', 'Catherine','1943-10-22','Paris','Les Demoiselles de Rochefort'),
(7, 'Maguire', 'Tobias Vincent','1975-06-27','Santa Monica','Spider Man');
