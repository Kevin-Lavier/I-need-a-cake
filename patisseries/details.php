<?php
// Simulation des données d'une pâtisserie
$patisseries = [
    1 => ['nom' => 'Macarons au chocolat', 'description' => 'Un délice gourmand pour tous les amateurs de chocolat.', 'image' => 'patisserie1.jpg', 'prix' => 12.50],
    2 => ['nom' => 'Éclair à la vanille', 'description' => 'Une pâtisserie classique et savoureuse.', 'image' => 'patisserie2.jpg', 'prix' => 8.00],
    // Ajoutez d'autres pâtisseries ici...
];

// Récupérer l'ID depuis l'URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Vérifier si la pâtisserie existe
if (!array_key_exists($id, $patisseries)) {
    echo "Pâtisserie introuvable.";
    exit;
}

$patisserie = $patisseries[$id];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $patisserie['nom'] ?> - I need a cake</title>
    <link rel="stylesheet" href="../dist/styles.css">
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <main class="container mx-auto py-12">
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <img src="./images/<?= $patisserie['image'] ?>" alt="<?= $patisserie['nom'] ?>" class="w-full h-80 object-cover">
            <div class="p-8">
                <h1 class="text-3xl font-bold"><?= $patisserie['nom'] ?></h1>
                <p class="text-gray-600 mt-4"><?= $patisserie['description'] ?></p>
                <p class="text-xl font-semibold text-green-600 mt-4"><?= number_format($patisserie['prix'], 2, ',', ' ') ?> €</p>
                <button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ajouter au panier</button>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>

</html>
