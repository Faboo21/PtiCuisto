<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <img class="mr-5" src="../../images/Logo.png" alt="pititCuistoLogo" width="10%" />

                <li class="nav-item">
                    <a class="nav-link active text-left text-light" aria-current="page" href="./accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-left text-light" href="../../controller/categorie.php?filter=0">Nos Recettes</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-default dropdown-toggle text-left text-light" type="button" href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Filtres
                        <span class="caret text-left text-light"></span>
                    </button>
                    <ul class="dropdown-menu bg-primary" aria-labelledby="dropdownMenu1">
                        <li><a class="dropdown-item text-light text-center" title="Lien 1" data-toggle="modal" data-target="#modaleCategorie">Categories</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-light text-center" data-toggle="modal" data-target="#modaleTitre" title="Lien 2">Titre</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-light text-center" href="#" title="Lien 3">Ingredients</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-left text-light" data-toggle="modal" data-target="#modalInscr">Connexion</a>
                </li>
            </ul>
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
                <form action="../../controller/inscription.php" class="signup-form">
                    <div class="form-group mb-2">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" placeholder="Nom">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Adresse mail</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Inscription</button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-100 text-center">
                            <a href="#" class="forgot" data-toggle="modal" data-target="#modaleConnexion" data-dismiss="modal">J'ai deja un compte</a>
                        </div>
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
                <form action="../../controller/connexion.php" class="signup-form">
                    <div class="form-group mb-2">
                        <label for="email">Adresse mail</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Connexion</button>
                    </div>
                </form>
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
                    <a href="../../controller/categorie.php?filter=1" class="btn btn-primary btn-block">Petit déjeuner</a>
                </div>
                <div class="form-group mb-2">
                    <a href="../../controller/categorie.php?filter=2" class="btn btn-secondary btn-block">Déjeuner</a>
                </div>
                <div class="form-group mb-2">
                    <a href="../../controller/categorie.php?filter=3" class="btn btn-warning btn-block">Dinner</a>
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
                <form action="../../controller/titre.php" class="signup-form">
                    <div class="form-group mb-2">
                        <label for="titre">Titre</label>
                        <input type="titre" class="form-control" placeholder="Titre">
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>