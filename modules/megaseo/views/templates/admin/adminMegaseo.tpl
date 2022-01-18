{*
* 2007-2021 PrestaShop
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
*  @copyright 2007-2021 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}


{literal}
  <style type="text/css">

.navbar-default .navbar-nav>.active>a,
.navbar-default .navbar-nav>.active>a:hover,
.navbar-default .navbar-nav>.active>a:focus {
    color: #50A0FF;
    background-color: #beeaf3 !important;
    display:block;
    font-size: large;
}
/* 
.menu ul li:active, .menu ul li:hover, .menu ul li.active, 
.menu ul li:focus, .menu ul li:visited , .menu ul li > a:hover, .menu ul li > a:focus, .menu ul li > a:active, .menu ul li > a:visited {
    background-color: #beeaf3;
}
.current {
	background: #beeaf3;
} */
   </style>
{/literal}

<nav class="navbar navbar-default">
  <div class="container-fluid menu">
    {* <div class="navbar-header">
      <a class="navbar-brand active" href="#">SEO avancé</a>
    </div> *}
    <ul class="nav navbar-nav" id="menu-tab">
      <li><a data-toggle="tab" id="robots_link" href="#robots">Robots.txt</a></li>
      <li><a data-toggle="tab" id="htaccess_link" href="#htaccess">htaccess</a></li>
      <li><a data-toggle="tab" id="sitemap_link" href="#sitemap">Sitemap</a></li>
	    <li><a data-toggle="tab" id="redirection_link" href="#redirection">Redirection</a></li>
      <li><a data-toggle="tab" id="sitemap_administration_link" href="#sitemap_administration">Gérer le sitemap</a></li>
    </ul>
  </div>
</nav>



