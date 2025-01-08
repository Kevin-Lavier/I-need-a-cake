<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe dans la base de données
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Si les identifiants sont corrects, créer une session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['full_name'] = $user['full_name'];

        // Rediriger vers la page d'accueil
        header('Location: index.php');
        exit;
    } else {
        // Message d'erreur en cas d'échec
        $error = "Email ou mot de passe incorrect.";
    }
}
?>



        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Connexion - I need a cake</title>
            <link rel="stylesheet" href="./dist/styles.css">
        </head>
        <body>
            <?php include './includes/header.php'; ?>
            <main class="container mx-auto py-12">
                <h1 class="text-3xl font-bold mb-6">Se connecter</h1>
                <form action="login.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Adresse email :</label>
                        <input type="email" id="email" name="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe :</label>
                        <input type="password" id="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Se connecter</button>
                </form>
                <?php if (isset($error)): ?>
                    <p class="text-red-500 text-sm mt-4"><?= $error ?></p>
                <?php endif; ?>
            </main>
            <?php include './includes/footer.php'; ?>
        </body>
        </html>
        