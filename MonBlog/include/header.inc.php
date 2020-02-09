<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MonBlog</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="http://localhost\MonBlog\img\icone.ico" type="image/x-icon"/> 

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
                <a class="navbar-brand" href="#">MonBlog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <form class="form-inline" method="GET" action="recherche.php">
                            <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>

                        <?php if ($connecte == FALSE) {
                            ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="http://localhost/Monblog/connexion.php">Inscription</a>
                            <?php } ?>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/Monblog/article.php?id=NULL&action=crea">Créer un article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/Monblog/index.php">Articles</a>
                        </li>

                        <?php if ($connecte == FALSE) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/Monblog/connect.php">Connexion</a>
                            </li>

                        <?php } else {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/Monblog/deconnexion.php">Deconnexion</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
