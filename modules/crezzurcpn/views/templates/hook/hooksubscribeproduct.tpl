{*
*  LICENSE
*  You are not allowed to share this code and or files. All rights reserved  - Crezzur
*
*  DISCLAIMER
*
*  Do not edit or add to this file if you wish to upgrade our products to newer
*  versions in the future. If you wish to customize our products for your
*  needs please contact us for more information.
*
*  @author    Crezzur <info@crezzur.com>
*  @copyright 2014-2021 Jaimy Aerts
*  @license   All rights reserved
*  International Registered Trademark & Property of Crezzur
*}

<div class="tabs">
    <form>
        <div class="crezzur-cpn" style="text-align:center;" data-url="{url entity='module' name='crezzurcpn' controller='actions' params=['process' => 'add']}">
            {if isset($email) AND $email}
                <input class="form-control" type="email" placeholder="{l s='your@email.com' d='Modules.Crezzurcpn.Hooksubscribeproduct'}"/><br />
            {/if}
            <input type="hidden" value="{$id_product}"/>
            <input type="hidden" value="{$id_product_attribute}"/>
            <button class="btn btn-primary crezzur_subscribe" type="submit" rel="nofollow">{l s='Email me when available for order' d='Modules.Crezzurcpn.Hooksubscribeproduct'}</button>
            <span style="display:none;padding:5px"></span>
        </div>
    </form>
</div>