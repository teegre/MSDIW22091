SELECT sta_nom, COUNT(hot_id) AS hotels
FROM station
JOIN hotel on station.sta_id = hotel.hot_sta_id
GROUP BY sta_nom;
