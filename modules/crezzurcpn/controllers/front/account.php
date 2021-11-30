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

class CrezzurcpnAccountModuleFrontController extends ModuleFrontController
{
    public function init()
    {
        parent::init();

        require_once $this->module->getLocalPath().'subscribeAlert.php';
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $breadcrumb['links'][] = $this->addMyAccountToBreadcrumb();
        return $breadcrumb;
    }

    public function initContent()
    {
        parent::initContent();

        if (!Context::getContext()->customer->isLogged()) {
            Tools::redirect('index.php?controller=authentication&redirect=module&module=crezzurcpn&action=account');
        }

        if (Context::getContext()->customer->id) {
            $this->context->smarty->assign('id_customer', Context::getContext()->customer->id);
            $this->context->smarty->assign(
                'subscribeAlert',
                subscribeAlert::getSubscribeAlerts((int) Context::getContext()->customer->id, (int) Context::getContext()->language->id)
            );

            $this->setTemplate('module:crezzurcpn/views/templates/front/productnotifications-account.tpl');
        }
    }
}
