# PowerMove
Application web pour gérer les membres, activités et réservations d'une salle de sport. Simple, efficace et moderne.

# PowerMove - Système de Gestion de Salle de Sport

## 📝 À propos
PowerMove est une application web de gestion de salle de sport permettant aux membres de s'inscrire aux activités et de gérer leurs réservations. Le système facilite la gestion des membres, des activités et des réservations de manière efficace et intuitive.

## 🎯 Cahier des charges

### Objectifs
- Moderniser la gestion de la salle de sport
- Digitaliser le processus d'inscription des membres
- Faciliter la gestion des activités et des réservations
- Améliorer l'expérience utilisateur pour les membres

### Fonctionnalités principales
- Gestion des inscriptions des membres
- Affichage et gestion des activités
- Système de réservation des activités
- Consultation des membres inscrits
- Interface responsive avec menu déroulant sur mobile

## 💻 Technologies utilisées
- HTML5
- Tailwind CSS pour le styling
- JavaScript (pour le menu déroulant mobile)
- PHP Native
- MySQL
- Apache (via XAMPP)

## 📖 User Stories

### En tant que visiteur
- Je peux consulter la page d'accueil pour découvrir les activités proposées
- Je peux m'inscrire en tant que membre en fournissant mes informations personnelles
- Je peux sélectionner une activité lors de mon inscription

### En tant que membre
- Je peux consulter la liste des activités disponibles
- Je peux voir mes réservations
- Je peux consulter la liste des membres

## 🗄️ Structure de la base de données

### Table `membres`
- `id_membre` (Primary Key)
- `nom`
- `prenom`
- `email`
- `telephone`
- `date_inscription`

### Table `activites`
- `id_activite` (Primary Key)
- `nom_activite`
- `description`
- `prix`
- `capacite_max`
- `date_debut`
- `date_fin`

### Table `reservations`
- `id_reservation` (Primary Key)
- `id_membre` (Foreign Key)
- `id_activite` (Foreign Key)
- `date_reservation`
- `statut`

## 🛠 Prérequis techniques
- XAMPP (version récente incluant Apache et MySQL)
- PHP 7.4 ou supérieur
- Navigateur web moderne supportant Tailwind CSS
- Espace disque minimum : 100MB

## ⚙️ Installation et configuration

### 1. Installation de XAMPP
1. Téléchargez XAMPP depuis le [site officiel](https://www.apachefriends.org/)
2. Installez XAMPP en suivant les instructions d'installation
3. Démarrez les services Apache et MySQL depuis le panneau de contrôle XAMPP

### 2. Configuration de la base de données
1. Accédez à phpMyAdmin (http://localhost/phpmyadmin)
2. Créez une nouvelle base de données nommée `powermove`
3. Importez le script SQL suivant :

```sql
CREATE TABLE membres (
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE activites (
    id_activite INT PRIMARY KEY AUTO_INCREMENT,
    nom_activite VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10,2) NOT NULL,
    capacite_max INT NOT NULL,
    date_debut DATE,
    date_fin DATE
);

CREATE TABLE reservations (
    id_reservation INT PRIMARY KEY AUTO_INCREMENT,
    id_membre INT,
    id_activite INT,
    date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut VARCHAR(20) DEFAULT 'en_attente',
    FOREIGN KEY (id_membre) REFERENCES membres(id_membre),
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite)
);
```

### 3. Installation du projet
1. Copiez tous les fichiers du projet dans le dossier `htdocs` de XAMPP
```bash
C:/xampp/htdocs/powermove/
```

2. Accédez à l'application via votre navigateur :
```
http://localhost/powermove
```

## 📁 Structure du projet
```
powermove/
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── imgs/
│   │   └── [images du projet]
│   └── js/
├── vues/
│   ├── db_connection.php
│   ├── index.php
│   ├── liste_membres.php
│   ├── process_membres.php
│   ├── reservations.php
│   └── readme.md
```

## 🔧 Configuration de la connexion à la base de données
Dans le fichier `db_connection.php`, assurez-vous que les paramètres de connexion correspondent à votre configuration locale :

```php
$host = "localhost";
$dbname = "powermove";
$username = "root";
$password = "";
```

## 🚀 Utilisation
1. Accédez à la page d'accueil via http://localhost/powermove
2. Utilisez le formulaire d'inscription pour créer un nouveau membre
3. Consultez la liste des membres via le menu de navigation
4. Gérez les réservations via l'interface dédiée

## 🐛 Dépannage courant
- Si vous rencontrez une erreur de connexion à la base de données, vérifiez que les services XAMPP sont bien démarrés
- En cas d'erreur 404, vérifiez que les fichiers sont bien placés dans le bon dossier
- Pour les problèmes d'affichage, videz le cache de votre navigateur

## 👥 Contribution
Pour contribuer au projet :
1. Forkez le repository
2. Créez une branche pour votre fonctionnalité
3. Committez vos changements
4. Poussez vers la branche
5. Créez une Pull Request

## 📄 Licence
Il n'y a pas de Licence pour ce site :)
