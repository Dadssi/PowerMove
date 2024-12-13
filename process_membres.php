<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Préparer les requêtes pour insérer un membre et une réservation
        $stmt = $pdo->prepare("INSERT INTO membres (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
        $insertActivity = $pdo->prepare("INSERT INTO reservations (id_membre, id_activite) VALUES (?, ?)");

        // Exécuter l'insertion du membre
        $stmt->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone']
        ]);

        // Récupérer l'ID du dernier membre inséré
        $stmt_member = $pdo->prepare("SELECT MAX(id_membre) AS max_id FROM membres");
        $stmt_member->execute();
        $result = $stmt_member->fetch(PDO::FETCH_ASSOC);

        $id_membre = $result['max_id'];

        // Récupérer l'ID de l'activité à partir de son nom
        $nom_activite = $_POST['id_activite'];

        $stmt_activite = $pdo->prepare("SELECT id_activite FROM activites WHERE nom_activite = ?");
        $stmt_activite->execute([$nom_activite]);
        $result_1 = $stmt_activite->fetch(PDO::FETCH_ASSOC);

        $id_activite = $result_1['id_activite'];

        // Insérer la réservation
        $insertActivity->execute([
            $id_membre,
            $id_activite
        ]);




        header("Location: index.php?success=1");
        exit();
    } catch (PDOException $e) {
        header("Location: index.php?error=1");
        exit();
    }
}
// ?>

<?php
// include 'db_connection.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Vérifiez que tous les champs requis sont fournis
//     if (
//         !empty($_POST['nom']) &&
//         !empty($_POST['prenom']) &&
//         !empty($_POST['email']) &&
//         !empty($_POST['telephone']) &&
//         !empty($_POST['activite_id'])
//     ) {
//         try {
//             $stmt = $pdo->prepare("INSERT INTO membres (nom, prenom, email, telephone, activite_id) VALUES (?, ?, ?, ?, ?)");
            
//             $stmt->execute([
//                 htmlspecialchars($_POST['nom']),
//                 htmlspecialchars($_POST['prenom']),
//                 htmlspecialchars($_POST['email']),
//                 htmlspecialchars($_POST['telephone']),
//                 htmlspecialchars($_POST['activite_id'])
//             ]);
            
//             header("Location: index.php?success=1");
//             exit();
//         } catch (PDOException $e) {
//             // Debug : Afficher le message d'erreur pour comprendre le problème
//             error_log("Erreur PDO : " . $e->getMessage());
//             header("Location: index.php?error=1");
//             exit();
//         }
//     } else {
//         // Si des champs sont manquants
//         header("Location: index.php?error=1");
//         exit();
//     }
// }
?>
