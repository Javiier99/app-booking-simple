// Toda la lógica de la reserva

// import {startChoices} from './choices.js'

// startChoices('.form-div-divx3Button-divx4-labelinput--select');

// import {inicializarCalendar} from "./calendar.js";

import "./flatpickr.min.js";
import "./es.js";
import {inicializarCalendar, selectedHours, saveInputHourDate} from "./calendar.js";
import {obtenerServicios, selectedService} from "./services.js";
import {localization, localizationActive} from "./localizations.js";
import {dataClientName, dataClientPhone, dataClientEmail, dataClientService, dataClientDateTime, dataClientLocalization, verificationEnd} from "./data_client_public.js";


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







// * Todo el código para extraer todos los datos que el cliente esté colocando
// Nombre
const inputName = document.querySelectorAll('#name');

inputName.forEach(inputName => {
    inputName.addEventListener("input", dataClientName);
})



// Código para el teléfono

const inputPhone = document.querySelectorAll("#phone");

inputPhone.forEach(inputPhone =>{
    inputPhone.addEventListener("input", dataClientPhone);
})



// Código para el email

const inputEmail = document.querySelectorAll("#email");

inputEmail.forEach(inputEmail =>{
    inputEmail.addEventListener("input", dataClientEmail);
})



// Código para el servicio


const tapAnywhere = document.querySelector('html');
tapAnywhere.addEventListener("click", dataClientService);


// Localización

tapAnywhere.addEventListener("click", dataClientLocalization);


// Para el dia y hora

tapAnywhere.addEventListener("click", dataClientDateTime);


// Comprobación antes de enviar todo el formulario

const buttonSubmit = document.getElementById('form');
let verificationOK = false;
buttonSubmit.addEventListener("submit", (e)=>{
    e.preventDefault();
    let verification = verificationEnd();
    
    if(verification == true){
        verificationOK = true;
    }
});




