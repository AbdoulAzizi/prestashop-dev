<?php
/**
 * 2007-2019 PrestaShop
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
 * @author PrestaShop SA <contact@prestashop.com>
 * @copyright  2007-2019 PrestaShop SA
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */
// namespace PrestaShopBundle\Module\megaseo\controllers\admin;

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

        // render the template
        $this->context->smarty->assign(array(
            'content' => $this->content,
            'module_name' => 'megaseo',
            'robots_content' => $this->getRobotsContent(),
            'sitemap_content' => $this->getSitemapContent(),
            'htaccess_content' => $this->getHtaccessContent(),


        ));
        $this->bootstrap = true;

        // $this->context->smarty->assign('module_dir', $this->_path);

        // return $this->context->smarty->fetch(_PS_MODULE_DIR_.'megaseo/views/templates/admin/adminMegaseo.tpl');
        // return $output;
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
                'is_executable'
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
                'is_executable'
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
                'is_executable'
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
        parent::postProcess();
    }

}