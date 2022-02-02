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


        
        // set template
        $this->setTemplate('filemanager.tpl');
       

    }

}
      
