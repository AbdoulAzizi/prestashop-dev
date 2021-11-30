CREATE TABLE `PREFIXcrezzurcpn` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` int(10) NOT NULL,
  `customer_email` varchar(128) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_product_attribute` int(10) NOT NULL,
  `id_shop` int(10) NOT NULL,
  `id_lang` int(10) NOT NULL,
  `created` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
