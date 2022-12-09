<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <?php
            // $test=$connexion->$prepare("SELECT * from categorie")->execute();
            // var_dump($test);
            $requete = $connexion->prepare('SELECT LIBELLE_CATEG from categorie');
            $requete->execute();
            $categorie = $requete->fetchAll();

            foreach($categorie as $categ){
                $requete = $connexion->prepare('SELECT TITRE_ART,categorie.ID_CAT FROM article inner join categorie on article.ID_CAT = categorie.ID_CAT where LIBELLE_CATEG="'.$categ["LIBELLE_CATEG"].'"');
                $requete->execute();
                $article = $requete->fetchAll();
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo($categ["LIBELLE_CATEG"]); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <?php
                                //foreach($article as $art){
                                    //echo($art);
                                    //<li><a class="dropdown-item" href="#">TRUC</a></li>
                                //}
                                var_dump($article);
                                foreach($article as $art){
                                    echo($art);
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