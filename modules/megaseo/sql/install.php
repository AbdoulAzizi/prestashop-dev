<?php
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
