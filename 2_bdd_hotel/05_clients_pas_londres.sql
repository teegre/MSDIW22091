-- Typo dans la table client :
-- Londres est épelé 'Londre'...

UPDATE client
cli_ville='Londres'
WHERE cli_ville='Londre';

SELECT cli_nom, cli_ville
WHERE cli_ville <> 'Londres';
