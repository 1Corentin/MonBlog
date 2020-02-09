<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-19 14:52:01
  from 'C:\xampp\htdocs\MonBlog\templates\article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e245f01632a68_18491638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd9ee17c22b00dabc66bfe073d9a0bef9822d26c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MonBlog\\templates\\article.tpl',
      1 => 1579441904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e245f01632a68_18491638 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Ajouter un article</h1>
        </div>
        <form method="POST" action="article.php" enctype="multipart/form-data">

            <input id="id" name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['action']->value['id'];?>
">

            <input id="action" name="action" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['action']->value['action'];?>
">      
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter titre"  value="<?php echo $_smarty_tpl->tpl_vars['tab_result']->value['titre'];?>
">
            </div>

            <div class="form-group">
                <label for="text">Contenue de l'article</label>
                <textarea class="form-control" id="text" name="text" rows="3"><?php echo $_smarty_tpl->tpl_vars['tab_result']->value['texte'];?>
</textarea>
            </div>
            <div class="form-group">
                <label for="img">L'image de mon article</label>
                <input type="file" class="form-control-file" name="img" id="img">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input"  name="publie" id="publie" <?php echo $_smarty_tpl->tpl_vars['tab_result']->value['publie'];?>
>
                <label class="form-check-label" for="publie">Article publie ?</label>
            </div>
            <button type="submit" name="article" class="btn btn-primary" value="bouton">Soummettre mon article</button>
        </form>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<?php echo '<script'; ?>
 src="vendor/jquery/jquery.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
><?php }
}
