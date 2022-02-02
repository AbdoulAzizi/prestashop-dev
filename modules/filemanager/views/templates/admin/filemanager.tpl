{************** File Manger ***********************}
{* create, open, close, read, write, seek, delete, rename, etc. *}
{*************************************************************}
<div class="col-md-12">
    <div class="panel panel-default">
            <h3 class="panel-title">{l s='File Manager'}</h3>
        <div class="panel-body">
            <div class="">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="panel panel-default">
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
                             {* folder tree *}
                             <div class="panel panel-default">
                                 <div class="panel-body">
                                     <h3 class="panel-title">{l s='Folders'}</h3>
                                     <div class="tree">
                                         <ul>
                                             {* {foreach from=$folders item=folder}
                                             <li>
                                                 <a href="{$currentIndex}&token={$token}&folder={$folder.id_parent}">{$folder.name}</a>
                                                 {if isset($folder.children)}
                                                 <ul>
                                                     {foreach from=$folder.children item=child}
                                                     <li>
                                                         <a href="{$currentIndex}&token={$token}&folder={$child.id_parent}">{$child.name}</a>
                                                     </li>
                                                     {/foreach} 
                                                 </ul>
                                                 {/if}
                                             </li>
                                             {/foreach} *}
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         {if isset($files)}
                         <h3 class="panel-title">{l s='Files'}</h3>
                         <table class="table table-bordered table-hover">
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
                         {/if}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                           