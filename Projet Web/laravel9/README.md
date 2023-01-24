## Projet YOWL:

### Objectifs:

   Ce projet a pour but de créer un site web du meme type que REDIT. Il est basé sur une partie frontend en HTML 5, CSS et
   JavaScript. La partie Backend est développée en PHP. Le principe est que chaque utilisateur eregistré peut poster des posts,
   en commenter ou en liker. 

 ### Environnement de developpement:

  Ce projet peut être utilisé dans des environnements divers, étant une interface web, il est utilisable sous tout systeme 
   d'exploitation utilisant php.
  Pile logicielle requise pour le fonctionnement du projet:
   #### -composer (https://getcomposer.org/download/)
   #### -nodeJs et npm (https://nodejs.org/en/download/)
  Apres git clone, il est necessaire de lancer les commandes suivantes, afin de réinstaller toute les dépendances:
   #### -dans le dosser Laravel9: 
            
  ```
  composer install
  ```
        
  #### -dans le dossier Yowl: 
   
   ```
   npm run build
   ```
   
   Pour lancer les serveurs de developpement, lancer les commandes suivantes: 
   #### -dans le dossier Laravel9: 
    
   ```
   php artisan serve
   ```
   
   -dans le dossier Yowl: 
   
   ```
   npm run dev
   ```
   
 #### Les tests unitaires sont réalisés en utilisant la commande suivante dans le dossier laravel9:
 
 ```
 php artisan test
 ```
   
 #### Ce projet a principalement été testé avec firefox et google chrome. 
 #### Pour toute modification, il est FORTEMENT recommendé d'utiliser au minimum php 7.
 
 Le site est accessible en local a l'adresse donnée par VITE.
 La documentation de l'API est ccessible en local a l'adresse: http://localhost:8000/api/documentation

### Technologies utilisées:

  La partie front du projet a été développée avec VueJS 3 (https://vuejs.org/), et la partie back avec Laravel 9
  (https://laravel.com/). Pour plus d'nformations sur ces techologies, nous vous renvoyons à leurs documenttions respectives. 
  Laravel a surtout servi à développer une API, et est donc couplé à une base de donnée SQL.

Contributeurs:

   Ce projet a été développé en collaboration par: Alexandre DUBUS, Michal .... , Robin ROBILLIARD et Guillaume ROUCHEUX. Il s'agit d'un projet Open source sous Licence MIT.
    




