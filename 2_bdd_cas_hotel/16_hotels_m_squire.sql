SELECT cli_nom AS client, hot_nom AS hotel, COUNT(res_id) AS reservations
FROM hotel
JOIN chambre ON hotel.hot_id = chambre.cha_hot_id
JOIN reservation ON chambre.cha_id = reservation.res_cha_id
JOIN client ON reservation.res_cli_id = client.cli_id
WHERE cli_nom = 'Squire'
GROUP BY hot_nom;
