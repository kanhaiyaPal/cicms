$(function() {
    // Ckeditor standard
    $( 'textarea#ckeditor_standard' ).ckeditor({width:'100%', height: '150px', toolbar: [
		{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]});
    $( 'textarea#ckeditor_full' ).ckeditor({width:'100%', height: '150px'});
	$( 'textarea#ckeditor_full_twice' ).ckeditor({width:'100%', height: '150px'});
	if($('#pageset_editor1').length){ CKEDITOR.replace('pageset_editor1'); }
	if($('#pageset_editor2').length){ CKEDITOR.replace('pageset_editor2'); }
	if($('#pageset_editor3').length){ CKEDITOR.replace('pageset_editor3'); }

});
