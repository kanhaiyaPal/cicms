$(document).ready(function(){
	$("div.dync_div_cont").hide();
	$('select#seo_page_selector').on('change', function (e) {
		if(this.value != '0'){
			$.ajax({
				type: "POST",
				data:  { title:this.value },
				success: function(data) {
					var res = JSON.parse(data);
					console.log(res);
					$('textarea[name="page_meta_title"]').val(res['meta_title']);
					$('textarea[name="page_meta_description"]').val(res['meta_description']);
					$('textarea[name="page_meta_keywords"]').val(res['meta_keywords']);
					$("div.dync_div_cont").show();
				}
			});
		}else{
			$("div.dync_div_cont").hide();
		}
	});
});