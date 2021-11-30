<?php
/* Smarty version 3.1.39, created on 2021-11-30 12:31:51
  from '/var/www/html/prestashop/modules/megaseo/views/templates/admin/adminMegaseo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a60ba75150f9_87014021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a96fb9ec114505f183f25d5328abb1df7f3151e' => 
    array (
      0 => '/var/www/html/prestashop/modules/megaseo/views/templates/admin/adminMegaseo.tpl',
      1 => 1638271909,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a60ba75150f9_87014021 (Smarty_Internal_Template $_smarty_tpl) {
?>


  <style type="text/css">

.menu ul li:active, .menu ul li:hover, .menu ul li.active, 
.menu ul li:focus, .menu ul li:visited , .menu ul li > a:hover, .menu ul li > a:focus, .menu ul li > a:active, .menu ul li > a:visited {
    background-color: #beeaf3;
}
.current {
	background: #beeaf3;
}
   </style>


<nav class="navbar navbar-default">
  <div class="container-fluid menu">
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
              <a href="#" type="button" class="btn btn-primary">Ajouter une redirection</a>
          </div>
      </div>
  </div>

           <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title ">Redirections 301, 302</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"From"),$_smarty_tpl ) );?>
</th>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"To"),$_smarty_tpl ) );?>
</th>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Type"),$_smarty_tpl ) );?>
</th>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Date"),$_smarty_tpl ) );?>
</th>
                <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Action"),$_smarty_tpl ) );?>
</th>
              </tr>
            </thead>
            <tbody>
              <?php if ((isset($_smarty_tpl->tpl_vars['redirections']->value))) {?>
                                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['redirection']->value['delete_link'];?>
" class="btn btn-danger btn-xs">
                        <i class="icon-trash"></i>
                      </a>
                    </td>
                  </tr>
                              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    
    </div>

    <div class="col-md-6" style="display: none;" id="sitemap_administration">

    </div>


     

</div>


  


<?php echo '<script'; ?>
 type="text/javascript">

    
  
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
    
    
    
<?php echo '</script'; ?>
><?php }
}
