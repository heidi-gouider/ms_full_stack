-- Pour l'instruction insert
-- !! penser à sauvegarder les données avant chaque modifications!!
---------------

-- Ajouter trois employés dans la base de données avec les données de votre choix :
-- ici j'ai modifié la structure de la colonne noemp que j'ai mis en auto-increment
INSERT INTO employe (nom,prenom,dateemb,nosup,titre,nodep,salaire)
VALUES ('griffu','matt','2020-04-10',6,'secrétaire',42,10000),
('cousu','lise','2021-05-20',1,'représentant',32,9000),
('brou','claire','2022-02-11',6,'secrétaire',42,9000);

-- Ajouter un département :
INSERT INTO dept (nodept,nom,noregion)
VALUES (22, 'developpement', 6);

-- Utilisez une requête select pour vérifier l'insertion :

-- Pour l'instruction update
-- !! penser à sauvegarder les données avant chaque modifications!!
----------------

-- Augmenter de 10% le salaire de l'employe 17 :
UPDATE employe set salaire = salaire * 1.1  WHERE noemp = 17;

-- Changer le nom du département 45 en 'Logistique' :
UPDATE dept SET nom = 'logistique' WHERE nodept = 45;

-- Pour l'instruction delete
-- !! penser à sauvegarder les données avant chaque modifications!!
-----------------

-- (comme je n'avais pas changé le nb de ligne limite de la table employe, les 3 employés ajouté ont été ajouté plusieurs fois
-- je vais donc supprimer tous les doublons)
-- je vais utiliser GROUP BY pour regrouper les lignes ayant le même 'nom,prenom'
-- et la clause HAVING COUNT()>1 pour filtrer les doublons(determine combien de fois 'nom,prenom apparait dans la table)
-- (*) est utilisé dans ce contexte pour indiquer que nous comptons tous les enregistrements dans le groupe créé par la clause GROUP BY.
-- puis DELETE pour les supprimer
DELETE FROM employe WHERE (nom,prenom) IN (SELECT nom,prenom FROM employe GROUP BY nom,prenom HAVING COUNT(*) > 1);
-- ici j'ai en fait supprimé toutes les lignes en doublons, donc j'ai supprimé tous les employés que j'avait ajouté ...
-- ce n'est donc pas la bonne méthode

-- Supprimer le dernier des employés que vous avez insérés précédemment :
-- ma clée primaire est en auto-increment donc le dernier emplyé aura le noemp le plus grand
DELETE FROM employe WHERE noemp = (SELECT MAX(noemp) FROM employe);




















