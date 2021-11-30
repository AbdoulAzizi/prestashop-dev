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
*  @copyright 2014-2020 Jaimy Aerts
*  @license   All rights reserved
*  International Registered Trademark & Property of Crezzur
*/

class CpnHelper
{

    private $translator;
    public function __construct($translator)
    {
        $this->translator = $translator;
    }

    public function prepMail($custid)
    {
        $data = Db::getInstance()->ExecuteS("SELECT * FROM "._DB_PREFIX_."crezzurcpn WHERE id = $custid");
        $d = $data[0];

        $p = new Product($d['id_product']);
        $link = new Link();

        if ($d['id_customer'] > 0) {
            $c = Db::getInstance()->ExecuteS("SELECT firstname, lastname FROM "._DB_PREFIX_."customer WHERE id_customer = ". (int)$d['id_customer']);
            $cust = $c[0];
            $fname = $cust['firstname'];
            $lname = $cust['lastname'];
        } else {
            $fname = null;
            $lname = null;
        }

        $img = Product::getCover($p->id);
        $img_url = Context::getContext()->link->getImageLink($p->link_rewrite, $p->id . '-' . $img['id_image'], ImageType::getFormattedName('large'));
        $params = array(
            '{email}' => $d['customer_email'],
            '{firstname}' => $fname,
            '{lastname}' => $lname,
            '{product_name}' => Product::getProductName($p->id, $d['id_product_attribute'], $d['id_lang']),
            '{product_desc}' => $p->description[$d['id_lang']],
            '{product_url}' => $link->getProductLink($p),
            '{product_img}' => $img_url,
        );
        $subject = $this->translator->trans('The product you were interested in is available again', [], 'Modules.Crezzurcpn.Admin');
        if (Mail::Send(
            $d['id_lang'],                  // defaut language id
            'back_in_stock',                // email template file to be use
            $subject,                       // email subject
            $params,                        // templateVars
            $d['customer_email'],           // to email address
            $lname,                         // to name
            null,                           // from email address
            null,                           // from name
            false,                          // fileAttachment
            false,                          // modeSMTP
            _PS_MODULE_DIR_ .'crezzurcpn/mails/', // mail template path
            false,
            (int) $d['id_shop']
        )) {
            Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'crezzurcpn SET status = 1 WHERE id = '. (int)$d['id']);
            $m = $this->translator->trans('Email was sent successfully to', [], 'Modules.Crezzurcpn.Admin');
            return array(
                'status' => 'success',
                'msg' => $m . ' ' . $d['customer_email'] .'!',
            );
        } else {
            $m = $this->translator->trans('Email could not be sent to', [], 'Modules.Crezzurcpn.Admin');
            return array(
                'status' => 'danger',
                'msg' => $m . ' '. $d['customer_email'] .'!',
            );
        }
    }
}
