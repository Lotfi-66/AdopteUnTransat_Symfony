# Projet Transat

Ce document décrit les étapes pour installer et configurer le projet Transat.

## Prérequis

- Docker
- Docker Compose

## Installation

1. **Démarrer les conteneurs Docker**

   Exécutez la commande suivante pour lancer les conteneurs en arrière-plan :

   ```bash
   docker-compose up -d
## Facultatif
2. **Créer un projet Symfony**

   À l'intérieur du conteneur phptransat, créez un nouveau projet Symfony :
   ```bash
   docker exec -it phptransat composer create-project symfony/skeleton ./
   ```

3. **Installer les bundles nécessaires**

    Installez les bundles requis pour le projet :

    ```bash
    docker exec -it phptransat composer req twig symfony/orm-pack symfony/asset symfony/serializer symfony/security-bundle
    ```

4. **Installer les bundles de développement**

    Ajoutez les bundles utiles pour le développement :

    ```bash
    docker exec -it phptransat composer req --dev symfony/maker-bundle doctrine/doctrine-fixtures-bundle symfony/profiler-pack
    ```

5. **Installer le bundle MongoDB ODM**

    Si vous utilisez MongoDB, installez le bundle correspondant :

    ```bash
    docker exec -it phpvideo composer req doctrine/mongodb-odm-bundle
    ```

6. **Résolution des problèmes de permissions**

    Si vous rencontrez des problèmes de permissions, exécutez la commande suivante pour ajuster les droits d'accès :

    ```bash
    sudo chmod -R 777 ./
    ```