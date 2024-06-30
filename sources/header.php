<?php
session_start();
?> 

<header>
    <img src="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/popcorn.png" alt="Logo pop screen" id="logo"/>
    <nav id="menu">
        <a href="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/news.php"><img src="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/actu.png" alt="actualites"></a>
        <a href="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/wall.php?user_id=<?php echo $_SESSION['connected_id']; ?>"><img src="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/mur.png" alt="mur"></a>
        <a href="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/feed.php?user_id=<?php echo $_SESSION['connected_id']; ?>"><img src="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/feed.png" alt="feed"></a>
        <a href="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/tags.php?tag_id=1"><img src="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/tags.png" alt="mots cles"></a>
    </nav>
    <nav id="user">
        <a href="#"><img src="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/profil.png" alt="icone de profil"></a>
        <ul>
            <li><a href="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/settings.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Paramètres</a></li>
            <li><a href="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/followers.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mes suiveurs</a></li>
            <li><a href="/Reseau-social-POP-SCREEN/Mon-dossier-forked/POP-Screen/subscriptions.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mes abonnements</a></li>
        </ul>
    </nav>
</header>