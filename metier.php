<?php
    if(isset($_GET['m'])){
        $data=$_GET['m'];
        include_once('assets/phpIncludes/connexion.php');
        $requete = $connexion->prepare('SELECT * FROM article where TITRE_ART="'.$data.'"');
        $requete->execute();
        $metier = $requete->fetchAll();
    }else{
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
        include_once('assets/phpIncludes/navbar.php');
    ?>
    <div class="container-fluid d-flex justify-content-center mt-5">
        <h1><?php echo($metier[0]["TITRE_ART"]);?></h1>
    </div>
    <div class="container-fluid p-5">
        <h2>Description</h2>
        <p class="p-3"><?php echo($metier[0]["DESCR_ART"]);?></p>
        <h2>Salaires</h2>
        <p class="p-3"><?php echo($metier[0]["SALAIRE_ART"]);?>€ par mois</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>