<?php ob_start(); session_start();
$recipes = $_SESSION['mesRecette'] ?? [];?>

<div class="container mt-5">
    <div class="col-md-10 mt-5 mb-5 p-5 border border-primary">
        <h1 class="titre m-2 mb-5">Recettes :</h1>
        <div id="recipe-container">
        </div>
        <button id="load-more" class="btn btn-primary mt-3">Charger 10 de plus</button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var recipes = <?php echo json_encode($recipes); ?>; // Chargez les recettes depuis PHP
        var recipeContainer = $('#recipe-container');
        var loadMoreButton = $('#load-more');
        var batchSize = 10; // Nombre de recettes à charger à la fois
        var currentBatch = 0;

        function loadRecipes(start, end) {
            for (var i = start; i < end; i++) {
                if (recipes[i]) {
                    var row = $('<a href="../../controller/mesRecette.php?id=' + recipes[i]['REC_Id'] + '" class="text-decoration-none text-dark">' +
                        '<div class="row mb-4 border border-primary">' +
                        '<div class="col-md-3"><img src="../../images/image_recette/' + recipes[i]['REC_Image'] + '" alt="Image_' + recipes[i]['REC_Titre'] + '" class="img-fluid"></div>' +
                        '<div class="col-md-9 texte">' +
                        '<h2>' + recipes[i]['REC_Titre'] + '</h2>' +
                        '<p>' + recipes[i]['REC_Resum'] + '</p>' + 
                        '</div>' +
                        '</div>' +
                        '</a>');
                    recipeContainer.append(row);
                }
            }
        }

        // Chargez la première série de recettes
        loadRecipes(0, batchSize);
        currentBatch += batchSize;

        loadMoreButton.on('click', function() {
            loadRecipes(currentBatch, currentBatch + batchSize);
            currentBatch += batchSize;

            if (currentBatch >= recipes.length) {
                loadMoreButton.hide(); // Masquez le bouton si toutes les recettes ont été chargées
            }
        });
    });
</script>



<?php $content = ob_get_clean();
require_once('../template.php'); ?>