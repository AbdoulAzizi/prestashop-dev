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

.menu ul li:active, .menu ul li:hover, .menu ul li.active, 
.menu ul li:focus, .menu ul li:visited , .menu ul li > a:hover, .menu ul li > a:focus, .menu ul li > a:active, .menu ul li > a:visited {
    background-color: #beeaf3;
}
.current {
	background: #beeaf3;
}
   </style>
{/literal}

<nav class="navbar navbar-default">
  <div class="container-fluid menu">
    {* <div class="navbar-header">
      <a class="navbar-brand active" href="#">SEO avancé</a>
    </div> *}
    <ul class="nav navbar-nav">
      <li class="current"><a id="robots_link" href="#">Robots.txt</a></li>
      <li><a id="htaccess_link" href="#">htaccess</a></li>
      <li><a id="sitemap_link" href="#">Sitemap</a></li>
	    <li><a id="redirection_link" href="#">Redirection</a></li>
      <li><a id="sitemap_administration_link" href="#">Gérer le sitemap</a></li>
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

      {* <div class="panel-body">
        <p>
          <a href="http://www.robotstxt.org/robotstxt.html" target="_blank">Robots.txt</a> is a text file that tells search engines what pages to index and follow.
        </p>
        <p>
          It is a good idea to create a robots.txt file in the root directory of your website.
        </p>
        <p>
          The file should contain the following lines:
        </p>
      </div> *}
      {* display errors while permissions are not ok *}
      {if isset($robot_error_message)}
        <div class="alert alert-danger" role="alert" id="robot_error" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <span class="robot_error_message" id="robot_error_message">{{$robot_error_message}}</span>
        </div>
        {else}
        {* {if isset($robot_success_messages)}
        <div class="alert alert-success" role="alert" id="robot_success" style="">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          <span class="sr-only">Success:</span>
          <span id="robot_success_message">{{$robot_success_messages}}</span>
        </div>
        {/if} *}
        
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
      <div class="col-xs-12">
          <div class="text-right" style="padding: 10px;">
              <a href="#" type="button" class="btn btn-primary">Ajouter une redirection</a>
          </div>
      </div>
  </div>

     {* list of redirection created *}
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title ">Redirections 301, 302</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>{l s="From"}</th>
                <th>{l s="To"}</th>
                <th>{l s="Type"}</th>
                <th>{l s="Date"}</th>
                <th>{l s="Action"}</th>
              </tr>
            </thead>
            <tbody>
              {if isset($redirections)}
                {* {foreach from=$redirections item=redirection} *}
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <a href="{$redirection.delete_link}" class="btn btn-danger btn-xs">
                        <i class="icon-trash"></i>
                      </a>
                    </td>
                  </tr>
                {* {/foreach} *}
              {/if}
            </tbody>
          </table>
        </div>
      </div>
    
    </div>

    <div class="col-md-6" style="display: none;" id="sitemap_administration">

    </div>


     

</div>


  


<script type="text/javascript">

    
  
    $(document).ready(function() {
        $(".nav > li").click(function() {
            $(".nav > li").removeClass('current');
            $(this).addClass('current');
        });
    });
    document.getElementById("htaccess_link").onclick = function () {
        document.getElementById("htaccess").style.display = "block";
        document.getElementById("robots").style.display = "none";
        document.getElementById("sitemap").style.display = "none";
        document.getElementById("redirection").style.display = "none";
        document.getElementById("sitemap_link").style.color = "black";
        document.getElementById("features").style.display = "none"; 

    };
    document.getElementById("sitemap_link").onclick = function () {
        document.getElementById("htaccess").style.display = "none";
        document.getElementById("robots").style.display = "none";
        document.getElementById("sitemap").style.display = "block";
        document.getElementById("redirection").style.display = "none";
        // document.getElementById("htaccess_link").style.color = "black";
        document.getElementById("features").style.display = "none";
    };
    document.getElementById("robots_link").onclick = function () {
        document.getElementById("htaccess").style.display = "none";
        document.getElementById("robots").style.display = "block";
        document.getElementById("sitemap").style.display = "none";
        document.getElementById("redirection").style.display = "none";
        document.getElementById("features").style.display = "none";
    };
    document.getElementById("redirection_link").onclick = function () {
        document.getElementById("htaccess").style.display = "none";
        document.getElementById("robots").style.display = "none";
        document.getElementById("sitemap").style.display = "none";
        document.getElementById("redirection").style.display = "block";
        document.getElementById("features").style.display = "none";
    };
    document.getElementById("sitemap_administration_link").onclick = function () {
        document.getElementById("htaccess").style.display = "none";
        document.getElementById("robots").style.display = "none";
        document.getElementById("sitemap").style.display = "none";
        document.getElementById("redirection").style.display = "none";
        document.getElementById("sitemap_administration").style.display = "block";
    };
    
    
    
</script>