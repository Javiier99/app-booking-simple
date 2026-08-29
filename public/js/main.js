// Toda la lógica de la reserva

// import {startChoices} from './choices.js'

// startChoices('.form-div-divx3Button-divx4-labelinput--select');

// import {inicializarCalendar} from "./calendar.js";

import "./flatpickr.min.js";
import "./es.js";
import {inicializarCalendar} from "./calendar.js";
import {selectedHours} from "./calendar.js";
import {obtenerServicios} from "./services.js";
import {selectedService} from "./services.js";

document.addEventListener("DOMContentLoaded", ()=>{
    inicializarCalendar();
    obtenerServicios();
})

document.addEventListener("click", selectedHours);
document.addEventListener("click", selectedService);
