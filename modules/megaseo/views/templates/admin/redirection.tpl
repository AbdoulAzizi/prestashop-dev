   {* create 301, 302 form *}
   <div class="panel panel-default">
   <div class="panel-heading">
     <h2 class="panel-title">Redirection 301, 302</h2>
   </div>
   {if isset($redirection_error_message)}
   <div class="alert alert-danger" role="alert" id="redirection_error" style="">
     <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
     <span class="sr-only">Error:</span>
     <span class="redirection_error_message" id="redirection_error_message">{{$redirection_error_message}}</span>
   </div>
   {else}
   <form action="{$smarty.server.REQUEST_URI}" method="post" multipart="true" enctype="multipart/form-data">
     <div class="panel-body">
       <div class="form-group">
         <label for="redirection_from">{l s="URI d'origine"}</label>
         <input type="text" class="form-control" id="redirection_from" name="redirection_from" placeholder="{l s="From"}" value="">
       </div>
       <div class="form-group">
         <label for="redirection_to">{l s="URL cible"}</label>
         <input type="text" class="form-control" id="redirection_to" name="redirection_to" placeholder="{l s="To"}" value="">
       </div>
       <div class="form-group">
         <label for="redirection_type">{l s="Type de redirection"}</label>
         <select class="form-control" id="redirection_type" name="redirection_type">
           <option value="301" >301</option>
           <option value="302" >302</option>
         </select>
       </div>
    
     <div class="panel-footer">
       <button type="submit" name="submitRedirection" class="btn btn-primary pull-right">Enregistrer</button>
     </div>
     </form>
   {/if}
 </div>

 {{* <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">{l s="Générer un sitemap"}</h2>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="sitemap_generate">{l s="Générer un sitemap"}</label>
            <input type="text" class="form-control" id="sitemap_generate" name="sitemap_generate" placeholder="{l s="URL"}" value="">
          </div>
          <div class="panel-footer">
            <button type="submit" name="generateSitemapSubmit" class="btn btn-primary pull-right">{l s="Générer"}</button>
          </div>
        </div>
      </div>

    </div> *}}