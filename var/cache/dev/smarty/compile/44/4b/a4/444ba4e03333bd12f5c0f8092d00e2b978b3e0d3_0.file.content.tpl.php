<?php
/* Smarty version 3.1.39, created on 2021-11-30 10:14:52
  from '/var/www/html/prestashop/admin74060nxso/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a5eb8c29ec73_06442249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '444ba4e03333bd12f5c0f8092d00e2b978b3e0d3' => 
    array (
      0 => '/var/www/html/prestashop/admin74060nxso/themes/default/template/content.tpl',
      1 => 1636104739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a5eb8c29ec73_06442249 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>

<div class="row">
	<div class="col-lg-12">
		<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}