<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Voici les articles :)</h1>
            <p class="lead">Sur les animaux</p>
            <ul class="list-unstyled">
                <li>Créer par Corentin</li>
            </ul>
        </div>
    </div>
</div>

{if isset($smarty.session.notification)}
    <div class="row">
        <div class="col-12">
            <div class="alert alert-{$smarty.session.notification.result}" role="alert">
                {$smarty.session.notification.message}
            </div>
        </div>
    </div>
{/if}

<div class="row">
    {foreach from=$tab_result item=value }
        <div class="col-6">
            <div class="card" style="width: 100%;">
                <img src="img/{$value.id}.jpg" class="card-img-top" alt="{$value.titre}">
                <div class="card-body">
                    <h5 class="card-title">{$value.titre}</h5>
                    <p class="card-text">{$value.texte}</p>
                    <a href="http://localhost/Monblog/article.php?id={$value.id}&action=modif" class="btn btn-primary">Modifier l'article</a>
                </div>
            </div>
        </div>
    {/foreach}
</div>

<div class="row">
    <div class="col-12">
        <nav>
            <ul class="pagination pagination-lg">
                {for $index = 1 to $nb_total_page} 
                    <li class="page-item {if $page_courante == $index}active{/if}"><a class="page-link" href="?p={$index}">{$index}</a></li> 
                    {/for}
            </ul>
        </nav>        
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>