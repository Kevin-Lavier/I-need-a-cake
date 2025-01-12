<?php
session_start(); // Démarrer la session pour accéder aux données utilisateur
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include './includes/header.php'; ?>

    <main class="container mx-auto py-12">
        <!-- Section de bienvenue -->
        <section class="relative bg-cover bg-center h-[400px] flex items-center justify-center text-center text-white"
                 style="background-image: url('./assets/images/cake_background.jpg');">
            <div class="bg-black bg-opacity-50 p-8 rounded-md">
                <h1 class="text-4xl font-bold">
                    <?php if (isset($_SESSION['name'])): ?>
                        Bienvenue, <?= htmlspecialchars($_SESSION['name']); ?> !
                    <?php else: ?>
                        Bienvenue sur I need a cake
                    <?php endif; ?>
                </h1>
                <p class="text-lg mt-4">Découvrez nos délicieuses pâtisseries, faites avec passion et amour.</p>
            </div>
        </section>

       


    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>
