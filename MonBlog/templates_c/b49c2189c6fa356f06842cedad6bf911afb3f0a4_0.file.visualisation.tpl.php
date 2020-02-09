<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-24 08:39:05
  from 'C:\xampp\htdocs\MonBlog\templates\visualisation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2a9f19f271f6_63338927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b49c2189c6fa356f06842cedad6bf911afb3f0a4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MonBlog\\templates\\visualisation.tpl',
      1 => 1579442242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2a9f19f271f6_63338927 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    function control_form()
    {
        if (document.getElementById('commentaire').value == '' || document.getElementById('mail').value == '' || document.getElementById('pseudo').value == '')
        {
            alert("Champ non renseigné");
            return false;
        } else
            return true;
    }
<?php echo '</script'; ?>
>

<div class="col-6">
    <div class="card" style="width: 100%;">
        <img src="img/<?php echo $_smarty_tpl->tpl_vars['tab_result']->value[0]['id'];?>
.jpg" class="card-img-top" alt="<?php echo $_smarty_tpl->tpl_vars['tab_result']->value[0]['titre'];?>
">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['tab_result']->value[0]['titre'];?>
</h5>
            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['tab_result']->value[0]['texte'];?>
</p>

        </div>
    </div>
</div>
<?php ob_start();
echo $_smarty_tpl->tpl_vars['tab_result']->value[0]['commentaire'];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == NULL) {?>

    Il n'y a pas de commentaire ici! 

<?php } else { ?>    

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_result']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
        <div class="col-6">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <p class="card-text">Mail:        <?php echo $_smarty_tpl->tpl_vars['value']->value['mail'];?>
</p>
                    <p class="card-text">Pseudonyme:  <?php echo $_smarty_tpl->tpl_vars['value']->value['pseudo'];?>
</p>
                    <p class="card-text">Commentaire: <?php echo $_smarty_tpl->tpl_vars['value']->value['commentaire'];?>
</p>
                </div>
            </div>
        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }?>  
<form method="POST" action="index.php" enctype="multipart/form-data" onsubmit="return(control_form());">

    <input id="id" name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['tab_result']->value[0]['id'];?>
">
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

<?php }
}
