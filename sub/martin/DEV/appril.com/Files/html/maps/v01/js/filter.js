function show(state_val) {
	"use strict"
	for (var i=0; i<gmarkers.length; i++) {
		if (gmarkers[i].mystate === state_val) {
			gmarkers[i].setVisible(true);
		}
	}
	document.getElementById(state_val+'_box').checked = true;
}

function hide(state_val) {
	"use strict"
	for (var i=0; i<gmarkers.length; i++) {
		if (gmarkers[i].mystate === state_val) {
			gmarkers[i].setVisible(false);
		}
	}
	document.getElementById(state_val+'_box').checked = false;
	infowindow.close();
}

function boxclick(box,state_val) {
	"use strict"
	if (box.checked) {
		show(state_val);
	} else {
		hide(state_val);
	}
	makeList();
}
