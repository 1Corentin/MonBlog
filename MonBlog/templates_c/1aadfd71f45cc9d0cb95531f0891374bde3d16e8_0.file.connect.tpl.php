<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-20 16:09:53
  from 'C:\xampp\htdocs\MonBlog\templates\connect.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5dfce4417cc538_39826705',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1aadfd71f45cc9d0cb95531f0891374bde3d16e8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MonBlog\\templates\\connect.tpl',
      1 => 1576854456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dfce4417cc538_39826705 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
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
<?php echo '<script'; ?>
 src="vendor/jquery/jquery.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
><?php }
}
