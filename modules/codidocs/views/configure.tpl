{*
* 2007-2019 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2019 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<style>
{literal}

{/literal}
</style>

<div id="blockConfigTotal">

<div id="blockFolders" class="swap-panel" style="margin-top:25px;">
	<div  class="bootstrap panel ">
		<div class="panel-heading">
			{l s='Documentation' d='Modules.CodiDocs.Admin'}
		</div>
		
		<div class="main-container-folders-list ">
			<div id="folderlist-global" class="jstree-container">
				<div id="folderlist">
				  <ul>
					{foreach $folders as $folder}
						<li data-id="{$folder->id}">{$folder->name}</li>
					{/foreach}
				  </ul>
				 
				</div>
			</div>
			 <div id="jstree_page_toolbar_div" class="toolbar tree-toolbar">
					<a class="toolbar-button" id="toolbar_buton_addpage" onclick="javascript:docManager.addFolder()" title="Ajouter un dossier" style="background-image: url('/modules/codidocs/picto/folder-add.png');"></a>
					<a class="toolbar-button" id="toolbar_buton_editpage" onclick="javascript:docManager.renameFolder()" title="Renomer le dossier" style="background-image: url('/modules/codidocs/picto/folder-edit.png');"></a>
					<a class="toolbar-button" id="toolbar_buton_delpage" onclick="javascript:docManager.deleteFolder()" title="Supprimer un dossier" style="background-image: url('/modules/codidocs/picto/folder-delete.png');"></a>
				</div>
				<div class="content-folder">
					<p>{l s='Selectionnez un dossier pour voir son contenu' d='Modules.CodiDocs.Admin'}</p>
				</div>
				<input type="button" onclick="docManager.addFile();" value="{l s='Ajouter un document' d='Modules.CodiDocs.Admin'}" class="btn btn-success" id="btn-add-document">
		</div>
			
			
		</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalUploadFile">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Global'}">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-content">
			<div class="modal-body">
				<form onSubmit="return false;" class="megaupload">
					
					<div class="form-group">
						<label>Fichier {*(Max : {ini_get("upload_max_file_size")})*}</label>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Global'}">
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
						class="btn btn-primary" value="{l s='Save' d='Modules.Blockreassurance.Admin'}">

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
        <button type="button" class="close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Global'}">
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
						class="btn btn-primary" value="{l s='Save' d='Modules.Blockreassurance.Admin'}">

					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>