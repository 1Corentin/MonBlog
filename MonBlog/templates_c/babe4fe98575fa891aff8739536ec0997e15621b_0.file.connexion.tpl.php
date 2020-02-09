<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-19 15:07:54
  from 'C:\xampp\htdocs\MonBlog\templates\connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2462bab98eb0_54175072',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'babe4fe98575fa891aff8739536ec0997e15621b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MonBlog\\templates\\connexion.tpl',
      1 => 1579442366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2462bab98eb0_54175072 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Page d'inscription</h1>
        </div>
        <form method="POST" action="connexion.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
            </div>

            <div class="form-group">
                <label for="email">Identifiant</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
            </div>
            <button type="submit" name="submit" class="btn btn-primary" value="bouton">Inscription</button>
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
