<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ReSoC - Flux</title>         
        <meta name="author" content="Julien Falconnet">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <header>
            <img src="resoc.jpg" alt="Logo de notre réseau social"/>
            <nav id="menu">
                <a href="news.php">Actualités</a>
                <a href="wall.php?user_id=5">Mur</a>
                <a href="feed.php?user_id=5">Flux</a>
                <a href="tags.php?tag_id=5">Mots-clés</a>
            </nav>
            <nav id="user">
                <a href="#">Profil</a>
                <ul>
                    <li><a href="settings.php?user_id=5">Paramètres</a></li>
                    <li><a href="followers.php?user_id=5">Mes suiveurs</a></li>
                    <li><a href="subscriptions.php?user_id=5">Mes abonnements</a></li>
                </ul>

            </nav>
        </header>
        <div id="wrapper">
            <?php
            /**
             * Cette page est TRES similaire à wall.php. 
             * Vous avez sensiblement à y faire la meme chose.
             * Il y a un seul point qui change c'est la requete sql.
             */
            /**
             * Etape 1: Le mur concerne un utilisateur en particulier
             */
            $userId = intval($_GET['user_id']);
            ?>

            <?php
            /** Etape 2: se connecter à la base de donnée*/
            include("sources/connexion.php");
            ?>

            <aside>
                <?php
                /**
                 * Etape 3: récupérer le nom de l'utilisateur
                 */
                $laQuestionEnSql = "SELECT * FROM `users` WHERE id= '$userId' ";
                include("sources/library.php");
                $user = $lesInformations->fetch_assoc();
                
                //echo "<pre>" . print_r($user, 1) . "</pre>";
                ?>
                <img src="user.jpg" alt="Portrait de l'utilisatrice"/>
                <section>
                    <h3>Présentation</h3>
                    <p>Sur cette page vous trouverez tous les message des utilisatrices
                        auxquel est abonnée l'utilisatrice <?php echo $user["alias"] ?>
                        (n° <?php echo $userId ?>)
                    </p>

                </section>
            </aside>
            <main>
                <?php
                /**
                 * Etape 3: récupérer tous les messages des abonnements
                 */
                $laQuestionEnSql = "
                    SELECT posts.content,
                    posts.created,
                    users.alias as author_name, 
                    users.id as author_id, 
                    count(likes.id) as like_number,  
                    GROUP_CONCAT(DISTINCT tags.label) AS taglist 
                    FROM followers 
                    JOIN users ON users.id=followers.followed_user_id
                    JOIN posts ON posts.user_id=users.id
                    LEFT JOIN posts_tags ON posts.id = posts_tags.post_id  
                    LEFT JOIN tags       ON posts_tags.tag_id  = tags.id 
                    LEFT JOIN likes      ON likes.post_id  = posts.id 
                    WHERE followers.following_user_id='$userId' 
                    GROUP BY posts.id
                    ORDER BY posts.created DESC  
                    ";
                include("sources/library.php");
                if ( ! $lesInformations)
                {
                    echo("Échec de la requete : " . $mysqli->error);
                }

                //Etape 4 : afficher les posts du flux
                ?>   

                <?php while ($post = $lesInformations->fetch_assoc())
                {
                ?>                
                    <article>
                        <h3>
                <?php
                    $date =new DateTime($post['created']); 
                    //strftime('%d-%m-%Y',strtotime($date));
                    echo "<pre>" . print_r($post, 1) . "</pre>";
                
                ?>
                            <time><?php echo $date->format('l jS \o\f F Y h:i:s A'), "\n";?></time>
                        </h3>
                        <address><a href="wall.php?user_id=<?php echo $post["author_id"] ?>">De <?php echo $post["author_name"] ?></a></address>
                        <div>
                        
                            <p><?php echo $post["content"] ?></p>
                        </div>                                            
                        <footer>
                            <small>♥ <?php echo $post["like_number"] ?></small>
                            <a href="">#<?php echo $post["taglist"] ?></a>
                        </footer>
                    </article>
                <?php } ?>

            </main>
        </div>
    </body>
</html>
