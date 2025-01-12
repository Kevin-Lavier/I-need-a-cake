<?php
session_start();

// Simulation des données des pâtisseries
$patisseries = [
    1 => ['nom' => 'Macarons au chocolat', 'description' => 'Un délice gourmand pour tous les amateurs de chocolat.', 'image' => 'patisserie1.jpg', 'prix' => 12.50],
    2 => ['nom' => 'Éclair à la vanille', 'description' => 'Une pâtisserie classique et savoureuse.', 'image' => 'patisserie2.jpg', 'prix' => 8.00],
    3 => ['nom' => 'Tarte aux framboises', 'description' => 'Fraîcheur et douceur dans chaque bouchée.', 'image' => 'patisserie3.jpg', 'prix' => 15.00],
    4 => ['nom' => 'Croissant au beurre', 'description' => 'Le classique du petit-déjeuner français.', 'image' => 'patisserie4.jpg', 'prix' => 2.50],
    5 => ['nom' => 'Pain au chocolat', 'description' => 'Un incontournable pour une pause gourmande.', 'image' => 'patisserie5.jpg', 'prix' => 2.80],
    6 => ['nom' => 'Cheesecake au citron', 'description' => 'Un mélange parfait de douceur et d’acidité.', 'image' => 'patisserie6.jpg', 'prix' => 18.00],
    7 => ['nom' => 'Gâteau Opéra', 'description' => 'Une harmonie de chocolat et de café.', 'image' => 'patisserie7.jpg', 'prix' => 20.00],
    8 => ['nom' => 'Tarte Tatin', 'description' => 'Un classique renversant aux pommes caramélisées.', 'image' => 'patisserie8.jpg', 'prix' => 14.00],
    9 => ['nom' => 'Mille-feuille', 'description' => 'Un dessert élégant et croustillant.', 'image' => 'patisserie9.jpg', 'prix' => 16.00],
];
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
            <?php foreach ($patisseries as $id => $patisserie): ?>
                <div class="bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <a href="./patisseries/details.php?id=<?= $id ?>" class="block">
                        <img src="./assets/images/<?= $patisserie['image'] ?>" alt="<?= $patisserie['nom'] ?>" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold"><?= htmlspecialchars($patisserie['nom']) ?></h3>
                            <p class="text-gray-600 mt-2"><?= htmlspecialchars($patisserie['description']) ?></p>
                            <p class="text-green-600 font-bold mt-4"><?= number_format($patisserie['prix'], 2, ',', ' ') ?> €</p>
                        </div>
                    </a>
                    <form action="cart.php" method="POST" class="p-4">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="name" value="<?= htmlspecialchars($patisserie['nom']) ?>">
                        <input type="hidden" name="price" value="<?= $patisserie['prix'] ?>">
                        <button type="submit" name="add_to_cart" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded w-full">Ajouter au panier</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include './includes/footer.php'; ?>
</body>

</html>
