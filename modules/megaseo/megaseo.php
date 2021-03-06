<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Megaseo extends Module
{
    protected $config_form = false;


    public $tabs = [
        [
            'name' => [
                'en' => 'Advanced SEO', // Fallback value
                'fr' => 'SEO avancé'          
            ],
            'class_name' => 'AdminMegaseo',
            'visible' => true,
            'parent_class_name' => 'ShopParameters',
        ],
    ];

    public function __construct()
    {
        $this->name = 'megaseo';
        $this->tab = 'seo';
        $this->version = '1.0.0';
        $this->author = 'WOBY WEB';
        $this->need_instance = 1;

        $this->bootstrap = true;

           // pages priority
           $this->mega_sitemap_pages_priority = array(
            'home' => array(
                'priority' => '1.0',
                'frequency' => 'weekly',
            ),
            'products' => array(
                'priority' => '0.9',
                'frequency' => 'weekly',
            ),
            'categories' => array(
                'priority' => '0.8',
                'frequency' => 'weekly',
            ),
            'cms' => array(
                'priority' => '0.7',
                'frequency' => 'daily',
            ),
            'cmsCategories' => array(
                'priority' => '0.8',
                'frequency' => 'weekly',
            ),
            'meta' => array(
                'priority' => '0.1',
                'frequency' => 'weekly',
            ),
        );

        parent::__construct();

        $this->displayName = $this->l('Mega SEO');
        $this->description = $this->l('Several tools for SEO optimisation,  redirections(301,302...), robots, htaccess, caches');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    
    public function install()
    {

        // add mega_sitemap_pages_priority to table ps_configuration
        foreach ($this->mega_sitemap_pages_priority as $key => $value) {
            Configuration::updateValue('MEGASEO_PAGES_PRIORITY_'.strtoupper($key), $value['priority']);
            Configuration::updateValue('MEGASEO_PAGES_FREQUENCY_'.strtoupper($key), $value['frequency']);
        }

        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('header') &&

            $this->registerHook('actionAfterCreateCategoryFormHandler')&&
            $this->registerHook('actionAfterUpdateCategoryFormHandler')&&
            $this->registerHook('actionCategoryFormBuilderModifier')&&
            $this->registerHook('displayFooterCategory')&&
            $this->registerHook('actionDispatcher')&&
            $this->registerHook('actionDispatcherAfter')&&

            $this->registerHook('backOfficeHeader');
    }

    public function uninstall()
    {
        Configuration::deleteByName('MEGASEO_LIVE_MODE');

        include(dirname(__FILE__).'/sql/uninstall.php');

        return parent::uninstall();
    }

    public function hookBackOfficeHeader()
    {
        
            $this->context->controller->addJS($this->_path.'views/js/mgaseo.js');
            $this->context->controller->addCSS($this->_path.'views/css/megase.css');
        
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }


    /*
		CATEGORY MANAGMENT
	*/
	public function hookDisplayFooterCategory(){
		return $this->display(__FILE__,'views/templates/front/footercategory.tpl');
	}
	public function hookActionCategoryFormBuilderModifier(array $params)
        {
    
            $formBuilder = $params['form_builder'];
			$cat = new Category($params['id']);
			$languages = Language::getLanguages(true);
			$cfg=[
					'type'=>FormattedTextareaType::class,
					'label' => $this->l('Description Bas'), 
					'locales' => $languages,
					'hideTabs' => false,
					'required' => false,
					'options'=>array(					
						'required' => false,
						'constraints' => [
							new CleanHtml([
								'message' => $this->l(
									'%s is invalid.',
									'Admin.Notifications.Error'
								),
							]),
						],
					)
                ];
			$formBuilder->add('description_lower', TranslateType::class, $cfg,$languages);
            // $this->_addFieldIntoFormBuilderAfterOther($formBuilder,'description_lower', TranslatableType::class, $cfg,'description' );
			

			foreach ( $languages as $lang){
				$params['data']['description_lower'][$lang['id_lang']] =$cat->description_lower[$lang['id_lang']];
			}
   
            $formBuilder->setData($params['data']);
        }
	
	public function _analysisHTML($cnt){
		// var_dump($cnt);
		return ($cnt);
	}
	public function hookActionAfterUpdateCategoryFormHandler(array $params){$this->updateData($params['form_data'], $params); }
	public function hookActionAfterCreateCategoryFormHandler(array $params){$this->updateData($params['form_data'], $params); }
	protected function updateData(array $data, $params){
		$cat = new Category((int)$params['id']);
		$cat->description_lower= $data['description_lower'];
		$cat->update();
	}


   

}
