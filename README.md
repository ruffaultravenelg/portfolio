# Portfolio Personnel

Ce projet est mon portfolio professionnel développé avec **Symfony**.

**Lien du site :** [https://gemino.dev](https://gemino.dev)

## Technologies utilisées

* **Backend :** Symfony, EasyAdmin
* **Base de données :** Doctrine ORM & SQLite
* **Assets :** Symfony AssetMapper
* **Frontend :** Twig

## Mise à jour

### 1. Migration de la base de données

Appliquer les changements de structure de la base de données :

```sh
php bin/console doctrine:migrations:migrate --no-interaction
```

### 2. Compilation des assets

```sh
# Via la commande Symfony
php bin/console asset-map:compile

# OU via le script
./asset.sh
```

### 3. Nettoyage du cache

Vider et réchauffer le cache (avec l'utilisateur `www-data` pour éviter les problèmes de permissions) :

```sh
# Commande Symfony
sudo -u www-data php bin/console cache:clear

# OU via le script
./cache.sh
```