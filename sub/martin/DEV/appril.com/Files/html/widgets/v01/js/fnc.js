jQuery(function() {
	"use strict"
	jQuery('.filter_input').click(function(){
		jQuery(this).parent().toggleClass('highlight');
		jQuery(this).parents().eq(1).toggleClass('highlight');
	});
	jQuery(function(){
		jQuery(".filter_label").click(function(){
			jQuery(".gm-style-item", this).toggleClass('selected');
		});
	});
	jQuery(function(){
		jQuery(".gm-style-sub-item").click(function(){
			jQuery(".checkbox div", this).toggle();
		});
	});
	jQuery(function(){
		jQuery(".gm-style-item.item-drop").click(function(){
			jQuery(".gm-style-item-drop").toggle();
		});
	});
	/*jQuery('#map_list_items li').click(function () {
		jQuery('#map_list_items li').not(this).removeClass('active');
		jQuery(this).addClass('active');
	});*/
});