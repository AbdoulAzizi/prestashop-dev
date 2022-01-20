<?php

class MegaSitemap {

    public function __construct()
    {
        $this->type_array = array(
            'home',
            'meta',
            'product',
            'category',
            'cms',
            'module',
        );

        $metas = Db::getInstance()->ExecuteS('SELECT * FROM `' . _DB_PREFIX_ . 'meta` ORDER BY `id_meta` ASC');
        $disabled_metas = explode(',', Configuration::get('GSITEMAP_DISABLE_LINKS'));
        foreach ($metas as $meta) {
            if (in_array($meta['id_meta'], $disabled_metas)) {
                if (($key = array_search($meta['page'], $this->type_array)) !== false) {
                    unset($this->type_array[$key]);
                }
            }
        }
    }

    public function generateSitemap($id_shop = 0)
    {
        // if (@fopen($this->normalizeDirectory(_PS_ROOT_DIR_) . '/test.txt', 'wb') == false) {
        //     $this->context->smarty->assign('google_maps_error', $this->trans('An error occured while trying to check your file permissions. Please adjust your permissions to allow PrestaShop to write a file in your root directory.', array(), 'Modules.Gsitemap.Admin'));

        //     return false;
        // } else {
        //     @unlink($this->normalizeDirectory(_PS_ROOT_DIR_) . 'test.txt');
        // }
        
        if ($id_shop != 0) {
            $this->context->shop = new Shop((int) $id_shop);
        }

        $type = Tools::getValue('type') ? Tools::getValue('type') : '';
        $languages = Language::getLanguages(true, $this->context->shop->id);
        $lang_stop = Tools::getValue('lang') ? true : false;
        $id_obj = Tools::getValue('id') ? (int) Tools::getValue('id') : 0;
        foreach ($languages as $lang) {
            $i = 0;
            $index = (Tools::getValue('index') && Tools::getValue('lang') == $lang['iso_code']) ? (int) Tools::getValue('index') : 0;
            if ($lang_stop && $lang['iso_code'] != Tools::getValue('lang')) {
                continue;
            } elseif ($lang_stop && $lang['iso_code'] == Tools::getValue('lang')) {
                $lang_stop = false;
            }

            $link_sitemap = array();
            foreach ($this->type_array as $type_val) {
                if ($type == '' || $type == $type_val) {
                    $function = 'get' . Tools::ucfirst($type_val) . 'Link';
                    if (!$this->$function($link_sitemap, $lang, $index, $i, $id_obj)) {
                        return false;
                    }
                    $type = '';
                    $id_obj = 0;
                }
            }
            $this->recursiveSitemapCreator($link_sitemap, $lang['iso_code'], $index);
            $page = '';
            $index = 0;
        }

        $this->createIndexSitemap();
        Configuration::updateValue('GSITEMAP_LAST_EXPORT', date('r'));
        Tools::file_get_contents('https://www.google.com/webmasters/sitemaps/ping?sitemap=' . urlencode($this->context->link->getBaseLink() . $this->context->shop->physical_uri . $this->context->shop->virtual_uri . $this->context->shop->id));

        if ($this->cron) {
            die();
        }
        Tools::redirectAdmin('index.php?tab=AdminModules&configure=gsitemap&token=' . Tools::getAdminTokenLite('AdminModules') . '&tab_module=' . $this->tab . '&module_name=gsitemap&validation');
        die();
    }

    protected function recursiveSitemapCreator($link_sitemap, $lang, &$index)
    {
        if (!count($link_sitemap)) {
            return false;
        }

        $sitemap_link = $this->context->shop->id . '_' . $lang . '_' . $index . '_sitemap.xml';
        $write_fd = fopen($this->normalizeDirectory(_PS_ROOT_DIR_) . $sitemap_link, 'wb');

        fwrite($write_fd, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . PHP_EOL);
        foreach ($link_sitemap as $key => $file) {
            fwrite($write_fd, '<url>' . PHP_EOL);
            $lastmod = (isset($file['lastmod']) && !empty($file['lastmod'])) ? date('c', strtotime($file['lastmod'])) : null;
            $this->addSitemapNode($write_fd, htmlspecialchars(strip_tags($file['link'])), $this->getPriorityPage($file['page']), Configuration::get('GSITEMAP_FREQUENCY'), $lastmod);

            $images = array();
            if (isset($file['image']) && $file['image']) {
                $images[] = $file['image'];
            }
            if (isset($file['images']) && $file['images']) {
                $images = array_merge($images, $file['images']);
            }
            foreach($images as $image) {
                $this->addSitemapNodeImage($write_fd, htmlspecialchars(strip_tags($image['link'])), isset($image['title_img']) ? htmlspecialchars(str_replace(array(
                    "\r\n",
                    "\r",
                    "\n",
                ), '', $this->removeControlCharacters(strip_tags($image['title_img'])))) : '', isset($image['caption']) ? htmlspecialchars(str_replace(array(
                    "\r\n",
                    "\r",
                    "\n",
                ), '', strip_tags($image['caption']))) : '');
            }
            fwrite($write_fd, '</url>' . PHP_EOL);
        }
        fwrite($write_fd, '</urlset>' . PHP_EOL);
        fclose($write_fd);
        $this->saveSitemapLink($sitemap_link);
        ++$index;

        return true;
    }
}