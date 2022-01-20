<?php
/* Smarty version 3.1.39, created on 2022-01-20 13:44:56
  from '/var/www/html/prestashop/modules/megaseo/views/templates/admin/adminMegaseo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61e95948113d63_27880978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a96fb9ec114505f183f25d5328abb1df7f3151e' => 
    array (
      0 => '/var/www/html/prestashop/modules/megaseo/views/templates/admin/adminMegaseo.tpl',
      1 => 1642594953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e95948113d63_27880978 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
                                            <button type="submit" name="export_redirections_button"  class="btn btn-primary" value=""> Exporter les données</button>
                    </form>
                  </div>
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
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Action"),$_smarty_tpl ) );?>
</th>
              </tr>
            </thead>
            <tbody>
              <?php if ((isset($_smarty_tpl->tpl_vars['redirection_data']->value)) && !empty($_smarty_tpl->tpl_vars['redirection_data']->value)) {?>
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
                                            <td>
                      <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
                          <button id="<?php echo $_smarty_tpl->tpl_vars['redirection']->value['id_redirection'];?>
" class="btn btn-primary btn-xs update_redirection" type="button" name="update_redirection" value="" 
                          data-redirection_type="<?php echo $_smarty_tpl->tpl_vars['redirection']->value['redirection_type'];?>
" data-redirection_from="<?php echo $_smarty_tpl->tpl_vars['redirection']->value['redirection_from'];?>
" data-redirection_to="<?php echo $_smarty_tpl->tpl_vars['redirection']->value['redirection_to'];?>
">
                            <i class="icon-edit"></i>
                          </button>
                          <button type="submit" name="deleteRedirection"  class="btn btn-danger btn-xs" value="<?php echo $_smarty_tpl->tpl_vars['redirection']->value['id_redirection'];?>
" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>" Vous êtes sur le point de supprimer une redirection. Êtes-vous sûr ?"),$_smarty_tpl ) );?>
');">
                          <i class="icon-trash"></i>
                        </button>
                      </form>
                      </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                <tr>
                  <td colspan="4"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Aucune redirection n'a été créée"),$_smarty_tpl ) );?>
</td>
                </tr>
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
            </div>
            </form>
          <?php }?>
      </div>

            <div class="panel panel-default" style="display:none" id="redirection_update_form">
      <div class="panel-heading">
        <h2 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Modifier une redirection"),$_smarty_tpl ) );?>
</h2>
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
          <input type="hidden" id="redirection_id_update" name="redirection_id_update" value="">
            <div class="form-group">
              <label for="redirection_from_update"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"URI d'origine"),$_smarty_tpl ) );?>
</label>
              <input type="text" class="form-control" id="redirection_from_update" name="redirection_from_update" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"From"),$_smarty_tpl ) );?>
" value="">
            </div>
            <div class="form-group">
              <label for="redirection_to_update"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"URL cible"),$_smarty_tpl ) );?>
</label>
              <input type="text" class="form-control" id="redirection_to_update" name="redirection_to_update" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"To"),$_smarty_tpl ) );?>
" value="">
            </div>
            <div class="form-group">
              <label for="redirection_type"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Type de redirection"),$_smarty_tpl ) );?>
</label>
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
      <?php }?>
    </div>


           <div class="panel panel-default" style="display:none" id="redirection_import_form">
          <div class="panel-heading">
            <h2 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Importer des redirections"),$_smarty_tpl ) );?>
</h2>
          </div>
       <?php if ((isset($_smarty_tpl->tpl_vars['redirection_import_error_message']->value))) {?>
         <div class="alert alert-danger" role="alert" id="redirection_import_error" style="">
           <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
           <span class="sr-only">Error:</span>
           <span class="redirection_import_error_message" id="redirection_import_error_message"><?php ob_start();
echo $_smarty_tpl->tpl_vars['redirection_import_error_message']->value;
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</span>
         </div>
       <?php } else { ?>
         <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
         <div class="form-group">
            <label class="control-label col-lg-3" for="redirection_upload_file">
              <span class="label-tooltip" data-toggle="tooltip"
                title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Veuillez sélectionner un fichier CSV contenant les redirections à importer.'),$_smarty_tpl ) );?>
">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Fichier'),$_smarty_tpl ) );?>

              </span>
            </label>
            <div class="col-lg-8">
              <?php echo $_smarty_tpl->tpl_vars['redirection_upload_file']->value;?>

            </div>
            <div class="col-lg-3">
            &nbsp;
            </div>
            <div class="col-lg-8">
              <p class="help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Importer un fichier CSV'),$_smarty_tpl ) );?>
</p>
            </div>
          </div>
           <div class="panel-body">
                            <div class="panel-footer">
                <input type="hidden" name="redirection_import_submit" value="1">
                <button type="submit" name="importRedirectionSubmit" class="btn btn-primary pull-right" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Importer"),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Importer"),$_smarty_tpl ) );?>
</button>
              </div>
           </div>
         </form>
       <?php }?>
   </div>

    </div>
    
     
  

    <div class="col-md-6" style="display: none;" id="sitemap_administration">
                <div class="panel panel-default" id="sitemap_generation_type">
          <div class="panel-heading">
            <h2 class="panel-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Génération du sitemap"),$_smarty_tpl ) );?>
</h2>
          </div>
          <div class="panel-body">
            <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" multipart="true" enctype="multipart/form-data">
              <div class="form-group">
                <input type="radio" name="generate_sitemap" value="1" id="automatic_sitemap" checked>
                <label for="automatic_sitemap"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Générer automatiquement le sitemap"),$_smarty_tpl ) );?>
</label>
              </div>
              <div class="form-group">
                <input type="radio" name="generate_sitemap" value="0" id="manual_sitemap">
                <label for="manual_sitemap"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Générer manuellement le sitemap"),$_smarty_tpl ) );?>
</label>
              </div>
              <div class="form-group" id="manual_textarea_site_map" style="display: none;">
                <?php if ((isset($_smarty_tpl->tpl_vars['sitemap_error_message']->value))) {?>
                  <div class="alert alert-danger" role="alert" id="sitemap_error" style="">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <span class="sitemap_error_message" id="sitemap_error_message"><?php ob_start();
echo $_smarty_tpl->tpl_vars['sitemap_error_message']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
</span>
                  </div>
                <?php } else { ?>
                  <div>
                    <a href="#" id="default_sitemap_generate" style="color: red; padding:10px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Cliquez ici pour générer le sitemap par défaut"),$_smarty_tpl ) );?>
</a>
                  </div>
                  <div>
                    <textarea class="form-control" rows="10" id="sitemap_content" name="sitemap_content" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Contenu du sitemap"),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['sitemap_content']->value;?>
</textarea>
                  </div>
                <?php }?>
              </div>
              <div class="panel-footer">
                <button type="submit" name="generateSitemapSubmit" class="btn btn-primary pull-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"SAUVEGARDER"),$_smarty_tpl ) );?>
</button>
              </div>
            </form>
          </div>
        </div>


              
    </div>

</div>


  


<?php echo '<script'; ?>
>

      // si le type de génération automatique est coché
      $('#automatic_sitemap').click(function() {
        $('#manual_textarea_site_map').hide();
      });
      // si le type de génération manuelle est coché
      $('#manual_sitemap').click(function() {
        $('#manual_textarea_site_map').show();
      });

    $('.update_redirection').each(function() {
        $(this).click(function(e) {
          var redirection_id = $(this).attr('id');
          var redirection_from = $(this).attr('data-redirection_from');
          var redirection_to = $(this).attr('data-redirection_to');
          $('#redirection_id_update').val(redirection_id);
          $('#redirection_from_update').val(redirection_from);
          $('#redirection_to_update').val(redirection_to);
          $('#redirection_type_update').val($(this).attr('data-redirection_type'));


          $("#redirection_update_form").show();
              $("#redirection_list").hide();
              // $("#add_redirection").hide();
              $("#cancel_redirection").show();

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
              $("#redirection_update_form").hide();

          });

          $("#update_redirection").click(function () {
            
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
              // location.reload();

            
          });

        function showHtaccessForm() {
          $("#htaccess").show();
            $("#robots").hide();
            $("#sitemap").hide();
            $("#redirection").hide();
            $("#features").hide();
            $("#sitemap_administration").hide();
        }

        function showRobotsForm() {
          $("#htaccess").hide();
            $("#robots").show();
            $("#sitemap").hide();
            $("#redirection").hide();
            $("#features").hide();
            $("#sitemap_administration").hide();
        }

        function showSitemapForm() {
          $("#htaccess").hide();
            $("#robots").hide();
            $("#sitemap").show();
            $("#redirection").hide();
            $("#features").hide();
            $("#sitemap_administration").hide();
        }

        function showRedirectionForm() {
          $("#htaccess").hide();
            $("#robots").hide();
            $("#sitemap").hide();
            $("#redirection").show();
            $("#features").hide();
            $("#sitemap_administration").hide();
        }

        function showSitemapAdministration() {
          $("#htaccess").hide();
            $("#robots").hide();
            $("#sitemap").hide();
            $("#redirection").hide();
            $("#sitemap_administration").show();
        }
        
        
<?php echo '</script'; ?>
><?php }
}