<div class="row">

      {* <div  id="features" style="display:block">
        <h2 id="">Features</h2>
        <p id="">Several tools for SEO optimisation,  redirections(301,302...), robots, htaccess, caches.</p>
      </div> *}

  <div class="col-md-6" style="" id="robots">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Robots.txt</h2>
      </div>

    
      {if isset($robot_error_message)}
        <div class="alert alert-danger" role="alert" id="robot_error" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <span class="robot_error_message" id="robot_error_message">{{$robot_error_message}}</span>
        </div>
        {else}
        
      <form action="{$smarty.server.REQUEST_URI}" method="post" multipart="true" enctype="multipart/form-data">
        <div class="panel-body">
          <textarea name="robots_content" class="form-control" rows="10" placeholder="">{{$robots_content}}</textarea>
        </div>
        <div class="panel-footer">
          <button type="submit" name="submitRobots" class="btn btn-primary pull-right">Enregistrer</button>
        </div>
      </form>

    {/if}

      
    </div>
  </div>
  <div class="col-md-6" style="display: none;" id="htaccess">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">htaccess</h2>
      </div>
      {if isset($htaccess_error_message)}
        <div class="alert alert-danger" role="alert" id="htaccess_error" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <span class="htaccess_error_message" id="htaccess_error_message">{{$htaccess_error_message}}</span>
        </div>
        {else}
          {* alert info message for modication *}

          <div class="alert alert-info" role="alert" id="" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">info:</span>
          <span class=""> {l s=" Attention, une modification inadaptée de ce fichier peut rendre votre site inaccessible ! "}</span>
        </div>
      <form action="{$smarty.server.REQUEST_URI}" method="post" multipart="true" enctype="multipart/form-data">
        <div class="panel-body">
          <textarea name="htaccess_content" class="form-control" rows="10" placeholder="">{{$htaccess_content}}</textarea>
        </div>
        <div class="panel-footer">
          <button type="submit" name="submitHtaccess" class="btn btn-primary pull-right">Enregistrer</button>
        </div>
      </form>
      {/if}
    </div>
  
  </div>

    <div class="col-md-6" style="display: none;" id="sitemap">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Sitemap</h2>
          </div>
          {if isset($sitemap_error_message)}
          <div class="alert alert-danger" role="alert" id="sitemap_error" style="">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            <span class="sitemap_error_message" id="sitemap_error_message">{{$sitemap_error_message}}</span>
          </div>
          {else}
  
          <form action="{$smarty.server.REQUEST_URI}" method="post" multipart="true" enctype="multipart/form-data">
            <div class="panel-body">
              <textarea name="sitemap_content" class="form-control" rows="10" placeholder="">{{$sitemap_content}}</textarea>      
            </div>
            <div class="panel-footer">
              <button type="submit" name="submitSitemap" class="btn btn-primary pull-right">Enregistrer</button>
            </div>
          </form>
          {/if}
      </div>
    </div>

    <div class="col-md-12" style="display: none;" id="redirection">
        
      {* add button for add new redirection *}
      <div class="row">
          <div class="" style="float:right;">
              <div class="" style="display: inline-block;">
                  <div class="text-right" style="padding: 10px;">
                      <a id="add_redirection" href="#" type="button" class="btn btn-primary">Ajouter une redirection</a>
                  </div>
              </div>
              <div class="" style="display: inline-block;">
                  <div class="text-right" style="padding: 10px;">
                      <a id="import_redirections_button" href="#" type="button" class="btn btn-primary">Importer un fichier CSV</a>
                  </div>
              </div>
              <div class="" style="display: inline-block;">
                  <div class="text-right" style="padding: 10px;">
                    <form action="{$smarty.server.REQUEST_URI}" method="post" multipart="true" enctype="multipart/form-data">
                      {* <button id="export_redirections_button" type="submit" class="btn btn-primary">Exporter les données</button> *}
                      <button type="submit" name="export_redirections_button"  class="btn btn-primary" value=""> Exporter les données</button>
                    </form>
                  </div>
              </div>
          </div>
     </div>
     

     {* list of redirection created *}
      <div class="panel panel-default" id="redirection_list">
        <div class="panel-heading">
          <h2 class="panel-title ">Redirections 301, 302</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>{l s="URI d'origine"}</th>
                <th>{l s="URL cible"}</th>
                <th>{l s="Type de redirection"}</th>
                <th>{l s="Action"}</th>
              </tr>
            </thead>
            <tbody>
              {if isset($redirection_data)}
               {foreach $redirection_data as $redirection}
                  <tr>
                    <td>{$redirection.redirection_from}</td>
                    <td>{$redirection.redirection_to}</td>
                    <td>{$redirection.redirection_type}</td>
                    {* <td>{$redirection.redirection_date}</td> *}
                    <td>
                    <form action="{$smarty.server.REQUEST_URI}" method="post" multipart="true" enctype="multipart/form-data">
                        <button id="updateRedirection" class="btn btn-primary btn-xs" type="button" name="update_redirection" value="{$redirection.id_redirection}">
                          <i class="icon-edit"></i>
                        </button>
                        <button type="submit" name="deleteRedirection"  class="btn btn-danger btn-xs" value="{$redirection.id_redirection}">
                        <i class="icon-trash"></i>
                      </button>
                    </form>
                    </td>
                  </tr>
               {/foreach}
              {/if}
            </tbody>
          </table>
        </div>
      </div>

      {* button for cancel *}
      <div class="row">
        <div class="col-xs-12">
          <div class="text-right" id="cancel_redirection" style="padding: 10px; display:none";>
            <a id="" href="#" type="button" class="btn btn-default">Annuler</a>
          </div>
        </div>
      </div>
          

          {* create 301, 302 form *}
      <div class="panel panel-default" style="display: none;" id="redirection_form">

          
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
            </div>
            </form>
          {/if}
      </div>

        {* redirection update form *}
    <div class="panel panel-default" style="display:none" id="redirection_update_form">
      <div class="panel-heading">
        <h2 class="panel-title">{l s="Modifier une redirection"}</h2>
      </div>
      {if isset($redirection_update_error_message)}
        <div class="alert alert-danger" role="alert" id="redirection_update_error" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <span class="redirection_update_error_message" id="redirection_update_error_message">{{$redirection_update_error_message}}</span>
        </div>
      {else}
        <form action="{$smarty.server.REQUEST_URI}" method="post" multipart="true" enctype="multipart/form-data">
          <div class="panel-body">
            <div class="form-group">
              <label for="redirection_from_update">{l s="URI d'origine"}</label>
              <input type="text" class="form-control" id="redirection_from_update" name="redirection_from_update" placeholder="{l s="From"}" value="">
            </div>
            <div class="form-group">
              <label for="redirection_to_update">{l s="URL cible"}</label>
              <input type="text" class="form-control" id="redirection_to_update" name="redirection_to_update" placeholder="{l s="To"}" value="">
            </div>
            <div class="form-group">
              <label for="redirection_type">{l s="Type de redirection"}</label>
              <select class="form-control" id="redirection_type_update" name="redirection_type_update">
                <option value="301" >301</option>
                <option value="302" >302</option>
              </select>
            </div>
          
            <div class="panel-footer">
              <button type="submit" name="updateRedirectionSubmit" class="btn btn-primary pull-right"> Mettre à jour</button>
            </div>
          </div>
        </form>
      {/if}
    </div>


       {* import redirection form *}
    <div class="panel panel-default" style="display:none" id="redirection_import_form">
          <div class="panel-heading">
            <h2 class="panel-title">{l s="Importer des redirections"}</h2>
          </div>
       {if isset($redirection_import_error_message)}
         <div class="alert alert-danger" role="alert" id="redirection_import_error" style="">
           <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
           <span class="sr-only">Error:</span>
           <span class="redirection_import_error_message" id="redirection_import_error_message">{{$redirection_import_error_message}}</span>
         </div>
       {else}
         <form action="{$smarty.server.REQUEST_URI}" method="post" multipart="true" enctype="multipart/form-data">
         <div class="form-group">
            <label class="control-label col-lg-3" for="redirection_upload_file">
              <span class="label-tooltip" data-toggle="tooltip"
                title="{l s='Veuillez sélectionner un fichier CSV contenant les redirections à importer.'}">
                {l s='Fichier'}
              </span>
            </label>
            <div class="col-lg-8">
              {$redirection_upload_file}
            </div>
            <div class="col-lg-3">
            &nbsp;
            </div>
            <div class="col-lg-8">
              <p class="help-block">{l s='Importer un fichier CSV'}</p>
            </div>
          </div>
           <div class="panel-body">
              {* <div class="form-group">
                <label for="redirection_import">{l s="Fichier CSV"}</label>
                <input type="file" class="form-control" id="redirection_import" name="redirection_import" placeholder="{l s="Fichier CSV"}" value="">
              </div>
             *}
              <div class="panel-footer">
                <input type="hidden" name="redirection_import_submit" value="1">
                <button type="submit" name="importRedirectionSubmit" class="btn btn-primary pull-right" value="{l s="Importer"}">{l s="Importer"}</button>
              </div>
           </div>
         </form>
       {/if}
   </div>

    </div>
    
     
  

    <div class="col-md-6" style="display: none;" id="sitemap_administration">

    </div>


     

