<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.admin.meta_settings.seo_options.form_handler' shared service.

return $this->services['prestashop.admin.meta_settings.seo_options.form_handler'] = new \PrestaShop\PrestaShop\Core\Form\Handler(${($_ = isset($this->services['form.factory']) ? $this->services['form.factory'] : $this->load('getForm_FactoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.hook.dispatcher']) ? $this->services['prestashop.core.hook.dispatcher'] : $this->getPrestashop_Core_Hook_DispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.admin.traffic_seo.meta_settings.seo_options.form_data_provider']) ? $this->services['prestashop.admin.traffic_seo.meta_settings.seo_options.form_data_provider'] : $this->load('getPrestashop_Admin_TrafficSeo_MetaSettings_SeoOptions_FormDataProviderService.php')) && false ?: '_'}, 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\SEOOptionsType', 'MetaPage', 'meta_settings_seo_options_form');