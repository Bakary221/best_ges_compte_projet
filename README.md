# BestGesComptes - Application de Gestion Comptes

Application Laravel pour la gestion des comptes bancaires avec système de clients et administrateurs.

## 🚂 Déploiement sur Railway (Recommandé - Plus simple)

### Prérequis
- Compte Railway (https://railway.app)
- Repository GitHub avec le code source

### Étapes de déploiement

#### 1. Préparation du projet
Le projet est déjà configuré avec un fichier `railway.json` pour un déploiement automatisé.

#### 2. Configuration Railway
1. Connectez-vous à votre compte Railway
2. Cliquez sur "New Project"
3. Sélectionnez "Deploy from GitHub repo"
4. Connectez votre repository GitHub
5. Railway détectera automatiquement la configuration

#### 3. Ajout de la base de données
1. Dans votre projet Railway, cliquez sur "Add Plugin"
2. Sélectionnez "PostgreSQL"
3. Railway créera automatiquement une base de données PostgreSQL

#### 4. Variables d'environnement
Dans les variables d'environnement de votre projet Railway, ajoutez :
```
APP_NAME=BestGesComptes
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:votre-cle-generee
DB_CONNECTION=postgresql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_DATABASE=${{Postgres.PGDATABASE}}
DB_USERNAME=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
```

#### 5. Déploiement
1. Cliquez sur "Deploy"
2. Railway construira et déploiera automatiquement votre application
3. Les migrations seront exécutées automatiquement lors du premier déploiement

#### 6. Migration manuelle (si nécessaire)
Si les migrations n'ont pas été exécutées automatiquement :
```bash
# Via le terminal Railway ou après déploiement
php artisan migrate --force
php artisan db:seed --force
```

#### 7. Vérification
Votre application sera accessible à l'URL fournie par Railway (ex: `https://best-ges-comptes.up.railway.app`)

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
├── railway.json
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
