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
if (!defined('_PS_VERSION_')) {
    exit;
}

class codidocs extends Module{
	
	public $tabs = [
        [
            'name' => 'Documents', // One name for all langs
            'class_name' => 'AdminCodidocsMain',
            'visible' => true,
            'parent_class_name' => 'ShopParameters',
        ],
    ];
	 public function __construct()
    {
        // Settings
        $this->name = 'codidocs';
        $this->tab = 'seo';
        $this->version = '1.0.0';
        $this->author = 'PrestaShop';
        $this->need_instance = 0;
        $this->module_key = '258b88886d4d79aa4d5824439cb0ef11';
        
		$this->bootstrap = true;
        parent::__construct();
        if ($this->context->link == null) {
            $protocolPrefix = Tools::getCurrentUrlProtocolPrefix();
            $this->context->link = new Link($protocolPrefix, $protocolPrefix);
        }

        $this->displayName = $this->trans('Documents Codigel', array(), 'Modules.Codidocs.Admin');
        $this->description = $this->trans('Gestion des documents codigel', array(), 'Modules.Codidocs.Admin');

        // Confirm uninstall
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall this module?', array(), 'Modules.Codidocs.Admin');
        $this->ps_url = $this->context->link->getBaseLink();
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    /**
     * install pre-config
     *
     * @return bool
     */
    public function install()
    {
        // SQL
        
		if(!is_dir(_PS_ROOT_DIR_.'/doc_codigel/')){
			mkdir(_PS_ROOT_DIR_.'/doc_codigel/');
		}
        // Hooks
        if (parent::install() && $this->registerHook('moduleRoutes')) {
            return true;
        }

        $this->_errors[] = $this->trans('There was an error during the installation. Please contact us through Addons website.', array(), 'Modules.Blockreassurance.Admin');

        return false;
    }
	 public function loadAsset()
    {
         $javascriptAssets = [
           __PS_BASE_URI__ . 'modules/' . $this->name . '/js/jstree.min.js',
            __PS_BASE_URI__ . 'modules/' . $this->name . '/js/custom.js',
            
        ];
		
		$this->context->controller->addJS($javascriptAssets);
		$this->context->controller->addCSS([ __PS_BASE_URI__ .'modules/'.$this->name.'/css/jstree/customtheme.css']);
		Media::addJsDef(array(
			'psr_controller_cfg_url' => $this->context->link->getAdminLink('AdminCodidocsListing'),
		));
	}
	public function getContent()
    {

		$this->loadAsset();
		$this->context->smarty->assign(array(
				'folders' => $this->_getFolders()
			));
		
		return $this->display(__FILE__, 'views/configure.tpl');
    }
    /**
     * Uninstall module configuration
     *
     * @return bool
     */
    public function uninstall()
    {
        // SQL
        
        if (parent::uninstall()) {
            return true;
        }

        $this->_errors[] = $this->trans('There was an error during the uninstallation. Please contact us through Addons website.', array(), 'Modules.Blockreassurance.Admin');

        return false;
    }

	public function hookModuleRoutes($params)
    {
        $my_routes = array(
            'module-codidocs-display' => array(
                'controller' => 'display',
                'rule' => 'documentation',
                'keywords' => array(
                    // 'step' =>   array('regexp' => '[0-9]+', 'param' => 'step'),
                  //  'doc' =>   array('regexp' => '[_a-zA-Z0-9-\pL]*', 'param' => 'doc'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'codidocs',
                ),
            ),
			'module-codidocs-displaydoc' => array(
                'controller' => 'display',
                'rule' => 'documentation/{doc}',
                'keywords' => array(
                    // 'step' =>   array('regexp' => '[0-9]+', 'param' => 'step'),
                    'doc' =>   array('regexp' => '[_a-zA-Z0-9-\pL]*', 'param' => 'doc'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'codidocs',
                ),
            )
        );

        return $my_routes;
    }
	
	protected function _getFolders(){
		 
		 static $folders=[];
		 $link=new Link();
		 if(sizeof($folders)==0){
			$dir=_PS_ROOT_DIR_.'/doc_codigel/';
		 $cdir = scandir($dir);
		   foreach ($cdir as $key => $value)
		   {
			  if (!in_array($value,array(".","..")))
			  {
				 if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
				 {
					$base=$this->rewrite(str_replace(array('.'),'',$value));
					$url=$link->getPageLink('module-codidocs-displaydoc', null,null,array('doc'=>$base));
					$i=0;
					while(isset($folders[$url])){
						$i++;
						$url=$link->getPageLink('module-codidocs-displaydoc', null,null,array('doc'=>$base.'_'.$i));
					}
					$v=new stdClass();
					$v->id=$base;
					$v->name=$value;
					$v->url=$url;
					$v->ico="/doc_codigel/".$base.'.jpg';
					$folders[basename($url)]=$v;
				 }
			  }
		   }
		}
		return $folders;
	 }
	 
	 protected function normalize($str)
	{
		$str = str_replace(chr(226).chr(128).chr(153),"'",$str);
		$str = utf8_decode($str);
		
		$str = utf8_encode(strtr($str,  "\xC0\xC1\xC2\xC3\xC4\xC5\xC7\xC8\xC9\xCA\xCB\xCC\xCD\xCE\xCF".
							"\xD0\xD1\xD2\xD3\xD4\xD5\xD6\xD8\xD9\xDA\xDB\xDC\xDD\xDF".
							"\xE0\xE1\xE2\xE3\xE4\xE5\xE7\xE8\xE9\xEA\xEB\xEC\xED\xEE\xEF".
							"\xF0\xF1\xF2\xF3\xF4\xF5\xF6\xF8\xF9\xFA\xFB\xFC\xFD\xFF",
							'AAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaceeeeiiiidnoooooouuuuyy'));
		
		return $str;
	}

	protected function rewrite($str)
	{
		$str = $this->normalize($str);
		$str = preg_replace('#[^a-z0-9]+#i', '-', strtolower($str));
		$str = trim($str, '-');

		return $str;
	}

}