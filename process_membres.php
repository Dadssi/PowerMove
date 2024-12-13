<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $stmt = $pdo->prepare("INSERT INTO membres (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
        $stmt = $pdo->prepare("INSERT INTO membres (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
        
        $stmt->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
        ]);
        $stmt->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
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
