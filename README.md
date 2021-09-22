# How to use with git

Si je veux récupérer ce projet :
- Je clone : `git clone https://github.com/2alheure/symfony_dwwm11.git`
- Je me rends dans le dossier cloné avec mon terminal
- Je télécharge les vendor : `composer install`
- Je modifie le fichier `.env` (ou je crée un fichier `.env.local` pour y mettre **mes** valeurs)
- Je crée la BDD : `php bin/console doctrine:database:create`
- Je crée les tables : `php bin/console doctrine:migrations:migrate`
  
  
Tout est bon !