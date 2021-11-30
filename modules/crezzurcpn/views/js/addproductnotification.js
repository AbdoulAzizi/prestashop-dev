/**
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
*/

$(document).on('click', '.crezzur_subscribe',function() {
    var ids = $('div.crezzur-cpn > input[type=hidden]');
    $.ajax({
        type: 'POST',
        url: $('div.crezzur-cpn').data('url'),
        data: 'id_product='+ids[0].value+'&id_product_attribute='+ids[1].value+'&customer_email='+$('div.crezzur-cpn > input[type=email]').val(),
        success: function (data) {
            data = JSON.parse(data);
            $('div.crezzur-cpn > span').html('<article class="alert alert-info" role="alert" data-alert="success">'+data.message+'</article>').show();
            if (!data.error) {
                $('div.crezzur-cpn > button').hide();
                $('div.crezzur-cpn > input[type=email]').hide();
                $('div.crezzur-cpn > #gdpr_consent').hide();
            }
        }
    });
    return false;
});

$(document).on('click', '.crez-remove-alert',function() {
    var self = $(this);
    var ids = self.attr('rel').replace('js-id-emailalerts-', '');
    ids = ids.split('-');
    var parent = self.closest('li');
    $.ajax({
        url: self.data('url'),
        type: "POST",
        data: { 'id_product': ids[0], 'id_product_attribute': ids[1] },
        success: function(data) {
            if (data == '0') {
                parent.fadeOut("normal", function() {
                    parent.remove();
                });
            }
        }
    });
});
