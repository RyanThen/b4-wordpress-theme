// Search Form
const clearSearch = document.querySelector('.clear-search');
const theSearch = document.querySelector('.the-search');

clearSearch.addEventListener('click', function(){
	theSearch.value = '';
	theSearch.focus();
});


// Sticky Notification
const x = document.getElementById('x');
const stickyNotification = document.getElementById('stickyNotification');

x.addEventListener('click', fadeAway);

function fadeAway() {
	stickyNotification.classList.add('fade-away');
	setTimeout(function(){
		stickyNotification.setAttribute('style', 'display: none');
	}, 500);
}