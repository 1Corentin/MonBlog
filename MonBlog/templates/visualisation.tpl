<script type="text/javascript">
    function control_form()
    {
        if (document.getElementById('commentaire').value == '' || document.getElementById('mail').value == '' || document.getElementById('pseudo').value == '')
        {
            alert("Champ non renseigné");
            return false;
        } else
            return true;
    }
</script>

<div class="col-6">
    <div class="card" style="width: 100%;">
        <img src="img/{$tab_result[0]['id']}.jpg" class="card-img-top" alt="{$tab_result[0]['titre']}">
        <div class="card-body">
            <h5 class="card-title">{$tab_result[0]['titre']}</h5>
            <p class="card-text">{$tab_result[0]['texte']}</p>

        </div>
    </div>
</div>
{if {$tab_result[0]['commentaire']}== NULL}

    Il n'y a pas de commentaire ici! 

{else}    

    {foreach from=$tab_result item=value }
        <div class="col-6">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <p class="card-text">Mail:        {$value.mail}</p>
                    <p class="card-text">Pseudonyme:  {$value.pseudo}</p>
                    <p class="card-text">Commentaire: {$value.commentaire}</p>
                </div>
            </div>
        </div>
    {/foreach}

{/if}  
<form method="POST" action="index.php" enctype="multipart/form-data" onsubmit="return(control_form());">

    <input id="id" name="id" type="hidden" value="{$tab_result[0]['id']}">
    <input id="action" name="action" type="hidden" value="modif">

    <div class="form-group">
        <label for="titre">Email</label>
        <input type="text" class="form-control" id="mail" name="mail" placeholder="Enter votre email">
        <label for="titre">Pseudonyme</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter votre pseudo">
        <label for="titre">Commentaire</label>
        <input type="text" class="form-control" id="commentaire" name="commentaire" placeholder="Enter votre commentaire">
    </div>

    <button type="submit" name="comment" class="btn btn-primary" value="bouton">Soummettre le commentaire</button>
</form>

