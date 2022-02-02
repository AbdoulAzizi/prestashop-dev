<?php
/**
 * 2007-2019 PrestaShop
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
 * @author PrestaShop SA <contact@prestashop.com>
 * @copyright  2007-2019 PrestaShop SA
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */
class AdminCodidocsListingController extends ModuleAdminController{
	
	
	
	
	 public function displayAjaxListFolder(){
		if(!isset($_POST['datas']) || !isset($_POST['datas']['folder-id'])) return $this->ajaxRenderJson([]);
		$folders=$this->_getFolders();
		$files=[];
		$directory=$_POST['datas']['folder-id'];
			$dir=_PS_ROOT_DIR_.'/doc_codigel/'.$folders[$directory]->name.'/';
			$cdir = scandir($dir);

		  	foreach ($cdir as $key => $value) {
			  if (!in_array($value,array(".",".."))) {
				 if (!is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
					
					$v=new stdClass();
					$filename=basename($value);
					// if(strrpos($filename,'.')!==false) $filename=substr($filename,0,strrpos($filename,'.'));
					
					$v->name=$filename;
					$v->url='/doc_codigel/'.$folders[$directory]->name.'/'.$value;
					
					$files[]=$v;
				 }
			  }
		   	}
		
		return $this->ajaxRenderJson($files);
	 }
	 
	 
	 /*
	 DELETE FOLDER
	 */
	 public function displayAjaxDeleteFolder()
    {
			if(!isset($_POST['datas']) || !isset($_POST['datas']['folder-id'])) return false;
			$folders=$this->_getFolders();
			foreach($_POST['datas']['folder-id'] as $directory){
				
				$dir=_PS_ROOT_DIR_.'/doc_codigel/'.$folders[$directory]->name.'/';
				if(is_dir($dir)) rmdir($dir);
				$e=new \stdClass();
				$e->err=0;
				return $this->ajaxRenderJson($e);
			}
			$e=new \stdClass();
				$e->err=1;
			return $this->ajaxRenderJson('error');
	}
	
	 /*
	 DELETE FOLDER
	 */
	 public function displayAjaxDeleteFile()
    {
			if(!isset($_POST['datas']) || !isset($_POST['datas']['file-id'])) return false;
			$folders=$this->_getFolders();
			$dir=_PS_ROOT_DIR_.$_POST['datas']['file-id'];
			if(file_exists($dir)){
				if(is_writable($dir)){
					unlink($dir);
					$e=new \stdClass();
					$e->err=0;
				}else{
					$e=new \stdClass();
					$e->err=1;
					$e->lib="Les permissions empèchent de supprimer le fichier";
				}
			}
			return $this->ajaxRenderJson($e);
			
	}
	/*
	RENAME FILE
	*/
	public function displayAjaxRenameFile()
    {
			if(!isset($_POST['datas']) || !isset($_POST['datas']['file-id'])) return false;
			if(!isset($_POST['datas']['file-name'])) return false;
			$file=_PS_ROOT_DIR_.$_POST['datas']['file-id'];
			//TODO VERIF QUE L'ON MODIFIE BIEN LE BON FICHIER
			$fileNew=dirname(_PS_ROOT_DIR_.$_POST['datas']['file-id']).DIRECTORY_SEPARATOR.trim($_POST['datas']['file-name']," \r\n\t");//;
			
			
			rename($file,$fileNew);
			
			$e=new \stdClass();
				$e->err=1;
			return $this->ajaxRenderJson('success');
	}
	/*
	RENAME FOLDER
	*/
	public function displayAjaxRenameFolder()
    {
			if(!isset($_POST['datas']) || !isset($_POST['datas']['folder-id'])) return false;
			if(!isset($_POST['datas']['folder-name'])) return false;
			$folders=$this->_getFolders();
			foreach($_POST['datas']['folder-id'] as $directory){
				
				$dir=_PS_ROOT_DIR_.'/doc_codigel/'.$folders[$directory]->name.'/';
				if(is_dir($dir)) rename($dir,_PS_ROOT_DIR_.'/doc_codigel/'.$_POST['datas']['folder-name'].'/');
				$e=new \stdClass();
				$e->err=0;
				return $this->ajaxRenderJson($e);
			}
			$e=new \stdClass();
				$e->err=1;
			return $this->ajaxRenderJson('error');
	}
	 public function displayAjaxsaveFile()
    {
		$db=Db::getInstance();
		$datas=[];
		// var_dump($_FILES);
		if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $_FILES['file']["name"]) ){
			unset($_FILES['file']);
		}
		$folders=$this->_getFolders();
			$j=0;
			$directory=_PS_ROOT_DIR_.'/doc_codigel/'.$folders[$_POST['folder']]->name.'/';
			$ext=strtolower(substr($_FILES["file"]["name"], strrpos($_FILES["file"]["name"], '.') + 1));
			$NameBase=substr($_FILES["file"]["name"],0, strrpos($_FILES["file"]["name"], '.'));
			// while(file_exists($directory.$finalFile)); {
				// $size=20+(($j-($j%2))/2);
				// $finalFile=$this->getRandomString($size,"azertyuiopqsdfghjklmwxcvbn0123456789_").'.'.$ext;
				// ++$j;						
			// } 
			$target_file=(_PS_ROOT_DIR_.'/doc_codigel/'.$folders[$_POST['folder']]->name.'/'.$_FILES["file"]["name"]);
			
			//DEFINE TARGET FILE
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
				 return $this->ajaxRenderJson(array('file'=>'/doc_codigel/'.$folders[$_POST['folder']]->name.'/'.$_FILES["file"]["name"]));
				 
				 
			}
		// }

    }
	/*
	ADD FOLDER
	*/
	public function displayAjaxAddFolder()
    {
		if(!isset($_POST['datas']) || !isset($_POST['datas']['folder-name'])) return false;
		mkdir(_PS_ROOT_DIR_.'/doc_codigel/'.$_POST['datas']['folder-name'].'/');
				
		$e=new \stdClass();
		$e->err=0;
		return $this->ajaxRenderJson($e);	
	}
	
	protected function ajaxRenderJson($content)
    {
        header('Content-Type: application/json');
        $this->ajaxRender(json_encode($content));
    }
	
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
					// while(isset($folders[$url])){
						// $i++;
						// $url=$link->getPageLink('module-codidocs-displaydoc', null,null,array('doc'=>$base.'_'.$i));
					// }
					$v=new stdClass();
					$v->id=$base;
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
}