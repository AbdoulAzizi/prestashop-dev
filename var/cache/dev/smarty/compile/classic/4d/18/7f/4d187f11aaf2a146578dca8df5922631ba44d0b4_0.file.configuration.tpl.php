<?php
/* Smarty version 3.1.39, created on 2022-01-19 17:25:12
  from '/var/www/html/prestashop/modules/gsitemap/views/templates/admin/configuration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61e83b685a6ad5_15542896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d187f11aaf2a146578dca8df5922631ba44d0b4' => 
    array (
      0 => '/var/www/html/prestashop/modules/gsitemap/views/templates/admin/configuration.tpl',
      1 => 1642600928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e83b685a6ad5_15542896 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_GET['validation']))) {?>
<div class="alert alert-success" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
   <p class="alert-text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your sitemaps were successfully created. Please do not forget to setup the URL','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
 <a class="alert-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_store_url']->value,'htmlall','UTF-8' ));
echo intval($_smarty_tpl->tpl_vars['shop']->value->id);?>
_index_sitemap.xml" target="_blank"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_store_url']->value,'htmlall','UTF-8' ));
echo intval($_smarty_tpl->tpl_vars['shop']->value->id);?>
_index_sitemap.xml</a> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'in your Google Webmaster account.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</p>
</div>
<?php }?>

<div class="panel">
   <?php if ((isset($_smarty_tpl->tpl_vars['google_maps_error']->value))) {?>
   <div class="error">
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['google_maps_error']->value,'htmlall','UTF-8' ));?>
<br>
   </div>
   <?php }?>
   <?php if ((isset($_smarty_tpl->tpl_vars['gsitemap_refresh_page']->value))) {?>
   <h3><i class="icon icon-sitemap"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your sitemaps','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</h3>
   <p><?php echo intval($_smarty_tpl->tpl_vars['gsitemap_number']->value);?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sitemaps were already created.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</p>
   <br><br>
   <form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_refresh_page']->value,'htmlall','UTF-8' ));?>
" method="post" id="gsitemap_generate_sitmap">
      <img src="../img/loader.gif" alt=""/>
      <input type="submit" class="button" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Continue','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
" style="display: none;"/>
   </form>
   <?php } else { ?>
   <?php if ($_smarty_tpl->tpl_vars['gsitemap_links']->value) {?>
   <h3><i class="icon icon-sitemap"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your sitemaps','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</h3>
   <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please set up the following sitemap URL in your Google Webmaster account:','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
<br>
   <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_store_url']->value,'htmlall','UTF-8' ));
echo intval($_smarty_tpl->tpl_vars['shop']->value->id);?>
_index_sitemap.xml" target="_blank"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_store_url']->value,'htmlall','UTF-8' ));
echo intval($_smarty_tpl->tpl_vars['shop']->value->id);?>
_index_sitemap.xml</a><br><br>
   <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The above URL is the master sitemap file. It refers to the following sub-sitemap files:','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>

   <div style="max-height: 220px; overflow: auto;">
      <ul>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gsitemap_links']->value, 'gsitemap_link');
$_smarty_tpl->tpl_vars['gsitemap_link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gsitemap_link']->value) {
$_smarty_tpl->tpl_vars['gsitemap_link']->do_else = false;
?>
         <li><a target="_blank" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_store_url']->value,'htmlall','UTF-8' ));
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_link']->value['link'],'htmlall','UTF-8' ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_link']->value['link'],'htmlall','UTF-8' ));?>
</a></li>
         <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
   </div>
   <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your last update was made on this date:','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_last_export']->value,'htmlall','UTF-8' ));?>
</p>
   <?php } else { ?>
   <h3><i class="icon icon-sitemap"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your sitemaps','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</h3>
   <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This shop has no sitemap yet.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
<br>
   </p>
   <?php }?>
   <?php if (($_smarty_tpl->tpl_vars['gsitemap_customer_limit']->value['max_exec_time'] < 30 && $_smarty_tpl->tpl_vars['gsitemap_customer_limit']->value['max_exec_time'] > 0) || ($_smarty_tpl->tpl_vars['gsitemap_customer_limit']->value['memory_limit'] < 128 && $_smarty_tpl->tpl_vars['gsitemap_customer_limit']->value['memory_limit'] > 0)) {?>
   <br>
   <div class="alert alert-warning" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For a better use of the module, please make sure that you have','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
<br>
      <ul>
         <?php if ($_smarty_tpl->tpl_vars['gsitemap_customer_limit']->value['memory_limit'] < 128 && $_smarty_tpl->tpl_vars['gsitemap_customer_limit']->value['memory_limit'] > 0) {?>
         <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A minimum memory_limit value of 128 MB.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</li>
         <?php }?>
         <?php if ($_smarty_tpl->tpl_vars['gsitemap_customer_limit']->value['max_exec_time'] < 30 && $_smarty_tpl->tpl_vars['gsitemap_customer_limit']->value['max_exec_time'] > 0) {?>
         <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A minimum max_execution_time value of 30 seconds.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</li>
         <?php }?>
      </ul>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can edit these limits in your php.ini file. For more details, please contact your hosting provider.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</p>
   </div>
   <?php }?>
</div>

<div class="panel">
   <form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_form']->value,'htmlall','UTF-8' ));?>
" method="post">
      <h3><i class="icon icon-wrench"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configure your sitemap','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</h3>
      <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Several sitemap files will be generated depending on how your server is configured and on the number of activated products in your catalog.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
<br></p>
      <div class="margin-form">
         <label for="gsitemap_frequency" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'How often do you update your store?','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>

         <select name="gsitemap_frequency">
         <option<?php if ($_smarty_tpl->tpl_vars['gsitemap_frequency']->value == 'always') {?> selected="selected"<?php }?> value='always'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'always','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</option>
         <option<?php if ($_smarty_tpl->tpl_vars['gsitemap_frequency']->value == 'hourly') {?> selected="selected"<?php }?> value='hourly'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'hourly','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</option>
         <option<?php if ($_smarty_tpl->tpl_vars['gsitemap_frequency']->value == 'daily') {?> selected="selected"<?php }?> value='daily'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'daily','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</option>
         <option<?php if ($_smarty_tpl->tpl_vars['gsitemap_frequency']->value == 'weekly' || $_smarty_tpl->tpl_vars['gsitemap_frequency']->value == '') {?> selected="selected"<?php }?> value='weekly'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'weekly','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</option>
         <option<?php if ($_smarty_tpl->tpl_vars['gsitemap_frequency']->value == 'monthly') {?> selected="selected"<?php }?> value='monthly'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'monthly','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</option>
         <option<?php if ($_smarty_tpl->tpl_vars['gsitemap_frequency']->value == 'yearly') {?> selected="selected"<?php }?> value='yearly'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'yearly','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</option>
         <option<?php if ($_smarty_tpl->tpl_vars['gsitemap_frequency']->value == 'never') {?> selected="selected"<?php }?> value='never'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'never','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</option>
         </select></label>
      </div>
      <label><input type="checkbox" name="gsitemap_check_image_file" value="1" <?php if ($_smarty_tpl->tpl_vars['gsitemap_check_image_file']->value) {?>checked<?php }?>> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Check this box if you wish to check the presence of the image files on the server','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</label>
      <br>
      <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Indicate the pages that you do not want to include in your sitemap files:','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</p>
      <button class="btn btn-secondary" type="button" id="check"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Uncheck all','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</button>
      <br>
      <br class="clear" />
      <ul>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['store_metas']->value, 'store_meta');
$_smarty_tpl->tpl_vars['store_meta']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['store_meta']->value) {
$_smarty_tpl->tpl_vars['store_meta']->do_else = false;
?>
         <li style="float: left; width: 400px; margin-bottom: 15px">
            <label><input type="checkbox" class="gsitemap_metas" name="gsitemap_meta[]" <?php if (in_array($_smarty_tpl->tpl_vars['store_meta']->value['id_meta'],$_smarty_tpl->tpl_vars['gsitemap_disable_metas']->value)) {?> checked="checked"<?php }?> value="<?php echo intval($_smarty_tpl->tpl_vars['store_meta']->value['id_meta']);?>
"> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['store_meta']->value['title'],'htmlall','UTF-8' ));?>
 [<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['store_meta']->value['page'],'htmlall','UTF-8' ));?>
]</label>
         </li>
         <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
      <br>
      <div class="margin-form" style="clear: both;">
         <br>
         <button type="submit" class="btn btn-primary btn-lg" name="SubmitGsitemap" onclick="$('#gsitemap_loader').show();"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate sitemap','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</button>
         <br><br>
         <div class="alert alert-info" role="alert">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generating a sitemap can take several minutes','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</p>
         </div>
      </div>
      <p id="gsitemap_loader" style="text-align: center; display: none;"><img src="../img/loader.gif" alt=""/></p>
   </form>
</div>

<div class="panel">
   <h3><i class="icon icon-tags"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Information','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</h3>
   <p>
      <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You have two ways to generate sitemaps.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</strong><br><br>
      1. <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Manually:','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</strong> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Using the form above (as often as needed)','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
<br>
      <br><span style="font-style: italic;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'-or-','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</span><br><br>
      2. <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Automatically:','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>
</strong> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Ask your hosting provider to setup a "Cron job" to load the following URL at the time you would like:','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>

      <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_cron']->value,'htmlall','UTF-8' ));?>
" target="_blank"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gsitemap_cron']->value,'htmlall','UTF-8' ));?>
</a><br>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'It will automatically generate your XML sitemaps.','d'=>'Modules.Gsitemap.Admin'),$_smarty_tpl ) );?>

   </p>
   <?php }?>
   </p>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
  $(document).ready(function() {
    const textCheckAll = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Check all','d'=>'Modules.Gsitemap.Admin','js'=>1),$_smarty_tpl ) );?>
";
    const textUnCheckAll = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Uncheck all','d'=>'Modules.Gsitemap.Admin','js'=>1),$_smarty_tpl ) );?>
";
    const numTotal = $('.gsitemap_metas').length;
    const numChecked = $('.gsitemap_metas:checked').length;
    const checkboxCheck = $('#check');

    if (numChecked === numTotal) {
      checkboxCheck.html(textUnCheckAll);
    }
    if ((numTotal - numChecked) === numTotal) {
      checkboxCheck.html(textCheckAll);
    }
    checkboxCheck.on('click', function() {
      $('.gsitemap_metas').prop('checked', $(this).html() === textCheckAll);
      $(this).html($(this).html() === textUnCheckAll ? textCheckAll : textUnCheckAll);
    });
  });
<?php echo '</script'; ?>
>
<?php }
}
