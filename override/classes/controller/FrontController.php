<?php
class FrontController extends FrontControllerCore
{
    /*
    * module: megaseo
    * date: 2022-01-25 16:19:27
    * version: 1.0.0
    */
    public function init()
    {
        parent::init();
    }
    /*
    * module: megaseo
    * date: 2022-01-25 16:19:27
    * version: 1.0.0
    */
    public function initContent()
    {
       $base_url = "http://$_SERVER[HTTP_HOST]";
       $request_uri = "$_SERVER[REQUEST_URI]";
       $redirections_urls = array();
       $redirections_urls= Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'redirection');
       
          foreach($redirections_urls as $redirection)
          {
              $redirection_from = $redirection['redirection_from'];
              $redirection_to = $redirection['redirection_to'];
              $redirection_type = $redirection['redirection_type'];
              
              $redirection_from = "'".$redirection_from."$'";
              if ( preg_match($redirection_from, $request_uri) )
              {
                  
                  if ($redirection_type == '301')
                  {
                      header('HTTP/1.1 301 Moved Permanently');
                      header('Location: '.$redirection_to);
                      exit();
                  }
                  elseif ($redirection_type == '302')
                  {
                      header('HTTP/1.1 302 Moved Temporarily');
                      header('Location: '.$redirection_to);
                      exit();
                  }
              }
          }
        parent::initContent();
    }
}
