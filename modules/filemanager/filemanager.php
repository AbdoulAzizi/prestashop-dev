<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Filemanager extends Module
{
    public $tabs = [
        [
            'name' => [
                'en' => 'File Manager', 
                'fr' => 'Gestionnaire de fichiers'
            ],
            'class_name' => 'AdminFilemanager',
            'visible' => true,
            'parent_class_name' => 'ShopParameters',
        ],
    ];
    public function __construct()
    {
        $this->name = 'filemanager';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'WOBY WEB';

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('File manager');
        $this->description = $this->l('create and manage files');

    }

    public function install()
    {
        // create folder
        if(!is_dir(_PS_ROOT_DIR_.'/doc_filemanager')){
         // create folder with permission
            mkdir(_PS_ROOT_DIR_.'/doc_filemanager', 0777, true);
        }

        if (parent::install()) {
            return true;
        }

        $this->_errors[] = $this->l('There was an error during the installation');

        return false;
    }

    public function uninstall()
    {
        if (parent::uninstall()) {
            return true;
        }

        $this->_errors[] = $this->l('There was an error during the uninstallation');

        return false;
    }

}