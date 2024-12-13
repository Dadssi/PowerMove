<?php
include 'reservations.php';
include 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("INSERT INTO membres (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone']
        ]);

        $id_membre = $pdo->lastInsertId();

        if (isset($_POST['id_activite']) && !empty($_POST['id_activite'])) {
            $id_activite = $_POST['id_activite'];
        } else {
            throw new Exception("ID de l'activité manquant ou invalidee.");
        }

        $insertActivity = $pdo->prepare("INSERT INTO reservations (id_membre, id_activite, date_reservation, statut) VALUES (?, ?, NOW(), ?)");
        $insertActivity->execute([
            $id_membre,
            $id_activite,
            'Confirmée'
        ]);

        $pdo->commit(); // ==> valider l'operation si non voir rollback

        $messageSucces = "Votre réservation a été confirmée.";
        echo "<script type='text/javascript'>
        alert('$messageSucces');
        </script>";

        exit();
    } catch (Exception $e) {
        $pdo->rollBack(); //==> en cas d'echec
        echo "Erreur lors de l'insertion : " . $e->getMessage();
        exit();
    }
}

try {
    $stmt = $pdo->prepare(" 
        SELECT 
            reservations.id_reservation, 
            reservations.id_membre, 
            activites.nom_activite, 
            reservations.date_reservation, 
            reservations.statut
        FROM reservations
        JOIN activites ON reservations.id_activite = activites.id_activite
    ");
    $stmt->execute();
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}
?>

