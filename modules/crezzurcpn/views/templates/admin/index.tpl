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

<div id="responsemsg"></div>
{if isset($message)}
<div class="alert alert-{$status} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{$message}</strong> </div>
{/if} 

<!-- NAVIGATION TABS -->
<ul class="nav nav-tabs">
    <li class="active"> <a data-toggle="tab" href="#maina"> {l s='Customers not notified' d='Modules.Crezzurcpn.Index'}</a> </li>
    <li id="loadb" class=""> <a data-toggle="tab" href="#mainb"> {l s='Notified customers' d='Modules.Crezzurcpn.Index'}</a> </li>
    <li class=""> <a data-toggle="tab" href="#mainc"> {l s='Information' d='Modules.Crezzurcpn.Index'}</a> </li>
</ul>

<div class="tab-content">
    <div id="maina" class="tab-pane active">
        <div class="panel col-md-12">
            <h2>{l s='Customers not notified' d='Modules.Crezzurcpn.Index'}</h2>
            <div style="margin-bottom: 15px; font-size: 12px">
                {l s='In the table below you can see an overview of all customers who are subscribed for a product' d='Modules.Crezzurcpn.Index'}.<br>
                {l s='You can notify your customers manually or automatically when a product is back available for order' d='Modules.Crezzurcpn.Index'}.
            </div>
                <div id="loaderproducts0" style="padding: 20px 0px 20px 0px" class="text-center"><div class="loader" style="margin: 0 auto; margin-bottom: 15px;"></div><span>{l s='The most recent data is being retrieved' d='Modules.Crezzurcpn.Index'}...</span></div>
                <table id="productlijst0" class="display" style="width:100%; display: none">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{l s='ID' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Subscribers' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Image' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Product name' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Attribute(s)' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Product information' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='View' d='Modules.Crezzurcpn.Index'}</th>
                        </tr>
                    </thead>
                </table>
            </div>
    </div>

    <div id="mainb" class="tab-pane">
        <div class="panel">
                <h2>{l s='Notified customers' d='Modules.Crezzurcpn.Index'}</h2>
                <div style="margin-bottom: 15px; font-size: 12px">
                {l s='In the table below you can see an overview of all customers who are subscribed for a product' d='Modules.Crezzurcpn.Index'}.<br>
                {l s='These customers have already received a message that the product is back in stock' d='Modules.Crezzurcpn.Index'}.
                </div>
                <div id="loaderproducts1" style="padding: 20px 0px 20px 0px" class="text-center"><div class="loader" style="margin: 0 auto; margin-bottom: 15px;"></div><span>{l s='The most recent data is being retrieved' d='Modules.Crezzurcpn.Index'}...</span></div>
                <table id="productlijst1" class="display" style="width:100%; display: none">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{l s='ID' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Subscribers' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Image' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Product name' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Attribute(s)' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='Product information' d='Modules.Crezzurcpn.Index'}</th>
                            <th>{l s='View' d='Modules.Crezzurcpn.Index'}</th>
                        </tr>
                    </thead>
                </table>
        </div>
    </div>

    <div id="mainc" class="tab-pane">
        <div class="panel">
            <div>
            <h2>{l s='Settings' d='Modules.Crezzurcpn.Index'}</h2>
            <b>{l s='Your' d='Modules.Crezzurcpn.Index'} cronjob url:</b><br>{$cronlink}<br>
            {if $import == 0}
                <br>
                <div id="autoimport">
                <b>Import data:</b><br>
                <p>By default, the module <b>ps_emailalerts</b> has an option to let your customers register when a product is not in stock.
                    These customers are stored in mysql table <b>ps_mailalert_customer_oos</b>. <br>
                    Our module gives you the option to import these customers once so that you do not lose them. Click on the <b>import</b> button below if you want to import this table. 
                </p>
                <a class="btn btn-primary pointer">Import  <b>{$totimport}</b>  subscriber(s)</a>
                </div>
            {/if}
            <hr>
            </div>
            <div class="accordion-container">
            <h2>Information</h2>
                <div class="ac">
                    <h2 class="ac-q" tabindex="0">1. {l s='Why and how to use a cron job' d='Modules.Crezzurcpn.Index'}?</h2>
                    <div class="ac-a">
            <p>By using a Cron task, you can fire specific scripts scheduled. None of the hosting companys allows you to send 100+ emails at once.<br>
            The reason for this is that emails will almost immediately be tagged as spam by companies such as GMAIL, Hotmail, ...<br>
            Thanks to the use of a cron job it is possible to send e-mails in a distributed way. We will briefly explain below how to set up a cron job.<br>
            </p>
            <p>A cron job can be set up on your own server or by using a third party software. If you wish to use the cronjob service of your own server, we recommend that you consult the user manual of your hosting company.<br>
            We recommend <a href="https://cron-job.org/" target="_blank">Cron-job.org</a> which is easy to use and completely free. You can use this to follow up your cronjobs, and you will receive an email when there are problems with your settings.<br>
            After creating an account, click on the "cronjobs" tab. After this you can click on create a cron job. Enter a title of your choice and copy the cron-job URL which you will find at the <b>configuration</b> tab of our module.<br>
            The login or password is not required to use our cron-job URL. We use a secure key in our URL that prevents unauthorized access. You can then set a time for how much time the cron job should be performed.<br>
            </p>

            <p>On the <a href="https://cron-job.org/" target="_blank">Cron-job.org</a> page, select how you want to be kept informed and click on create cronjob. You are now ready to send e-mails via cron job. keep in mind that only emails with the send status will be sent.</p>
                    </div>
                </div>
                <div class="ac">
                    <h2 class="ac-q" tabindex="0">2. {l s='Additional module information' d='Modules.Crezzurcpn.Index'}</h2>
                    <div class="ac-a">
                        <p><b>Question: Why does the Product availability from the module Mail alerts needs to be turned off?</b><br>
                        <b>Answer</b>: This option need to be turned off to prevent your customers to be able to subcribe to two different lists. If you do not turn of this option your customers will see two options on the product page to subscribe to.</p>

                        <p><b>Question: Why does my customers not receive automatically  an email when the product is back available?</b><br>
                        <b>Answer</b>: This option is only available for the paid version of our module. You are able to send each customer an email to inform them manually.<br>
                        You can buy a pro-version on our website by <a href="https://crezzur.com/en/modules/15-customer-product-notifications-out-of-stock" target="_blank">clicking here</a></p>

                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input id="modurl" type="hidden" value="{$modurl}">
<div class="modal fade" id="showpopup"><div class="modal-dialog modal-sm" style="margin-top: 35vh; min-width: 420px;" role="document">
<div class="modal-content"><div class="modal-body" id="message"></div><div class="modal-footer" id="buttons"></div></div></div></div>

<script type="text/javascript">
var accordion = new Accordion('.accordion-container');
var acc = document.getElementsByClassName("nbs-accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("nbs-active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>