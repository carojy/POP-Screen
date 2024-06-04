<?php
session_start();
?> 

<header>
    <img src="resoc.jpg" alt="Logo de notre réseau social"/>
    <nav id="menu">
        <a href="/projet-collectif-r-seau-social-php-cmc-project/news.php">Actualités</a>
        <a href="/projet-collectif-r-seau-social-php-cmc-project/wall.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mur</a>
        <a href="/projet-collectif-r-seau-social-php-cmc-project/feed.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Flux</a>
        <a href="/projet-collectif-r-seau-social-php-cmc-project/tags.php?tag_id=1">Mots-clés</a>
    </nav>
    <nav id="user">
        <a href="#">Profil</a>
        <ul>
            <li><a href="/projet-collectif-r-seau-social-php-cmc-project/settings.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Paramètres</a></li>
            <li><a href="/projet-collectif-r-seau-social-php-cmc-project/followers.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mes suiveurs</a></li>
            <li><a href="/projet-collectif-r-seau-social-php-cmc-project/subscriptions.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mes abonnements</a></li>
        </ul>
    </nav>
</header>