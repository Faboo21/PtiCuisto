<nav class="navbar navbar-expand-lg bg-body-tertiary bg-secondary titre bleu">
    <div class="container-fluid">
        <img class="img-fluid logo" src="../../images/Logo.png" alt="pititCuistoLogo" width="10%" />
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-left" href="./edito.php" style="color:#000000;">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-left" href="../../controller/categorie.php?filter=0" style="color:#000000;">Nos Recettes</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-default dropdown-toggle text-left" style="color:#000000;" type="button" href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Filtres
                        <span class="caret text-left"></span>
                    </button>
                    <ul class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenu1">
                        <li><a class="dropdown-item text-center cursor-pointer" style="color:#000000;" title="Lien 1" data-toggle="modal" data-target="#modaleCategorie">Categories</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-center cursor-pointer" style="color:#000000;" data-toggle="modal" data-target="#modaleTitre" title="Lien 2">Titre</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-center cursor-pointer" style="color:#000000;" data-toggle="modal" data-target="#modaleIngredients" title="Lien 3">Ingredients</a></li>
                    </ul>
                </li>
            </ul>
            
            <div class="flex-grow-1"></div>

            <?php
            if (isset($_SESSION["user"])) {
                echo '<a class="nav-link text-left cursor-pointer" href="../../controller/deconnexion.php" style="color:#000000;">'.$_SESSION['user'].' : Se deconnecter</a>';
            } else {
                echo '<a class="nav-link text-left cursor-pointer" data-toggle="modal" data-target="#modaleConnexion" style="color:#000000;">Connexion</a>';
            }
            ?>
        </div>
    </div>
</nav>



<div class="modal fade" id="modalInscr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Créez votre compte</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <form action="../../controller/inscription.php" class="signup-form" method="get">
                    <div class="form-group mb-2">
                        <label for="pseudoI">Pseudo</label>
                        <input id="pseudoI" name="pseudoI" type="text" class="form-control" placeholder="Pseudo" autocomplete="on" require>
                    </div>
                    <div class="form-group mb-2">
                        <label for="firstNameI">Prenom</label>
                        <input id="firstNameI" name="firstNameI" type="text" class="form-control" placeholder="Prenom" autocomplete="on" require>
                    </div>
                    <div class="form-group mb-2">
                        <label for="nameI">Nom</label>
                        <input id="nameI" name="nameI" type="text" class="form-control" placeholder="Nom" autocomplete="on" require>
                    </div>
                    <div class="form-group mb-2">
                        <label for="emailI">Adresse mail</label>
                        <input id="emailI" name="emailI" type="email" class="form-control" placeholder="Email" autocomplete="on" require>
                    </div>
                    <div class="form-group mb-2">
                        <label for="passwordI">Mot de passe</label>
                        <input id="passwordI" name="passwordI" type="password" class="form-control" placeholder="Mot de passe" require>
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modaleConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Connectez vous</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <form action="../../controller/connexion.php" class="signup-form" method="get">
                    <div class="form-group mb-2">
                        <label for="emailC">Adresse mail</label>
                        <input id="emailC" name="emailC" type="email" class="form-control" placeholder="Email" autocomplete="on">
                    </div>
                    <div class="form-group mb-2">
                        <label for="passwordC">Mot de passe</label>
                        <input id="passwordC" name="passwordC" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Connexion</button>
                    </div>
                </form>
                <div class="form-group d-md-flex">
                    <div class="w-100 text-center">
                        <a href="#" class="forgot" data-toggle="modal" data-target="#modalInscr" data-dismiss="modal">Creer un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modaleCategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Categories</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <div class="form-group mb-2">
                    <a href="../../controller/categorie.php?filter=1" class="btn btn-block" style="background-color: #2a3990;color: #fff;">Entrée</a>
                </div>
                <div class="form-group mb-2">
                    <a href="../../controller/categorie.php?filter=2" class="btn btn-block" style="background-color: #2a3990;color: #fff;">Plat</a>
                </div>
                <div class="form-group mb-2">
                    <a href="../../controller/categorie.php?filter=3" class="btn btn-block" style="background-color: #2a3990;color: #fff;">Dessert</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaleTitre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Recherche par titre</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <form action="../../controller/titre.php" class="signup-form" method="get">
                    <label class="text-center" for="titre-select">Sélectionnez la recette de votre choix ou recherchez la en tapant son nom</label>
                    <select id="titre-select" name="recipe_id" class="custom-select rounded px-3 mb-3 mt-3">
                        <?php
                        require_once '../../model/RecipeManager.php';
                        $recipe = new RecipeManager();
                        $recipes = $recipe->afficheTitreRecette();
                        foreach ($recipes as $row) {
                            echo "<option value='" . $row['REC_Id'] . "'>" . $row['REC_Titre'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group mb-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaleIngredients" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Recherche par ingredients</h3>
                <ul class="ftco-footer-social p-0 text-center">
                </ul>
                <form action="../../controller/ingredients.php" class="signup-form">
                    <label class="text-center" for="ingredient-select">Sélectionnez l'ingredient de votre choix ou recherchez le en tapant son nom</label>
                    <select id="ingredient-select" name="ing" class="custom-select rounded px-3 mb-3 mt-3">
                        <?php
                        require_once '../../model/RecipeManager.php';
                        $recipe = new RecipeManager();
                        $recipes = $recipe->afficheIngredient();
                        foreach ($recipes as $row) {
                            echo "<option value='" . $row['ING_Id'] . "'>" . $row['ING_Intitule'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group mb-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION["inscription_reussie"])) {
    if ($_SESSION["inscription_reussie"] == 'mail') {
        echo '<script>alert("Cette Email est déjà utilisé")</script>';
    } elseif ($_SESSION["inscription_reussie"] == 'pseudo') {
        echo '<script>alert("Ce pseudo est déjà utilisé")</script>';
    }
    unset($_SESSION["inscription_reussie"]);
}
if (isset($_SESSION["connexion_rate"])) {
    echo '<script>alert("Email ou mot de passe incorrect !")</script>';
    unset($_SESSION["connexion_rate"]);
}
?>