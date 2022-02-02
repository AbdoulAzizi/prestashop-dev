<?php
class Category extends CategoryCore
{
     
    /*
    * module: megaseo
    * date: 2022-01-25 16:19:26
    * version: 1.0.0
    */
    public $description_lower;
	/*
    * module: megaseo
    * date: 2022-01-25 16:19:26
    * version: 1.0.0
    */
    public function __construct($id = null, $id_lang = null)
    {
		self::$definition['fields']['description_lower'] = array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml');           
		parent::__construct($id, $id_lang);
	}
}