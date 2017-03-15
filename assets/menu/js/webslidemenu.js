$(function() {
	var items = $('.overlapblackbg, .slideLeft');
	var wsmenucontent = $('.wsmenucontent');
	
	var menuopen = function() {
	$(items).removeClass('menuclose').addClass('menuopen');
						}
	var menuclose = function() { 
	$(items).removeClass('menuopen').addClass('menuclose');
	}

	$('#navToggle').click(function(){
		if (wsmenucontent.hasClass('menuopen')) {			
			$(menuclose)
//$(items).removeClass('wsmenu-list');			
			}
		else {$(menuopen)}
	});
	wsmenucontent.click(function(){
		if (wsmenucontent.hasClass('menuopen')) {$(menuclose)}
	});
	
	$('#navToggle,.overlapblackbg').on('click', function(){
	$('.wsmenucontainer').addClass( "wsmenu-list-o" );	
	$('.wsmenucontainer').toggleClass( "mrginleft" );
	});

	$('.wsmenu-list li').has('.wsmenu-submenu, .wsmenu-submenu-sub, .wsmenu-submenu-sub-sub').prepend('<span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');
	
	//$('.wsmenu-list li').has('.halfdiv').prepend('<span class="wsmenu-click"><i class="wsmenu-arrow"></i></span>');
	
	$('.wsmenu-list li').has('.megamenu').prepend('<span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');
		
	$('.wsmenu-mobile').click(function(){
		$('.wsmenu-list').slideToggle('slow');
	});
	$('.wsmenu-click').click(function(){
	//$('.wsmenucontainer').addClass('wsmenu-list');
	//$('.wsmenucontainer').addClass('wsmenu-list-o');	
	$(this).siblings('.wsmenu-submenu').slideToggle('slow');
	$(this).children('.wsmenu-arrow').toggleClass('wsmenu-rotate');
	$(this).siblings('.wsmenu-submenu-sub').slideToggle('slow');
	$(this).siblings('.wsmenu-submenu-sub-sub').slideToggle('slow');
	$(this).siblings('.megamenu').slideToggle('slow');
		
	});

});