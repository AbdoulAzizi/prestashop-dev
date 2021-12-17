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

        parent::__construct();

        $this->displayName = $this->l('Mega SEO');
        $this->description = $this->l('Several tools for SEO optimisation,  redirections(301,302...), robots, htaccess, caches');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    
    public function install()
    {
        Configuration::updateValue('MEGASEO_LIVE_MODE', false);

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
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
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
	
	public function hookActionDispatcher(array $params){
		ob_start(array($this,'_analysisHTML'));
		if($params["controller_class"]==''){
			//TODO REGISTER 404 <
		}
	}
	
	public function hookActionDispatcherAfter(array $params){
		// var_dump($params);
		
		ob_end_flush();
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
