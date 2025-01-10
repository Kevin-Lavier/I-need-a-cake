<header class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div>
            <a href="/I_need_a_cake/index.php">
            <img src="/I_need_a_cake/assets/images/logo_i_need_a_cake.png" alt="Logo I need a cake" class="h-12">
            </a>
        </div>
        <!-- Navigation -->
        <nav>
            <ul class="flex space-x-6">
                <li><a href="/I_need_a_cake/index.php" class="hover:underline">Accueil</a></li>
                <li><a href="/I_need_a_cake/index.php" class="hover:underline">Pâtisseries</a></li>
                <li><a href="/I_need_a_cake/index.php" class="hover:underline">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
    <li><a href="profile.php" class="hover:underline">Profil</a></li>
<?php endif; ?>

                <li>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/I_need_a_cake/logout.php" class="hover:underline">Déconnexion</a>
    <?php else: ?>
        <a href="/I_need_a_cake/login.php" class="hover:underline">Connexion</a>
    <?php endif; ?>
</li>
            </ul>
        </nav>
    </div>
</header>
