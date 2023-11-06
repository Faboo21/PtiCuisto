<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"><i class="fas fa-bars fa-1x"></i></span>
        </button>

        <img class="mr-5" src="../../images/Logo.png" alt="pititCuistoLogo" width="10%" />

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-left text-light" aria-current="page" href="./accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-left text-light" href="../../controller/categorie.php?filter=0">Nos
                        Recettes</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-default dropdown-toggle text-left text-light" type="button" href="#"
                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Filtres
                        <span class="caret text-left text-light"></span>
                    </button>
                    <ul class="dropdown-menu bg-primary" aria-labelledby="dropdownMenu1">
                        <li><a class="dropdown-item text-light text-center" title="Lien 1" data-toggle="modal"
                                data-target="#modaleCategorie">Categories</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-light text-center" data-toggle="modal"
                                data-target="#modaleTitre" title="Lien 2">Titre</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-light text-center" data-toggle="modal"
                                data-target="#modaleIngredients" title="Lien 3">Ingredients</a></li>
                    </ul>
                </li>
                <?php
                if (isset($_SESSION["user"])) {
                    if(isset($_SESSION["isadmin"]) && $_SESSION["isadmin"] == 2){
                        echo '<li class="nav-item dropdown">
                            <button class="btn btn-default dropdown-toggle text-left text-light" type="button" href="#"
                                id="dropdownMenuAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Gérer
                                <span class="caret text-left text-light"></span>
                            </button>
                            <ul class="dropdown-menu bg-primary" aria-labelledby="dropdownMenuAdmin">
                                <li><a class="dropdown-item text-light text-center" title="Lien 1" data-toggle="modal"
                                        data-target="">Recettes</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-light text-center" data-toggle="modal"
                                        data-target="" title="Lien 2">Comptes</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-light text-center" data-toggle="modal"
                                        data-target="" title="Lien 3">Autres</a></li>
                            </ul>
                        </li>';
                    }
                    
                    echo '<li class="nav-item">
                        <a class="nav-link text-left text-light" href="../../controller/categorie.php?filter=0">
                            Mon Compte</a>
                        </li>';
                    
                    echo '<li class="nav-item">
                            <a class="nav-link text-left text-light" href="../../controller/deconnexion.php">Se deconnecter</a>
                        </li>';
                } else {
                    echo '<li class="nav-item">
                            <a class="nav-link text-left text-light" data-toggle="modal" data-target="#modaleConnexion">Connexion</a>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>


<div class="modal fade" id="modalInscr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center"
                    data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Créez votre compte</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <form action="../../controller/inscription.php" class="signup-form" method="get">
                    <div class="form-group mb-2">
                        <label for="pseudo">Pseudo</label>
                        <input id="pseudo" name="pseudo" type="text" class="form-control" placeholder="Pseudo"
                            autocomplete="on">
                    </div>
                    <div class="form-group mb-2">
                        <label for="firstName">Prenom</label>
                        <input id="firstName" name="firstName" type="text" class="form-control" placeholder="Prenom"
                            autocomplete="on">
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Nom</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Nom"
                            autocomplete="on">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Adresse mail</label>
                        <input idemail name="email" type="email" class="form-control" placeholder="Email"
                            autocomplete="on">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Mot de passe</label>
                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="Mot de passe">
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit"
                            class="form-control btn btn-primary rounded submit px-3">Inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modaleConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center"
                    data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Connectez vous</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <form action="../../controller/connexion.php" class="signup-form" method="get">
                    <div class="form-group mb-2">
                        <label for="email">Adresse mail</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Email"
                            autocomplete="on">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Mot de passe</label>
                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="Password">
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit"
                            class="form-control btn btn-primary rounded submit px-3">Connexion</button>
                    </div>
                </form>
                <div class="form-group d-md-flex">
                    <div class="w-100 text-center">
                        <a href="#" class="forgot" data-toggle="modal" data-target="#modalInscr"
                            data-dismiss="modal">Creer un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modaleCategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center"
                    data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Categories</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <div class="form-group mb-2">
                    <a href="../../controller/categorie.php?filter=1" class="btn btn-primary btn-block">Entrée</a>
                </div>
                <div class="form-group mb-2">
                    <a href="../../controller/categorie.php?filter=2" class="btn btn-secondary btn-block">Plat</a>
                </div>
                <div class="form-group mb-2">
                    <a href="../../controller/categorie.php?filter=3" class="btn btn-warning btn-block">Dessert</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaleTitre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center"
                    data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Recherche par titre</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <form action="../../controller/titre.php" class="signup-form">
                    <select id="titre-select" class="custom-select rounded px-3 mb-3 mt-3">
                        <?php
                        require_once '../../model/RecipeManager.php';
                        $recipe = new RecipeManager();
                        $recipes = $recipe->afficheTitreRecette();
                        foreach ($recipes as $row) {
                            echo "<option value='" . $row['rec_id'] . "'>" . $row['rec_TITRE'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group mb-2">
                        <button type="submit"
                            class="form-control btn btn-primary rounded submit px-3">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaleIngredients" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center"
                    data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Recherche par ingredients</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <form action="../../controller/ingredients.php" class="signup-form">
                    <select id="ingredient-select" class="custom-select rounded px-3 mb-3 mt-3">
                        <?php
                        require_once '../../model/RecipeManager.php';
                        $recipe = new RecipeManager();
                        $recipes = $recipe->afficheIngredient();
                        foreach ($recipes as $row) {
                            echo "<option value='" . $row['ing_id'] . "'>" . $row['ING_intitule'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group mb-2">
                        <button type="submit"
                            class="form-control btn btn-primary rounded submit px-3">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION["inscription_rate"])) {
    if ($_SESSION["inscription_rate"] == 'vide') {
        echo '<script>alert("Veuillez remplir tous les champs")</script>';
    } elseif ($_SESSION["inscription_rate"] == 'mail') {
        echo '<script>alert("Cette Email est déjà utilisé")</script>';
    } elseif ($_SESSION["inscription_rate"] == 'pseudo') {
        echo '<script>alert("Ce pseudo est déjà utilisé")</script>';
    }
    unset($_SESSION["inscription_rate"]);
}
if (isset($_SESSION["connexion_rate"])) {
    if ($_SESSION["connexion_rate"] == 'vide') {
        echo '<script>alert("Veuillez remplir tous les champs !")</script>';
    } else {
        echo '<script>alert("Email ou mot de passe incorrect !")</script>';
    }
    unset($_SESSION["connexion_rate"]);
}
?>


<!-- <script>
        /var modal = document.getElementById("modalInscr");
        if (modal) {
            modal.style.display = "block";
        }
</script> -->