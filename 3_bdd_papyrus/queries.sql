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
SELECT numcom, SUM(qtecde * priuni) AS total
FROM ligcom
GROUP BY numcom
ORDER BY total DESC;

-- 9
-- Commandes > 10000€ dont quantité < 1000.
-- Numéro commande et total

-- 9.1
SELECT numcom, SUM(qtecde * priuni) AS total
FROM ligcom
GROUP BY numcom
HAVING SUM(qtecde) < 1000 AND SUM(qtecde * priuni) > 10000;

-- 9.2
SELECT numcom, total FROM (
  SELECT numcom, SUM(qtecde) AS qte, SUM(qtecde * priuni) AS total
  FROM ligcom
  GROUP BY numcom
) AS sub
WHERE total > 10000 AND qte < 1000;

-- 10
-- Commandes par nom de fournisseur.
-- nom du fournisseur, numéro de commande et date.
SELECT nomfou, numcom, datcom
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou;

-- 11
-- Produits pour les commande urgentes (observation).
-- Numéro de commande, nom du fournisseur, libellé du produit et sous-total.
SELECT entcom.numcom, nomfou, libart, (qtecde * priuni) as sous_total
FROM entcom
JOIN fournis ON entcom.numfou = fournis.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
JOIN produit ON ligcom.codart = produit.codart
WHERE obscom LIKE '%urgent%';

-- 12
-- Nom des fournisseurs susceptibles de livrer au moins un article (2 manières).

-- 12.1
SELECT DISTINCT nomfou
JOIN entcom ON fournis.numfou = entcom.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
WHERE qteliv < qtecde;

-- 12.2
SELECT nomfou
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
GROUP BY ligcom.numcom
HAVING SUM(qteliv) < SUM(qtecde);

-- 13
-- Commandes dont le fournisseur est celui de la commande 70210 (2 manières)
-- Numéro de commande et date.

-- 13.1
SELECT numcom, datcom
FROM entcom
WHERE numfou = (
  SELECT numfou
  FROM entcom
  WHERE numcom = 70210
);
