<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-19 14:59:53
  from 'C:\xampp\htdocs\MonBlog\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2460d93d12e6_42912813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79514ced31c5974a60b87c36f6ed203df7c19184' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MonBlog\\templates\\index.tpl',
      1 => 1579442358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2460d93d12e6_42912813 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
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
<?php if (isset($_SESSION['notification'])) {?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-<?php echo $_SESSION['notification']['result'];?>
" role="alert">
                <?php echo $_SESSION['notification']['message'];?>

            </div>
        </div>
    </div>
<?php }?>

<div class="row">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_result']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
        <div class="col-6">
            <div class="card" style="width: 100%;">
                <img src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" class="card-img-top" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h5>
                    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                    <a href="http://localhost/Monblog/article.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&action=modif" class="btn btn-primary">Modifier l'article</a>
                    <a href="http://localhost/Monblog/visualisation.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-primary">Voir l'article</a>
                </div>
            </div>
        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<div class="row">
    <div class="col-12">
        <nav>
            <ul class="pagination pagination-lg">
                <?php
$_smarty_tpl->tpl_vars['index'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['index']->step = 1;$_smarty_tpl->tpl_vars['index']->total = (int) ceil(($_smarty_tpl->tpl_vars['index']->step > 0 ? $_smarty_tpl->tpl_vars['nb_total_page']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_total_page']->value)+1)/abs($_smarty_tpl->tpl_vars['index']->step));
if ($_smarty_tpl->tpl_vars['index']->total > 0) {
for ($_smarty_tpl->tpl_vars['index']->value = 1, $_smarty_tpl->tpl_vars['index']->iteration = 1;$_smarty_tpl->tpl_vars['index']->iteration <= $_smarty_tpl->tpl_vars['index']->total;$_smarty_tpl->tpl_vars['index']->value += $_smarty_tpl->tpl_vars['index']->step, $_smarty_tpl->tpl_vars['index']->iteration++) {
$_smarty_tpl->tpl_vars['index']->first = $_smarty_tpl->tpl_vars['index']->iteration === 1;$_smarty_tpl->tpl_vars['index']->last = $_smarty_tpl->tpl_vars['index']->iteration === $_smarty_tpl->tpl_vars['index']->total;?> 
                    <li class="page-item <?php if ($_smarty_tpl->tpl_vars['page_courante']->value == $_smarty_tpl->tpl_vars['index']->value) {?>active<?php }?>"><a class="page-link" href="?p=<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li> 
                    <?php }
}
?>
            </ul>
        </nav>        
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<?php echo '<script'; ?>
 src="vendor/jquery/jquery.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

<?php }
}
