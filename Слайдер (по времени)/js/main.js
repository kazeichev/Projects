timerSlide();
var left = 0;
var time;

function timerSlide() {
	time = setTimeout(function() {
		var line = document.getElementById('line');
		left = left - 128;
		if (left < -512) {
			left = 0;
			clearTimeout(time);
		}
		line.style.left = left +'px';
		timerSlide();
	}, 1500);
}
