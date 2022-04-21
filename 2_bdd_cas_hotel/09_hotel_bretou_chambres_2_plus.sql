SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
WHERE hot_ville = 'Bretou' AND cha_capacite > 1;
