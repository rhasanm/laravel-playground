<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.8/index.global.min.js"></script>
<script src="https://static.cloudflareinsights.com/beacon.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		var calendarEl = document.getElementById('calendar');

		var calendar = new FullCalendar.Calendar(calendarEl, {
			timeZone: 'Asia/Dhaka',
			themeSystem: 'bootstrap5',
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
			},
			weekNumbers: true,
			dayMaxEvents: true,
			events: '/api/master-schedules',
			editable: true
		});

		calendar.on('dateClick', function(info) {
			// alert('Clicked on: ' + info.dateStr);
			// alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
			// alert('Current view: ' + info.view.type);
			// info.dayEl.style.backgroundColor = 'red';
			calendar.changeView('timeGridDay', info.dateStr);
		});

		calendar.on('eventClick', function(info) {
			// alert('Event: ' + info.event.id);
			// alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
			// alert('View: ' + info.view.type);
			// info.el.style.borderColor = 'red';
		});

		calendar.on('eventDrop', function(info) {
			alert(info.event.title + " was dropped on " + info.event.start.toISOString());

			if (!confirm("Are you sure about this change?")) {
				info.revert();
			}
		});

		calendar.render();
	});
</script>
