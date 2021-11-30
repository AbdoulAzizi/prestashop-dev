{*
* LICENSE
* You are not allowed to share this code and or files. All rights reserved Crezzur
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade our products to newer
* versions in the future. If you wish to customize our products for your
* needs please contact us for more information.
*
*  @author    Crezzur <info@crezzur.com>
*  @copyright 2014-2021 Jaimy Aerts
*  @license   All rights reserved
*  International Registered Trademark & Property of Crezzur
*}

{extends file='customer/page.tpl'}

{block name='page_content'}
<div style="background-color: #FFF; padding: 20px 20px 20px 20px; box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);">
    <h1>{l s='My out of stock subscriptions' d='Modules.Crezzurcpn.Productnotifications-account'}</h1>
    <span class="form-control-comment">{l s='You will receive an email, for each product you subscribed to, when this specific product is available for order again' d='Modules.Crezzurcpn.Productnotifications-account'}.</span>

    {if $subscribeAlert}
    <ul style="margin-top: 15px;">
        {foreach from=$subscribeAlert item=row}
        <li>
            <a href="{$row.link}">
                <img src="{$row.cover_url}" alt=""/>
                {$row.name}
                <span>{$row.attributes_small}</span>
                <a href="#" title="{l s='Remove mail alert' d='Modules.Crezzurcpn.Productnotifications-account'}" class="crez-remove-alert btn btn-link" rel="js-id-emailalerts-{$row.id_product|intval}-{$row.id_product_attribute|intval}" data-url="{url entity='module' name='crezzurcpn' controller='actions' params=['process' => 'remove']}">
                    <i class="material-icons">delete</i>
                </a>
            </a></li>
        {/foreach}
    </ul>
    {else}
    <p class="alert alert-warning" style="margin-top: 15px;">{l s='You are not subscribed to any products which are currently out of stock' d='Modules.Crezzurcpn.Productnotifications-account'}.</p>
    {/if}
</div>

{/block}
    


