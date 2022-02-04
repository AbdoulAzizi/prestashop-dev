{************** File Manger ***********************}
{* create, open, close, read, write, seek, delete, rename, etc. *}
{*************************************************************}
<div class="col-md-12">
    <div class="panel panel-default">
            <h3 class="panel-title">{l s='File Manager'}</h3>
        <div class="panel-body">
                  {* add, rename, delete *}
                  <div class="btn-group btn-group-sm" style="margin-bottom: 10px;">
                  <a href="{$currentIndex}&token={$token}&addfolder&id_parent=0" class="btn btn-default">
                      <i class="icon-plus"></i> {l s='Add'}
                  </a>
                  <a href="{$currentIndex}&token={$token}&renamefolder&id_parent=0" class="btn btn-default">
                      <i class="icon-edit"></i> {l s='Rename'}
                  </a>
                  <a href="{$currentIndex}&token={$token}&deletefolder&id_parent=0" class="btn btn-default">
                      <i class="icon-trash"></i> {l s='Delete'}
                  </a>
              </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="panel panel-default" style="display: none;">
                                <div class="panel-body">
                                        <h3 class="panel-title">{l s='Upload'}</h3>
                                    <form action="{$currentIndex}&token={$token}" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label">{l s='File'}</label>
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label">{l s='Upload as'}</label>
                                            <input type="text" name="upload_as" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">{l s='Upload in'}</label>
                                            <select name="upload_in" class="form-control">
                                                <option value="0">{l s='Root'}</option>
                                                {* {foreach from=$folders item=folder}
                                                <option value="{$folder.id_parent}">{$folder.name}</option>
                                                {/foreach} *}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submitAddAttachments" value="{l s='Upload'}" class="btn btn-default pull-right">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="doc-card col-lg-12">
                {* folder tree *}
                <div class="panel panel-default folder-card col-lg-3" style="margin-right: 40px;">
                    <div class="panel-body">
                    {* each folder  with possibility to rename, delete modify icon *}
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="panel-title">{l s='Folders'}</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-group">
                                    {foreach from=$folders item=folder}
                                    <li class="list-group-item">
                                        <a href="{$currentIndex}&token={$token}&id_parent={$folder}">{$folder}</a>
                                        <a href="{$currentIndex}&token={$token}&renamefolder&id_parent={$folder}" class="btn btn-default btn-xs pull-right">
                                            <i class="icon-edit"></i>
                                        </a>
                                        <a href="{$currentIndex}&token={$token}&deletefolder&id_parent={$folder}" class="btn btn-default btn-xs pull-right">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </li>
                                    {/foreach}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {* file list *}
                <div class="panel panel-default file-card col-lg-8">
                    <div class="panel-body">
                            {* {if isset($files)} *}
                            <h3 class="panel-title">{l s='Files'}</h3>
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>{l s='Name'}</th>
                                        <th>{l s='Size'}</th>
                                        <th>{l s='Date'}</th>
                                        <th>{l s='Actions'}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {* {foreach from=$files item=file} *}
                                    {* <tr>
                                        <td>{$file.name}</td>
                                        <td>{$file.size}</td>
                                        <td>{$file.date}</td>
                                        <td>
                                            <a href="{$file.link_delete}" class="btn btn-default">{l s='Delete'}</a>
                                            <a href="{$file.link_download}" class="btn btn-default">{l s='Download'}</a>
                                        </td>
                                    </tr> *}
                                    {* {/foreach} *}
                                </tbody>
                            </table>
                            {* {/if} *}
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>
                           