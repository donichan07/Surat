$(document).ready(function() {
    $("#calendar-doctor").simpleCalendar({
        fixedStartDay: 0,
        disableEmptyDetails: true,
        events: [
            {
                startDate: new Date(new Date().setHours(new Date().getHours() + 24)).toISOString(),
                endDate: new Date(new Date().setHours(new Date().getHours() + 25)).toISOString(),
                summary: 'Conference with teachers'
            },
            {
                startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
                endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).toISOString(),
                summary: 'Old classes'
            },
            {
                startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
                endDate: new Date(new Date().setHours(new Date().getHours() - 24)).toISOString(),
                summary: 'Old Lessons'
            },
            // Tambahkan jadwal baru di sini
            {
                startDate: new Date('2024-06-01T10:00:00').toISOString(),
                endDate: new Date('2024-06-01T11:00:00').toISOString(),
                summary: 'New Event Example'
            }
        ],
    });
});
