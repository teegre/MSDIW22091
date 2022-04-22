SELECT sta_nom, AVG(datediff(res_date_fin, res_date_debut)) AS duree_moyenne_sejour
FROM reservation
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id
JOIN station ON hotel.hot_sta_id = station.sta_id
GROUP BY sta_nom;
