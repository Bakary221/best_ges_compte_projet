# BestGesComptes - Application de Gestion Comptes

Application Laravel pour la gestion des comptes bancaires avec système de clients et administrateurs.

## 🚀 Installation et configuration locale

### Prérequis
- PHP 8.2 ou supérieur
- Composer
- PostgreSQL
- Node.js & NPM (pour les assets frontend)

### Installation
```bash
# Cloner le repository
git clone https://github.com/votre-username/best-ges-comptes.git
cd best-ges-comptes

# Installer les dépendances PHP
composer install

# Installer les dépendances Node.js
npm install

# Copier le fichier d'environnement
cp .env.example .env

# Générer la clé d'application
php artisan key:generate
```

### Configuration de la base de données
1. Créer une base de données PostgreSQL
2. Modifier le fichier `.env` avec vos informations de base de données :
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=bestgescomptes
DB_USERNAME=votre_username
DB_PASSWORD=votre_password
```

### Migration et seeding
```bash
# Exécuter les migrations
php artisan migrate

# Peupler la base de données avec des données de test
php artisan db:seed
```

### Compiler les assets
```bash
# Pour le développement
npm run dev

# Pour la production
npm run build
```

### Démarrer le serveur
```bash
php artisan serve
```

L'application sera accessible sur `http://localhost:8000`

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

- **Laravel 12** - Framework PHP moderne
- **PHP 8.2** - Version LTS avec performances optimisées
- **PostgreSQL** - Base de données robuste
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
├── composer.json            # Dépendances PHP
├── package.json             # Dépendances Node.js
└── README.md               # Documentation
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
