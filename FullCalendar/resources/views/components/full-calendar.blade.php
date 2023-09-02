<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		var calendarEl = document.getElementById('calendar');

		var calendar = new FullCalendar.Calendar(calendarEl, {
			timeZone: 'Asia/Dhaka',
			themeSystem: 'bootstrap5',
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'multiMonthYear,dayGridMonth,timeGridWeek,timeGridDay,listMonth'
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
			$(function() {
				$.get(`/api/master-schedules/${info.event.id}`, {}, function(data) {
					let eventDetailsHtml = [];
					const excludedFields = ['id', 'created_at', 'updated_at', 'home_team_id', 'away_team_id'];
					for (let key in data) {
							if (data.hasOwnProperty(key) && !excludedFields.includes(key)) {
									if (key === 'home_team' || key === 'away_team') {
											eventDetailsHtml.push(`<li><strong>${key}:</strong> ${data[key].name}</li>`);
									} else {
											eventDetailsHtml.push(`<li><strong>${key}:</strong> ${data[key]}</li>`);
									}
							}
					}
					$({{ $eventDetailsListId }}).html(eventDetailsHtml.join(''));

					$({{ $eventModalId }}).modal('show');
				});
			});
		});

		calendar.on('eventDrop', function(info) {
			if (!confirm("Are you sure about this change?")) {
				info.revert();
				return;
			}
			console.log(info.event);
			$(function() {
				const startDate = new Date(info.event.start);
				startDate.setHours(startDate.getHours() - 6);

				const formattedDate = startDate.toISOString().split('T')[0];
				const formattedTime = `${startDate.getHours().toString().padStart(2, '0')}:${startDate.getMinutes().toString().padStart(2, '0')}:${startDate.getSeconds().toString().padStart(2, '0')}`;

				const requestData = {
						date: formattedDate,
						time: formattedTime,
				};

				console.log(requestData);

				$.ajax({
					url: `/api/master-schedules/${info.event.id}`,
					type: 'PUT',
					dataType: 'json',
					data: requestData,
					success: function(data) {
						console.log(data);
						calendar.refetchEvents();
					},
					error: function(error) {
							console.error(error);
					}
				});
			});
		});

		calendar.render();
	});
</script>
