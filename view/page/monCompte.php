<?php ob_start(); ?>
<?php session_start(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="titre mt-2">Mon Compte</h1>
            <?php
            require_once '../../model/accountManager.php';
            $account = new AccountManager();
            $stmt = $account->infoCompte($_SESSION['user']);

            echo "<p><strong>Pseudo :</strong> " . $stmt[0]['UTI_Pseudo'] . "</p>";
            echo "<p><strong>Nom :</strong> " . $stmt[0]['UTI_Nom'] . "</p>";
            echo "<p><strong>Prénom :</strong> " . $stmt[0]['UTI_Prenom'] . "</p>";
            echo "<p><strong>Adresse mail :</strong> " . $stmt[0]['UTI_Mail'] . "</p>";
            echo "<p><strong>Date d'inscription :</strong> " . $stmt[0]['UTI_DateInscription'] . "</p>";

            $typeCompte = ($stmt[0]['UTI_TypeUser'] == 1) ? "Utilisateur" : "Administrateur";
            echo "<p><strong>Type du compte :</strong> $typeCompte</p>";

            $statutCompte = ($stmt[0]['UTI_Statut'] == 1) ? "Actif" : "Banni";
            echo "<p><strong>Statut du compte :</strong> $statutCompte</p>";
            ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            <a class="nav-link cursor-pointer" data-toggle="modal" data-target="#modalModif" style="color: #000000;">Modifier</a>
        </div>
    </div>
</div>

<!-- Modal de modification -->
<div class="modal fade" id="modalModif" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Contenu du modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body p-4 py-5 p-md-5">
                <h3 class="text-center mb-3">Modifier les informations de votre compte :</h3>
                <form action="../../controller/modifierInfo.php" class="signup-form" method="get">
                    <div class="form-group mb-2">
                        <label for="firstNameM">Prénom</label>
                        <input id="firstNameM" name="firstNameM" type="text" class="form-control" placeholder="Prénom" autocomplete="on" value=<?php echo $stmt[0]['UTI_Nom']; ?> required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="nameM">Nom</label>
                        <input id="nameM" name="nameM" type="text" class="form-control" placeholder="Nom" autocomplete="on" value=<?php echo $stmt[0]['UTI_Prenom']; ?> required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="passwordM">Mot de passe</label>
                        <input id="passwordM" name="passwordM" type="password" class="form-control" placeholder="Mot de passe" value="" required>
                    </div>
                    <div class="form-group mb-2" hidden>
                        <label for="pseudoM">Pseudo</label>
                        <input id="pseudoM" name="pseudoM" type="text" class="form-control" placeholder="Pseudo" autocomplete="on" value=<?php echo $stmt[0]['UTI_Pseudo']; ?> required>
                    </div>
                    <div class="form-group mb-2" hidden>
                        <label for="emailM">Adresse mail</label>
                        <input id="emailM" name="emailM" type="email" class="form-control" placeholder="Email" autocomplete="on" value=<?php echo $stmt[0]['UTI_Mail']; ?> required>
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" id="envoyer" disabled class="form-control btn btn-primary rounded submit px-3">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let btn = document.getElementById("envoyer");
    let mail = document.getElementById("emailM");
    let pseudo = document.getElementById("pseudoM");
    let nom = document.getElementById("nameM");
    let prenom = document.getElementById("firstNameM");
    let mdp = document.getElementById("passwordM");

    mail.addEventListener("input", cliquable);
    pseudo.addEventListener("input", cliquable);
    nom.addEventListener("input", cliquable);
    prenom.addEventListener("input", cliquable);
    mdp.addEventListener("input", cliquable);

    function cliquable() {
        if (mail.value == '' || pseudo.value == '' || nom.value == '' || prenom.value == '' || mdp.value == '') {
            btn.disabled = true;
        } else {
            btn.disabled = false;
        }
    }
</script>

<?php
if (isset($_SESSION["modif_rate"])) {
    if ($_SESSION["modif_rate"] == 'vide') {
        echo '<script>alert("Veuillez remplir tous les champs !")</script>';
    }
    unset($_SESSION["modif_rate"]);
}
?>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>
