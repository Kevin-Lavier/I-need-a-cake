<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Confirmée - I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
</head>
<body>
    <?php include './includes/header.php'; ?>
    <main class="container mx-auto py-12 text-center">
        <h1 class="text-3xl font-bold mb-6">Merci pour votre commande !</h1>
        <p class="text-gray-700">Votre commande a été enregistrée avec succès. Nous vous livrerons bientôt à l'adresse indiquée.</p>
        <a href="index.php" class="mt-6 inline-block bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Retour à l'accueil</a>
    </main>
    <?php include './includes/footer.php'; ?>
</body>
</html>
