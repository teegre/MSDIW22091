SELECT sta_nom, hot_nom, hot_categorie, hot_ville
FROM hotel
JOIN station ON hotel.hot_sta_id = station.sta_id;
