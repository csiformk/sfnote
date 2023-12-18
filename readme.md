# Symfony Note App

- Cloner ce dépôt
- Ensuite installer les dépandances : `composer install` , si vous avez cette erreur ` The openssl extension is required for SSL/TLS protection but is not availab  
  le. If you can not enable the openssl extension, you can disable this error  
  , at your own risk, by setting the 'disable-tls' option to true. ` , tapez ceci dans un  terminal: `composer config -g -- disable-tls true`

- Copy **.env** en **.env.local**
- Utilisation d'une base de donnée sqlite nommée **note.db**
- Création de la base de donnée ` symfony console doctrine:database:create`

- Création d'une entité **Note** avec les champs : **title,content** `symfony console make:entity`
- Création d'une entité **Category** avec le champ : **libelle**
- On effectue une migration : `symfony console make:migration`
- Ensuite migrate : `symfony console doctrine:migrations:migrate`

- Installation du **bundle** pour les **fixtures** : `composer require --dev orm-fixtures`
- Installation de **Faker** : `composer require fakerphp/faker`
- Ajout de classes de fixture : `symfony console make:fixtures`
- On charge les fixtures : `symfony console doctrine:fixtures:load` ou `symfony console doctrine:fixtures:load --append`

- Relation entités : [https://community.mis.temple.edu/mis3506digitaldesignfall2018/files/2018/10/Adam-Alalouf_Cardinality.pdf](https://community.mis.temple.edu/mis3506digitaldesignfall2018/files/2018/10/Adam-Alalouf_Cardinality.pdf)

- Installation de **easyadmin** : `composer require easycorp/easyadmin-bundle`
- Ajout d'un dashboard: `symfony console make:admin:dashboard`
- Création de **crud** par **easyadmin** : `symfony console make:admin:crud`