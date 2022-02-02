$(document).ready(function(){
	$('#folderlist').jstree({'core': {
        'check_callback': true,
        
    }});
	$('#folderlist-global').append($('#jstree_page_toolbar_div'));
	$('#folderlist-global').addClass('has-toolbar');
	$('#folderlist').on('select_node.jstree',function(event,node){
		docManager.listFolder(node.node.id);
	});
	
	$('form.megaupload input[type="file"]').each(function(){
		 var container=$('<div class="mega-file"><img src=\"\" class=\"actual-picture\" /><input type="hidden" class="invisible-file-input" /></div>');
		 
		 $(this).replaceWith(container);
		 container.append("<div class='progress-wrp'><div class=\"progress-bar\"></div><div class=\"status\">0%</div></div>");
		 container.prepend($(this));
		 container.find(".invisible-file-input").prop('name',$(this).prop('id'));
		 $(this).on("change", function (e) {
				var file = $(this)[0].files[0];
				var upload = new Upload(file,this);
				
				// maby check size or type here with upload.getSize() and upload.getType()

				// execute upload
				upload.doUpload();
			});
		});
});


var docManager={
	isAdding: false,
	actualFolder: false,
	idFile: false,
	addFile: function(){
		$('#modalUploadFile input[type="file"]').val('');
		$('#modalUploadFile input[type="file"]').val(null);
		$('#modalUploadFile').modal();
	},
	deleteFile: function(url){
		if(confirm('Voulez-vous vraiment supprimer ce fichier ?')){
			var data={};
			
			data['file-id']=url;
			
			$.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: psr_controller_cfg_url,
                data: {
                    ajax: true,
                    action: 'deleteFile',
					datas: data
                },
                success: function (res,data) {
					if(res.err==0){
						docManager.refresh();
					}else{
						alert(res.lib);
					}
                }
            });
		}
		return false;
	},
	refresh:function(){
		this.listFolder(docManager.actualFolder);
	},
	listFolder:function(id){
		$('#btn-add-document').hide();
		var data={};
		var ids=[];
		docManager.actualFolder=id;
		data['folder-id']=$('#folderlist').jstree(true).get_node(id).data.id;;
		$.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: psr_controller_cfg_url,
                data: {
                    ajax: true,
                    action: 'ListFolder',
					datas: data
                },
                success: function (res,data) {
					
					if(res.length==0){
						$('.content-folder').html('<p>Ce répertoire est vide</p>');
					}else{
						//$('.content-folder').html('');
						html='';
						for(i in res){
							html=html+'<div class="content-file">';
							html=html+'<p class="file-title">';
							html=html+'<a href="#" onclick="docManager.renameFile(this,\''+res[i]['url']+'\');return false;" class="file-button" title="renommer" style="background-image: url(\'/modules/codidocs/picto/file-edit.png\');"></a>';
							html=html+'<a href="javascript:docManager.deleteFile(\''+res[i]['url']+'\')" class="file-button" title="supprimer le fichier" style="background-image: url(\'/modules/codidocs/picto/file-delete.png\');"></a>&nbsp; ';
							html=html+'<span>'+res[i]['name']+'</span>';
							html=html+'</p>';
							html=html+'</div>';
						}
						$('.content-folder').html(html);
					}
					$('#btn-add-document').show();
                }
            });
	},
	addFolder: function(){
		$('#modalNameFolder input[name="name"]').val("");
		docManager.isAdding=true;
		$('#modalNameFolder').modal();
	},
	
	renameFolder:function(){
		var idsf=$('#folderlist').jstree(true).get_selected();
		if(idsf.length!=1){
			if(idsf.length==0) alert('Vous devez sélectionner un répertoire')
			if(idsf.length>1) alert('Vous devez sélectionner un seul répertoire')
		}else{
			$('#modalNameFolder input[name="name"]').val($('#folderlist').jstree(true).get_node(idsf[0]).text);
			docManager.isAdding=false;
			$('#modalNameFolder').modal();
		}
	},
	renameFile:function(elem,id){
		docManager.isAdding=false;
		docManager.idFile=id;
		$('#modalNameFile input[name="name"]').val($(elem).closest('p').find('span').eq(0).text());
		$('#modalNameFile').modal();
	},
	submitRenameFile:function(){
		$('.modal').modal('hide');

		var val=$('#modalNameFile input[name="name"]').val();
		if(val=='') return false;
		var data={};
		
		data['file-id']=docManager.idFile;	
		data['file-name']=val;	
		$.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: psr_controller_cfg_url,
                data: {
                    ajax: true,
                    action: ((docManager.isAdding) ? 'addFile' : 'renameFile'),
					datas: data
                },
                success: function (res,data) {
					
					docManager.refresh();
                }
            });
		return false;
	},
	submitRenameFolder:function(){
		$('.modal').modal('hide');
		var val=$('#modalNameFolder input[name="name"]').val();
		if(val=='') return false;
		var data={};
		var ids=[];
		var idsf=$('#folderlist').jstree(true).get_selected();
		for(i in idsf){
			ids[i]=$('#folderlist').jstree(true).get_node(idsf[i]).data.id;
		}
		data['folder-id']=ids;	
		data['folder-name']=val;	
		$.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: psr_controller_cfg_url,
                data: {
                    ajax: true,
                    action: ((docManager.isAdding) ? 'addFolder' : 'renameFolder'),
					datas: data
                },
                success: function (res,data) {
					
					if(docManager.isAdding){
						console.log(val);
						$('#folderlist').jstree(true).create_node('#' ,  { "text" : val });
					}else{
						for(i in idsf){
							$('#folderlist').jstree('rename_node', $('#folderlist').jstree(true).get_node(idsf[i]),val );
							
						}
					}
                }
            });
		return false;
	},
	deleteFolder:function(){
		if(confirm('Voulez-vous vraiment supprimer ce répertoire ?')){
			var data={};
			var ids=[];
			var idsf=$('#folderlist').jstree(true).get_selected();
			for(i in idsf){
				ids[i]=$('#folderlist').jstree(true).get_node(idsf[i]).data.id;
			}
			data['folder-id']=ids;
			
			$.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: psr_controller_cfg_url,
                data: {
                    ajax: true,
                    action: 'deleteFolder',
					datas: data
                },
                success: function (res,data) {
					//var ids=$('#folderlist').jstree(true).get_selected();
					for(i in idsf){
						
						$('#'+idsf[i]).remove()
					}
                }
            });
		}
	}
}





