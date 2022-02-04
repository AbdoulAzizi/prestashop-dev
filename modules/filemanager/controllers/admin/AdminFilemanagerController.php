<?php

class AdminFilemanagerController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;

        $this->table = 'filemanager';
        $this->className = 'Filemanager';
    }

    // init content
    public function initContent()
    {
        parent::initContent();
        $this->bootstrap = true;

        // get all files
        $files = $this->getFiles();

        // get all folders
        $folders = $this->getFolders();

        // add in smarty
        $this->context->smarty->assign(array(
            'files' => $files,
            'folders' => $folders,
        ));
        
        // set template
        $this->setTemplate('filemanager.tpl');
       

    }

    // include css and js
    public function setMedia()
    {
        // add css
        $this->addCSS(array(
            _MODULE_DIR_ . $this->module->name . '/views/css/filemanager.css',
        ));

        // add js
        $this->addJS(array(
            _MODULE_DIR_ . $this->module->name . '/views/js/filemanager.js',
        ));

        // call parent
        parent::setMedia();
    }

    // get all files
    public function getFiles()
    {
        $files = array();
        $dir = _PS_ROOT_DIR_.'/doc_filemanager';
        $files = scandir($dir);

        return $files;
    }

    // get all folders
    public function getFolders()
    {
        $folders = array();
        $directory = _PS_ROOT_DIR_.'/doc_filemanager/';

        $scanned_directory = array_diff(scandir($directory), array('..', '.'));

        // $dir_content = $this->dir_tree($directory);

        // var_dump($dir_content);exit;

        foreach ($scanned_directory as $key => $value) {
            if (is_dir($directory.$value)) {
                $folders[] = $value;
            }
        }

        return $folders;
    }

    // get all files and folders
    function dir_tree($dir_path)
{
    $ritit = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir_path), RecursiveIteratorIterator::CHILD_FIRST);
    $r = array();
    foreach ($ritit as $splFileInfo) {
       $path = $splFileInfo->isDir()
             ? array($splFileInfo->getFilename() => array())
             : array($splFileInfo->getFilename());
    
       for ($depth = $ritit->getDepth() - 1; $depth >= 0; $depth--) {
           $path = array($ritit->getSubIterator($depth)->current()->getFilename() => $path);
       }
       
       $r = array_merge_recursive($r, $path);
    }

    return $r;
}
}

