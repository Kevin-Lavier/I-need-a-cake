<?php
session_start();
include '../config.php'; // Connexion à la base de données

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

// Récupérer l'ID depuis l'URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Rechercher la pâtisserie dans la base de données
$stmt = $pdo->prepare('SELECT * FROM patisseries WHERE id = ?');
$stmt->execute([$id]);
$patisserie = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si la pâtisserie existe
if (!$patisserie) {
    echo "Pâtisserie introuvable.";
    exit;
}
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
