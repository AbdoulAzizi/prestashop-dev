<?php
/* Smarty version 3.1.39, created on 2022-02-02 18:00:05
  from '/var/www/html/prestashop/modules/codidocs/views/configure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61fab8957d2816_44543538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7342846db1fb94b3dd575d98aac785c969059790' => 
    array (
      0 => '/var/www/html/prestashop/modules/codidocs/views/configure.tpl',
      1 => 1643815339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61fab8957d2816_44543538 (Smarty_Internal_Template $_smarty_tpl) {
?><style>



</style>

<div id="blockConfigTotal">

<div id="blockFolders" class="swap-panel" style="margin-top:25px;">
	<div  class="bootstrap panel ">
		<div class="panel-heading">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Documentation','d'=>'Modules.CodiDocs.Admin'),$_smarty_tpl ) );?>

		</div>
		
		<div class="main-container-folders-list ">
			<div id="folderlist-global" class="jstree-container">
				<div id="folderlist">
				  <ul>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['folders']->value, 'folder');
$_smarty_tpl->tpl_vars['folder']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['folder']->value) {
$_smarty_tpl->tpl_vars['folder']->do_else = false;
?>
						<li data-id="<?php echo $_smarty_tpl->tpl_vars['folder']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['folder']->value->name;?>
</li>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				  </ul>
				 
				</div>
			</div>
			 <div id="jstree_page_toolbar_div" class="toolbar tree-toolbar">
					<a class="toolbar-button" id="toolbar_buton_addpage" onclick="javascript:docManager.addFolder()" title="Ajouter un dossier" style="background-image: url('/modules/codidocs/picto/folder-add.png');"></a>
					<a class="toolbar-button" id="toolbar_buton_editpage" onclick="javascript:docManager.renameFolder()" title="Renomer le dossier" style="background-image: url('/modules/codidocs/picto/folder-edit.png');"></a>
					<a class="toolbar-button" id="toolbar_buton_delpage" onclick="javascript:docManager.deleteFolder()" title="Supprimer un dossier" style="background-image: url('/modules/codidocs/picto/folder-delete.png');"></a>
				</div>
				<div class="content-folder">
					<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Selectionnez un dossier pour voir son contenu','d'=>'Modules.CodiDocs.Admin'),$_smarty_tpl ) );?>
</p>
				</div>
				<input type="button" onclick="docManager.addFile();" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Ajouter un document','d'=>'Modules.CodiDocs.Admin'),$_smarty_tpl ) );?>
" class="btn btn-success" id="btn-add-document">
		</div>
			
			
		</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalUploadFile">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-content">
			<div class="modal-body">
				<form onSubmit="return false;" class="megaupload">
					
					<div class="form-group">
						<label>Fichier </label>
						<input type="file" name="myfile" class="form-control" />
					</div>
				
					 <div class="form-group">
						

					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
  
<div class="modal fade" id="modalNameFolder">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-content">
			<div class="modal-body">
				<form onSubmit="return docManager.submitRenameFolder()">
					
					<div class="form-group">
						<label>Titre</label>
						<input type="text" name="name" class="form-control" />
					</div>
				
					 <div class="form-group">
						<input id="saveContentConfiguration" data-id="" type="submit"
						class="btn btn-primary" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>
">

					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
 
 <div class="modal fade" id="modalNameFile">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-content">
			<div class="modal-body">
				<form onSubmit="return docManager.submitRenameFile()">
					
					<div class="form-group">
						<label>Titre</label>
						<input type="text" name="name" class="form-control" />
					</div>
				
					 <div class="form-group">
						<input id="saveContentConfiguration" data-id="" type="submit"
						class="btn btn-primary" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','d'=>'Modules.Blockreassurance.Admin'),$_smarty_tpl ) );?>
">

					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div><?php }
}
