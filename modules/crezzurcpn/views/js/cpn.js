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

$(document).on('click', '#loadb', function() {
    loadProductlist(1);
});
loadProductlist(0);

function loadProductlist(i) {
    $('#productlijst'+i).hide();
    $('#productlijst'+i).DataTable().destroy();
    $('#loaderproducts'+i).show();
    $.ajax({
        //type: 'GET',
        cache: false,
        dataType : 'JSON',
        url: cpn_formurl,
        data: { action: 'getsubscribers', list:i},
        success: function(data) {
            console.log(data);
            var table = $('#productlijst'+i).DataTable({
                "data": data,
                "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "id": 1,
                    "defaultContent": ''
                },
                { "className": "text-center", "data": "product_id" },
                {
                    "className": "text-center",
                    "data": 'total',
                    "render": function (data) {
                        return '<span class="badge">'+ data +'</span>';
                    }
                },
                {
                    "className": "text-center",
                    "data": 'product_img',
                    "orderable": false,
                    "render": function (data) {
                        return '<img style="height:75px;" class="imgm img-thumbnail" src="'+ data +'">';
                    }
                },
                { "data": "product_name" },
                {  data: "pattributes" },
                {
                    "orderable": false,
                    "data": null,
                    "render": function (data) {
                        return '<b>Product EAN13:</b> ' + data.product_ean +'<br>\
                        <b>Product reference:</b> ' + data.product_reference +'<br>\
                        <b>Available stock:</b> ' + data.quantity +'<br>\
                        <b>Available date:</b> '+ data.available_date;
                    }
                },
                {
                    "className": "text-center",
                    "data": 'product_href',
                    "orderable": false,
                    "render": function (data) {
                        return '<a href="' + data +'" target="_blank" class="cpn_viewcust_btn"><i class="fas fa-eye"></i> View product</a>';
                    }
                },
                ],
                "order": [[1, 'asc']],
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id', aData['product_id']).attr('data-attr', aData['attribute_id']);
                }
            });
            $('#productlijst'+i).show();
            $('#loaderproducts'+i).hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error: ' + textStatus + ' ' + errorThrown);
        }
    });
}


  $(document).on('click', 'td.details-control',function() {
      var list = $(this).closest('table').attr('id').replace(/[^0-9]/g,''); 
      var table = $('#productlijst' + list).DataTable();
      var tr = $(this).closest('tr');
      var req_p = $(this).closest('tr').attr('id');
      var req_p_attr = $(this).closest('tr').data('attr');
      var row = table.row(tr);

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
        $.ajax({
            //type: 'GET',
            dataType : 'JSON',
            url: cpn_formurl,
            data: { action:'loadcustomers', list:list, req_p:req_p, req_p_attr:req_p_attr },
            success: function(data) {
                    var childtable = '<table class="detail" style="padding-left:50px; border: 1px solid #ddd;">';
                    childtable += '<thead><tr><th style="text-align:center;">ID</th><th>Email</th><th style="text-align:center;">registration date</th><th style="text-align:center;">Notified</th><th style="text-align:center;">Options</th></tr></thead>';
                    var i;
                    var cust = data.cust;
                    for (i = 0; i < cust.length; i++) {
                        childtable +=
                            '<tr id="cust-'+cust[i].id +'">\
                            <td style="text-align:center;">'+ cust[i].id +'</td>\
                            <td>'+ cust[i].customer_email+'</td>\
                            <td style="text-align:center;">'+ (new Date(cust[i].created*1000)).toLocaleString() +'</td>';
                        if (cust[i].status == 0) {
                            childtable += '<td style="text-align:center;"><i id="status-'+cust[i].id +'" class="fas fa-times" style="font-size:25px; color:#e08f95;"></i></td>';
                        } else {
                            childtable += '<td style="text-align:center;"><i class="fas fa-check" style="font-size:25px; color:#74c37b;"></i></td>';
                        }
                        childtable += '<td style="text-align:center;">';
                            if (cust[i].id_customer > 0) {
                                childtable += '<a href="'+ data.href + cust[i].id_customer +'" target="_blank" data-toggle="tooltip" data-placement="top" title="View customer" style="margin-right:2px" class="cpn_viewcust_btn"><i class="fas fa-eye"></i></a>';
                            }
                        childtable += '<button type="button" data-toggle="tooltip" data-placement="top" title="Send available email" class="cust_mail cpn_viewcust_btn" id="'+ cust[i].id +'"><i class="fas fa-envelope-open"></i></button>\
                            <button type="button" data-toggle="tooltip" data-placement="top" title="Remove customer" class="cust_delete cpn_viewcust_btn" id="'+ cust[i].id +'"><i class="fas fa-trash"></i></button>\
                            </td>\
                            </tr>';
                    } 
                    childtable += '</table>';
                    row.child(childtable).show();
                    tr.addClass('shown');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' ' + errorThrown);
            }
        });
      }
  });

