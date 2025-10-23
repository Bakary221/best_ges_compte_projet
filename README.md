# BestGesComptes - Application de Gestion Comptes

Application Laravel pour la gestion des comptes bancaires avec système de clients et administrateurs.

## 🚀 Déploiement sur Render (avec PostgreSQL)

### Option 1: Déploiement automatique avec render.yaml

#### Prérequis
- Compte Render (https://render.com)
- Repository GitHub avec le code source

#### Étapes de déploiement automatique
1. **Connectez votre repository GitHub à Render**
2. **Sélectionnez "Blueprint" lors de la création d'un nouveau service**
3. **Render détectera automatiquement le fichier `render.yaml`**
4. **Configurez les services** :
   - Service web pour l'application Laravel
   - Service PostgreSQL managé
5. **Déployez** : Render créera automatiquement les services selon la configuration

#### Avantages du déploiement automatique
- ✅ Configuration simplifiée
- ✅ Services interconnectés automatiquement
- ✅ Variables d'environnement configurées automatiquement
- ✅ Migrations exécutées automatiquement

### Option 2: Déploiement manuel (sans render.yaml)

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

### Démarrage rapide
```bash
# Copier le fichier d'environnement
cp .env.example .env

# Construire et démarrer les conteneurs
docker-compose up --build -d

# Vérifier que les conteneurs sont en cours d'exécution
docker-compose ps
```

### Accès aux services
- **Application Laravel** : http://localhost:8000
- **Base de données PostgreSQL** : localhost:5432
  - User: `laravel`
  - Password: `secret`
  - Database: `laravel`

### Commandes Docker utiles
```bash
# Arrêter les conteneurs
docker-compose down

# Voir les logs en temps réel
docker-compose logs -f

# Accéder au conteneur de l'application
docker-compose exec app bash

# Exécuter les migrations dans le conteneur
docker-compose exec app php artisan migrate

# Peupler la base de données
docker-compose exec app php artisan db:seed

# Accéder à la base de données PostgreSQL
docker-compose exec db psql -U laravel -d laravel

# Reconstruire l'image après modification du Dockerfile
docker-compose build --no-cache
```

### Dépannage Docker
```bash
# Vérifier l'état des conteneurs
docker-compose ps

# Voir les logs d'un service spécifique
docker-compose logs app
docker-compose logs db

# Redémarrer un service
docker-compose restart app

# Nettoyer les volumes (⚠️ supprime les données)
docker-compose down -v
```

## 📊 Fonctionnalités

- ✅ Gestion des utilisateurs (UUID)
- ✅ Système de clients avec profession
- ✅ Système d'administrateurs
- ✅ Gestion des comptes bancaires (Épargne/Chèque)
- ✅ Gestion des transactions (Dépôt/Retrait/Transfert)
- ✅ API RESTful avec documentation Swagger
- ✅ Migrations et seeders automatiques
- ✅ Factories pour les tests
- ✅ Authentification Sanctum
- ✅ Cache et sessions configurés

## 🛠️ Technologies utilisées

- **Laravel 12** - Framework PHP moderne
- **PHP 8.2** - Version LTS avec performances optimisées
- **PostgreSQL 15** - Base de données robuste
- **Docker & Docker Compose** - Conteneurisation complète
- **Render** - Plateforme de déploiement cloud
- **Composer** - Gestionnaire de dépendances PHP
- **NPM & Vite** - Build d'assets frontend
- **TailwindCSS** - Framework CSS utilitaire
- **Laravel Swagger (l5-swagger)** - Documentation API automatique

## 📁 Structure du projet

```
best-ges-comptes/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CompteController.php
│   │   │   └── Controller.php
│   ├── Models/
│   │   ├── User.php          # Modèle utilisateur avec UUID
│   │   ├── Client.php        # Modèle client
│   │   ├── Admin.php         # Modèle administrateur
│   │   ├── CompteBancaire.php # Modèle compte bancaire
│   │   └── Transaction.php   # Modèle transaction
│   └── Providers/
├── database/
│   ├── factories/            # Factories pour les tests
│   ├── migrations/           # Migrations base de données
│   └── seeders/              # Seeders pour données de test
├── public/                   # Assets publics
├── resources/                # Views et assets frontend
├── routes/
│   ├── api.php              # Routes API
│   ├── web.php              # Routes web
│   └── console.php          # Routes console
├── storage/                  # Fichiers temporaires Laravel
├── tests/                    # Tests unitaires et fonctionnels
├── Dockerfile               # Configuration Docker
├── docker-compose.yml       # Orchestration Docker
├── render.yaml             # Configuration déploiement Render
├── composer.json           # Dépendances PHP
├── package.json            # Dépendances Node.js
└── README.md               # Documentation
```

## 🔧 Configuration

### Variables d'environnement importantes
```env
# Application
APP_NAME=BestGesComptes
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-app.onrender.com

# Base de données PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=your-db-host
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=your-password

# Cache et sessions
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

# Mail (optionnel)
MAIL_MAILER=log
```

### Génération de la clé d'application
```bash
# En local
php artisan key:generate

# Sur Render (via Shell)
php artisan key:generate --show
# Copiez la clé générée dans les variables d'environnement APP_KEY
```

## 🚀 API Documentation

L'application inclut une documentation API automatique avec Swagger :

- **URL de développement** : http://localhost:8000/api/documentation
- **URL de production** : https://your-app.onrender.com/api/documentation

### Endpoints principaux
- `GET /api/comptes` - Lister tous les comptes
- `POST /api/comptes` - Créer un compte
- `GET /api/comptes/{id}` - Détails d'un compte
- `PUT /api/comptes/{id}` - Modifier un compte
- `DELETE /api/comptes/{id}` - Supprimer un compte

## 🧪 Tests

```bash
# Exécuter tous les tests
php artisan test

# Tests avec couverture
php artisan test --coverage

# Tests spécifiques
php artisan test --filter=UserTest
```

## 📞 Support & Contribution

### Signaler un problème
Pour toute question ou problème, veuillez créer une issue dans le repository GitHub avec :
- Description détaillée du problème
- Étapes pour reproduire
- Logs d'erreur (si applicable)
- Version de l'application

### Contribution
1. Fork le projet
2. Créer une branche feature (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Commit les changements (`git commit -am 'Ajout nouvelle fonctionnalité'`)
4. Push la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Créer une Pull Request

## 📄 Licence

Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.
