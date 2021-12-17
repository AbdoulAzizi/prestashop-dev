<?php

use Doctrine\Common\Cache\CacheProvider;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;


class AdminMegaseoController extends ModuleAdminController{
	
	private $cache;
       
    // you can use symfony DI to inject services
    // public function __construct(CacheProvider $cache)
    // {
    //     $this->cache = $cache;
    // }
	
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
       
    }


    public function initContent()
    {

        parent::initContent();

        $this->context->smarty->assign(array(
            'content' => $this->content,
            'module_name' => 'megaseo',
            'robots_content' => $this->getRobotsContent(),
            'sitemap_content' => $this->getSitemapContent(),
            'htaccess_content' => $this->getHtaccessContent(),
            'redirection_data' => $this->getRedirectionData(),
            


        ));
        $this->bootstrap = true;

        $this->setTemplate('adminMegaseo.tpl');

    
    }
    

    public function getRobotsContent()
    {
        $robots_content = '';
        $robots_file = _PS_ROOT_DIR_.'/robots.txt';

        if(!file_exists($robots_file)){
            $this->context->smarty->assign('robot_error_message', $this->l('Le fichier ' .  $robots_file .' n\'existe pas'));
            return ; 
        }
        
        if (file_exists($robots_file)) {

            $functions = [
                'is_readable',
                'is_writable',
            ];

            foreach ($functions as $f) {
                if (!$f($robots_file)) {
                    $this->context->smarty->assign('robot_error_message', $this->l('Les permissions d\'écriture de robots.txt ne sont pas présentes'));
                  return  ; //$this->errors[] = sprintf($this->l('Les permissions d\'écriture du fichier '. $robots_file. ' ne sont pas présentes'));
                }
            }
            

            $robots_content = file_get_contents($robots_file);

            return $robots_content;
        }
        
    }

    public function getSitemapContent()
    {
        $sitemap_content = '';
        $sitemap_file = _PS_ROOT_DIR_.'/sitemap.xml';

        if(!file_exists($sitemap_file)){
            $this->context->smarty->assign('sitemap_error_message', $this->l('Le fichier ' .  $sitemap_file .' n\'existe pas'));
            return ; 
        }
        if (file_exists($sitemap_file)) {

            $functions = [
                'is_readable',
                'is_writable',
            ];

            foreach ($functions as $f) {
                if (!$f($sitemap_file)) {
                    $this->context->smarty->assign('sitemap_error_message', $this->l('Les permissions d\'écriture de sitemap.xml ne sont pas présentes'));
                  return  ; //$this->errors[] = sprintf($this->l('Les permissions d\'écriture du fichier '. $sitemap_file. ' ne sont pas présentes'));
                }
            }
           
            $sitemap_content = file_get_contents($sitemap_file);

            return $sitemap_content;
        }
        
    }

    public function getHtaccessContent()
    {
        $htaccess_content = '';
        $htaccess_file = _PS_ROOT_DIR_.'/.htaccess';

        if(!file_exists($htaccess_file)){
            $this->context->smarty->assign('htaccess_error_message', $this->l('Le fichier ' .  $htaccess_file .' n\'existe pas'));
            return ; 
        }

        if (file_exists($htaccess_file)) {

            $functions = [
                'is_readable',
                'is_writable',
            ];

            foreach ($functions as $f) {
                if (!$f($htaccess_file)) {
                    $this->context->smarty->assign('htaccess_error_message', $this->l('Les permissions d\'écriture de .htaccess ne sont pas présentes'));
                  return  ; //$this->errors[] = sprintf($this->l('Les permissions d\'écriture du fichier '. $htaccess_file. ' ne sont pas présentes'));
                }
            }
            

            $htaccess_content = file_get_contents($htaccess_file);

            return $htaccess_content;
        }
        
    }

    public function getRedirectionData()
    {
        $redirection_data = [];
       
        // retreive all redirection from redirection table by sql query

        $redirection_data =  Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'redirection');

        // var_dump($redirection_data[0]['id_redirection']);exit;

        return $redirection_data;
        
    }
    
    public function postProcess()
    {
        
        if (Tools::isSubmit('submitRobots')) {
            $robots_content = Tools::getValue('robots_content');
            $robots_file = _PS_ROOT_DIR_.'/robots.txt';
            if (file_exists($robots_file)) {
                file_put_contents($robots_file, $robots_content);
                // $this->context->smarty->assign('robot_success_messages', $this->l('Votre fichier robots.txt a été mis à jour'));
                return $this->confirmations[] = $this->l('Votre fichier robots.txt a été mis à jour');
            }
            else {
                return $this->errors[] = $this->l('Le fichier robots.txt a rencontré un problème lors de la mise à jour');
            }
        }

        if (Tools::isSubmit('submitSitemap')) {
            $sitemap_content = Tools::getValue('sitemap_content');
            $sitemap_file = _PS_ROOT_DIR_.'/sitemap.xml';
            if (file_exists($sitemap_file)) {
                file_put_contents($sitemap_file, $sitemap_content);
                // $this->context->smarty->assign('sitemap_success_messages', $this->l('Votre fichier sitemap.xml a été mis à jour'));
                return $this->confirmations[] = sprintf($this->l('Votre fichier sitemap.xml a été mis à jour'));
            }
            else {
                return $this->errors[] = $this->l('Le fichier sitemap.xml a rencontré un problème lors de la mise à jour');
            }
        }

        if (Tools::isSubmit('submitHtaccess')) {
            $htaccess_content = Tools::getValue('htaccess_content');
            $htaccess_file = _PS_ROOT_DIR_.'/.htaccess';
            if (file_exists($htaccess_file)) {
                file_put_contents($htaccess_file, $htaccess_content);
                // $this->context->smarty->assign('htaccess_success_messages', $this->l('Votre fichier .htaccess a été mis à jour'));
                return $this->confirmations[] = $this->l('Votre fichier .htaccess a été mis à jour');
            }
            else {
                return $this->errors[] = $this->l('Le fichier .htaccess a rencontré un problème lors de la mise à jour');
            }
        }

        if(Tools::isSubmit('submitRedirection')){
            
            // créer une redirection 301 ou 302 en fonction du choix de l'utilisateur et enregistrer la redirection
            $redirection_type = Tools::getValue('redirection_type');
            $redirection_from = Tools::getValue('redirection_from');
            $redirection_to = Tools::getValue('redirection_to');

            if(!$redirection_from || !$redirection_to){
                return $this->errors[] = $this->l('Vous devez renseigner les deux champs');
            }

            if(preg_match('#^https?://#', $redirection_from)){
                return $this->errors[] = $this->l('L\'URI d\'origine ne doit pas commencer par http:// ou https://');
            }

            if(!preg_match('#^https?://#', $redirection_to)){
                return $this->errors[] = $this->l('L\'URL cible doit commencer par http:// ou https://');
            }

            // vérifier que la redirection n'existe pas déjà
            $redirection_exists = Db::getInstance()->getValue('SELECT COUNT(*) FROM '._DB_PREFIX_.'redirection WHERE redirection_from = "'.pSQL($redirection_from).'"');
            if($redirection_exists){
                return $this->errors[] = $this->l('Cette redirection existe déjà');
            }

            // enregistrer la redirection
            $redirection_id = Db::getInstance()->insert('redirection', [
                'redirection_from' => pSQL($redirection_from),
                'redirection_to' => pSQL($redirection_to),
                'redirection_type' => pSQL($redirection_type),
                'redirection_date' => date('Y-m-d H:i:s')
            ]);

            if($redirection_id){
                return $this->confirmations[] = $this->l('La redirection a été enregistrée');
            }
            else{
                return $this->errors[] = $this->l('Une erreur est survenue lors de l\'enregistrement de la redirection');
            }
            

        }

        if(Tools::isSubmit('deleteRedirection')){
            $redirection_id = Tools::getValue('deleteRedirection');
            $redirection_id = (int)$redirection_id;
            if(!$redirection_id){
                return $this->errors[] = $this->l('Vous devez sélectionner une redirection');
            }

            $redirection_exists = Db::getInstance()->getValue('SELECT COUNT(*) FROM '._DB_PREFIX_.'redirection WHERE id_redirection = "'.pSQL($redirection_id).'"');
            if(!$redirection_exists){
                return $this->errors[] = $this->l('Cette redirection n\'existe pas');
            }

            $redirection_deleted = Db::getInstance()->delete('redirection', 'id_redirection = "'.pSQL($redirection_id).'"');
            if($redirection_deleted){
                return $this->confirmations[] = $this->l('La redirection a été supprimée');
            }
            else{
                return $this->errors[] = $this->l('Une erreur est survenue lors de la suppression de la redirection');
            }
        }

        parent::postProcess();
    }

}