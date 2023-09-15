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
-- les sous requêtes scalaire revoient une seule valeur (une colonne et une ligne)

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

-- Rechercher le nom, le titre et le salaire des employés qui ont le même titre et le même salaire que Fairent :
-- une comparaison entre plusieurs colonnes de la même table => donc une sou requete et une jointure
SELECT e1.nom,e1.titre,e1.salaire FROM employe e1 INNER JOIN (SELECT titre,salaire FROM employe WHERE nom = 'Fairent')
-- condition de jointure
e2 ON e1.titre = e2.titre AND e1.salaire = e2.salaire ;
-- OU
SELECT nom,titre,salaire FROM employe WHERE titre, salaire = (SELECT titre,salaire FROM employe WHERE nom = 'Fairent');


-------------
-- Requêtes externes
-----------
--LEFT JOIN renvoie tous les enregistrements de la table de gauche et les correspondances de la table de droite, ou des valeurs NULL si aucune correspondance n'est trouvée.
-- Rechercher le numéro de département, le nom du département, le nom des employés, en affichant aussi les départements dans lesquels
-- il n'y a personne, classés par numéro de département :
SELECT d.nodept,d.nom nom_dept ,e.nom employés FROM dept d LEFT JOIN employe e ON d.nodept = e.nodep; 

-------------
-- Utilisation de fonctions de groupe
----------

-- 1. Calculer le nombre d'employés de chaque titre :
SELECT COUNT(nom) nombre_employe,titre FROM employe GROUP BY titre;

-- 2. Calculer la moyenne des salaires et leur somme, par région :
SELECT noregion,AVG(salaire) moyenne_salaire,sum(salaire) somme_salaire FROM employe e JOIN dept d ON e.nodep = d.nodept GROUP BY noregion;

-------------
-- La clause HAVING
-----------------
-- (La clause WHERE permet d'écrire une restriction au niveau ligne,
-- la clause HAVING permet d'écrire une restriction au niveau groupe)

-- 3. Afficher les numéros des départements ayant au moins 3 employés :
SELECT nodep,COUNT(nom) FROM employe GROUP BY nodep HAVING COUNT(nom) >= 3;

-- 4. Afficher les lettres qui sont l'initiale d'au moins trois employés :
-- (j'utilise la fonction LEFT() qui retourne le nb de caractère passé en paramètre des premiers caractère de la chaine)
-- CETTE REQUETE FONCTIONNE AUSSI AVEC substring
SELECT LEFT(nom,1) initiale, COUNT(nom) FROM employe GROUP BY initiale HAVING COUNT(nom) >= 3;
-- si je regroupe pas par initiale la requete ne retourne pas le même résultat... 

-- 5. Rechercher le salaire maximum et le salaire minimum parmi tous les salariés et l'écart entre les deux :
SELECT MAX(salaire) salaire_max,MIN(salaire) salaire_min,MAX(salaire) - MIN(salaire)difference FROM employe;

-- 6. Rechercher le nombre de titres différents :
SELECT COUNT(DISTINCT titre) FROM employe;

-- 7. Pour chaque titre, compter le nombre d'employés possédant ce titre :
SELECT DISTINCT titre,COUNT(nom)FROM employe GROUP BY titre;

-- 8. Pour chaque nom de département, afficher le nom du département et le nombre d'employés :
SELECT DISTINCT d.nom, count(e.nom) FROM dept d INNER JOIN employe e ON d.nodept = e.nodep GROUP BY d.nom;

-- 9. Rechercher les titres et la moyenne des salaires par titre dont la moyenne est supérieure à la moyenne des salaires des Représentants :
SELECT DISTINCT titre, AVG(salaire) FROM employe GROUP BY titre HAVING AVG(salaire)>(SELECT AVG(salaire) FROM employe WHERE titre='représentant');

-- 10.Rechercher le nombre de salaires renseignés et le nombre de taux de commission renseignés :
SELECT COUNT(salaire),COUNT(tauxcom) FROM employe;