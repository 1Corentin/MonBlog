<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Ajouter un article</h1>
        </div>
        <form method="POST" action="article.php" enctype="multipart/form-data">

            <input id="id" name="id" type="hidden" value="{$action.id}">

            <input id="action" name="action" type="hidden" value="{$action.action}">      
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter titre"  value="{$tab_result.titre}">
            </div>

            <div class="form-group">
                <label for="text">Contenue de l'article</label>
                <textarea class="form-control" id="text" name="text" rows="3">{$tab_result.texte}</textarea>
            </div>
            <div class="form-group">
                <label for="img">L'image de mon article</label>
                <input type="file" class="form-control-file" name="img" id="img">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input"  name="publie" id="publie" {$tab_result.publie}>
                <label class="form-check-label" for="publie">Article publie ?</label>
            </div>
            <button type="submit" name="article" class="btn btn-primary" value="bouton">Soummettre mon article</button>
        </form>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>