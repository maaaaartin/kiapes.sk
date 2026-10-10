function makeList() {
	"use strict"
	var list_item_html='';
	for (var i=0; i<markers.length; i++) {
		if (markers[i].getVisible()) {
			list_item_html+='<li class="state_'+markers[i].mystate_val+'" id="'+markers[i].mylinkid+'" title="'+markers[i].myname+'"><a href="javascript:myClick('+i+')"><div class="map_item_img"></div><div class="map_list_data"><div class="map_list_data1"><p class="map_list_name">'+markers[i].myname+'</p><span class="map_list_info">'+markers[i].mytext+'</span></div><div class="map_list_data2"><span class="map_list_date">'+markers[i].mydate_last+'</span><span class="map_list_state">'+markers[i].mystate_name+'</span></div></div><div class="clear"></div></a></li>';
		};
	}
	
	jQuery('#map_list_items').html(list_item_html);
	jQuery('.map_list_name').trunk8({
		lines: 1
	});
	jQuery('.map_list_info').trunk8({
		lines: 2
	});

	var map_list_state_num=jQuery('#map_list_items > li').length;
	var map_list_state_A=jQuery('#map_list_items > li.state_A').length;
	var map_list_state_B=jQuery('#map_list_items > li.state_B').length;
	var map_list_state_C=jQuery('#map_list_items > li.state_C').length;
	var map_list_state_D=jQuery('#map_list_items > li.state_D').length;
	var map_list_state_E=jQuery('#map_list_items > li.state_E').length;
	var map_list_state_F=jQuery('#map_list_items > li.state_F').length;
	if (map_list_state_A) {
		var map_filter_state_A='Zámery&nbsp;'+map_list_state_A;
	} else {
		var map_filter_state_A='';
	};
	if (map_list_state_B) {
		var map_filter_state_B='V&nbsp;príprave&nbsp;'+map_list_state_B;
	} else {
		var map_filter_state_B='';
	};
	if (map_list_state_C) {
		var map_filter_state_C='Vo&nbsp;výstavbe&nbsp;'+map_list_state_C;
	} else {
		var map_filter_state_C='';
	};
	if (map_list_state_D) {
		var map_filter_state_D='Zrušené&nbsp;'+map_list_state_D;
	} else {
		var map_filter_state_D='';
	};
	if (map_list_state_E) {
		var map_filter_state_E='Pozastavené&nbsp;'+map_list_state_E;
	} else {
		var map_filter_state_E='';
	};
	if (map_list_state_F) {
		var map_filter_state_F='Realizované&nbsp;'+map_list_state_F;
	} else {
		var map_filter_state_F='';
	};
	var map_filter_state_num='<span>Zobrazených&nbsp;je&nbsp;'+map_list_state_num+'&nbsp;stavieb</span>';
	//var map_filter_state_num='<span>Je zobrazených&nbsp;'+map_list_state_num+'&nbsp;stavieb&nbsp;'+map_filter_state_A+'&nbsp;'+map_filter_state_B+'&nbsp;'+map_filter_state_C+'&nbsp;'+map_filter_state_D+'&nbsp;'+map_filter_state_E+'&nbsp;'+map_filter_state_F+'</span>';
	//var map_filter_count_stat=map_filter_state_num;
	//var map_filter_count_menu=map_filter_state_A+map_filter_state_B+map_filter_state_C+map_filter_state_D+map_filter_state_E+map_filter_state_F;
	jQuery('#map_filter_state a').html(map_filter_state_num);
}
