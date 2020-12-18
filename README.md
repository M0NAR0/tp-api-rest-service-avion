# tp-api-rest-service-avion
API REST Service d'avions pour le tp des webservices

## Étapes (commandes)
- step 1 : ``git clone ``
- step 2 : ``cd tp-api-rest-service-avion``
- step 3 : ``composer install``
- step 4 : créer un fichier .env.local dans le dossier racine et insérer la ligne de code suivante : ``DATABASE_URL="mysql://root:@127.0.0.1:3306/webservice_api_rest?serverVersion=5.7"``
- step 5 : créer une base de données en local avec le nom : webservice_api_rest
- step 6 : ``php bin/console doctrine:migrations:migrate``
- step 7 : ``symfony serve -d --no-tls``
- step 8 : Dans le navigateur se rendre sur http://127.0.0.1:8000/api
