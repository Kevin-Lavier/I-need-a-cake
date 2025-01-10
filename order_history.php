<?php
session_start();
include 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupérer les commandes de l'utilisateur
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC');
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Commandes - I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
</head>
<body>
    <?php include './includes/header.php'; ?>
    <main class="container mx-auto py-12">
        <h1 class="text-3xl font-bold mb-6">Historique des commandes</h1>

        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <div class="bg-white shadow-md rounded-lg mb-6 p-6">
                    <p><strong>Commande #<?= $order['order_id'] ?></strong></p>
                    <p>Date : <?= $order['order_date'] ?></p>
                    <p>Total : <?= number_format($order['total_price'], 2, ',', ' ') ?> €</p>
                    <p>Statut : <?= htmlspecialchars($order['status']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-gray-700">Vous n'avez pas encore passé de commande.</p>
        <?php endif; ?>
    </main>
    <?php include './includes/footer.php'; ?>
</body>
</html>
