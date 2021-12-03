<?php
/**
* 2007-2021 PrestaShop
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2021 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

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

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Mega SEO');
        $this->description = $this->l('Several tools for SEO optimisation,  redirections(301,302...), robots, htaccess, caches');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
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

    /**
     * Load the configuration form
     */
    // public function getContent()
    // {
    //     /**
    //      * If values have been submitted in the form, process.
    //      */
    //     if (((bool)Tools::isSubmit('submitMegaseoModule')) == true) {
    //         $this->postProcess();
    //     }

    //     $this->context->smarty->assign('module_dir', $this->_path);

    //     $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

    //     return $output.$this->renderForm();
    // }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitMegaseoModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Live mode'),
                        'name' => 'MEGASEO_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter a valid email address'),
                        'name' => 'MEGASEO_ACCOUNT_EMAIL',
                        'label' => $this->l('Email'),
                    ),
                    array(
                        'type' => 'password',
                        'name' => 'MEGASEO_ACCOUNT_PASSWORD',
                        'label' => $this->l('Password'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'MEGASEO_LIVE_MODE' => Configuration::get('MEGASEO_LIVE_MODE', true),
            'MEGASEO_ACCOUNT_EMAIL' => Configuration::get('MEGASEO_ACCOUNT_EMAIL', 'contact@prestashop.com'),
            'MEGASEO_ACCOUNT_PASSWORD' => Configuration::get('MEGASEO_ACCOUNT_PASSWORD', null),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
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