$(document).on('mouseenter', '.cpn_viewcust_btn', function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).on('click', '.cust_delete', function() {
    var buttonno = "Cancel";
    var buttonyes = "Delete";
    var text1 = "Are you sure you want to delete subscription ID: <b>"+ this.id +'</b>?' ;
    $("#message").html('<div class="form-group" style="text-align:center; font-size: 15px;">'+ text1 +'<input type="hidden" id="custid_del" name="custid_del" value="' + this.id + '"></div></div>');
    $("#buttons").html('<button class="btn btn-warning" data-dismiss="modal" type="button">\ ' + buttonno + ' </button>\
     <button class="btn btn-danger cust_conf_delete" type="submit" name="deletecustomer">\ ' + buttonyes + ' </button>\ ');
    $('#showpopup').modal('show');
});

$(document).on('click', '.cust_mail', function() {
    var buttonno = "Cancel";
    var buttonyes = "Send email";
    var text1 = "Are you sure you want to inform this customer that this product is available again?";
    $("#message").html('<div class="form-group" style="text-align:center; font-size: 15px;">'+ text1 +'<input type="hidden" id="custid_send" name="custid_send" value="' + this.id + '"></div></div>');
    $("#buttons").html('<button class="btn btn-warning" data-dismiss="modal" type="button">\ ' + buttonno + ' </button>\
     <button class="btn btn-success cust_conf_mail" type="submit" name="sendcustomer">\ ' + buttonyes + ' </button>\ ');
    $('#showpopup').modal('show');
});

$(document).on('click', '.cust_conf_delete', function() {
    var custid_del = $('#custid_del').val();
    $.ajax({
        //type: 'GET',
        dataType : 'JSON',
        url: cpn_formurl,
        data: { action: 'deletecust', custid_del: custid_del },
        success: function(data) {
            $('#showpopup').modal('hide');
            $('#responsemsg').html('<div class="alert alert-'+ data.status +' alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'+ data.msg +'</strong></div>');
            $('#cust-'+ custid_del).fadeOut("slow");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error: ' + textStatus + ' ' + errorThrown);
        }
    }); });

$(document).on('click', '.cust_conf_mail', function() {
    var custid_send = $('#custid_send').val();
    $.ajax({
        dataType : 'JSON',
        url: cpn_formurl,
        data: { action: 'sendcust', custid_send: custid_send },
        success: function(data) {
            $('#showpopup').modal('hide');
            $('#responsemsg').html('<div class="alert alert-'+ data.status +' alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'+ data.msg +'</strong></div>');
            $('#status-'+ custid_send).addClass('fa-check').removeClass('fa-times');
            $('#status-'+ custid_send).css("color", "#74c37b");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error: ' + textStatus + ' ' + errorThrown);
        }
    });
});

$(document).on('click', '#autoimport', function(e) {
    e.preventDefault();
    $.ajax({
        dataType : 'JSON',
        url: cpn_formurl,
        data: { action: 'autoimport' },
        success: function(data) {
            $('#autoimport').html('<div class="alert alert-success alert-dismissible">\
            <button type="button" class="close" data-dismiss="alert">×</button>\
            <strong>All customers have been imported successfully!</strong> </div>');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error: ' + textStatus + ' ' + errorThrown);
        }
    })
});