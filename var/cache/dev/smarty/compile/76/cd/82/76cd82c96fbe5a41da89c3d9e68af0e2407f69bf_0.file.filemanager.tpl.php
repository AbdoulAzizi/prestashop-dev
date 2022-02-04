<?php
/* Smarty version 3.1.39, created on 2022-02-04 19:22:15
  from '/var/www/html/prestashop/modules/filemanager/views/templates/admin/filemanager.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61fd6ed74f14e4_69497440',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76cd82c96fbe5a41da89c3d9e68af0e2407f69bf' => 
    array (
      0 => '/var/www/html/prestashop/modules/filemanager/views/templates/admin/filemanager.tpl',
      1 => 1643998671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61fd6ed74f14e4_69497440 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-md-12">
    <div class="panel panel-default">
            <h3 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'File Manager'),$_smarty_tpl ) );?>
</h3>
        <div class="panel-body">
                                    <div class="btn-group btn-group-sm" style="margin-bottom: 10px;">
                  <a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&addfolder&id_parent=0" class="btn btn-default">
                      <i class="icon-plus"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add'),$_smarty_tpl ) );?>

                  </a>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&renamefolder&id_parent=0" class="btn btn-default">
                      <i class="icon-edit"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Rename'),$_smarty_tpl ) );?>

                  </a>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&deletefolder&id_parent=0" class="btn btn-default">
                      <i class="icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete'),$_smarty_tpl ) );?>

                  </a>
              </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="panel panel-default" style="display: none;">
                                <div class="panel-body">
                                        <h3 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upload'),$_smarty_tpl ) );?>
</h3>
                                    <form action="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'File'),$_smarty_tpl ) );?>
</label>
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upload as'),$_smarty_tpl ) );?>
</label>
                                            <input type="text" name="upload_as" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upload in'),$_smarty_tpl ) );?>
</label>
                                            <select name="upload_in" class="form-control">
                                                <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Root'),$_smarty_tpl ) );?>
</option>
                                                                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submitAddAttachments" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upload'),$_smarty_tpl ) );?>
" class="btn btn-default pull-right">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="doc-card col-lg-12">
                                <div class="panel panel-default folder-card col-lg-3" style="margin-right: 40px;">
                    <div class="panel-body">
                                            <div class="row">
                            <div class="col-lg-12">
                                <h3 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Folders'),$_smarty_tpl ) );?>
</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-group">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['folders']->value, 'folder');
$_smarty_tpl->tpl_vars['folder']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['folder']->value) {
$_smarty_tpl->tpl_vars['folder']->do_else = false;
?>
                                    <li class="list-group-item">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&id_parent=<?php echo $_smarty_tpl->tpl_vars['folder']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['folder']->value;?>
</a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&renamefolder&id_parent=<?php echo $_smarty_tpl->tpl_vars['folder']->value;?>
" class="btn btn-default btn-xs pull-right">
                                            <i class="icon-edit"></i>
                                        </a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&deletefolder&id_parent=<?php echo $_smarty_tpl->tpl_vars['folder']->value;?>
" class="btn btn-default btn-xs pull-right">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default file-card col-lg-8">
                    <div class="panel-body">
                                                        <h3 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Files'),$_smarty_tpl ) );?>
</h3>
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name'),$_smarty_tpl ) );?>
</th>
                                        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Size'),$_smarty_tpl ) );?>
</th>
                                        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date'),$_smarty_tpl ) );?>
</th>
                                        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Actions'),$_smarty_tpl ) );?>
</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                                                                                            </tbody>
                            </table>
                                                </div>
                </div>
            </div>
        </div>
      
    </div>
</div>
                           <?php }
}
