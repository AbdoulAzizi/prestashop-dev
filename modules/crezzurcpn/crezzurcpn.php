<?php
/**
* LICENSE
* You are not allowed to share this code and or files. All rights reserved Crezzur
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade our products to newer
* versions in the future. If you wish to customize our products for your
* needs please contact us for more information.
*
*  @author    Crezzur <info@crezzur.com>
*  @copyright 2014-2021 Jaimy Aerts
*  @license   All rights reserved
*  International Registered Trademark & Property of Crezzur
*/


if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(_PS_ROOT_DIR_ .'/modules/crezzurcpn/cpnHelper.php');
include_once dirname(__FILE__).'/subscribeAlert.php';

class Crezzurcpn extends Module
{
    const INSTALL_SQL_FILE = '/sql/install.sql';
    const UNINSTALL_SQL_FILE = '/sql/uninstall.sql';
    protected $submitted_tabs;
    private $cpnHelper;

    public function __construct()
    {
        $this->name = 'crezzurcpn';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'crezzur.com';
        $this->module_key = '';
        $this->bootstrap = true;
        $this->controllers = array('account', 'actions', 'cron');
        parent::__construct();
        $this->displayName = $this->trans('Customer Product Notifications', [], 'Modules.Crezzurcpn.Crezzurcpn');
        $this->description = $this->trans('Notify your subscribed customer when a product is back available for sale.', [], 'Modules.Crezzurcpn.Crezzurcpn');

        $this->cpnHelper = new cpnHelper($this->getTranslator());
    }

    public function isUsingNewTranslationSystem()
    {
        return true;
    }

    public function install()
    {
        $this->_clearCache('*');
        $token = Tools::encrypt(Tools::getShopDomainSsl().time());
        Configuration::updateGlobalValue('CREZZUR_CPN_EXECUTION_TOKEN', $token);
        if (!parent::install()
            || !$this->installSQL()
            || !$this->registerHook('displayProductAdditionalInfo')
            || !$this->registerHook('displayHeader')
            || !$this->registerHook('displayCustomerAccount')
            || !$this->registerHook('displayMyAccountBlock')) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        $this->_clearCache('*');
        return parent::uninstall() && $this->uninstallSQL();
    }

    private function installSQL()
    {
        if (!file_exists(dirname(__FILE__) . self::INSTALL_SQL_FILE)) {
            return false;
        }
        if (!$sql = Tools::file_get_contents(dirname(__FILE__) . self::INSTALL_SQL_FILE)) {
            return false;
        }
        $replace = array(
            'PREFIX' => _DB_PREFIX_,
            'ENGINE_DEFAULT' => _MYSQL_ENGINE_,
        );
        $sql = strtr($sql, $replace);
        $sql = preg_split("/;\s*[\r\n]+/", $sql);

        foreach ($sql as &$q) {
            if ($q && !Db::getInstance()->execute(trim($q))) {
                return false;
            }
        }
        unset($sql, $q, $replace);
        return true;
    }

    private function uninstallSQL()
    {
        if (!file_exists(dirname(__FILE__) . self::UNINSTALL_SQL_FILE)) {
            return false;
        }
        if (!$sql = Tools::file_get_contents(dirname(__FILE__) . self::UNINSTALL_SQL_FILE)) {
            return false;
        }
        $replace = array(
            'PREFIX' => _DB_PREFIX_,
            'ENGINE_DEFAULT' => _MYSQL_ENGINE_,
        );
        $sql = strtr($sql, $replace);
        $sql = preg_split("/;\s*[\r\n]+/", $sql);
        foreach ($sql as &$q) {
            if ($q && !Db::getInstance()->execute(trim($q))) {
                return false;
            }
        }
        unset($sql, $q, $replace);
        return true;
    }

