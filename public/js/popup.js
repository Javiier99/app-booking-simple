




const popup = document.querySelector(".body-form-div-divx3button-h2div--dark");


export function startPopup(){
    
    popup.classList.toggle('hidden');

    // *  Guardar todos los datos de los clientes
    const nameClient = document.getElementById("name");
    const phoneClient = document.getElementById("phone");
    const emailClient = document.getElementById("email");

    const serviceClient = document.querySelectorAll('.button-pulsado-service');
    const valorServiceClient = Array.from(serviceClient).map(input=> input.dataset.service); // Es una lista

    const placeClient = document.getElementById('place_cite');
    
    const hoursClient = document.getElementById('date');
    const timeClient = document.getElementById('time');

    // * Guardar los valores de los clientes

    const valueNameClient = nameClient.value;
    const valuePhoneClient = phoneClient.value;
    const valueEmailClient = emailClient.value;
    const valueServiceClient = valorServiceClient;
    const valuePlaceClient = placeClient.value;
    const valuehoursClient = hoursClient.value;
    const valuetimeClient = timeClient.value;


    // * Mostrar todos los datos de los clientes

    const pName = document.querySelector(".body-form-div-divx3button-h2div-Px6--p__name");
    const pPhone = document.querySelector(".body-form-div-divx3button-h2div-Px6--p__phone");
    const pEmail = document.querySelector(".body-form-div-divx3button-h2div-Px6--p__email");
    const pService = document.querySelector(".body-form-div-divx3button-h2div-Px6--p__service");
    const pLocalization = document.querySelector(".body-form-div-divx3button-h2div-Px6--p__localization");
    const pDates = document.querySelector(".body-form-div-divx3button-h2div-Px6--p__dates");


    // * Comprobaciones que el cliente puede ver

    if(valueNameClient.length >= 3){
        pName.innerHTML = `- Nombre: ${valueNameClient}`;
        pName.classList.remove("red");
    }else if(nameClient.value == ""){
        pName.innerHTML = `- Nombre: Falta el nombre`;
        pName.classList.add("red");
    }else if(nameClient.value.length <= 3){
        pName.innerHTML = `- Nombre: El nombre debe de ser como mínimo de 3 caracteres`;
        pName.classList.add("red");
    }

    if(valuePhoneClient.length === 9){
        pPhone.innerHTML = `- Teléfono: ${phoneClient.value}`;
        pPhone.classList.remove("red");
    }else{
        pPhone.innerHTML = `- Teléfono: Debe de contener como mínimo 9 números`;
        pPhone.classList.add("red");
    }

    if(valueEmailClient.length !== 0){
        pEmail.innerHTML = `- Email: ${valueEmailClient}`;
        pEmail.classList.remove("red");
    }else{
        pEmail.innerHTML = `- Email: No puede estár vacio`;
        pEmail.classList.add("red");
    }
    
    if(valueServiceClient.length !== 0){
        pService.innerHTML = `- Servicio/os: ${valueServiceClient}`;
        pService.classList.remove("red");
    }else{
        pService.innerHTML = `- Servicio/os: Debes seleccionar al menos 1 servicio`;
        pService.classList.add("red");
    }
    
    
    if(valuePlaceClient.length !== 0){
        pLocalization.innerHTML = `- Localización: ${valuePlaceClient}`;
        pLocalization.classList.remove("red");
    }else{
        pLocalization.innerHTML = `- Localización: Debes seleccionar una localización`;
        pLocalization.classList.add("red");
    }

    if(valuehoursClient.length !== 0 && valuetimeClient !== 0){
        pDates.innerHTML = `- Fecha y Hora: El día: ${timeClient.value} a las ${hoursClient.value}`;
        pDates.classList.remove("red");
    }else{
        pDates.innerHTML = `- Fecha y Hora: El día: No se ha especificado el dia y hora`;
        pDates.classList.add("red");
    }

}


export function closePopup(){
    popup.classList.toggle('hidden');
    const parrafFaltanCosas = document.querySelector(".body-form-div-divx3button-h2div--p__faltan-cosas");
    parrafFaltanCosas.innerHTML = "";
}














