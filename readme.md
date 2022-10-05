modifier example.env

demarrer son serveur

dégainer son terminal et y placer les commandes suivantes à la suite

composer install

php bin/console doctrine:database:create

php bin/console doctrine:migration:migrate 


symfony server:start(si ca marche pas symfony server:stop puis symfony server:start)

aller sur son navigateur sur la route: adresseServeur/heros