    public function addMedia()
    {
        $this->context->controller->addCSS('https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css');
        $this->context->controller->addCSS('https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css');
        $this->context->controller->addCSS('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css');
        $this->context->controller->addJS('https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js');
        $this->context->controller->addCSS($this->_path . 'views/css/cpn.css');
        $this->context->controller->addJS($this->_path . 'views/js/cpn.js');
        $this->context->controller->addCSS($this->_path . 'views/css/accordion.css');
        $this->context->controller->addJS($this->_path . 'views/js/accordion.js');
    }

    public function showMessage($update_status, $message)
    {
        $this->context->smarty->assign('status', $update_status);
        $this->context->smarty->assign('message', $message);
    }

    public function ajaxProcessDeletecust()
    {
        $id = (int)Tools::getValue('custid_del');
        Db::getInstance()->Execute("UPDATE "._DB_PREFIX_."crezzurcpn SET status = 3 WHERE id = $id");

        $status = 'success';
        $msg = $this->trans('Customer is deleted successfully from your databank', [], 'Modules.Crezzurcpn.Crezzurcpn').'!';
        echo Tools::jsonEncode(array(
            'status' => $status,
            'msg' => $msg
        ));
    }

    public function ajaxProcessSendcust()
    {
        //require_once(_PS_ROOT_DIR_ .'/modules/crezzurcpn/cpnHelper.php');
        //$this->CpnHelper = new cpnHelper($this->getTranslator());
        echo Tools::jsonEncode($this->cpnHelper->prepMail((int)Tools::getValue('custid_send')));
    }

    public function ajaxProcessAutoimport()
    {
        Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'crezzurcpn (id_customer, customer_email, id_product, id_product_attribute, id_shop, id_lang)
        SELECT id_customer, customer_email, id_product, id_product_attribute, id_shop, id_lang FROM '._DB_PREFIX_.'mailalert_customer_oos');
        Configuration::updateGlobalValue('CREZZUR_CPN_IMPORT', 1);
        echo Tools::jsonEncode(true);
    }

    public function ajaxProcessLoadcustomers()
    {
        $list = (int)Tools::getValue('list');
        $id = (int)Tools::getValue('req_p');
        $attr = (int)Tools::getValue('req_p_attr');
        $c = Db::getInstance()->executeS("SELECT * FROM "._DB_PREFIX_."crezzurcpn WHERE status = $list AND id_product = $id AND id_product_attribute = $attr");
        $href = 'index.php?controller=AdminCustomers&viewcustomer&token=' . Tools::getAdminTokenLite('AdminCustomers') .'&id_customer=';
        echo Tools::jsonEncode(array('cust' => $c, 'href' => $href));
    }

    public function ajaxProcessGetsubscribers()
    {
        $list = (int)Tools::getValue('list');
        $id_lang = $this->context->language->id;
        //$iso_code = $this->context->language->iso_code;
        $data = Db::getInstance()->executeS("SELECT id_product, id_product_attribute, count(id_product) AS total FROM "
                                            ._DB_PREFIX_. "crezzurcpn WHERE status = $list GROUP BY id_product, id_product_attribute");
        $cpn_products = array();
        foreach ($data as $row) {
            $p_attr = null;
            $p = new Product($row['id_product'], false, $id_lang);
            //$p->loadStockData();
            $p->quantity = StockAvailable::getQuantityAvailableByProduct($row['id_product'], $row['id_product_attribute']);
            $prodhref = dirname($_SERVER['PHP_SELF']) . '/index.php?tab=AdminProducts&id_product=' . $row['id_product'] . '&updateproduct&token=' . Tools::getAdminTokenLite('AdminProducts');
            $i = Product::getCover($row['id_product']);

            if ($row['id_product_attribute'] > 0) {
                foreach ($p->getAttributeCombinationsById($row['id_product_attribute'], true) as $attributes) {
                    $p_attr .= $attributes['group_name'].': '.$attributes['attribute_name'].', ';
                }
            } else {
                $p_attr = null;
            }
            $cpn_products[] = array(
                'product_href' => $prodhref,
                'pattributes' => $p_attr,
                'attribute_id' => $row['id_product_attribute'],
                'active' => $p->active,
                'product_id' => $p->id,
                'product_img' => $this->context->link->getImageLink($p->link_rewrite, $i['id_image'], ImageType::getFormatedName('home')),
                'available_for_order' => $p->available_for_order,
                'available_date' => $p->available_date,
                'product_name' => $p->name,
                'quantity' => $p->quantity,
                'product_reference' => $p->reference,
                'product_ean' => $p->ean13,
                'total' => $row['total'],
            );
        }
        echo Tools::jsonEncode($cpn_products);
    }

