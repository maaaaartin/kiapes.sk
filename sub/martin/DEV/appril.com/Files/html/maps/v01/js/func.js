jQuery(function() {
	"use strict"
	jQuery('.filter_input').click(function(){
		 jQuery(this).parent().toggleClass('highlight');
		 jQuery(this).parents().eq(1).toggleClass('highlight');
	});
});
jQuery(function() {
	"use strict"
	jQuery(function(){
		jQuery(".gm-style-sub-item").click(function(){
			jQuery(".checkbox div", this).toggle();
		});
	});
	jQuery(function(){
		jQuery(".gm-style-item.item-drop").click(function(){
			jQuery(".gm-style-item-drop").toggle();
			/*jQuery(".gm-style-item-drop").mouseout(function() {
				jQuery(".gm-style-item-drop").delay(500).toggle();
			});*/
		});
	});
	function runEffect_1() {
		"use strict"
		var selectedEffect = 'slide';
		var options = { direction: 'left' };
		jQuery( '#map_list_overflow' ).toggle( selectedEffect, options, 250 );
		jQuery( '#map_area' ).toggleClass('closed');
		jQuery( '#map_list_toggle' ).toggleClass('closed');
		jQuery( '#map_filter_count' ).toggleClass('closed');
		jQuery( '#map_filter_count_menu' ).toggleClass('closed');
		jQuery( '#map_list_toggle' ).attr('title','Zobraziť zoznam stavieb');
	}
	function runEffect_2() {
		"use strict"
		var selectedEffect = 'slide';
		var options = { direction: 'up' };
		jQuery( '#map_filter_count_menu' ).toggle( selectedEffect, options, 0 );
	}
	jQuery( '#map_list_toggle' ).click(function() {
		runEffect_1();
		google.maps.event.trigger(map, 'resize');
		return false;
	});
	jQuery( '#map_filter_count_stat' ).click(function() {
		runEffect_2();
		return false;
	});
		
});
