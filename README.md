# BestGesComptes - Application de Gestion Comptes

Application Laravel pour la gestion des comptes bancaires avec système de clients et administrateurs.

## 🚀 Déploiement gratuit sur Render (avec Docker et PostgreSQL)

### Prérequis
- Compte Render gratuit (https://render.com)
- Repository GitHub avec le code source

### Étapes de déploiement gratuit

#### 1. Préparation du projet
Le projet est déjà configuré avec Docker pour un déploiement facile et gratuit.

#### 2. Configuration Render
1. Connectez-vous à votre compte Render gratuit
2. **Créez d'abord la base de données PostgreSQL gratuite** :
   - Cliquez sur "New +" → "PostgreSQL"
   - Nommez-la (ex: `bestgescomptes-db`)
   - **Choisissez le plan gratuit** (0$ par mois)
   - Notez les credentials générés automatiquement
3. **Créez le Web Service gratuit** :
   - Cliquez sur "New +" → "Web Service"
   - Connectez votre repository GitHub
   - **Runtime** : Docker
   - **Region** : Choisissez une région proche (ex: Frankfurt)
   - **Instance Type** : Free (750 heures/mois gratuites)

#### 3. Configuration du service
- **Build Command** : `docker build -t best-ges-comptes .`
- **Start Command** : `docker run -p $PORT:80 best-ges-comptes`

#### 4. Variables d'environnement
Dans l'onglet "Environment" du Web Service, ajoutez ces variables :
```
APP_NAME=BestGesComptes
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app-name.onrender.com
DB_CONNECTION=pgsql
DB_HOST=votre-host-postgresql
DB_PORT=5432
DB_DATABASE=votre-database-name
DB_USERNAME=votre-username
DB_PASSWORD=votre-password
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
```

*Remplacez les valeurs DB_* par celles fournies par votre base PostgreSQL Render gratuite*

#### 5. Déploiement automatique
1. Cliquez sur "Create Web Service"
2. Render construira automatiquement votre image Docker
3. Le déploiement se lance automatiquement
4. Attendez que le déploiement soit terminé (environ 5-10 minutes)

#### 6. Migration de la base de données
Une fois déployé, exécutez les migrations via le Shell Render :
```bash
# Dans le Shell de votre Web Service (onglet Shell)
php artisan migrate --force
php artisan db:seed --force
php artisan key:generate
```

#### 7. Vérification
Votre application sera accessible gratuitement à l'URL fournie par Render (ex: `https://best-ges-comptes.onrender.com`)

### 💡 Avantages du déploiement gratuit
- **750 heures gratuites par mois** pour le Web Service
- **Base PostgreSQL gratuite** (avec limitations de stockage)
- **Déploiement automatique** depuis GitHub
- **SSL automatique** inclus
- **Pas de carte de crédit requise** pour commencer

### ⚠️ Limitations du plan gratuit
- Application en sommeil après 15 minutes d'inactivité
- 750 heures/mois pour le Web Service
- Stockage limité pour PostgreSQL
- Pour une utilisation en production continue, upgrade vers un plan payant sera nécessaire

## 🐳 Développement local avec Docker

### Prérequis
- Docker
- Docker Compose

### Démarrage
```bash
# Copier le fichier d'environnement
cp .env.example .env

# Construire et démarrer les conteneurs
docker-compose up --build -d

# Attendre que les conteneurs soient prêts
sleep 10

# Exécuter les migrations et seeders
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed --force

# Générer la clé d'application si nécessaire
docker-compose exec app php artisan key:generate

# Vérifier que les conteneurs sont en cours d'exécution
docker-compose ps
```

### Accès à l'application
- Application : http://localhost:8000
- Base de données : localhost:5432 (user: laravel, password: secret)

### Commandes utiles
```bash
# Arrêter les conteneurs
docker-compose down

# Voir les logs
docker-compose logs -f

# Accéder au conteneur de l'application
docker-compose exec app bash

# Accéder au conteneur de la base de données
docker-compose exec db psql -U laravel -d laravel

# Exécuter des commandes Artisan
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed

# Reconstruire les conteneurs après modification du code
docker-compose up --build --force-recreate -d
```

## 🐳 Développement local avec Docker

### Prérequis
- Docker
- Docker Compose

### Démarrage
```bash
# Copier le fichier d'environnement
cp .env.example .env

# Construire et démarrer les conteneurs
docker-compose up --build -d

# Attendre que les conteneurs soient prêts
sleep 10

# Exécuter les migrations et seeders
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed --force

# Générer la clé d'application si nécessaire
docker-compose exec app php artisan key:generate

# Vérifier que les conteneurs sont en cours d'exécution
docker-compose ps
```

### Accès à l'application
- Application : http://localhost:8000
- Base de données : localhost:5432 (user: laravel, password: secret)

### Commandes utiles
```bash
# Arrêter les conteneurs
docker-compose down

# Voir les logs
docker-compose logs -f

# Accéder au conteneur de l'application
docker-compose exec app bash

# Accéder au conteneur de la base de données
docker-compose exec db psql -U laravel -d laravel

# Exécuter des commandes Artisan
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed

# Reconstruire les conteneurs après modification du code
docker-compose up --build --force-recreate -d
```

## 📊 Fonctionnalités

- ✅ Gestion des utilisateurs (UUID)
- ✅ Système de clients avec profession
- ✅ Système d'administrateurs
- ✅ Gestion des comptes bancaires (Épargne/Chèque)
- ✅ Gestion des transactions
- ✅ API RESTful
- ✅ Migrations et seeders
- ✅ Factories pour les tests

## 🛠️ Technologies utilisées

- **Laravel 11** - Framework PHP
- **PostgreSQL** - Base de données
- **Docker** - Conteneurisation
- **Render** - Plateforme de déploiement
- **Composer** - Gestionnaire de dépendances PHP
- **NPM** - Gestionnaire de dépendances JavaScript

## 📁 Structure du projet

```
best-ges-comptes/
├── app/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Client.php
│   │   ├── Admin.php
│   │   ├── CompteBancaire.php
│   │   └── Transaction.php
│   └── Http/Controllers/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── Dockerfile
├── docker-compose.yml
├── render.yaml
├── composer.json
├── package.json
└── README.md
```

## 🔧 Configuration

### Variables d'environnement importantes
```env
APP_NAME=BestGesComptes
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
DB_CONNECTION=pgsql
DB_HOST=your-db-host
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=your-password
```

## 📞 Support

Pour toute question ou problème, veuillez créer une issue dans le repository GitHub.
