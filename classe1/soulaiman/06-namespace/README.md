# Exercice 06

## Installation

- Installez la base de donnée et ses tables et datas `06-namespace/datas/testoo_2_structure_and_datas.sql`
- Vérifiez son fonctionnement dans `Apache` depuis le dossier `public`

## Demande

### Depuis ArticleManager.php

**Et dans les vues et controllers**

- Créez la suppression d'`article`, avec un message de confirmation
- Créez la page d'update de l'`article`, avec un formulaire qui est vérifié avec les setters de `ArticleMapping`, et qui met bien à jour l'article
- Créez la page d'insertion, qui n'insère qu'un `Article` valide en créant le `slug`
