-- 1
-- Commandes du fournisseur 9120.
SELECT numcom FROM entcom
WHERE numfou = 9120;

-- 2
-- Codes des fournisseurs auxquels des commandes ont été passées.
SELECT numfou FROM entcom
GROUP BY numfou;

-- 3
-- Nombre de commandes passées et nombre de fournisseurs concernés.
SELECT numfou, COUNT(numcom), (SELECT COUNT(DISTINCT numfou) FROM entcom) AS fou_count
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
WHERE SUBSTR(posfou, 1, 2) IN (75, 78, 92, 77)
ORDER BY dep DESC, nomfou ASC;

-- 6
-- Commandes passée en mars et en avril.
-- Numéro de commande et date.
SELECT numcom, datcom
FROM entcom
WHERE MONTH(datcom) IN (3, 4);

-- 7
-- Commandes du jour avec observation.
-- Numéro de commande et date.
SELECT numcom, datcom
FROM entcom
WHERE 
  YEAR(datcom) = YEAR(NOW()) AND
  MONTH(datcom) = MONTH(NOW()) AND
  DAY(datcom) = DAY(NOW()) AND
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
HAVING SUM(qtecde) < 1000 AND total > 10000;

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
FROM fournis
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
-- The simple way.
SELECT numcom, datcom
FROM entcom
WHERE numfou = (
  SELECT numfou
  FROM entcom
  WHERE numcom = 70210
);

-- 13.2
-- The recursive way.
WITH RECURSIVE foucde AS (
  SELECT *
  FROM entcom
  WHERE numcom = 70210
  UNION
  SELECT cde.*
  FROM entcom AS cde
  JOIN foucde AS fou ON fou.numfou = cde.numfou
)
SELECT numcom, datcom
FROM foucde

-- 14
-- Articles les moins chers que le moins cher des rubans.
-- Libellé et prix.
SELECT libart, prix1
FROM produit
JOIN vente ON produit.codart = vente.codart
GROUP BY codart
HAVING prix1 < (
  SELECT MIN(prix1)
  FROM vente
  WHERE codart LIKE 'R%'
)

-- 16
-- Fournisseurs produits dont stock <= 150% stock d'alerte.
-- Tri par founisseur et produit.
SELECT DISTINCT nomfou, libart
FROM produit
JOIN ligcom ON produit.codart = ligcom.codart
JOIN entcom ON ligcom.numcom = entcom.numcom
JOIN fournis ON entcom.numfou = fournis.numfou
WHERE stkphy <= (stkale * 1.5)
ORDER BY nomfou, libart;

-- 17
-- Total des stocks par fournisseur.
-- Ordre décroissant.
SELECT DISTINCT nomfou, libart, stkphy
FROM produit
JOIN ligcom ON produit.codart = ligcom.codart
JOIN entcom ON ligcom.numcom = entcom.numcom
JOIN fournis ON entcom.numfou = fournis.numfou
ORDER BY nomfou, stkphy DESC;

-- 18
-- Produits dont la quantité commandée dépasse 90% de la quantité annuelle prévue.
SELECT libart, SUM(qtecde) as qte, qteann
FROM produit
JOIN ligcom ON produit.codart = ligcom.codart
GROUP BY ligcom.codart
HAVING qte > (qteann * 0.9);

-- 19
-- Chiffre d'affaire par fournisseur pour l'année 2018 (TVA = 20%).
--
-- Les seules dates disponibles sont les dates des commandes faites aux fournisseurs (datcom)
-- dans la table entcom et les dates de dernières livraisons (derliv) dans la table ligcom.
-- La table ligcom contient le détail des commandes faites aux fournisseurs.
-- A quoi sert la table vente ???
-- Il n'y a, à mon sens, aucun moyen de calculer un chiffre d'affaire annuel pour la
-- société Papyrus avec les données dont nous disposons.
-- Cependant il est possible de calculer ce que la société a dépensé en 2018 par fournisseur :
SELECT nomfou, SUM(qtecde * priuni * 1.20) as ca
FROM fournis
JOIN entcom ON fournis.numfou = entcom.numfou
JOIN ligcom ON entcom.numcom = ligcom.numcom
WHERE YEAR(datcom) = 2018
GROUP BY nomfou
-- Nous obtenons :
-- +-----------+-------------+
-- | nomfou    | ca          |
-- +-----------+-------------+
-- | GROBRIGAN | 43281600.00 |
-- +-----------+-------------+
-- Et dans ce cas, le montant calculé est égal au chiffre d'affaire dégagé par les fournisseurs
-- grâce à leur client Papyrus...
