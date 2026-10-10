function makeList() {
	"use strict"
	var html = '';
	for (var i=0; i<gmarkers.length; i++) {
		if (gmarkers[i].getVisible()) {
			html += '<li class="map_list_cat_' + gmarkers[i].mycategory + '" id="'+gmarkers[i].mylinkid+'"><a href="javascript:myclick(' + i + ')"><p class="map_list_name">' + gmarkers[i].myname + '</p><p class="map_list_date"><span class="map_list_info">('+gmarkers[i].mytype+', '+gmarkers[i].mycity+')</span></br>Aktualizácia: '+gmarkers[i].mydate_last+'</p><\/a></li>';
		};
	}
	
	document.getElementById('map_list_in').innerHTML = html;
	/* Trunk8 */
	jQuery('.map_list_name').trunk8({
		lines: 1
	});
	
	var map_list_num = jQuery('#map_list_in > li').length;
	var map_list_cat1 = jQuery('#map_list_in > li.map_list_cat_A').length;
	var map_list_cat2 = jQuery('#map_list_in > li.map_list_cat_B').length;
	var map_list_cat3 = jQuery('#map_list_in > li.map_list_cat_C').length;
	var map_list_cat4 = jQuery('#map_list_in > li.map_list_cat_D').length;
	var map_list_cat5 = jQuery('#map_list_in > li.map_list_cat_E').length;
	var map_list_cat6 = jQuery('#map_list_in > li.map_list_cat_F').length;
	var map_filter_num = '<span>Zobrazených je&nbsp;'+map_list_num+'&nbsp;stavieb</span>';
	var map_filter_cat1 = '<span class="map_filter_cat_A">Pripravované zámery:&nbsp;<span>'+map_list_cat1+'</span></span>';
	var map_filter_cat2 = '<span class="map_filter_cat_B">Prebiehajúce stavby:&nbsp;<span>'+map_list_cat2+'</span></span>';
	var map_filter_cat3 = '<span class="map_filter_cat_C">Realizované stavby:&nbsp;<span>'+map_list_cat3+'</span></span>';
	var map_filter_cat4 = '<span class="map_filter_cat_D">Realizované stavby:&nbsp;<span>'+map_list_cat4+'</span></span>';
	var map_filter_cat5 = '<span class="map_filter_cat_E">Realizované stavby:&nbsp;<span>'+map_list_cat5+'</span></span>';
	var map_filter_cat6 = '<span class="map_filter_cat_F">Realizované stavby:&nbsp;<span>'+map_list_cat6+'</span></span>';
	var map_filter_count_stat = map_filter_num;
	var map_filter_count_menu = map_filter_cat1+map_filter_cat2+map_filter_cat3+map_filter_cat4+map_filter_cat5+map_filter_cat6;
	jQuery('#map_filter_count_stat').html(map_filter_count_stat);
	jQuery('#map_filter_count_menu').html(map_filter_count_menu);
}
