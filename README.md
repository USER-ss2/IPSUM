# 🛠️ Gestion des Incidents Réseaux

Application web développée avec **Laravel** permettant de gérer, consulter et suivre les incidents réseaux.
L'application permet notamment de gérer les utilisateurs, les incidents et leurs différentes informations : état, phase, catégorie, région, domaine, groupe d'affectation, solution, etc.

## 📌 Description

Cette application a pour objectif de centraliser la **gestion des incidents** au sein d'une plateforme web.

Elle permet de :

* 👤 Gérer les utilisateurs
* 🔐 Gérer les profils et les droits d'accès
* 🔎 Consulter les incidents
* 📊 Suivre l'état et la phase des incidents
* 🌍 Filtrer les incidents

---

## 🚀 Technologies utilisées

### Backend

* **PHP**
* **Laravel**
* **Eloquent ORM**
* **Laravel Artisan**

### Base de données

* **MySQL**

### Frontend

* HTML5
* CSS3


---

# ⚙️ Installation

## 1. Cloner le projet

```bash
git clone <URL_DU_REPOSITORY>
```

Puis accéder au dossier :

```bash
cd <NOM_DU_PROJET>
```

---

## 2. Installer les dépendances PHP

```bash
composer install
```

---

## 3. Installer les dépendances JavaScript

```bash
npm install
```

---

## 4. Configurer le fichier `.env`

Créer le fichier `.env` à partir de `.env.example`.

### Windows

```bash
copy .env.example .env
```

### Linux / macOS

```bash
cp .env.example .env
```

---

## 5. Générer la clé Laravel

```bash
php artisan key:generate
```

---

# 🗄️ Configuration de la base de données

Créer une base de données MySQL, par exemple :

```text
incident_management
```

Puis modifier le fichier `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=incident_management
DB_USERNAME=root
DB_PASSWORD=
```

Adapter les valeurs selon votre configuration MySQL.

---

# 🔄 Migrations

Pour créer les tables de la base de données :

```bash
php artisan migrate
```

Pour vérifier l'état des migrations :

```bash
php artisan migrate:status
```

---

## 🧹 Réinitialiser complètement la base

⚠️ Cette commande supprime toutes les tables et toutes leurs données.

```bash
php artisan migrate:fresh
```

Pour recréer les tables et exécuter également les seeders :

```bash
php artisan migrate:fresh --seed
```

---

# 🌱 Seeders

Le projet contient un `DatabaseSeeder` permettant de créer des données de test.

Pour exécuter les seeders :

```bash
php artisan db:seed
```

Ou :

```bash
php artisan migrate:fresh --seed
```

Le seeder peut notamment créer :

* un utilisateur administrateur ;
* des incidents de test.

### Exemple de compte administrateur

```text
Email    : admin@example.com
Password : Admin123!
Profil   : admin
```

> ⚠️ Ces identifiants sont destinés uniquement au développement et doivent être modifiés dans un environnement réel.

---


---

# ▶️ Lancer l'application

##  Démarrer Laravel

Dans un terminal :

```bash
php artisan serve
```

L'application sera généralement accessible à :

```text
http://127.0.0.1:8000
```

---

# 🚀 Démarrage rapide

Après avoir cloné le projet, les commandes principales sont :

```bash
cd <NOM_DU_PROJET>

composer install

copy .env.example .env

php artisan migrate

php artisan migrate:fresh --seed

npm run dev
```

Dans un autre terminal :

```bash
php artisan serve
```

Puis ouvrir :

```text
http://127.0.0.1:8000
```





### Créer un seeder



Exécuter :

```bash
composer install
```

---

## Erreur concernant `.env`

Vérifier que le fichier `.env` existe :

```bash
copy .env.example .env
```

Puis :

```bash
php artisan key:generate
```

---

## Erreur de connexion MySQL

Vérifier dans `.env` :

```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=incident_management
DB_USERNAME=root
DB_PASSWORD=
```

Puis nettoyer la configuration :

```bash
php artisan config:clear
```

---

## Erreur après modification de la migration

En environnement de développement :

```bash
php artisan migrate:fresh --seed
```

⚠️ Cette commande supprime les données existantes.

---

# 👩‍💻 Développement

Pour travailler sur le projet, lancer le terminal:

### Terminal  — Laravel

```bash
php artisan serve
```
