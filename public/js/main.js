// Toda la lógica de la reserva

// import {startChoices} from './choices.js'

// startChoices('.form-div-divx3Button-divx4-labelinput--select');

// import {inicializarCalendar} from "./calendar.js";

import "./flatpickr.min.js";
import "./es.js";
import {inicializarCalendar} from "./calendar.js";
import {selectedHours} from "./calendar.js";
import {saveInputHourDate} from "./calendar.js";
import {obtenerServicios} from "./services.js";
import {selectedService} from "./services.js";
import {localization} from "./localizations.js";
import {localizationActive} from "./localizations.js";
import {dataClientName} from "./data_client_public.js";


document.addEventListener("DOMContentLoaded", ()=>{
    inicializarCalendar();
    obtenerServicios();
    localization();
    
})

document.addEventListener("click", selectedHours);
document.addEventListener("click", selectedService);
document.addEventListener("click", saveInputHourDate);


const buttonsPlaceCite = document.querySelectorAll(
    'button[name="place_cite"]'
);
buttonsPlaceCite.forEach(button => {
    button.addEventListener("click", localizationActive);
});





// Código para poder colocar el nombre en datos del cliente

const inputName = document.querySelectorAll('#name')

inputName.forEach(inputName => {
    inputName.addEventListener("click", dataClientName);
})

