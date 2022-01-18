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
        $redirection_upload_file = new HelperUploader('redirection_upload_file');

        $this->context->smarty->assign(array(
            'content' => $this->content,
            'module_name' => 'megaseo',
            'robots_content' => $this->getRobotsContent(),
            'sitemap_content' => $this->getSitemapContent(),
            'htaccess_content' => $this->getHtaccessContent(),
            'redirection_data' => $this->getRedirectionData(),
            'redirection_upload_file' => $redirection_upload_file->render(),
            


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

        $this->ImportRedirection();

        $this->ExportRedirections();

        $this->UpdateRedirection();

        parent::postProcess();
    }
    
    public function UpdateRedirection(){
        if(Tools::isSubmit('updateRedirectionSubmit')){
           
            $redirection_id = Tools::getValue('redirection_id_update');
            $redirection_id = (int)$redirection_id;
            

            $redirection_from = Tools::getValue('redirection_from_update');
            $redirection_to = Tools::getValue('redirection_to_update');
            $redirection_type = Tools::getValue('redirection_type_update');

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
            $redirection_exists = Db::getInstance()->getValue('SELECT COUNT(*) FROM '._DB_PREFIX_.'redirection WHERE redirection_from = "'.pSQL($redirection_from).'" AND id_redirection != "'.pSQL($redirection_id).'" AND redirection_type = "'.pSQL($redirection_type).'" AND redirection_to = "'.pSQL($redirection_to).'"');
            if($redirection_exists){
                return $this->errors[] = $this->l('Cette redirection existe déjà');
            }

            // Met à jour la redirection
            $redirection_updated = Db::getInstance()->update('redirection', [
                'redirection_from' => pSQL($redirection_from),
                'redirection_to' => pSQL($redirection_to),
                'redirection_type' => pSQL($redirection_type),
            ], 'id_redirection = "'.pSQL($redirection_id).'"');

            if($redirection_updated){
                return $this->confirmations[] = $this->l('La redirection a été mise à jour');
            }
            else{
                return $this->errors[] = $this->l('Une erreur est survenue lors de la mise à jour de la redirection');
            }
        }
    }

    public function ImportRedirection(){

        if(Tools::getValue('redirection_import_submit') && $_FILES['redirection_upload_file']['error'] == UPLOAD_ERR_NO_FILE){
            // vérifier que le fichier a bien été uploadé
            return $this->errors[] = $this->l('Vous devez sélectionner un fichier à importer');
        }

        if(isset($_FILES['redirection_upload_file']) && $_FILES['redirection_upload_file']['error'] == 0){
            $file_content = file_get_contents($_FILES['redirection_upload_file']['tmp_name']);
            $file_content = explode("\n", $file_content);
            $file_content = array_map('trim', $file_content);
            $file_content = array_unique($file_content);

            // vérifier que l'extension du fichier est bien csv
            $file_extension = pathinfo($_FILES['redirection_upload_file']['name'], PATHINFO_EXTENSION);

            if($file_extension != 'csv'){
                return $this->errors[] = $this->l('Le fichier doit être au format CSV');
            }
            $redirection_upload_success = [];
            $redirection_upload_errors = [];
            $redirections_added = 0;

            foreach($file_content as $line){
                $line = explode(',', $line);
                $line = array_map('trim', $line);

                foreach($line as $key => $value){
                    if(!$value){
                        unset($line[$key]);
                    }
                }
                // skip empty lines
                if(!$line){
                    continue;
                }
                // skip first line
                if($line[0] == 'from'){
                    continue;
                }

                // check if line is valid
                if(count($line) < 3){
                    $redirection_upload_errors[] = $this->l('Ligne invalide : ').implode(', ', $line);
                    continue;
                }
                
            
                $redirection_from = $line[0];
                $redirection_type = $line[1];
                $redirection_to = $line[2];


                // if(!$redirection_from || !$redirection_to){
                //     $redirection_upload_errors[] = $this->l('La ligne suivante n\'est pas valide : ').$line[0];
                //     continue;
                // }

              
                if(preg_match('#^https?://#', $redirection_from)){
                    // $redirection_upload_errors[] = $this->l('L\'URI d\'origine ne doit pas commencer par http:// ou https://');
                    // remove http:// or https://
                    $redirection_from = preg_replace('#^https?://#', '', $redirection_from);
                    // remove www.
                    if(preg_match('#^www\.#', $redirection_from)){
                        $redirection_from = preg_replace('#^www\.#', '', $redirection_from);
                    }
                    // remove $_SERVER['SERVER_NAME']
                    if(preg_match('#^'.preg_quote($_SERVER['SERVER_NAME'], '#').'#', $redirection_from)){
                        $redirection_from = preg_replace('#^'.preg_quote($_SERVER['SERVER_NAME'], '#').'#', '', $redirection_from);
                    }
                    // continue;
                }

                if(!preg_match('#^https?://#', $redirection_to)){
                    $redirection_upload_errors[] = $this->l('Cette URL cible : '.' "'.$redirection_to.'" '.$this->l('doit commencer par http:// ou https://'));
                    continue;
                }

                  // vérifier que la redirection n'existe pas déjà
                  $redirection_exists = Db::getInstance()->getValue('SELECT COUNT(*) FROM '._DB_PREFIX_.'redirection WHERE redirection_from = "'.pSQL($redirection_from).'" AND redirection_to = "'.pSQL($redirection_to).'" AND redirection_type = "'.pSQL($redirection_type).'"');
                  if($redirection_exists){
                      $redirection_upload_errors[] = $this->l('Cette redirection existe déjà : ').$redirection_from.' '.$redirection_to;
                      continue;
                  }


                // enregistrer la redirection
                $redirection_id = Db::getInstance()->insert('redirection', [
                    'redirection_from' => pSQL($redirection_from),
                    'redirection_to' => pSQL($redirection_to),
                    'redirection_type' => pSQL($redirection_type),
                ]);
                if($redirection_id){
                    $redirections_added++;
                }
                else{
                    $redirection_upload_errors[] = $this->l('Une erreur est survenue lors de l\'enregistrement de la redirection');
                }
            }

            // var_dump($redirection_upload_errors);exit;

            if(count($redirection_upload_errors)){
                return $this->errors[] = $this->l('Erreurs : ').implode("<br>", $redirection_upload_errors);
            }

            if($redirections_added > 0){
                return $this->confirmations[] = $redirections_added.' '.$this->l('redirections ont été ajoutées');
            }
           
        }
        
    }

    public function ExportRedirections(){

        if(Tools::isSubmit('export_redirections_button')){
            // var_dump('export');exit;
            $redirections = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'redirection');

            $file_titles = [
                'URI d\'origine',
                'Type de redirection',
                'URL cible'
            ];

            $file_content = [];
            foreach($redirections as $redirection){
                $file_content[] = [
                    $redirection['redirection_from'],
                    $redirection['redirection_type'],
                    $redirection['redirection_to']
                ];
            }

            $file_content = array_merge([$file_titles], $file_content);

            $file_content = implode("\n", array_map(function($line){
                return implode(',', $line);
            }, $file_content));


            // $redirections = array_map(function($redirection){
            //     return [
            //         $redirection['redirection_from'],
            //         $redirection['redirection_type'],
            //         $redirection['redirection_to']
            //     ];
            // }, $redirections);

           
            

            $file_name = 'redirections_'.date('Y-m-d_H-i-s').'.csv';

            // $file_content = implode("\n", array_map(function($redirection){
            //     return implode(',', $redirection);
            // }, $redirections));

            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename='.$file_name);
            header('Pragma: no-cache');
            echo $file_content;
            exit;
        }
    }

}