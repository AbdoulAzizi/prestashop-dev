<?php

class Category extends CategoryCore
{
     

    public $description_lower;


	public function __construct($id = null, $id_lang = null)
    {
		self::$definition['fields']['description_lower'] = array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml');           
		parent::__construct($id, $id_lang);
	}
}