const x = document.getElementById('x');
const stickyNotification = document.getElementById('stickyNotification');

x.addEventListener('click', fadeAway);

function fadeAway() {
	stickyNotification.classList.add('fade-away');
	setTimeout(function(){
		stickyNotification.setAttribute('style', 'display: none');
	}, 1000);
}