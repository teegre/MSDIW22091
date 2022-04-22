SELECT sta_nom, hot_nom, cha_numero, cha_capacite
FROM chambre
JOIN hotel on chambre.cha_hot_id = hotel.hot_id
JOIN station on hotel.hot_sta_id = station.sta_id;
