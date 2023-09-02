<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js" defer></script>
<script src="https://static.cloudflareinsights.com/beacon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.8/index.global.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		var calendarEl = document.getElementById('calendar');

		var calendar = new FullCalendar.Calendar(calendarEl, {
			timeZone: 'GMT+6',
			themeSystem: 'bootstrap5',
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
			},
			weekNumbers: true,
			dayMaxEvents: true, // allow "more" link when too many events
			events: '/api/demo-feeds/events.json'
		});

		calendar.render();
	});
</script>
