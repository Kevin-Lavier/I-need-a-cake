<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['quantity'])) {
    $id = $_POST['id'];
    $quantity = (int) $_POST['quantity'];

    // Si la quantité est valide, mettre à jour
    if ($quantity > 0 && isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    }

    // Rediriger vers le panier
    header('Location: cart.php');
    exit;
}
?>
