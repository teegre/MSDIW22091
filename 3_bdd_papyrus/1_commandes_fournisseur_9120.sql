-- 1
-- Commandes du fournisseur 9120.
SELECT numcom FROM entcom
WHERE numfou = 9120;

-- 2
-- Codes des fournisseurs qui ont passé des commandes.
SELECT numfou FROM entcom
GROUP BY numfou;

-- 3
-- Nombre de commandes passées et nombre de fournisseurs concernés.
SELECT numfou, COUNT(numcom), (SELECT COUNT(distinct numfou) FROM entcom) AS fou_count
FROM entcom
GROUP BY numfou;

-- 4
-- Produits stock <= stock alerte et quantité < 1000.
-- N° produit, libellé produit, stock actuel, stock d'alerte, quantité anuelle.
SELECT codart, libart, stkphy, stkale, qteann
FROM produit
WHERE stkphy <= stkale AND qteann < 1000;

-- 5
-- Fournisseurs situés dans les département 75, 78, 92, 77.
-- Département (decroissant), nom fournisseur (alphabétique).
SELECT posfou, nomfou
FROM fournis
WHERE substr(posfou, 1, 2) IN (75, 78, 92, 77)
ORDER BY dep DESC, nomfou ASC;

-- 6
-- Commandes passée en mars et en avril.
-- Numéro de commande et date.
SELECT numcom, datcom
FROM entcom
WHERE month(datcom) IN (3, 4);

-- 7
-- Commandes du jour avec observation.
-- Numéro de commande et date.
SELECT numcom, datcom
FROM entcom
WHERE 
  year(datcom) = year(now()) AND
  month(datcom) = month(now()) AND
  day(datcom) = day(now()) AND 
  obscom IS NOT NULL;

-- 8
-- Total de chaque commande (décroissant).
-- Numéro commande et total.
SELECT numcom, sum(qtecde * priuni) AS total
FROM ligcom
GROUP BY numcom
ORDER BY total DESC;

-- 9
-- Commandes > 10000€ dont quantité < 1000.
-- Numéro commande et total
SELECT * FROM (
  SELECT numcom, sum(qtecde) AS qte, sum(qtecde * priuni) AS total
  FROM ligcom
  GROUP BY numcom
)
WHERE total > 10000 AND qte < 1000;
