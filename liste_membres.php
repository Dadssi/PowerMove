<?php
include 'db_connection.php';

try {
    $stmt = $pdo->query("SELECT * FROM membres");
    $membres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des membres : " . $e->getMessage();
    $membres = [];
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
            <a href="index.php" class="text-2xl font-bold">PowerMove</a>
            <ul class="hidden md:flex space-x-6 text-lg">
                <li><a href="index.php" class="hover:text-blue-300">Accueil</a></li>
                <li><a href="index.php#services" class="hover:text-blue-300">Activités</a></li>
                <li><a href="index.php#about" class="hover:text-blue-300">À propos</a></li>
                <li><a href="reservations.php" class="hover:text-blue-300">Réservations</a></li>
                <li><a href="#" class="hover:text-blue-300">Membres</a></li>
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
    <!-- ------------------------------------------------------------------------------------------------------------------------- -->
    <div class="overflow-x-auto p-4 bg-white rounded-lg shadow-md mb-52">
    <table class="table-auto w-full border-collapse border border-gray-200">
        <thead class="bg-purple-700 text-white">
            <tr>
                <th class="px-4 py-2 border border-gray-300">ID Membre</th>
                <th class="px-4 py-2 border border-gray-300">Nom</th>
                <th class="px-4 py-2 border border-gray-300">Prénom</th>
                <th class="px-4 py-2 border border-gray-300">Email</th>
                <th class="px-4 py-2 border border-gray-300">Telephone</th>
                <th class="px-4 py-2 border border-gray-300">Date d'inscription</th>
                <th class="px-4 py-2 border border-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($membres as $membre): ?>
            <tr class="odd:bg-purple-50 even:bg-purple-100 hover:bg-purple-200">
                <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($membre['id_membre']) ?></td>
                <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($membre['nom']) ?></td>
                <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($membre['prenom']) ?></td>
                <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($membre['email']) ?></td>
                <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($membre['telephone']) ?></td>
                <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($membre['date_inscription']) ?></td>
                <td class="px-4 py-2 border border-gray-300">
                    <div class="flex gap-2">
                        <button class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">Modifier</button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Supprimer</button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<footer class="bg-gradient-to-r from-purple-900 via-purple-500 to-purple-900 text-white shadow-2xl py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 PowerMove. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>