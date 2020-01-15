# web-backend
Backend of Futurolan Website

## Installation
Créer le fichier /src/web/sites/default/settings.php à partir du fichier /src/web/sites/default/default.settings.php.

Lancer les dockers  
```
docker-compose up
```

Se rendre dans le docker et lancer l'installation
```
docker exec -u www-data:www-data -it drupal bash
composer install
```

Se rendre sur http://localhost:8080 et lancer l'installation du site avec les identifiants mysql: 
- host: mysql 
- login: drupal
- password: drupal

Dans le docker importer la configuration
```
drush config-set "system.site" uuid "0ef2d244-80fd-4115-8ee4-2b1b674b3366"
drush config-set "language.entity.fr" uuid "7b695c96-fde9-42af-98ab-6e6fcae869f1"
```

*Linux: Si vous avez des problèmes de permissions, vous pouvez les régler avec les acl.*


### Build du container
Vous pouvez modifier autant que vous voulez les config drupal via l'interface drupal pour ensuite builder le container.

Se connecter dans le container et exporter la config  
```
docker exec -u www-data:www-data -it drupal bash
drush cex
```

Commiter les modifications sur github, la mise à jour est automatique après le build du container.





