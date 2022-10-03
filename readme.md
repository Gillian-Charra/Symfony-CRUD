faire son .env
demarrer wamp
dégainer son terminal et y placer les commandes suivantes à la suite
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migration:migrate 

symfony server:start(si ca marche pas server:stop puis server:start)