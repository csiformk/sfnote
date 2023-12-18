# Symfony Note App

- Copy **.env** en **.env.local**
- Utilisation d'une base de donnée sqlite nommée **note.db**
- Création de la base de donnée ` symfony console doctrine:database:create`
- Création d'une entité **Note** avec les champs : **title,content** `symfony console make:entity`
- Création d'une entité **Category** avec le champ : **libelle**
- On effectue une migration : `symfony.exe console make:migration`
- Ensuite migrate : `symfony.exe console doctrine:migrations:migrate`
- Installation du **bundle** pour les **fixtures** : `composer require --dev orm-fixtures`
- Installation de **Faker** : `composer require fakerphp/faker`