<?php
Class CodidocsDisplayModuleFrontController extends ModuleFrontController
{

	public function init()
	{
		$this->page_name = 'codidocs'; // page_name and body id
		$link=new Link();
		
		// var_dump(Tools::getAllValues());
		$directory=Tools::getValue('doc');
		
		if (!$this->context->customer->isLogged()) {
			$link=new Link();
			$link->getPageLink('authentication', true);
			Tools::redirectLink($link->getPageLink('authentication', true));
		}

		parent::init();
		
		$files=[];
		$folders=$this->_getFolders();
		if($directory!==false && !isset($folders[$directory])){
			Tools::redirectLink($link->getPageLink('module-codidocs-display'));//, null,null,array('doc'=>false)));
		}
		
		if($directory===false){
			$this->context->smarty->assign(array(
				'folders' => $folders
			));
			$this->setTemplate('module:codidocs/views/listsubfolders.tpl');
		}else{
			
			$dir=_PS_ROOT_DIR_.'/doc_codigel/'.$folders[$directory]->name.'/';
			$cdir = scandir($dir);

		  	foreach ($cdir as $key => $value) {
			  if (!in_array($value,array(".",".."))) {
				 if (!is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
					
					$v=new stdClass();
					$filename=basename($value);
					if(strrpos($filename,'.')!==false) $filename=substr($filename,0,strrpos($filename,'.'));
					
					$v->name=$filename;
					$v->url='/doc_codigel/'.$folders[$directory]->name.'/'.$value;
					
					$files[]=$v;
				 }
			  }
		   	}

			$this->context->smarty->assign(array(
				'folder' => $folders[$directory],
				"files"=>$files
			));

			$this->setTemplate('module:codidocs/views/downloads.tpl');
		}
	}
	
	public function setMedia()
	{
    	parent::setMedia();
		
	}

	protected function normalize($str)
	{
		$str = str_replace(chr(226).chr(128).chr(153),"'",$str);
		$str = utf8_decode($str);
		
		$str = utf8_encode(strtr($str,  "\xC0\xC1\xC2\xC3\xC4\xC5\xC7\xC8\xC9\xCA\xCB\xCC\xCD\xCE\xCF".
							"\xD0\xD1\xD2\xD3\xD4\xD5\xD6\xD8\xD9\xDA\xDB\xDC\xDD\xDF".
							"\xE0\xE1\xE2\xE3\xE4\xE5\xE7\xE8\xE9\xEA\xEB\xEC\xED\xEE\xEF".
							"\xF0\xF1\xF2\xF3\xF4\xF5\xF6\xF8\xF9\xFA\xFB\xFC\xFD\xFF",
							'AAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaceeeeiiiidnoooooouuuuyy'));
		
		return $str;
	}

	protected function rewrite($str)
	{
		$str = $this->normalize($str);
		$str = preg_replace('#[^a-z0-9]+#i', '-', strtolower($str));
		$str = trim($str, '-');

		return $str;
	}
	
	/*
	BREADCRUMB MANAGEMENT
	*/
	public function getBreadcrumbLinks()
	{
		$breadcrumb = parent::getBreadcrumbLinks();
		$directory=Tools::getValue('doc');
		if($directory!==false){
			$link=new Link();
			$breadcrumb['links'][] = [
				'title' => $this->getTranslator()->trans('Documentation', [], 'Breadcrumb'),
				'url' => $link->getPageLink('module-codidocs-display')
			 ];
			 
			 $folders=$this->_getFolders();
			 if(isset( $folders[$directory])){
				$breadcrumb['links'][] = [
					'title' => $folders[$directory]->name,
					'url' => ''
				 ];
			 }
		}else{
			$breadcrumb['links'][] = [
				'title' => $this->getTranslator()->trans('Documentation', [], 'Breadcrumb'),
				'url' => ''
			 ];
		}
	

		 return $breadcrumb;
	}
	 
	/*
	GET MAIN FOLDER CONTENT
	*/
	protected function _getFolders(){
		 
		 static $folders=[];
		 $link=new Link();
		 if(sizeof($folders)==0){
			$dir=_PS_ROOT_DIR_.'/doc_codigel/';
		 $cdir = scandir($dir);
		   foreach ($cdir as $key => $value)
		   {
			  if (!in_array($value,array(".","..")))
			  {
				 if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
				 {
					$base=$this->rewrite(str_replace(array('.'),'',$value));
					$url=$link->getPageLink('module-codidocs-displaydoc', null,null,array('doc'=>$base));
					$i=0;
					while(isset($folders[$url])){
						$i++;
						$url=$link->getPageLink('module-codidocs-displaydoc', null,null,array('doc'=>$base.'_'.$i));
					}
					$v=new stdClass();
					$v->name=$value;
					$v->url=$url;
					$v->ico="/doc_codigel/".$base.'.jpg';
					$folders[basename($url)]=$v;
				 }
			  }
		   }
		}
		return $folders;
	 }
}
