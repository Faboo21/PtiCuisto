<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link href="../css/bootstrap.css" rel="stylesheet" />
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <img src="../image/Logo.png" alt="pititCuistoLogo" width="10%" />

                    <li class="nav-item">
                        <a class="nav-link active text-left text-light" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-left text-light" href="#">Nos Recettes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-default dropdown-toggle text-left text-light" type="button" href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Filtres
                            <span class="caret text-left text-light"></span>
                        </button>
                        <ul class="dropdown-menu bg-primary" aria-labelledby="dropdownMenu1">
                            <li><a class="dropdown-item text-light text-center" href="#" title="Lien 1">Categories</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-light text-center" href="#" title="Lien 2">Titre</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-light text-center" href="#" title="Lien 3">Ingrediants</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-left text-light" href="#">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>



<?php

require_once '../model/requete.php';


$stmt = afficheTroisRecette();


foreach ($stmt as $row) {
  echo $row['rec_TITRE'].'  '.$row['REC_Resum'].' '.$row['rec_IMAGE'];
  echo "<br />";    

}



?>