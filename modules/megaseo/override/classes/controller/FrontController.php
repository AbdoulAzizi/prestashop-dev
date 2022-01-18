<?php


class FrontController extends FrontControllerCore
{
    public function init()
    {
        parent::init();
    }

    public function initContent()
    {
       // PHP 301, 302, redirects from redirection db table
       // retreive redirections from database

       $base_url = "http://$_SERVER[HTTP_HOST]";
       $request_uri = "$_SERVER[REQUEST_URI]";
       $redirections_urls = array();
       $redirections_urls= Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'redirection');
       
      // if (count($this->php_redirects) > 0)
      // {
          foreach($redirections_urls as $redirection)
          {
              $redirection_from = $redirection['redirection_from'];
              $redirection_to = $redirection['redirection_to'];
              $redirection_type = $redirection['redirection_type'];
              
            // add delimiters for preg_match
              $redirection_from = "'".$redirection_from."'" ;

              if ( preg_match($redirection_from, $request_uri) )
              {
                //   var_dump($request_uri);

                  
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
