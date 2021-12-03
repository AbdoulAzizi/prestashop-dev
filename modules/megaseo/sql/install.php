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
$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'megaseo` (
    `id_megaseo` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY  (`id_megaseo`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

// create redirection table for 301 redirects and 302 redirects

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'redirection` (
    `id_redirection` int(11) NOT NULL AUTO_INCREMENT,
    `redirection_from` varchar(255) NOT NULL,
    `redirection_to` varchar(255) NOT NULL,
    `redirection_type` int(11) NOT NULL,
    `redirection_date` datetime NOT NULL,
    PRIMARY KEY  (`id_redirection`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


$sql[] = 'ALTER TABLE `'._DB_PREFIX_.'category_lang` ADD `description_lower`  TEXT NOT NULL AFTER `description`;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
