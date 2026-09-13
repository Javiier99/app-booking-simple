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
import {startPopup, closePopup} from "./popup.js";
import {sendForm} from "./form-send.js";

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


// * Código relacionado al popup


const buttonPopup = document.querySelector(".button-popup");
let verificationOK = false;
buttonPopup.addEventListener("click", (e)=>{

    // * Código para el popup
    startPopup()
});

const closeWindow = document.querySelector(".body-form-div-divx3button-h2div--p");
closeWindow.addEventListener("click",()=>{
    closePopup();
})




const buttonSubmit = document.getElementById('form');
buttonSubmit.addEventListener("submit", async (e)=>{
    let verification = verificationEnd();
    const parrafFaltanCosas = document.querySelector(".body-form-div-divx3button-h2div--p__faltan-cosas");
    if(!verification){
        e.preventDefault();
        parrafFaltanCosas.innerHTML = "Hay algunos campos que no se han rellenado correctamente";
    }else{
        const resultado =  await sendForm(buttonSubmit);
        if(resultado.success){
            window.location.href = "page-thank.php";
        }else{
            parrafFaltanCosas.innerHTML = "Error al guardar, intentalo en 5min o enviame un whatsApp al: ";
        }
    }
    


});






