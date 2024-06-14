

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Pendidikan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        #calendar {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
<div class="container">
    <h1>Kalender Pendidikan</h1>
    <div id='calendar'></div>
</div>
  
<script type="text/javascript">
  
$(document).ready(function () {
    var SITEURL = "{{ url('/') }}";
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        events: SITEURL + "/fullcalender",
        displayEventTime: false,
        eventRender: function (event, element) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Judul Event:');
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                $.ajax({
                    url: SITEURL + "/fullcalenderAjax",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    type: "POST",
                    success: function (data) {
                        displayMessage("Event berhasil dibuat");
  
                        calendar.fullCalendar('renderEvent',
                            {
                                id: data.id,
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },true);
  
                        calendar.fullCalendar('unselect');
                    },
                    error: function (response) {
                        if (response.status === 403) {
                            displayMessage("Akses ditolak: Anda bukan admin");
                        }
                    }
                });
            }
        },
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
            $.ajax({
                url: SITEURL + '/fullcalenderAjax',
                data: {
                    title: event.title,
                    start: start,
                    end: end,
                    id: event.id,
                    type: 'update'
                },
                type: "POST",
                success: function (response) {
                    displayMessage("Event berhasil diperbarui");
                },
                error: function (response) {
                    if (response.status === 403) {
                        displayMessage("Akses ditolak: Anda bukan admin");
                    }
                }
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Apakah Anda yakin ingin menghapus?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        id: event.id,
                        type: 'delete'
                    },
                    success: function (response) {
                        calendar.fullCalendar('removeEvents', event.id);
                        displayMessage("Event berhasil dihapus");
                    },
                    error: function (response) {
                        if (response.status === 403) {
                            displayMessage("Akses ditolak: Anda bukan admin");
                        }
                    }
                });
            }
        }
    });
 
    function displayMessage(message) {
        toastr.success(message, 'Event');
    } 
});
  
</script>
<br>
<a href="{{ url('/home') }}" class="btn btn-primary">Kembali ke Beranda</a>

  
</body>
</html>
