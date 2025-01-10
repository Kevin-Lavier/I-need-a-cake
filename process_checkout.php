<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si le panier n'est pas vide
    if (empty($_SESSION['cart'])) {
        header('Location: cart.php');
        exit;
    }

    // Récupérer les informations du formulaire
    $user_id = $_SESSION['user_id']; // ID de l'utilisateur connecté
    $name = $_POST['name'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];

    // Calculer le prix total de la commande
    $total_price = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    try {
        // Commencer une transaction
        $pdo->beginTransaction();

        // Insérer la commande dans `orders`
        $stmt = $pdo->prepare('INSERT INTO orders (user_id, order_date, total_price, status) VALUES (?, NOW(), ?, ?)');
        $stmt->execute([$user_id, $total_price, 'en cours']);

        // Récupérer l'ID de la commande insérée
        $order_id = $pdo->lastInsertId();

        // Insérer les articles dans `order_items`
        $stmt = $pdo->prepare('INSERT INTO order_items (order_id, product_name, quantity, unit_price) VALUES (?, ?, ?, ?)');
        foreach ($_SESSION['cart'] as $item) {
            $stmt->execute([$order_id, $item['name'], $item['quantity'], $item['price']]);
        }

        // Confirmer la transaction
        $pdo->commit();

        // Vider le panier
        unset($_SESSION['cart']);

        // Rediriger vers la page de confirmation
        header('Location: confirmation.php');
        exit;

    } catch (Exception $e) {
        // Annuler la transaction en cas d'erreur
        $pdo->rollBack();
        echo "Erreur lors de l'enregistrement de la commande : " . $e->getMessage();
        exit;
    }
}
?>
