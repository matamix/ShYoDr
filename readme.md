# ShareYourDreams - a MicroBlogging project

## ***Description du projet :***

<div style="text-align: justify">
Ce projet à pour but, au sein d'une entreprise, de permettre aux collaborateurs de partager leurs expériences de voyage. Ils peuvent partager des photos, des textes ainsi que des vidéos sur la plateforme. Un utilisateur souhaitant uniquement visionner les expériences partagées peut effectuer une recherche par continent, par pays ou bien par date d'ajout de l'article sur le site de microblogging.

## ***Get started :***

### **IDE**

*La plateforme est modulable à souhait, et n'importe quel logiciel de traitement de texte fera l'affaire. S'agissant principalement d'HTML/CSS, un compilateur n'est pas nécessaire. Parmi eux, quelques exemples :*

- [Notepad++](https://notepad-plus-plus.org/)
- [SublimeText](https://www.sublimetext.com/)
- [Visual Studio Code](https://code.visualstudio.com/)

### **Récupération**

Afin de pouvoir vous servir de la plateforme de MicroBlogging, vous devez la récupérer via notre dépot.

[**Lien vers notre dépot GIT**](https://github.com/matamix/ShYoDr)

Une fois sur notre dépot, vous pouvez le cloner via des outils comme GitBash ou autre, afin de pouvoir récupérer sur votre machine physique. 

```
> $ git clone https://github.com/matamix/ShYoDr

Cloning into 'ShYoDr'...
remote: Enumerating objects: 389, done.
remote: Counting objects: 100% (389/389), done.
remote: Compressing objects: 100% (297/297), done.
remote: Total 389 (delta 66), reused 382 (delta 59), pack-reused 0
Receiving objects: 100% (389/389), 2.11 MiB | 2.72 MiB/s, done.
Resolving deltas: 100% (66/66), done.
```

Une fois récupéré, vous pouvez commencer à utiliser ou bien à développer la plateforme.

> *Dans le fichier dossier SQLScripts préalablement récupéré, vous pouvez importer le script de création de base ainsi que le script d'insertions du jeux de données dans votre base PHPMyAdmin. Si vous n'avez pas de base de données, vous pouvez continuer de suivre ce tutoriel.*

Afin de mettre en place un serveur Web sur votre machine, vous pouvez utiliser un logiciel de type WAMP (LAMP pour Linux). Parmis eux, on compte les plus connus :

- [WAMPServer](http://www.wampserver.com/) 
- [EasyPHP](https://www.easyphp.org/)
- [UwAMP](https://www.uwamp.com/fr/)

Veuillez suivre les indications d'installation prévues dans la doc de chaque éditeur trouvable sur les liens ci-dessus.

> *Vous pouvez également vous réferer au tutoriel de notre partenaire "developpez.com" qui vous expliquera en détails comment installer et configurer un serveur web (WAMPServer). [Suivre ce lien](https://alcatiz.developpez.com/tutoriel/installer-wamp-windows10/)*

### **Arborescence du projet**

Vous trouverez ci-dessous l'arborescence du projet :

- assets
    - css
    - images
    - js
    - lib
    - scss
- php
    - inc
- sql
- sqlscripts

***Les fichiers ont été omis pour une question de lisibilité.***

## ***Extension/Personnalisation***

Si vous souhaitez ajouter une page afin d'agrémenter la plateforme, vous devez impérativement penser à modifier la base de données en fonction des modifications apportées à la plateforme.

Si vous souhaitez rajouter une page, vous devez également l'ajouter dans le menu.

La plateforme été conçue de manière à ce que chaque fonctionnalité soit indépendante. Si vous voulez rajouter une fonctionnalité, vous devrez donc créer une nouvelle page et ce, autant de fois que nécessaire.


## ***Crédits***

### ***Artwork***

La majorité des images présentes sur la plateforme ont été générées par le framework [Bootstrap](https://getbootstrap.com/).

Pour les images restantes, elles ont été pensées et crées par Anselme GRAFFIN. 

### ***Contributeurs***

- Yann HARY
- Anselme GRAFFIN
- Matthieu LEON


*© ShareYourDreams - 2019*
</div>