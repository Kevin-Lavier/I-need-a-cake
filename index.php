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

        <section class="py-12 bg-gray-100">
    <div class="container mx-auto text-center">
        <!-- Titre de la section -->
        <h2 class="text-3xl font-bold mb-6">Nos pâtisseries populaires</h2>
        <!-- Grille des pâtisseries -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
            <!-- Carte 1 -->
            <a href="./patisseries/details.php?id=1" class="block bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <img src="./assets/images/patisserie1.jpg" alt="Macarons au chocolat" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Macarons au chocolat</h3>
                    <p class="text-gray-600 mt-2">Un délice gourmand pour tous les amateurs de chocolat.</p>
                </div>
            </a>
            <!-- Carte 2 -->
            <a href="./patisseries/details.php?id=2" class="block bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <img src="./assets/images/patisserie2.jpg" alt="Éclair à la vanille" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Éclair à la vanille</h3>
                    <p class="text-gray-600 mt-2">Une pâtisserie classique et savoureuse.</p>
                </div>
            </a>
            <!-- Carte 3 -->
            <a href="./patisseries/details.php?id=3" class="block bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <img src="./assets/images/patisserie3.jpg" alt="Tarte aux framboises" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Tarte aux framboises</h3>
                    <p class="text-gray-600 mt-2">Fraîcheur et douceur dans chaque bouchée.</p>
                </div>
            </a>
            <!-- Carte 4 -->
            <div class="bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <a href="./patisseries/details.php?id=4">
                    <img src="./assets/images/patisserie4.jpg" alt="Croissant au beurre" class="w-full h-40 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold">
                        <a href="./patisseries/details.php?id=4" class="hover:underline">Croissant au beurre</a>
                    </h3>
                    <p class="text-gray-600 mt-2">Le classique du petit-déjeuner français.</p>
                </div>
            </div>
            <!-- Carte 5 -->
            <div class="bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <a href="./patisseries/details.php?id=5">
                    <img src="./assets/images/patisserie5.jpg" alt="Pain au chocolat" class="w-full h-40 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold">
                        <a href="./patisseries/details.php?id=5" class="hover:underline">Pain au chocolat</a>
                    </h3>
                    <p class="text-gray-600 mt-2">Un incontournable pour une pause gourmande.</p>
                </div>
            </div>
            <!-- Carte 6 -->
            <div class="bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <a href="./patisseries/details.php?id=6">
                    <img src="./assets/images/patisserie6.jpg" alt="Cheesecake au citron" class="w-full h-40 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold">
                        <a href="./patisseries/details.php?id=6" class="hover:underline">Cheesecake au citron</a>
                    </h3>
                    <p class="text-gray-600 mt-2">Un mélange parfait de douceur et d'acidité.</p>
                </div>
            </div>
            <!-- Carte 7 -->
            <div class="bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <a href="./patisseries/details.php?id=7">
                    <img src="./assets/images/patisserie7.jpg" alt="Gâteau Opéra" class="w-full h-40 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold">
                        <a href="./patisseries/details.php?id=7" class="hover:underline">Gâteau Opéra</a>
                    </h3>
                    <p class="text-gray-600 mt-2">Une harmonie de chocolat et de café.</p>
                </div>
            </div>
            <!-- Carte 8 -->
            <div class="bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <a href="./patisseries/details.php?id=8">
                    <img src="./assets/images/patisserie8.jpg" alt="Tarte Tatin" class="w-full h-40 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold">
                        <a href="./patisseries/details.php?id=8" class="hover:underline">Tarte Tatin</a>
                    </h3>
                    <p class="text-gray-600 mt-2">Un classique renversant aux pommes caramélisées.</p>
                </div>
            </div>
            <!-- Carte 9 -->
            <div class="bg-white shadow-md rounded-md overflow-hidden hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                <a href="./patisseries/details.php?id=9">
                    <img src="./assets/images/patisserie9.jpg" alt="Mille-feuille" class="w-full h-40 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold">
                        <a href="./patisseries/details.php?id=9" class="hover:underline">Mille-feuille</a>
                    </h3>
                    <p class="text-gray-600 mt-2">Un dessert élégant et croustillant.</p>
                </div>
            </div>
        </div>
    </div>
</section>


    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>
