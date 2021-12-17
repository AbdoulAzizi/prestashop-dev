<?php
/* Smarty version 3.1.39, created on 2021-12-17 16:59:00
  from '/var/www/html/prestashop/modules/megaseo/views/templates/admin/adminMegaseo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61bcb3c412a4c9_46918124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a96fb9ec114505f183f25d5328abb1df7f3151e' => 
    array (
      0 => '/var/www/html/prestashop/modules/megaseo/views/templates/admin/adminMegaseo.tpl',
      1 => 1639756699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61bcb3c412a4c9_46918124 (Smarty_Internal_Template $_smarty_tpl) {
?>


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


<nav class="navbar navbar-default">
  <div class="container-fluid menu">
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

      
  <div class="col-md-6" style="" id="robots">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Robots.txt</h2>
      </div>

                  <?php if ((isset($_smarty_tpl->tpl_vars['robot_error_message']->value))) {?>
        <div class="alert alert-danger" role="alert" id="robot_error" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <span class="robot_error_message" id="robot_error_message"><?php ob_start();
echo $_smarty_tpl->tpl_vars['robot_error_message']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</span>
        </div>
        <?php } else { ?>
                
      <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
        <div class="panel-body">
          <textarea name="robots_content" class="form-control" rows="10" placeholder=""><?php ob_start();
echo $_smarty_tpl->tpl_vars['robots_content']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</textarea>
        </div>
        <div class="panel-footer">
          <button type="submit" name="submitRobots" class="btn btn-primary pull-right">Enregistrer</button>
        </div>
      </form>

    <?php }?>

      
    </div>
  </div>
  <div class="col-md-6" style="display: none;" id="htaccess">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">htaccess</h2>
      </div>
      <?php if ((isset($_smarty_tpl->tpl_vars['htaccess_error_message']->value))) {?>
        <div class="alert alert-danger" role="alert" id="htaccess_error" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <span class="htaccess_error_message" id="htaccess_error_message"><?php ob_start();
echo $_smarty_tpl->tpl_vars['htaccess_error_message']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</span>
        </div>
        <?php } else { ?>
          
          <div class="alert alert-info" role="alert" id="" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">info:</span>
          <span class=""> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>" Attention, une modification inadaptée de ce fichier peut rendre votre site inaccessible ! "),$_smarty_tpl ) );?>
</span>
        </div>
      <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
        <div class="panel-body">
          <textarea name="htaccess_content" class="form-control" rows="10" placeholder=""><?php ob_start();
echo $_smarty_tpl->tpl_vars['htaccess_content']->value;
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</textarea>
        </div>
        <div class="panel-footer">
          <button type="submit" name="submitHtaccess" class="btn btn-primary pull-right">Enregistrer</button>
        </div>
      </form>
      <?php }?>
    </div>
  
  </div>

    <div class="col-md-6" style="display: none;" id="sitemap">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Sitemap</h2>
          </div>
          <?php if ((isset($_smarty_tpl->tpl_vars['sitemap_error_message']->value))) {?>
          <div class="alert alert-danger" role="alert" id="sitemap_error" style="">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            <span class="sitemap_error_message" id="sitemap_error_message"><?php ob_start();
echo $_smarty_tpl->tpl_vars['sitemap_error_message']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</span>
          </div>
          <?php } else { ?>
  
          <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
            <div class="panel-body">
              <textarea name="sitemap_content" class="form-control" rows="10" placeholder=""><?php ob_start();
echo $_smarty_tpl->tpl_vars['sitemap_content']->value;
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</textarea>      
            </div>
            <div class="panel-footer">
              <button type="submit" name="submitSitemap" class="btn btn-primary pull-right">Enregistrer</button>
            </div>
          </form>
          <?php }?>
      </div>
    </div>

    <div class="col-md-12" style="display: none;" id="redirection">
        
            <div class="row">
      <div class="col-xs-12">
          <div class="text-right" style="padding: 10px;">
              <a id="add_redirection" href="#" type="button" class="btn btn-primary">Ajouter une redirection</a>
          </div>
      </div>
  </div>

           <div class="panel panel-default" id="redirection_list">
        <div class="panel-heading">
          <h2 class="panel-title ">Redirections 301, 302</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"URI d'origine"),$_smarty_tpl ) );?>
</th>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"URL cible"),$_smarty_tpl ) );?>
</th>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Type de redirection"),$_smarty_tpl ) );?>
</th>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Date"),$_smarty_tpl ) );?>
</th>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Action"),$_smarty_tpl ) );?>
</th>
              </tr>
            </thead>
            <tbody>
              <?php if ((isset($_smarty_tpl->tpl_vars['redirection_data']->value))) {?>
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['redirection_data']->value, 'redirection');
$_smarty_tpl->tpl_vars['redirection']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['redirection']->value) {
$_smarty_tpl->tpl_vars['redirection']->do_else = false;
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['redirection']->value['redirection_from'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['redirection']->value['redirection_to'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['redirection']->value['redirection_type'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['redirection']->value['redirection_date'];?>
</td>
                    <td>
                    <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
                        <button id="updateRedirection" class="btn btn-primary btn-xs" type="button" name="updateRedirection" value="<?php echo $_smarty_tpl->tpl_vars['redirection']->value['id_redirection'];?>
">
                          <i class="icon-edit"></i>
                        </button>
                        <button type="submit" name="deleteRedirection"  class="btn btn-danger btn-xs" value="<?php echo $_smarty_tpl->tpl_vars['redirection']->value['id_redirection'];?>
">
                        <i class="icon-trash"></i>
                      </button>
                    </form>
                    </td>
                  </tr>
               <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>

            <div class="row">
        <div class="col-xs-12">
          <div class="text-right" id="cancel_redirection" style="padding: 10px; display:none";>
            <a id="" href="#" type="button" class="btn btn-default">Annuler</a>
          </div>
        </div>
      </div>
          

                <div class="panel panel-default" style="display: none;" id="redirection_form">

        
        <div class="panel-heading">
          <h2 class="panel-title">Redirection 301, 302</h2>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['redirection_error_message']->value))) {?>
        <div class="alert alert-danger" role="alert" id="redirection_error" style="">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <span class="redirection_error_message" id="redirection_error_message"><?php ob_start();
echo $_smarty_tpl->tpl_vars['redirection_error_message']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</span>
        </div>
        <?php } else { ?>
        <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
          <div class="panel-body">
            <div class="form-group">
              <label for="redirection_from"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"URI d'origine"),$_smarty_tpl ) );?>
</label>
              <input type="text" class="form-control" id="redirection_from" name="redirection_from" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"From"),$_smarty_tpl ) );?>
" value="">
            </div>
            <div class="form-group">
              <label for="redirection_to"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"URL cible"),$_smarty_tpl ) );?>
</label>
              <input type="text" class="form-control" id="redirection_to" name="redirection_to" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"To"),$_smarty_tpl ) );?>
" value="">
            </div>
            <div class="form-group">
              <label for="redirection_type"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Type de redirection"),$_smarty_tpl ) );?>
</label>
              <select class="form-control" id="redirection_type" name="redirection_type">
                <option value="301" >301</option>
                <option value="302" >302</option>
              </select>
            </div>
          
          <div class="panel-footer">
            <button type="submit" name="submitRedirection" class="btn btn-primary pull-right">Enregistrer</button>
          </div>
          </form>
        <?php }?>
    </div>

        <div class="panel panel-default" style="display: none;" id="redirection_update_form">
    
      <div class="panel-heading">
        <h2 class="panel-title">Redirection 301, 302</h2>
      </div>
      <?php if ((isset($_smarty_tpl->tpl_vars['redirection_update_error_message']->value))) {?>
      <div class="alert alert-danger" role="alert" id="redirection_update_error" style="">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <span class="redirection_update_error_message" id="redirection_update_error_message"><?php ob_start();
echo $_smarty_tpl->tpl_vars['redirection_update_error_message']->value;
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</span>
      </div>
      <?php } else { ?>
      <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
        <div class="panel-body">
          <div class="form-group">
            <label for="redirection_from"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"URI d'origine"),$_smarty_tpl ) );?>
</label>
            <input type="text" class="form-control" id="redirection_from" name="redirection_from" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"From"),$_smarty_tpl ) );?>
" value="">
          </div>
          <div class="form-group">
            <label for="redirection_to"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"URL cible"),$_smarty_tpl ) );?>
</label>
            <input type="text" class="form-control" id="redirection_to" name="redirection_to" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"To"),$_smarty_tpl ) );?>
" value="">
          </div>
          <div class="form-group">
            <label for="redirection_type"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Type de redirection"),$_smarty_tpl ) );?>
</label>
            <select class="form-control" id="redirection_type" name="redirection_type">
              <option value="301" >301</option>
              <option value="302" >302</option>
            </select>
          </div>
        
        <div class="panel-footer">
          <button type="submit" name="updateRedirection" class="btn btn-primary pull-right">Enregistrer</button>
        </div>
        </form>
      <?php }?>

    
    </div>

    <div class="col-md-6" style="display: none;" id="sitemap_administration">

    </div>


     

</div>


  


<?php echo '<script'; ?>
 type="text/javascript">

    
  
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
      
    // $(document).ready(function() {
    //     $(".nav > li").click(function() {
    //         $(".nav > li ").removeClass('current');
    //         $(this).addClass('current');
    //     });
    // });

    
    document.getElementById("htaccess_link").onclick = function () {
      showHtaccessForm();
    };
    document.getElementById("sitemap_link").onclick = function () {
      showSitemapForm();
      
    };
    document.getElementById("robots_link").onclick = function () {
      showRobotsForm();
       
    };
    document.getElementById("redirection_link").onclick = function () {
      showRedirectionForm();
       
    };
    document.getElementById("sitemap_administration_link").onclick = function () {
      showSitemapAdministration();
      
    };
    document.getElementById("add_redirection").onclick = function () {
        document.getElementById("redirection_form").style.display = "block";
        document.getElementById("redirection_list").style.display = "none";
        document.getElementById("add_redirection").style.display = "none";
        document.getElementById("cancel_redirection").style.display = "block";
    };
    document.getElementById("updateRedirection").onclick = function () {
        document.getElementById("redirection_update_form").style.display = "block";
        document.getElementById("redirection_list").style.display = "none";
        document.getElementById("add_redirection").style.display = "none";
    };
    document.getElementById("cancel_redirection").onclick = function () {
        document.getElementById("redirection_form").style.display = "none";
        document.getElementById("redirection_list").style.display = "block";
        document.getElementById("add_redirection").style.display = "block";
        document.getElementById("add_redirection").style.padding = "10px";
        document.getElementById("add_redirection").style.margin = "10px";
        document.getElementById("add_redirection").style.float = "right";
        document.getElementById("cancel_redirection").style.display = "none";

        // button.addEventListener('click',hideshow,false);

        // function hideshow() {
        //     document.getElementById('cancel_redirection').style.display = 'block'; 
        //     this.style.display = 'none'
        // }   
    };

    function showHtaccessForm() {
      document.getElementById("htaccess").style.display = "block";
      // set menu active background color
      // document.getElementById("htaccess_link").style.backgroundColor = "#beeaf3";
        document.getElementById("robots").style.display = "none";
        document.getElementById("sitemap").style.display = "none";
        document.getElementById("redirection").style.display = "none";
        // document.getElementById("sitemap_link").style.color = "black";
        document.getElementById("features").style.display = "none"; 
    }

    function showRobotsForm() {
      document.getElementById("htaccess").style.display = "none";
        document.getElementById("robots").style.display = "block";
        document.getElementById("sitemap").style.display = "none";
        document.getElementById("redirection").style.display = "none";
        document.getElementById("features").style.display = "none";
    }

    function showSitemapForm() {
      document.getElementById("htaccess").style.display = "none";
        document.getElementById("robots").style.display = "none";
        document.getElementById("sitemap").style.display = "block";
        document.getElementById("redirection").style.display = "none";
        // document.getElementById("htaccess_link").style.color = "black";
        document.getElementById("features").style.display = "none";
    }

    function showRedirectionForm() {
      document.getElementById("htaccess").style.display = "none";
        document.getElementById("robots").style.display = "none";
        document.getElementById("sitemap").style.display = "none";
        document.getElementById("redirection").style.display = "block";
        document.getElementById("features").style.display = "none";
    }

    function showSitemapAdministration() {
      document.getElementById("htaccess").style.display = "none";
        document.getElementById("robots").style.display = "none";
        document.getElementById("sitemap").style.display = "none";
        document.getElementById("redirection").style.display = "none";
        document.getElementById("sitemap_administration").style.display = "block";
    }
    
    
<?php echo '</script'; ?>
><?php }
}