    public function getContent()
    {
        if (Configuration::get('CREZZUR_CPN_EXECUTION_TOKEN') == null) {
            $token = Tools::encrypt(Tools::getShopDomainSsl().time());
            Configuration::updateGlobalValue('CREZZUR_CPN_EXECUTION_TOKEN', $token);
        }
        if (Configuration::get('CREZZUR_CPN_IMPORT') == null) {
            Configuration::updateGlobalValue('CREZZUR_CPN_IMPORT', 0);
        }
        if (Configuration::get('CREZZUR_CPN_IMPORT') == 0) {
             $totimport = Db::getInstance()->getValue('SELECT count(*) FROM '._DB_PREFIX_.'mailalert_customer_oos');
        } else {
            $totimport = null;
        }

        if (Configuration::get('MA_CUSTOMER_QTY') == 1) {
            $m = $this->trans('The option Product availability in the module Mail alerts needs to be turned off', [], 'Modules.Crezzurcpn.Crezzurcpn') . '!';
            $this->showMessage('warning', $m);
        }

        Media::addJsDef(array(
            'cpn_formurl' => $this->context->link->getAdminLink('AdminModules', true).'&configure=crezzurcpn',
        ));

        $this->context->smarty->assign(array(
            'modurl' => $this->context->link->getAdminLink('AdminModules', true).'&configure=crezzurcpn',
            'module_emailalerts' => Configuration::get('MA_CUSTOMER_QTY'),
            //'cronlink' => Context::getContext()->link->getModuleLink('crezzurcpn', 'cron').'&token='.Configuration::get('CREZZUR_CPN_EXECUTION_TOKEN'),
            'cronlink' => $this->context->link->getModuleLink(
                'crezzurcpn',
                'cron',
                ['token' => Configuration::get('CREZZUR_CPN_EXECUTION_TOKEN')]
            ),
            'import' => Configuration::get('CREZZUR_CPN_IMPORT'),
            'totimport' => $totimport
        ));
        $this->addMedia();
        return $this->display(__FILE__, 'views/templates/admin/index.tpl');
    }

    public function hookDisplayHeader()
    {
        $this->page_name = Dispatcher::getInstance()->getController();
        if (in_array($this->page_name, array('product', 'account'))) {
            $this->context->controller->addJS($this->_path.'views/js/addproductnotification.js');
        }
    }

    public function hookDisplayProductAdditionalInfo($params)
    {
        if (0 < $params['product']['quantity'] ||
            !Configuration::get('PS_STOCK_MANAGEMENT') ||
            Product::isAvailableWhenOutOfStock($params['product']['out_of_stock'])
           ) {
            return;
        }
        $context = Context::getContext();
        $id_product = (int)$params['product']['id'];
        $id_product_attribute = $params['product']['id_product_attribute'];
        $id_customer = (int)$context->customer->id;
        if ((int)$context->customer->id <= 0) {
            $this->context->smarty->assign('email', 1);
        } elseif (subscribeAlert::customerHasNotification($id_customer, $id_product, $id_product_attribute, (int)$context->shop->id)) {
            return;
        }
        $this->context->smarty->assign(
            array(
                'id_product' => $id_product,
                'id_product_attribute' => $id_product_attribute,
                'id_module' => $this->id
            )
        );
        return $this->display(__FILE__, 'hooksubscribeproduct.tpl');
    }

    public function hookDisplayCustomerAccount($params)
    {
        return $this->display(__FILE__, 'my-account.tpl');
    }

    public function hookDisplayMyAccountBlock($params)
    {
        return $this->display(__FILE__, 'my-account-footer.tpl');
    }
}
