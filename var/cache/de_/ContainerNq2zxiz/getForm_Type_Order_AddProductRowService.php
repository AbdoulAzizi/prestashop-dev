<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'form.type.order.add_product_row' shared service.

return $this->services['form.type.order.add_product_row'] = new \PrestaShopBundle\Form\Admin\Sell\Order\AddProductRowType(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getLanguages(), ${($_ = isset($this->services['prestashop.adapter.form.choice_provider.order_invoice_by_id']) ? $this->services['prestashop.adapter.form.choice_provider.order_invoice_by_id'] : $this->load('getPrestashop_Adapter_Form_ChoiceProvider_OrderInvoiceByIdService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->language->id);
