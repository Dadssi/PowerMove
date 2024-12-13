<?php
include 'db_connection.php';

try {
    $stmt = $pdo->query("SELECT * FROM activites");
    $activites = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des activités : " . $e->getMessage();
    $activites = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>PowerMove - Salle de Sport</title>
</head>

<body class="text-gray-800">
    <header class="bg-gradient-to-r from-purple-900 via-purple-500 to-purple-900 text-white shadow-2xl">
        <nav class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">PowerMove</a>
            <ul class="hidden md:flex space-x-6 text-lg">
                <li><a href="#home" class="hover:text-blue-300">Accueil</a></li>
                <li><a href="#services" class="hover:text-blue-300">Activités</a></li>
                <li><a href="reservations.php" class="hover:text-blue-300">Réservations</a></li>
                <li><a href="liste_membres.php" class="hover:text-blue-300">Membres</a></li>
            </ul>
            <button id="menuBtn" class="md:hidden text-2xl focus:outline-none">☰</button>
        </nav>
        <div id="mobileMenu" class="hidden bg-gradient-to-r from-purple-900 via-purple-500 to-purple-900 text-white shadow-2xl text-white slide-down md:hidden">
            <ul class="space-y-4 text-center p-4">
                <li><a href="#home" class="block hover:bg-purple-900">Accueil</a></li>
                <li><a href="#services" class="block hover:bg-purple-900">Activités</a></li>
                <li><a href="#about" class="block hover:bg-purple-900">À propos</a></li>
                <li><a href="#contact" class="block hover:bg-purple-900">Réservation</a></li>
                <li><a href="liste_membres.php" class="block hover:bg-purple-900">Membres</a></li>
            </ul>
        </div>
    </header>
    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <section id="home" class="bg-cover bg-center h-screen flex items-center justify-center"
        style="background-image: url('https://img.freepik.com/photos-premium/salle-gym-lumiere-mur-tapis-roulant_808092-1997.jpg?w=1060');">
        <div class="w-full text-center items-center">
            <div class="w-full h-full bg-black opacity-75 p-10">
                <h1 class="text-4xl md:text-6xl mb-6 text-purple-200" id="bienvenue">Bienvenue chez <span>PowerMove</span></h1>
                <p class="text-2xl font-bold text-white md:text-2xl mb-8">Votre partenaire fitness pour atteindre vos objectifs 💪💪.</p>
                <a href="#services" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded">Découvrir
                nos activités</a>
            </div>
        </div>
    </section>
    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <section id="services" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8 text-purple-900">Nos Activités</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($activites as $activite): ?>
                    <div class="relative group p-6 shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300 bg-purple-300">
                        <img src="assets/imgs/yoga.png" alt="<?= htmlspecialchars($activite['nom_activite']) ?>" class="w-full rounded-lg">
                        <h3 class="text-xl font-semibold mb-4 mt-4 text-purple-700"><?= htmlspecialchars($activite['nom_activite']) ?></h3>
                        <p class="text-gray-600"><?= htmlspecialchars($activite['description']) ?></p>
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                            <a href="#activite-<?= htmlspecialchars($activite['id_activite']) ?>" class="bg-white text-purple-700 font-semibold px-4 py-2 rounded-lg shadow-lg hover:bg-purple-700 hover:text-white transition-colors">
                                Voir détails
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- ---------------------------------------------------------------------------------------------------------------------------- -->
    <section id="reservation" class="py-16 bg-purple-200">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8 text-purple-900">Réservez une activité</h2>
            <?php if (isset($_GET['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    Inscription réussie !
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    Une erreur est survenue lors de l'inscription.
                </div>
            <?php endif; ?>
            <!-- ---------------------------------------------------------------------------------------------------------------------- -->
            <form class="max-w-xl mx-auto" action="process_membres.php" method="post">
                <div class="mb-4">
                    <input type="text" name="nom" placeholder="Nom" class="w-full border-purple-300 focus:border-purple-900 focus:ring focus:ring-purple-900 rounded p-3" required>
                </div>
                <div class="mb-4">
                    <input type="text" name="prenom" placeholder="Prénom" class="w-full border-purple-300 focus:border-purple-900 focus:ring focus:ring-purple-900 rounded p-3" required>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email" class="w-full border-purple-300 focus:border-purple-900 focus:ring focus:ring-purple-900 rounded p-3" required>
                </div>
                <div class="mb-4">
                    <input type="tel" name="telephone" placeholder="N° de téléphone" pattern="[0-9]*" class="w-full border-purple-300 focus:border-purple-900 focus:ring focus:ring-purple-900 rounded p-3" required>
                </div>
                <div class="mb-4">
                    <select name="id_activite" class="w-full border-purple-300 focus:border-purple-900 focus:ring focus:ring-purple-900 rounded p-3" required>
                        <option value="">Veuillez choisir une activité</option>
                        <?php foreach ($activites as $activite): ?>
                            <option value="<?= htmlspecialchars($activite['id_activite']) ?>"><?= htmlspecialchars($activite['nom_activite']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded">Envoyer</button>
            </form>
        </div>
    </section>

    <footer class="bg-gradient-to-r from-purple-900 via-purple-500 to-purple-900 text-white shadow-2xl py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 PowerMove. Tous droits réservés.</p>
        </div>
    </footer>
    

    <script src="assets/js/script.js"></script>
</body>
</html>