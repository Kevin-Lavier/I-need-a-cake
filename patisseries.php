<?php
session_start();
include 'config.php'; // Connexion à la base de données

// Récupérer les pâtisseries depuis la base de données
$stmt = $pdo->query('SELECT * FROM patisseries');
$patisseries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pâtisseries - I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
</head>

<body>
    <?php include './includes/header.php'; ?>
    <main class="container mx-auto py-12">
        <h1 class="text-3xl font-bold mb-6">Toutes nos pâtisseries</h1>

        <!-- Grille des pâtisseries -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php foreach ($patisseries as $patisserie): ?>
                <div class="bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <a href="/I_need_a_cake/patisseries/details.php?id=<?= $patisserie['id'] ?>" class="block">
    <img src="/I_need_a_cake/assets/images/<?= $patisserie['image'] ?>" alt="<?= $patisserie['nom'] ?>" class="w-full h-40 object-cover">
    <div class="p-4">
        <h3 class="text-lg font-semibold"><?= htmlspecialchars($patisserie['nom']) ?></h3>
        <p class="text-gray-600 mt-2"><?= htmlspecialchars($patisserie['description']) ?></p>
        <p class="text-green-600 font-bold mt-4"><?= number_format($patisserie['prix'], 2, ',', ' ') ?> €</p>
    </div>
</a>

                    <form action="/I_need_a_cake/cart.php" method="POST" class="p-4">
    <input type="hidden" name="id" value="<?= $patisserie['id'] ?>">
    <input type="hidden" name="name" value="<?= htmlspecialchars($patisserie['nom']) ?>">
    <input type="hidden" name="price" value="<?= $patisserie['prix'] ?>">
</form>

                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include './includes/footer.php'; ?>
</body>

</html>
