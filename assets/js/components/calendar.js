import {Calendar} from "https://cdn.skypack.dev/@fullcalendar/core@6.1.10";
import dayGridPlugin from "https://cdn.skypack.dev/@fullcalendar/daygrid@6.1.10";
import timeGridPlugin from "https://cdn.skypack.dev/@fullcalendar/timegrid@6.1.10";
import interactionPlugin from "https://cdn.skypack.dev/@fullcalendar/interaction@6.1.10";
import fullcalendarBootstrap5 from 'https://cdn.skypack.dev/@fullcalendar/bootstrap5';
import {Modal} from "bootstrap";

import {formatDate} from "../utils/formatter.js";


function onDateClickHandler(calendar) {
    const hours = calendar.date.getHours();

    if (calendar.view.type === 'timeGridDay' && hours > 7 && hours < 17) {
        const dateField = document.getElementById('schedule_startFrom');
        const formattedDate = formatDate(calendar.date);
        dateField.setAttribute('value', formattedDate);

        const modalElement = document.getElementById('schedule-form-modal');
        const modal = new Modal(modalElement);
        modal.show();
    }
}
document.addEventListener('DOMContentLoaded', function () {
    console.log(events);
    const options = {
        locale: "bg",
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin, fullcalendarBootstrap5],
        themeSystem: "bootstrap5",
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridDay',
        },
        buttonText: {
            today: "Днес",
            month: "месец",
            day: "ден",
            prev: "назад",
            next: "напред"
        },
        selectable: false,
        selectOverlap: false,
        navLinks: true,
        businessHours: {
            daysOfWeek: [1, 2, 3, 4, 5],
            startTime: '08:00',
            endTime: '17:00'
        },
        selectConstraint: "businessHours",
        allDaySlot: false,
        slotDuration: "01:00",
        snapDuration: "01:00",
        dateClick: onDateClickHandler,
        events: events
    };

    const calendarEl = document.getElementById('calendar');
    const calendar = new Calendar(calendarEl, options);
    calendar.render();
});