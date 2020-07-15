$(function(){
	$('.image-thumbnail').fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
	$('.various').fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	true,
		'width'				: '75%',
		'height'			: '75%',
        'autoScale'     	: false,
		'type'				: 'iframe'
	});	
});	