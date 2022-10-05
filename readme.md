Modifier le .env pour lui donner votre nom de base de données.

Lancer votre serveur local.

À l'aide de votre terminal installer les dépendance avec les commandes suivantes :

composer install

php bin/console doctrine:database:create

php bin/console doctrine:migration:migrate

symfony server:strart (si problème arrêté votre server en faisant : symfony server:stop puis symfony server:star)

ouvrer votre navigateur puis copier "http://127.0.0.1:8000/heros/"

Amusez-vous :p
