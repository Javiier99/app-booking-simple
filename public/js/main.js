// Toda la lógica de la reserva

// import {startChoices} from './choices.js'

// startChoices('.form-div-divx3Button-divx4-labelinput--select');

// import {inicializarCalendar} from "./calendar.js";

import "./flatpickr.min.js";
import "./es.js";

flatpickr("#calendar", {
    inline: true,        // Calendario visible en pantalla
    locale: flatpickr.l10ns.es,     // Asignamos el idioma español importado
    minDate: "today",    // Bloquear días pasados
    dateFormat: "d-m-Y", // Formato de fecha
})
