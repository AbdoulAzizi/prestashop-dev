<?php
/* Smarty version 3.1.39, created on 2022-02-02 18:28:44
  from '/var/www/html/prestashop/modules/filemanager/views/templates/admin/filemanager.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61fabf4c1defd2_45179391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76cd82c96fbe5a41da89c3d9e68af0e2407f69bf' => 
    array (
      0 => '/var/www/html/prestashop/modules/filemanager/views/templates/admin/filemanager.tpl',
      1 => 1643822922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61fabf4c1defd2_45179391 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-md-12">
    <div class="panel panel-default">
            <h3 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'File Manager'),$_smarty_tpl ) );?>
</h3>
        <div class="panel-body">
            <div class="">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="panel panel-default">
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
                                                          <div class="panel panel-default">
                                 <div class="panel-body">
                                     <h3 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Folders'),$_smarty_tpl ) );?>
</h3>
                                     <div class="tree">
                                         <ul>
                                                                                      </ul>
                                     </div>
                                 </div>
                             </div>
                         <?php if ((isset($_smarty_tpl->tpl_vars['files']->value))) {?>
                         <h3 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Files'),$_smarty_tpl ) );?>
</h3>
                         <table class="table table-bordered table-hover">
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
                         <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                           <?php }
}
