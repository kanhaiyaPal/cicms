$(document).ready(function() {
	var upld = $('#admin_file_upload_url').val();
	$("#input-id").fileinput({	minFileCount: 1,
								maxFileCount: 5,
								showUpload:false,
								allowedFileExtensions: ["jpg", "JPG", "jpeg", "JPEG","png","PNG","gif","GIF"],
								initialPreviewAsData: true, // identify if you are sending preview data only and not the markup
								overwriteInitial:false
							});
	/*$('#input-id').on('filebatchuploadsuccess', function(event, data, previewId, index) {
		var form = data.form, files = data.files, extra = data.extra,
		response = data.response, reader = data.reader;
		console.log(response.initialPreview);
		var i;
		for (i = 0; i < response.initialPreview.length; ++i) {
			creat_hidden_fields(response.initialPreview[i]);
		}
 
	});*/
	
} );

/*function creat_hidden_fields(key){
	var $ip = $('<input>').attr({
		type: 'hidden',
		name: 'page_u_img[]',
		value: key 
	})
	var $form = $( "body" ).find( "form" );
	$($ip).appendTo($form);
	
}*/