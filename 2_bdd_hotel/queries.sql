-- 1
-- Liste des hôtels.
SELECT hot_nom, hot_ville FROM hotel;

-- 2
-- Ville de résidence de M. White.
SELECT cli_nom, cli_prenom, cli_adresse, cli_ville
FROM client 
WHERE cli_nom='White';

-- 3
-- Liste des station dont l'altitude est inférieure à 1000.
SELECT sta_nom, sta_altitude
FROM station
WHERE sta_altitude < 1000;

-- 4
-- Liste des chambres dont la capacité est supérieure à 1.
SELECT cha_numero, cha_capacite
FROM chambre
WHERE cha_capacite > 1;

-- 5
-- Liste des clients n'habitant pas à Londres.
--
-- /!\
-- Typo dans la table client :
-- Londres est épelé 'Londre'...

UPDATE client
cli_ville='Londres'
WHERE cli_ville='Londre';
--
SELECT cli_nom, cli_ville
WHERE cli_ville <> 'Londres';

-- 6
-- Liste des hôtels situés à Bretou et ayant un catégorie supérieure à 3.
SELECT hot_nom, hot_ville, hot_categorie
FROM hotel
WHERE hot_ville = 'Bretou' AND hot_categorie > 3;

-- 7
-- Liste des hôtels avec leur station.
SELECT sta_nom, hot_nom, hot_categorie, hot_ville
FROM hotel
JOIN station ON hotel.hot_sta_id = station.sta_id;

-- 8
-- Liste des chambres et leur hôtel.
SELECT hot_nom, hot_categorie, hot_ville, cha_numero
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id;

-- 9
-- Liste des chambres de plus d'une place dans les hôtels situés à Bretou.
SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
WHERE hot_ville = 'Bretou' AND cha_capacite > 1;

-- 10
-- Liste des réservations avec le nom des clients.
SELECT cli_nom, hot_nom, res_date
FROM reservation
JOIN client ON reservation.res_cli_id = client.cli_id
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id;

-- 11
-- Liste des chambres avec le nom de l'hôtel et de la station.
SELECT sta_nom, hot_nom, cha_numero, cha_capacite
FROM chambre
JOIN hotel on chambre.cha_hot_id = hotel.hot_id
JOIN station on hotel.hot_sta_id = station.sta_id;

-- 12
-- Réservations avec le nom du client, le nom de l'hôtel et la durée du séjour.
SELECT cli_nom, hot_nom, res_date_debut, datediff(res_date_fin, res_date_debut) AS duree
FROM reservation
JOIN client on reservation.res_cli_id = client.cli_id
JOIN chambre on reservation.res_cha_id = chambre.cha_id
JOIN hotel on chambre.cha_hot_id = hotel.hot_id;

-- 13
-- Nombre d'hôtels par station.
SELECT sta_nom, COUNT(hot_id) AS hotels
FROM station
JOIN hotel on station.sta_id = hotel.hot_sta_id
GROUP BY sta_nom;

-- 14
-- Nombre de chambres par station.
SELECT sta_nom AS station, COUNT(cha_id) AS chambres
FROM station
JOIN hotel ON station.sta_id = hotel.hot_sta_id
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
GROUP BY sta_nom;

-- 15
-- Nombre de chambres ayant une capacité supérieure à 1, par station.
SELECT sta_nom AS station, COUNT(cha_id) AS chambres
FROM station
JOIN hotel ON station.sta_id = hotel.hot_sta_id
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
WHERE cha_capacite > 1
GROUP BY sta_nom;

-- 16
-- Liste des hôtels dans lesquels M. Squire a reservé.
SELECT cli_nom AS client, hot_nom AS hotel, COUNT(res_id) AS reservations
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
JOIN reservation ON chambre.cha_id = reservation.res_cha_id
JOIN client ON reservation.res_cli_id = client.cli_id
WHERE cli_nom = 'Squire'
GROUP BY hot_nom;

-- 17
-- Durée moyenne des réservations par station.
SELECT sta_nom, AVG(datediff(res_date_fin, res_date_debut)) AS duree_moyenne_sejour
FROM reservation
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id
JOIN station ON hotel.hot_sta_id = station.sta_id
GROUP BY sta_nom;
