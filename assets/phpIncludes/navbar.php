<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">BTS SIO 1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
            <?php
                $requete = $connexion->prepare('SELECT ID_CAT from categorie');
                $requete->execute();
                $categorie = $requete->fetchAll();

                foreach($categorie as $categ){
                    $requete = $connexion->prepare('SELECT * FROM article inner join categorie on article.ID_CAT = categorie.ID_CAT where article.ID_CAT=:categorie and STATUS_ART="A"');
                    $requete->bindValue(':categorie', $categ["ID_CAT"], PDO::PARAM_INT);
                    $requete->execute();
                    $articles = $requete->fetchAll();

                    $requete = $connexion->prepare('SELECT distinct LIBELLE_CATEG FROM `categorie` inner join article on article.ID_CAT = categorie.ID_CAT where categorie.ID_CAT=:ID_CAT');
                    $requete->bindValue(':ID_CAT', $categ["ID_CAT"], PDO::PARAM_INT);
                    $requete->execute();
                    $actualCat = $requete->fetchAll();
                    ?>
                        <li class="nav-item dropdown">
                            <?php 
                            if(sizeof($articles)!=0){ ?>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo($actualCat[0]["LIBELLE_CATEG"]); ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <?php
                                        foreach($articles as $art){
                                            echo('<li><a class="dropdown-item" href="metier.php?m='.$art["ID_ART"].'">'.$art["TITRE_ART"].'</a></li>');
                                        }
                                    ?>
                                </ul>
                                <?php 
                            }else{
                                ?>
                                <a class="nav-link disabled" href="#" aria-disabled="true">
                                    <?php echo($actualCat[0]["LIBELLE_CATEG"]); ?>
                                </a>
                                <?php
                            }?>
                        </li>
                    <?php
                }
                
            ?>
        </ul>
    </div>
  </div>
</nav>