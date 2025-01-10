<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
</head>
<body>
    <?php include './includes/header.php'; ?>
    <main class="container mx-auto py-12">
        <h1 class="text-3xl font-bold mb-6">Votre panier</h1>

        <?php if (!empty($_SESSION['cart'])): ?>
            <table class="w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-4 px-6 text-left">Pâtisserie</th>
                        <th class="py-4 px-6 text-left">Prix</th>
                        <th class="py-4 px-6 text-left">Quantité</th>
                        <th class="py-4 px-6 text-left">Total</th>
                        <th class="py-4 px-6 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalGeneral = 0;
                    foreach ($_SESSION['cart'] as $id => $item):
                        $totalItem = $item['price'] * $item['quantity'];
                        $totalGeneral += $totalItem;
                    ?>
                        <tr>
                            <td class="py-4 px-6"><?= htmlspecialchars($item['name']) ?></td>
                            <td class="py-4 px-6"><?= number_format($item['price'], 2, ',', ' ') ?> €</td>
                            <td class="py-4 px-6">
                                <form action="update_cart.php" method="POST" class="inline-block">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" class="w-16 text-center border rounded">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded ml-2">Modifier</button>
                                </form>
                            </td>
                            <td class="py-4 px-6"><?= number_format($totalItem, 2, ',', ' ') ?> €</td>
                            <td class="py-4 px-6">
                                <form action="remove_from_cart.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="mt-6 text-right">
                <p class="text-xl font-bold">Total général : <?= number_format($totalGeneral, 2, ',', ' ') ?> €</p>
                <a href="checkout.php" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Passer à la caisse</a>
            </div>
        <?php else: ?>
            <p class="text-gray-600">Votre panier est vide.</p>
        <?php endif; ?>
    </main>
    <?php include './includes/footer.php'; ?>
</body>
</html>
