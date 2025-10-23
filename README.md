# BestGesComptes - Application de Gestion Comptes

Application Laravel pour la gestion des comptes bancaires avec système de clients et administrateurs.

## 🚀 Déploiement sur Render (avec PostgreSQL)

### Prérequis
- Compte Render (https://render.com)
- Repository GitHub avec le code source

### Étapes de déploiement (avec PostgreSQL managé)

#### 1. Préparation du projet
```bash
# Générer une clé d'application
php artisan key:generate

# Le fichier .env sera configuré automatiquement sur Render
# avec les variables d'environnement PostgreSQL
```

#### 2. Configuration Render
1. Connectez-vous à votre compte Render
2. Cliquez sur "New +" et sélectionnez "Web Service"
3. Connectez votre repository GitHub
4. **Ajoutez d'abord une base de données PostgreSQL** :
   - New → PostgreSQL
   - Nommez-la (ex: `bestgescomptes-db`)
   - Notez les credentials générés automatiquement
5. **Créez le Web Service** :
   - **Runtime** : PHP
   - **Build Command** : `composer install --optimize-autoloader --no-dev && npm install && npm run build`
   - **Start Command** : `php artisan serve --host=0.0.0.0 --port=$PORT`

#### 3. Variables d'environnement
Dans l'onglet "Environment", ajoutez ces variables :
```
APP_NAME=BestGesComptes
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:T1zRTyvj4S8VP9rHiGGmAHjS+XiFDxWv74BRCdSHk0g=
DB_CONNECTION=postgresql
DB_HOST=/var/run/render/postgresql
DB_PORT=5432
DB_DATABASE=bestgescomptes
DB_USERNAME=bestgescomptes_user
DB_PASSWORD=votre_mot_de_passe_postgresql
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
```

#### 4. Déploiement
1. Cliquez sur "Create Web Service"
2. Render construira et déploiera automatiquement votre application
3. Les migrations et seeders seront exécutés automatiquement lors du premier déploiement
4. Attendez que le déploiement soit terminé (environ 5-10 minutes)

#### 5. Vérification
Votre application sera accessible à l'URL fournie par Render (ex: `https://best-ges-comptes.onrender.com`)

#### 6. Migration manuelle (si nécessaire)
Si les migrations n'ont pas été exécutées automatiquement, vous pouvez les lancer via le Shell Render :
```bash
php artisan migrate --force
php artisan db:seed --force
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
├── Dockerfile
├── docker-compose.yml
├── render.yaml
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
