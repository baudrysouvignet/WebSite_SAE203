<?php
    $page = basename($_SERVER['PHP_SELF']);
?>



<header>
    <img src="img/WLogo.svg" alt="Logo de l'entreprise">
    <nav>
        <div>
            <a href="index.php" class="<?php echo $page == 'index.php' ? 'active' : 'no-active' ?>"><i class="fa-solid fa-home"></i></a>
            <span>Accueil</span>
        </div>

        <?php
        foreach ($tab as $key => $value){ /*affiche les 3 premiers icons*/
            $id = $value['id_tag'];
            $icon = $value['icon'];
            $nom = str_replace(' ', '&nbsp;', $value['nom']); /*remplacer les espaces par des espces inséquable*/
            $class = 'link';

            if ($page == 'pages.php'){
                $class = $_GET['id'] == $value['id_tag'] ? 'active' : 'no-active';
            }

            echo <<<HTML
<div>
    <a href="pages.php?id=$id" class="$class"><i class="fa-solid fa-$icon"></i></a>
    <span><span class="color">#</span>$nom</span>
</div>
HTML;
        } ?>
    </nav>
    <div>
        <a href="rediger.php"><i class="fa-solid fa-pen-to-square"></i></a>
        <span>Rediger&nbsp;votre&nbsp;article</span>
    </div>

</header>