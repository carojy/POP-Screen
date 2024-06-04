
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ReSoC - Administration</title> 
        <meta name="author" content="Julien Falconnet">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>

        <?php
            //ajout du header
            include("sources/header.php");

            //connexion à la base de donnée
            include("sources/connexion.php");

            //vérification connexion ok
            if ($mysqli->connect_errno)
            {
            echo("Échec de la connexion : " . $mysqli->connect_error);
            exit();
            }
        ?>

        <div id="wrapper" class='admin'>
            
            <aside>
                <h2>Mots-clés</h2>
                
                <?php
                //sélectionner tous les mots clés de la table tags dans la BDD
                $laQuestionEnSql = "SELECT * FROM `tags` LIMIT 50";
                
                //connexion $mysqli à la BDD
                include("sources/library.php");
                
                //vérification requête ok
                if (! $lesInformations)
                {
                    echo("Échec de la requete : " . $mysqli->error);
                    exit();
                }

                while ($tag = $lesInformations->fetch_assoc())
                {
                //echo "<pre>" . print_r($tag, 1) . "</pre>";
                ?>
                    <article>
                        <h3>#<?php echo $tag["label"] ?></h3>
                        <p><?php echo $tag["id"]?></p>
                        <nav>
                            <a href="tags.php?tag_id=321">Messages</a>
                        </nav>
                    </article>
                <?php } ?>
            </aside>

            <main>
                <h2>Utilisatrices</h2>
                
                <?php
                //sélectionner toutes les infos utilisateurs de la table users dans la BDD
                $laQuestionEnSql = "SELECT * FROM `users` LIMIT 50";
                
                //connexion $mysqli à la BDD
                include("sources/library.php");
                
                //vérification requête ok
                if (! $lesInformations)
                {
                    echo("Échec de la requete : " . $mysqli->error);
                    exit();
                }

                while ($lesUtilisatrices = $lesInformations->fetch_assoc())
                {
                //echo "<pre>" . print_r($tag, 1) . "</pre>";
                ?>
                    <article>
                        <h3><?php echo $lesUtilisatrices["alias"] ?></h3>
                        <p><?php echo $lesUtilisatrices["id"]?></p>
                        <nav>
                            <a href="wall.php?user_id=<?php echo $lesUtilisatrices["id"]?>">Mur</a>
                            <a href="feed.php?user_id=<?php echo $lesUtilisatrices["id"]?>">Flux</a>
                            <a href="settings.php?user_id=<?php echo $lesUtilisatrices["id"]?>">Paramètres</a>
                            <a href="followers.php?user_id=<?php echo $lesUtilisatrices["id"]?>">Suiveurs</a>
                            <a href="subscriptions.php?user_id=<?php echo $lesUtilisatrices["id"]?>">Abonnements</a>
                        </nav>
                    </article>
                <?php } ?>
            </main>
        </div>
    </body>
</html>
