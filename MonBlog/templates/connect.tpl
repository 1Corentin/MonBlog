<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Page de connexion</h1>
        </div>
        <form method="POST" action="connect.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="identifiant">Identifiant</label>
                <input type="text" class="form-control" id="nom" name="identifiant" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
            </div>
            <button type="submit" name="submit" class="btn btn-primary" value="bouton">Connexion</button>
        </form>
    </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>