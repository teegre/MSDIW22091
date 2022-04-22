SELECT cli_nom, hot_nom, res_date
FROM reservation
JOIN client ON reservation.res_cli_id = client.cli_id
JOIN chambre ON reservation.res_cha_id = chambre.cha_id
JOIN hotel ON chambre.cha_hot_id = hotel.hot_id;
