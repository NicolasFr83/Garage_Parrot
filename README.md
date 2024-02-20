# Garage_Parrot

Le garage Parrot est un garage situé à Toulouse, ouvert depuis 2021 par Mr Vincent Parrot , 
Le garage propose un service réparation, entretien, carrosserie et meme un parc de vente
de voitures exclusivement importé des Etats-Unis.
Le site internet , permet de voir les services proposés par le garage , parc de voitures
à vendre, le sevice réparation, des formumaires pour prendre contact avec le garage pour un rdv, 
formulaires pré rempli par voitures a vendre,
et une page opinions avec des avis clients.



Avoir sur son ordinateur :

    composer
    PHP 8
    symfony CLI (possibilité de l'installé en local grâce à Scoop)
    npm
    serveur local

Installation

Pour installer le projet, tapez les commandes ci-dessous dans votre terminal :

    git clone (permet d'importer le projet sur votre ordinateur).
    php bin/console check:requirements (afin de vérifier que vous êtes prêt à importer le projet) .
    composer install (afin d'installer toutes les dépendances liées au projet).
    npm install (afin de pouvoir utiliser webpack encore).
    Renseigner une base de données dans le .env (afin de pouvoir récupérer les données).
    php bin/console doctrine:create:database (afin de créer votre base de données).
    php bin/console doctrine:migration:migrate (afin de récupérer les données du projet).
    php bin/console doctrine:fixtures:load (afin d'importer les fixtures du projets au sein de votre base de données).

Lancement du server

Pour lancer le server local, tapez dans votre terminal :

    symfony server:start ou symfony serve -d Vous pouvez maintenant vous rendre sur le lien renseigné afin d'avoir accès au projet en ligne. (Pensez à bien démarrer Apache et MySql via le panel de configuration en amont).
    Puis lancer npm via la commande npm run watch.
    
Pour arrêter le server local, tapez dans votre terminal :

    symfony server:stop

Lancement des tests

Pour lancer les tests, tapez dans votre terminal :

    php bin/phpunit --testdox (ajoutez --testdox afin d'avoir un rendu plus explicite).

Comment consulter le site en ligne

https://garage-parrot.store
