SELECT sta_nom AS station, COUNT(cha_id) AS chambres
FROM station
JOIN hotel ON station.sta_id = hotel.hot_sta_id
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
WHERE cha_capacite > 1
GROUP BY sta_nom;