var Upload = function (file,elem) {
    this.file = file;
    this.elem = elem;
};

Upload.prototype.getElem = function() {
    return this.elem;
};
Upload.prototype.getType = function() {
    return this.file.type;
};
Upload.prototype.getSize = function() {
    return this.file.size;
};
Upload.prototype.getName = function() {
    return this.file.name;
};
Upload.prototype.doUpload = function () {
    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("file", this.file, this.getName());
    formData.append("upload_file", true);
    formData.append("action", 'saveFile');
    formData.append("folder", $('#folderlist').jstree(true).get_node(docManager.actualFolder).data.id);
    formData.append("ajax", true);

    $.ajax({
        type: "POST",
        url: psr_controller_cfg_url,

        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.myXhr=that;
                myXhr.upload.addEventListener('progress', that.progressHandling, false);
            }
            return myXhr;
        },
        success: function (data) {
            // your callback here
			$(that.elem).closest('.mega-file').find('.progress-wrp').hide();
			$('.modal').modal('hide');
			docManager.refresh();
			
        },
        error: function (error) {
            // handle error
			console.log('error');
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
    });
};

Upload.prototype.progressHandling = function (event) {
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }

	$progressbar=$(this.myXhr.elem).closest('.mega-file').find('.progress-wrp');
	$progressbar.show();
	$(this.myXhr.elem).closest('.mega-file').find('.actual-picture').hide();
    // update progressbars classes so it fits your code
    $progressbar.find(".progress-bar").css("width", +percent + "%");
	$progressbar.find(".status").text(percent + "%");
};