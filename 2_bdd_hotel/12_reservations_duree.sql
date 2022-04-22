SELECT cli_nom, hot_nom, res_date_debut, datediff(res_date_fin, res_date_debut) AS duree
FROM reservation
JOIN client on reservation.res_cli_id = client.cli_id
JOIN chambre on reservation.res_cha_id = chambre.cha_id
JOIN hotel on chambre.cha_hot_id = hotel.hot_id;
