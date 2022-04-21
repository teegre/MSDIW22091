SELECT hot_nom, hot_categorie, hot_ville, cha_numero
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id;
