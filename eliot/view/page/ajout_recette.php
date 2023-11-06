<?php ob_start();
session_start(); ?>

<form method="POST" action="../../controller/ajout_recetteC.php" enctype="multipart/form-data">
    <label for="nom_recette">Nom de la recette :</label>
    <input id="nom_recette" type="text" name="nom_recette" required>

    <label for="resume">Resumé :</label>
    <textarea id="resume" name="Resume" required></textarea>

    <label for="instructions">Instructions :</label>
    <textarea id="instructions" name="instructions" required></textarea>
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

    <label for="nouveaux_ingredients">Nouveaux ingrédients :</label>
    <div id="ingredients-container">
        <!-- Ici, les champs d'entrée pour les nouveaux ingrédients seront ajoutés dynamiquement -->
    </div>
    <button type="button" onclick="ajouterIngredient()">Ajouter un ingrédient</button>

    <label for="ingredients">Ingrédients :</label>
    <select id="ingredients" name="ingredients[]" multiple>
        <?php 
            require_once ("../../model/RecipeManager.php");
            $recipe = new RecipeManager();
            $recipes = $recipe->afficheIngredient();
            foreach ($recipes as $row) {
                echo "<option value='" . $row['ING_Id'] . "'>" . $row['ING_Intitule'] . "</option>";
            }
        ?>
    </select>

    <label for="image_recette">Image de votre recette : </label>
    <input id="image_recette" type="file" name="image_recette">
    <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>


<?php $content = ob_get_clean();
require_once('../template.php'); ?>