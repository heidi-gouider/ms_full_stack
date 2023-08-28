----------------
-- Jointures (récupérer des données dans des tables reliées par une table commune)
------------

-- Rechercher le prénom des employés et le numéro de la région de leur département :
SELECT employe.nom, dept.noregion FROM employe INNER JOIN dept ON employe.nodep = dept.nodept;

-- Rechercher le numéro du département, le nom du département, le nom des employés classés par numéro de département
-- (renommer les tables utilisées) :
SELECT  dept.nodept, dept.nom as 'services', employe.nom as 'nom employe' FROM dept INNER JOIN employe ON dept.nodept = employe.nodep;
-- je vais utiliser GROUP_CONCAT(employe.nom) pour concaténer les noms des employés (ils seront séparés par une virgule par défault). 
SELECT dept.nodept, dept.nom AS 'services', GROUP_CONCAT(employe.nom) AS 'employes' FROM dept INNER JOIN employe ON dept.nodept = employe.nodep
-- ensuite je regroupe les informations en fonction des départements
GROUP BY dept.nodept, dept.nom;

-- Rechercher le nom des employés du département Distribution :
SELECT employe.nom as ' nom employés service Distribution' FROM employe INNER JOIN dept ON employe.nodep = dept.nodept WHERE  dept.nom = 'distribution';

----------------
-- Auto-jointures
-----------------

-- Rechercher le nom et le salaire des employés qui gagnent plus que leur patron, et le nom et le salaire de leur patron :
-- J'utilise les alias 'e' et 'p' pour différencier les références employé et patrons dans la table principale employe
-- 
SELECT e.nom 'nom employé', e.salaire 'salaire employé', p.nom 'nom patron', p.salaire 'salaire patron' FROM employe e JOIN employe p ON e.nosup = p.noemp WHERE e.salaire > p.salaire;
-- à première vu je peux ici utiliser inner join ou left outer join et le résultat reste le même, je ne comprends pas bien pourquoi...

-----------------
-- Sous-requêtes
-------------
-- ATTENTION '='retourne un seul resultat et 'in' pour plusieurs résultat

-- Rechercher le nom et le titre des employés qui ont le même titre que Amartakaldire :
-- trouver deux manières d'écrire la requête
-- après test ici le signe '=' fonctionne au même titre que '= any' et 'in'
SELECT nom,titre FROM employe  WHERE titre = (SELECT titre FROM employe WHERE nom = 'amartakaldire');

-- Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus qu'un seul employé du département 31,
-- classés par numéro de département et salaire :
-- !! Attention à ne pas oublier la clause any car s'il y a plusieurs champs cela renverra une erreur
SELECT nom,salaire,nodep FROM employe WHERE salaire > ANY (SELECT salaire FROM employe WHERE nodep = 31)ORDER BY nodep,salaire;

-- Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus que tous les employés du département 31,
-- classés par numéro de département et salaire :
SELECT nom,salaire,nodep FROM employe WHERE salaire > ALL (SELECT salaire FROM employe WHERE nodep = 31)ORDER BY nodep,salaire;

-- Rechercher le nom et le titre des employés du service 31 qui ont un titre que l'on trouve dans le département 32 :
SELECT nom,titre FROM employe WHERE nodep = 31 AND titre IN (SELECT titre FROM employe WHERE nodep = 32);

--Rechercher le nom et le titre des employés du service 31 qui ont un titre l'on ne trouve pas dans le département 32 :
SELECT nom,titre FROM employe WHERE nodep = 31 AND titre NOT IN (SELECT titre FROM employe WHERE nodep = 32);

-- Rechercher le nom, le titre et le salaire des employés qui ont le même titre et le même salaire que Fairant :
-- voir avec 'HAVING'
--SELECT nom,titre,salaire FROM employe WHERE salaire AND titre = (SELECT titre,salaire FROM employe WHERE nom = 'Fairant');





















