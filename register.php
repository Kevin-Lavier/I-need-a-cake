<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Initialisation de la variable d'erreur
    $error = null;

    // Valider les données
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse email invalide.";
    } elseif (strlen($password) < 6) {
        $error = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        // Vérifier si l'email existe déjà
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = "Cet email est déjà utilisé.";
        } else {
            // Hasher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insérer l'utilisateur dans la base de données
            $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
            $stmt->execute([$email, $hashedPassword]);

            // Rediriger vers la page de connexion
            header('Location: login.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
</head>
<body class="bg-gray-100">
    <?php include './includes/header.php'; ?>
    <main class="flex items-center justify-center h-screen">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-3xl font-bold text-center mb-6">Créer un compte</h1>

            <!-- Afficher le message d'erreur ici -->
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <!-- Formulaire d'inscription -->
            <form action="register.php" method="POST" class="space-y-4">
                <div>
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Adresse email :</label>
                    <input type="email" id="email" name="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                </div>
                <div>
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe :</label>
                    <input type="password" id="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">S'inscrire</button>
            </form>

            <!-- Lien vers la page de connexion -->
            <p class="mt-4 text-center text-sm text-gray-700">
                Vous avez déjà un compte ? 
                <a href="login.php" class="text-green-500 hover:underline">Connectez-vous ici</a>.
            </p>
        </div>
    </main>
    <?php include './includes/footer.php'; ?>
</body>
</html>
