<?php
session_start();
include 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupérer les informations de l'utilisateur
$stmt = $pdo->prepare('SELECT email FROM users WHERE user_id = ?');
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
</head>
<body class="bg-gray-100">
    <?php include './includes/header.php'; ?>
    <main class="container mx-auto py-12">
        <h1 class="text-3xl font-bold">Votre Profil</h1>
        <p class="mt-4">Email : <?= htmlspecialchars($user['email']) ?></p>
        <!-- Ajouter plus d'informations ici -->
    </main>
    <?php include './includes/footer.php'; ?>
</body>
</html>