</div>


  


<script>

$(function(){
  
  $('input[name="update_redirection"]').on('click', function(){
    
    var $this = $(this); 
  // set the clicked input value to the text field
  $('#redirection_from_update').val($this.val());
  });

});
    
  
$(document).ready(function(){
          $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
              localStorage.setItem('activeTab', $(e.target).attr('href'));
          });
          var activeTab = localStorage.getItem('activeTab');
          if(activeTab){
              $('#menu-tab a[href="' + activeTab + '"]').tab('show');
              // set tab active background color              
          }
          if (activeTab == '#htaccess') {
           // call showHtaccessForm function
            showHtaccessForm();
          }
          if (activeTab == '#robots') {
            // call showRobotsForm function
            showRobotsForm();
          }
          if (activeTab == '#sitemap') {
            // call showSitemapForm function
            showSitemapForm();
          }
          if (activeTab == '#redirection') {
            // call showRedirectionForm function
            showRedirectionForm();
          }
          if (activeTab == '#sitemap_administration') {
            // call showSitemapAdministration function
            showSitemapAdministration();
          }
      });
    
      $("#htaccess_link").click(function(){
        showHtaccessForm();
      });
      $("#sitemap_link").click(function(){
        showSitemapForm();
        
      });
      $("#robots_link").click(function(){
        showRobotsForm();
        
      });
      $("#redirection_link").click(function(){
        showRedirectionForm();
        
      });
      $("#sitemap_administration_link").click(function(){
        showSitemapAdministration();
        
      });

      $("#add_redirection").click(function () {

          $("#redirection_form").show();
          $("#redirection_list").hide();
          $("#add_redirection").hide();
          $("#cancel_redirection").show();
          $("#redirection_import_form").hide();
          $("#import_redirections_button").show();
          $("#redirection_update_form").hide();
      });

      $("#import_redirections_button").click(function () {

          $("#redirection_import_form").show();
          $("#redirection_list").hide();
          $("#import_redirections_button").hide();
          $("#redirection_form").hide();
          $("#cancel_redirection").show();
          $("#add_redirection").show();

      });

      $("#updateRedirection").click(function () {
          $("#redirection_update_form").show();
          $("#redirection_list").hide();
          // $("#add_redirection").hide();
          $("#cancel_redirection").show();
      });

      $("#cancel_redirection").click(function () {
          $("#redirection_form").hide();
          $("#redirection_list").show();
          $("#add_redirection").show();
          // $("#add_redirection").css("padding", "10px");
          // $("#add_redirection").css("float", "right");
          $("#cancel_redirection").hide(); 
          $("#redirection_import_form").hide();
          $("#import_redirections_button").show();
          $("#redirection_update_form").hide();
       
          // reload the page
          location.reload();

         
      });

    function showHtaccessForm() {
      $("#htaccess").show();
        $("#robots").hide();
        $("#sitemap").hide();
        $("#redirection").hide();
        $("#features").hide();
    }

    function showRobotsForm() {
       $("#htaccess").hide();
         $("#robots").show();
         $("#sitemap").hide();
         $("#redirection").hide();
         $("#features").hide();
    }

    function showSitemapForm() {
      $("#htaccess").hide();
        $("#robots").hide();
        $("#sitemap").show();
        $("#redirection").hide();
        $("#features").hide();
    }

    function showRedirectionForm() {
       $("#htaccess").hide();
         $("#robots").hide();
         $("#sitemap").hide();
         $("#redirection").show();
         $("#features").hide();
    }

    function showSitemapAdministration() {
      $("#htaccess").hide();
        $("#robots").hide();
        $("#sitemap").hide();
        $("#redirection").hide();
        $("#sitemap_administration").show();
    }
    
    
</script>