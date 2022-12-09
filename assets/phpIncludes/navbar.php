<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">BTS SIO 1</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <?php
            $requete = $connexion->prepare('SELECT LIBELLE_CATEG from categorie');
            $requete->execute();
            $categorie = $requete->fetchAll();

            foreach($categorie as $categ){
                $requete = $connexion->prepare('SELECT * FROM article inner join categorie on article.ID_CAT = categorie.ID_CAT where LIBELLE_CATEG="'.$categ["LIBELLE_CATEG"].'"');
                $requete->execute();
                $article = $requete->fetchAll();
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo($categ["LIBELLE_CATEG"]); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <?php
                                foreach($article as $art){
                                    echo('<li><a class="dropdown-item" href="metier.php?m='.$art["TITRE_ART"].'">'.$art["TITRE_ART"].'</a></li>');
                                }
                            ?>
                        </ul>
                    </li>
                <?php
            }
        ?>
      </ul>
    </div>
  </div>
</nav>