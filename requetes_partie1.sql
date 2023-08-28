-- SELECT
-----------

-- Afficher le nom, la date d'embauche, le numéro du supérieur, le numéro de département et le salaire de tous les employés :
 SELECT nom,dateemb,nosup,nodep,salaire FROM employe; 

---------------
-- Suppression des doublons
------------------
-- la différence des deux énoncés n'est pas très claires
-- Afficher le titre de tous les employés :
SELECT nom,titre FROM employe;

-- Afficher les différentes valeurs des titres des employés :
SELECT DISTINCT titre FROM employe;

-----------------
-- Restrictions
---------------

-- Afficher le nom, le numéro d'employé et le numéro du département des employés dont le titre est « Secrétaire » :
SELECT nom,noemp,nodep FROM employe WHERE titre = 'secrétaire';

-- Afficher le nom et le numéro de département dont le numéro de département est supérieur à 40 :
SELECT nom,nodep FROM employe WHERE nodep > 40;

-------------------
-- Restriction en comparant les colonnes entre elles
---------------------------

-- Afficher le nom et le prénom des employés dont le nom est alphabétiquement antérieur au prénom :
SELECT nom,prenom FROM employe WHERE nom < prenom;

-- Afficher le nom, le salaire et le numéro du département des employés dont le titre est « Représentant », le numéro de département est 35
-- et le salaire est supérieur à 20000 :
SELECT nom,salaire,nodep FROM employe WHERE titre = 'représentant' AND nodep = 35 AND salaire > 20000;

-- Afficher le nom, le titre et le salaire des employés dont le titre est « Représentant » ou dont le titre est « Président » :
SELECT nom,titre,salaire FROM employe WHERE titre = 'représentant' OR titre = 'président';

-- Afficher le nom, le titre, le numéro de département, le salaire des employés du département 34, dont le titre est « Représentant »
-- ou « Secrétaire » :
SELECT nom,titre,nodep,salaire FROM employe WHERE nodep = 34 AND (titre = 'représentant' OR titre = 'secrétaire');

-- Afficher le nom, le titre, le numéro de département, le salaire des employés dont le titre est Représentant,
-- ou dont le titre est Secrétaire dans le département numéro 34 :
SELECT nom,titre,nodep,salaire FROM employe WHERE titre = 'représentant' OR (titre = 'secrétaire' AND nodep = 34);

-- Afficher le nom, et le salaire des employés dont le salaire est compris entre 20000 et 30000 :
SELECT nom,salaire FROM employe WHERE salaire BETWEEN 20000 AND 30000;

------------
-- Négation, recherche approchée
--------------------

-- Afficher le nom des employés commençant par la lettre « H » :
SELECT nom FROM employe WHERE nom LIKE 'H%';

-- Afficher le nom des employés se terminant par la lettre « n » :
SELECT nom FROM employe WHERE nom LIKE '%n';

-- Afficher le nom des employés contenant la lettre « u » en 3ème position :
SELECT nom FROM employe WHERE nom LIKE '%--n%';

-- Afficher le salaire et le nom des employés du service 41 classés par salaire croissant :
SELECT salaire,nom FROM employe WHERE nodep = 41 ORDER BY salaire;

-- Afficher le salaire et le nom des employés du service 41 classés par salaire décroissant :
SELECT salaire,nom FROM employe WHERE nodep = 41 ORDER BY salaire DESC;

-- Afficher le titre, le salaire et le nom des employés classés par titre croissant et par salaire décroissant :
SELECT titre,salaire,nom FROM employe ORDER BY titre ASC, salaire DESC;

----------------
-- Valeurs non renseignées
-----------------------

-- Afficher le taux de commission, le salaire et le nom des employés classés par taux de commission croissante :
SELECT tauxcom,salaire,nom FROM employe WHERE tauxcom is NOT NULL ORDER BY tauxcom;

-- Afficher le nom, le salaire, le taux de commission et le titre des employés dont le taux de commission n'est pas renseigné :
SELECT nom,salaire,tauxcom,titre FROM employe WHERE tauxcom is NULL;

-- Afficher le nom, le salaire, le taux de commission et le titre des employés dont le taux de commission est renseigné :
SELECT nom,salaire,tauxcom,titre FROM employe WHERE tauxcom is NOT NULL;

-- Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est inférieur à 15 :
SELECT nom,salaire,tauxcom,titre FROM employe WHERE tauxcom is NOT NULL AND tauxcom < 15;

-- Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est supérieur à 15 :
SELECT nom,salaire,tauxcom,titre FROM employe WHERE tauxcom is NOT NULL AND tauxcom > 15;

-----------------
-- Expressions arithmétiques
-------------------

-- Afficher le nom, le salaire, le taux de commission et la commission des employés dont le taux de commission n'est pas nul.
-- (la commission est calculée en multipliant le salaire par le taux de commission) :
SELECT nom,salaire,tauxcom,salaire * tauxcom AS com FROM employe WHERE tauxcom is NOT NULL;

-- Afficher le nom, le salaire, le taux de commission, la commission des employés dont le taux de commission n'est pas nul,
-- classé par taux de commission croissant :
SELECT nom,salaire,tauxcom,salaire * tauxcom AS com FROM employe WHERE tauxcom is NOT NULL ORDER BY tauxcom;

----------------
-- Concaténation avec la fonction CONTACT()
--------------

-- Afficher le nom et le prénom (concaténés) des employés. Renommer les colonnes :
SELECT noemp,CONCAT(nom, ' ', prenom) AS nom_prenom FROM employe;

-----------
-- Chaînes de caractères avec les fonctions SUBSTRING(), LOCATE(), UPPER(), LOWER() et LENGTH() :
------------

-- Afficher les 5 premières lettres du nom des employés :
SELECT SUBSTRING(nom,1,5) FROM employe;

-- Afficher le nom et le rang de la lettre « r » dans le nom des employés : (locate(sous-chaine, chaine)
SELECT nom, LOCATE('r',nom) AS rang_r FROM employe;

-- Afficher le nom, le nom en majuscule et le nom en minuscule de l'employé dont le nom est Vrante :
SELECT nom, UPPER(nom), LOWER(nom) FROM employe WHERE nom = 'vrante';

-- Afficher le nom et le nombre de caractères du nom des employés :
SELECT nom, length(nom) FROM employe;






