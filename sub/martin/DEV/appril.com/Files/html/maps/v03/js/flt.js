function showItem(state_val) {
	"use strict"
	for (var i = 0; i<markers.length; i++) {
		if (markers[i].mystate_val === state_val) {
			markers[i].setVisible(true);
		}
	}
	document.getElementById(state_val+'_box').checked=true;
}
function hideItem(state_val) {
	"use strict"
	for (var i = 0; i<markers.length; i++) {
		if (markers[i].mystate_val === state_val) {
			markers[i].setVisible(false);
		}
	}
	document.getElementById(state_val+'_box').checked=false;
	infowindow.close();
}
function boxClick(box,state_val) {
	"use strict"
	if (box.checked) {
		showItem(state_val);
	} else {
		hideItem(state_val);
	}
	makeList();
}