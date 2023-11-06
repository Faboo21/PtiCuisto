<?php ob_start();
session_start(); ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Ajouter une Recette
                </div>
                <div class="card-body">
                    <form method="POST" action="../../controller/ajout_recetteC.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nom_recette">Nom de la recette :</label>
                            <input id="nom_recette" type="text" name="nom_recette" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="resume">Résumé :</label>
                            <textarea id="resume" name="resume" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="categorieR">Catégorie :</label>
                            <select id="categorieR" name="categorieR" class="form-control">
                                <option value="1">Entrée</option>
                                <option value="2">Plat</option>
                                <option value="3">Dessert</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="instructions">Instructions :</label>
                            <textarea id="instructions" name="instructions" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="nouveaux_ingredients">Nouveaux ingrédients :</label>
                            <div id="ingredients-container">
                                <!-- Ici, les champs d'entrée pour les nouveaux ingrédients seront ajoutés dynamiquement -->
                            </div>
                        </div>

                        <button type="button" onclick="ajouterIngredient()" class="btn btn-primary">Ajouter un ingrédient</button>

                        <div class="form-group">
                            <label for="ingredients">Ingrédients :</label>
                            <select id="ingredients" name="ingredients[]" class="form-control" multiple>
                                <?php
                                require_once("../../model/RecipeManager.php");
                                $recipe = new RecipeManager();
                                $recipes = $recipe->afficheIngredient();
                                foreach ($recipes as $row) {
                                    echo "<option value='" . $row['ING_Id'] . "'>" . $row['ING_Intitule'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image_recette">Image de votre recette :</label>
                            <input id="image_recette" type="file" name="image_recette" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="envoyer" value="Envoyer le fichier" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ajouterIngredient() {
        var container = document.getElementById("ingredients-container");
        var input = document.createElement("input");
        input.type = "text";
        input.name = "nouveaux_ingredients[]";
        input.placeholder = "Saisissez un nouvel ingrédient";
        container.appendChild(input);
    }
</script>
<?php $content = ob_get_clean();
require_once('../template.php'); ?>