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

class CrezzurcpnActionsModuleFrontController extends ModuleFrontController
{
    public $id_product;
    public $id_product_attribute;

    public function init()
    {
        parent::init();
        require_once $this->module->getLocalPath().'subscribeAlert.php';
        $this->id_product = (int) Tools::getValue('id_product');
        $this->id_product_attribute = (int) Tools::getValue('id_product_attribute');
    }

    public function postProcess()
    {
        if (Tools::getValue('process') == 'remove') {
            $this->processRemove();
        } elseif (Tools::getValue('process') == 'add') {
            $this->processAdd();
        } elseif (Tools::getValue('process') == 'check') {
            $this->processCheck();
        }
    }

    public function processRemove()
    {
        $product = new Product($this->id_product);
        if (!Validate::isLoadedObject($product)) {
            die('1');
        }

        $context = Context::getContext();
        if (subscribeAlert::deleteAlert(
            (int) $context->customer->id,
            (int) $context->customer->email,
            (int) $product->id,
            (int) $this->id_product_attribute,
            (int) $context->shop->id
        )) {
            die('0');
        }

        die('1');
    }

    public function processAdd()
    {
        $context = Context::getContext();

        if ($context->customer->isLogged()) {
            $id_customer = (int) $context->customer->id;
            $customer = new Customer($id_customer);
            $customer_email = (string) $customer->email;
        } elseif (Validate::isEmail((string)Tools::getValue('customer_email'))) {
            $customer_email = (string) Tools::getValue('customer_email');
            $customer = $context->customer->getByEmail($customer_email);
            $id_customer = (isset($customer->id) && ($customer->id != null)) ? (int) $customer->id : null;
        } else {
            die(json_encode(
                array(
                    'error' => true,
                    'message' => $this->trans('Your e-mail address is invalid', array(), 'Modules.Crezzurcpn.Shop'),
                )
            ));
        }

        $id_product = (int) Tools::getValue('id_product');
        $id_product_attribute = (int) Tools::getValue('id_product_attribute');
        $id_shop = (int) $context->shop->id;
        $id_lang = (int) $context->language->id;
        $product = new Product($id_product, false, $id_lang, $id_shop, $context);
        $mail_alert = subscribeAlert::customerHasNotification($id_customer, $id_product, $id_product_attribute, $id_shop, null, $customer_email, strtotime('now'));

        if ($mail_alert) {
            die(json_encode(
                array(
                    'error' => true,
                    'message' => $this->trans('You already have an alert for this product', array(), 'Modules.Crezzurcpn.Shop'),
                )
            ));
        } elseif (!Validate::isLoadedObject($product)) {
            die(json_encode(
                array(
                    'error' => true,
                    'message' => $this->trans('Your e-mail address is invalid', array(), 'Modules.Crezzurcpn.Shop'),
                )
            ));
        }

        $mail_alert = new subscribeAlert();
        $mail_alert->id_customer = (int) $id_customer;
        $mail_alert->customer_email = (string) $customer_email;
        $mail_alert->id_product = (int) $id_product;
        $mail_alert->id_product_attribute = (int) $id_product_attribute;
        $mail_alert->id_shop = (int) $id_shop;
        $mail_alert->id_lang = (int) $id_lang;
        $mail_alert->created = strtotime('now');

        if ($mail_alert->add() !== false) {
            die(json_encode(
                array(
                    'error' => false,
                    'message' => $this->trans('Request notification registered', array(), 'Modules.Crezzurcpn.Shop'),
                )
            ));
        }

        die(json_encode(
            array(
                'error' => true,
                'message' => $this->trans('Your e-mail address is invalid', array(), 'Modules.Crezzurcpn.Shop'),
            )
        ));
    }

    public function processCheck()
    {
        if (!(int) $this->context->customer->logged) {
            die('0');
        }

        $id_customer = (int) $this->context->customer->id;

        if (!$id_product = (int) Tools::getValue('id_product')) {
            die('0');
        }

        $id_product_attribute = (int) Tools::getValue('id_product_attribute');

        if (subscribeAlert::customerHasNotification(
            (int) $id_customer,
            (int) $id_product,
            (int) $id_product_attribute,
            (int) $this->context->shop->id,
            strtotime('now')
        )) {
            die('1');
        }

        die('0');
    }
}
