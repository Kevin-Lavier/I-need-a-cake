<?php
session_start();

// Vérifier si le panier est vide
if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer à la caisse - I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
</head>
<body>
    <?php include './includes/header.php'; ?>
    <main class="container mx-auto py-12">
        <h1 class="text-3xl font-bold mb-6">Passer à la caisse</h1>

        <form action="process_checkout.php" method="POST" class="space-y-4 bg-white shadow-md rounded-lg p-6">
            <div>
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom complet :</label>
                <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div>
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Adresse :</label>
                <textarea id="address" name="address" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"></textarea>
            </div>
            <div>
                <label for="payment" class="block text-gray-700 text-sm font-bold mb-2">Mode de paiement :</label>
                <select id="payment" name="payment" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    <option value="credit_card">Carte de Crédit</option>
                    <option value="paypal">PayPal</option>
                    <option value="cash">Paiement à la livraison</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                Confirmer et Payer
            </button>
        </form>
    </main>
    <?php include './includes/footer.php'; ?>
</body>
</html>
