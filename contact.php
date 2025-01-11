<?php
// Démarrer la session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Vérifier les champs requis
    if (empty($name) || empty($email) || empty($message)) {
        $error = "Tous les champs sont requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse email invalide.";
    } else {
        // (Facultatif) Simuler l'envoi du message par email
        // mail($email_destinataire, "Message de $name", $message);

        // Afficher un message de confirmation
        $success = "Merci, votre message a bien été envoyé !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
</head>
<body>
    <?php include './includes/header.php'; ?>
    <main class="container mx-auto py-12">
        <h1 class="text-3xl font-bold mb-6">Contactez-nous</h1>

        <!-- Formulaire de contact -->
        <form action="contact.php" method="POST" class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto space-y-4">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                    <?= $success ?>
                </div>
            <?php endif; ?>
            <div>
                <label for="name" class="block text-gray-700 font-bold mb-2">Votre nom :</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-bold mb-2">Votre email :</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div>
                <label for="message" class="block text-gray-700 font-bold mb-2">Votre message :</label>
                <textarea id="message" name="message" rows="5" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Envoyer</button>
        </form>
    </main>
    <?php include './includes/footer.php'; ?>
</body>
</html>
