<?php
session_start();

// Ajouter au panier
if (isset($_POST['add_to_cart'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Ajouter l'article au panier dans la session
    $_SESSION['cart'][$id] = [
        'name' => $name,
        'price' => $price,
        'quantity' => ($_SESSION['cart'][$id]['quantity'] ?? 0) + 1,
    ];

    // Rediriger vers la page du panier
    header('Location: ../cart.php');
    exit;
}

// Simulation des données d'une pâtisserie
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
    <title><?= htmlspecialchars($patisserie['nom']) ?> - I need a cake</title>
    <link rel="stylesheet" href="../dist/styles.css">
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <main class="container mx-auto py-12">
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <img src="../assets/images/<?= htmlspecialchars($patisserie['image']) ?>" alt="<?= htmlspecialchars($patisserie['nom']) ?>" class="w-full h-80 object-cover">
            <div class="p-8">
                <h1 class="text-3xl font-bold"><?= htmlspecialchars($patisserie['nom']) ?></h1>
                <p class="text-gray-600 mt-4"><?= htmlspecialchars($patisserie['description']) ?></p>
                <p class="text-xl font-semibold text-green-600 mt-4"><?= number_format($patisserie['prix'], 2, ',', ' ') ?> €</p>

                <!-- Formulaire pour ajouter au panier -->
                <form action="details.php?id=<?= $id ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($patisserie['nom']) ?>">
                    <input type="hidden" name="price" value="<?= $patisserie['prix'] ?>">
                    <button type="submit" name="add_to_cart" class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                        Ajouter au panier
                    </button>
                </form>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>

</html>
