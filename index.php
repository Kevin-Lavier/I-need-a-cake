<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I need a cake</title>
    <link rel="stylesheet" href="./dist/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <main class="container mx-auto py-12">
        <!-- Section Héro -->
        <section class="relative bg-cover bg-center h-[400px] flex items-center justify-center text-center text-white"
                 style="background-image: url('./assets/images/cake_background.jpg');">
            <div class="bg-black bg-opacity-50 p-8 rounded-md">
                <h1 class="text-4xl font-bold">
                    <?php if (isset($_SESSION['full_name'])): ?>
                        Bienvenue, <?= htmlspecialchars($_SESSION['full_name']); ?> !
                    <?php else: ?>
                        Bienvenue sur I need a cake
                    <?php endif; ?>
                </h1>
                <p class="text-lg mt-4">Découvrez nos délicieuses pâtisseries, faites avec passion et amour.</p>
            </div>
        </section>

        <section class="py-12">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Nos créations en vedette</h2>
        
        <!-- Carrousel -->
        <div x-data="{ currentSlide: 0 }" class="relative overflow-hidden">
            <!-- Slides -->
            <div class="flex transition-transform duration-500" :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
                <div class="flex-none w-full">
                    <img src="./assets/images/patisserie1.jpg" alt="Macarons au chocolat" class="w-full h-80 object-cover rounded-lg">
                    <p class="text-center text-lg mt-4">Macarons au chocolat - Un délice gourmand.</p>
                </div>
                <div class="flex-none w-full">
                    <img src="./assets/images/patisserie2.jpg" alt="Éclair à la vanille" class="w-full h-80 object-cover rounded-lg">
                    <p class="text-center text-lg mt-4">Éclair à la vanille - Une douceur classique.</p>
                </div>
                <div class="flex-none w-full">
                    <img src="./assets/images/patisserie3.jpg" alt="Tarte aux framboises" class="w-full h-80 object-cover rounded-lg">
                    <p class="text-center text-lg mt-4">Tarte aux framboises - Fraîcheur assurée.</p>
                </div>
            </div>

            <!-- Boutons précédent et suivant -->
            <button 
                @click="currentSlide = (currentSlide > 0) ? currentSlide - 1 : 2"
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white text-gray-800 rounded-full p-2 shadow-md hover:bg-gray-200">
                &#10094;
            </button>
            <button 
                @click="currentSlide = (currentSlide < 2) ? currentSlide + 1 : 0"
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white text-gray-800 rounded-full p-2 shadow-md hover:bg-gray-200">
                &#10095;
            </button>

            <!-- Indicateurs -->
            <div class="flex justify-center mt-4 space-x-2">
                <button 
                    @click="currentSlide = 0"
                    :class="{ 'bg-blue-500': currentSlide === 0, 'bg-gray-300': currentSlide !== 0 }"
                    class="w-3 h-3 rounded-full transition-colors"></button>
                <button 
                    @click="currentSlide = 1"
                    :class="{ 'bg-blue-500': currentSlide === 1, 'bg-gray-300': currentSlide !== 1 }"
                    class="w-3 h-3 rounded-full transition-colors"></button>
                <button 
                    @click="currentSlide = 2"
                    :class="{ 'bg-blue-500': currentSlide === 2, 'bg-gray-300': currentSlide !== 2 }"
                    class="w-3 h-3 rounded-full transition-colors"></button>
            </div>
        </div>
    </div>
</section>


        <!-- Section Storytelling -->
        <section class="py-12">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold">Notre histoire</h2>
                <p class="text-gray-600 mt-4 max-w-3xl mx-auto">
                    "I need a cake" est né d'une passion pour la pâtisserie artisanale et le bonheur qu'elle procure. 
                    Chaque gâteau, tarte, ou viennoiserie raconte une histoire, celle d'une tradition française mêlée 
                    à une touche de créativité contemporaine. Nous croyons que chaque bouchée doit être une expérience unique.
                </p>
            </div>
            <div class="bg-gray-100 rounded-md py-8 px-6 shadow-lg">
                <blockquote class="text-xl italic text-gray-800 text-center">
                    "Un gâteau, c'est bien plus qu'un dessert. C'est un sourire, une émotion, un moment partagé."
                </blockquote>
            </div>
        </section>

        <!-- Section Valeurs -->
        <section class="py-12">
            <div class="text-center">
                <h2 class="text-3xl font-bold mb-6">Nos valeurs</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white shadow-md rounded-md p-6">
                        <h3 class="text-lg font-bold mb-4">Qualité</h3>
                        <p class="text-gray-600">Nous sélectionnons les meilleurs ingrédients pour garantir des saveurs authentiques.</p>
                    </div>
                    <div class="bg-white shadow-md rounded-md p-6">
                        <h3 class="text-lg font-bold mb-4">Créativité</h3>
                        <p class="text-gray-600">Chaque pâtisserie est conçue avec une touche d'originalité et de modernité.</p>
                    </div>
                    <div class="bg-white shadow-md rounded-md p-6">
                        <h3 class="text-lg font-bold mb-4">Savoir-faire</h3>
                        <p class="text-gray-600">Nos pâtissiers perpétuent les techniques traditionnelles avec passion.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Appel à l'action -->
        <section class="py-12 bg-gray-100 text-center">
            <h2 class="text-3xl font-bold mb-4">Prêt à succomber à nos créations ?</h2>
            <p class="text-gray-600 mb-6">Explorez notre collection de pâtisseries et laissez-vous tenter par vos desserts préférés.</p>
            <a href="./patisseries.php" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-6 rounded text-lg">Voir nos pâtisseries</a>
        </section>
    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>
