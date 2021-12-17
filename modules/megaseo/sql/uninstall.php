<?php

$sql = array();

$sql[] = 'ALTER TABLE `'._DB_PREFIX_.'category_lang` DROP `description_lower`';


$sql[] = ' DROP TABLE IF EXISTS `'._DB_PREFIX_.'redirection`';
$sql[] = ' DROP TABLE IF EXISTS `'._DB_PREFIX_.'megaseo`';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
