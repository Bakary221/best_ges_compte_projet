# BestGesComptes - Application de Gestion Comptes

Application Laravel pour la gestion des comptes bancaires avec système de clients et administrateurs.

## 🚀 Déploiement sur Render

### Prérequis
- Compte Render (https://render.com)
- Repository GitHub avec le code source

### Étapes de déploiement

#### 1. Préparation du projet
```bash
# Générer une clé d'application
php artisan key:generate

# Créer le fichier .env pour la production
cp .env.example .env.production
# Modifier les variables d'environnement pour la production
```

#### 2. Configuration Render
1. Connectez-vous à votre compte Render
2. Cliquez sur "New +" et sélectionnez "Blueprint"
3. Connectez votre repository GitHub
4. Render détectera automatiquement le fichier `render.yaml`

#### 3. Configuration de la base de données
Render créera automatiquement une base de données PostgreSQL. Les variables d'environnement seront automatiquement configurées via le fichier `render.yaml`.

#### 4. Variables d'environnement à configurer manuellement (si nécessaire)
Dans le dashboard Render, allez dans Environment et ajoutez :
- `APP_KEY` : La clé générée avec `php artisan key:generate`
- `APP_ENV=production`
- `APP_DEBUG=false`

#### 5. Déploiement
1. Cliquez sur "Create Blueprint"
2. Render construira et déploiera automatiquement :
   - L'application web
   - La base de données PostgreSQL
3. Attendez que le déploiement soit terminé (environ 5-10 minutes)

#### 6. Migration et seeding de la base de données
Après le premier déploiement, exécutez les migrations :
```bash
# Via SSH dans le conteneur Render ou via le dashboard
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
