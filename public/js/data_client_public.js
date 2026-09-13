





// *  Código para validar los datos del cliente


let nameOK = false
export function dataClientName(){
    const name = document.getElementById("name");
    const nameError = document.getElementById('name-error');
    
    let textoName = name.value;
    if(textoName.length >= 3 && textoName.length <= 15){
        nameOK = true;
        nameError.innerHTML = "<p>¡Es un nombre precioso!</p>";
        return nameOK;
    }else{
        nameOK = false
        if(textoName.length == 0 || textoName.length <= 3){
            nameError.innerHTML = ""
        }
        
    }
}



let phoneOK = false;
export function dataClientPhone(){
    const phone = document.getElementById("phone");
    const phoneError = document.getElementById("phone-error");
    const textoPhone = phone.value;

    if(textoPhone.length === 9){
        phoneOK = true;
        phoneError.innerHTML = ``;
        return phoneOK;
    }else if(textoPhone.length !== 9){
        phoneError.innerHTML = `<p>El teléfono debe de contener 9 números</p>`;
        phoneOK = false;
    }
}

let emailOK = false;
export function dataClientEmail(){
    const email = document.getElementById("email");
    const emailError = document.getElementById("email-error");
    let textoEmail = email.value;
    let containArroba = false;
    let containPoint =  false;
    if(textoEmail.includes("@")){
        containArroba = true;
        emailError.innerHTML = ""
    }
    if(textoEmail.includes(".")){
        containPoint = true;
        emailError.innerHTML = ""
    }

    if(containArroba === true && containPoint == true){
        emailOK = true;
        return emailOK;
    }
}


let servicesOK = false;
export function dataClientService(){
    let allServiceSelect = document.querySelectorAll('.form-div-divx3Button-divx4-labelinput-services--button__active')
    const serviceError =  document.getElementById('service-error')

    if(allServiceSelect.length !== 0){
        servicesOK = true;
        return servicesOK;
    }else if(allServiceSelect.length === 0){
        servicesOK = false;
    }

}


let localizationOK = false;
export function dataClientLocalization(){
    const idLocalizacion = document.querySelector('#place_cite');
    let idLocalizationValue = idLocalizacion.value;
    if(idLocalizationValue !== ""){
        localizationOK = true;
        return localizationOK;
    }
}




let dateTimeOK = false;


export function dataClientDateTime(){
    const date = document.querySelector('#date');
    const time = document.querySelector('#time');
    let dateOK =  false;
    let timeOK =  false;
    let dateValue = date.value;
    let timeValue = time.value;
    if(dateValue !== ""){
        dateOK = true;
    }
    if(timeValue !== ""){
        timeOK = true;
    }

    if(dateOK == true && timeOK == true){
        dateTimeOK = true;
        console.log(dateTimeOK)
        return dateTimeOK;
    }
}




// * Para validar todo y que se pueda enviar



export function verificationEnd(){
    nameOK = dataClientName();
    phoneOK = dataClientPhone();
    emailOK = dataClientEmail();
    servicesOK = dataClientService();
    localizationOK = dataClientLocalization();
    dateTimeOK =  dataClientDateTime();

    if((nameOK === true) && (phoneOK === true) && (emailOK === true) && (servicesOK === true) && (localizationOK === true) && (dateTimeOK === true)){
        return true;
    }else{
        return false;
    }
}
















// const phone = document.getElementById("phone");
//     const email = document.getElementById("email");
//     const localization = document.getElementById("name");
//     const dateDay = document.getElementById("dateDay");
//     const dateHours = document.getElementById("dateHours");



//   const textoPhone = phone.value
//     const textoEmail = email.value
//     const textoLocalization = localization.value
//     const textoDateDay = dateDay.value
//     const textoDateHours = dateHours.value

//   console.log(textoPhone)
//     console.log(textoEmail)
//     console.log(textoLocalization)
//     console.log(textoDateDay)
//     console.log(textoDateHours)






