// Toda la lógica del calendario

import "./flatpickr.min.js";
import "./es.js";

let horaSeleccionadaId = null;
let horaSeleccionadaTexto = null;
let fechaSeleccionada = null;


export function inicializarCalendar(){
    let fechaObjeto = "";
    flatpickr("#calendar", {
        inline: true,        // Calendario visible en pantalla
        locale: flatpickr.l10ns.es,     // Asignamos el idioma español importado
        minDate: "today",    // Bloquear días pasados
        dateFormat: "d-m-Y", // Formato de fecha
    
        onChange: function(selectedDates, dateStr){
            if(selectedDates.length > 0){
                fechaSeleccionada = dateStr;
                


                let objetoFecha = selectedDates[0];
                let day = String(objetoFecha.getDate()).padStart(2,'0');
                let month = String(objetoFecha.getMonth() + 1).padStart(2,'0');
                let years = objetoFecha.getFullYear();
                

                fechaObjeto = `${years}-${month}-${day}`
                obtenerHoras(dateStr, fechaObjeto);
            }
        }
    })

    function obtenerHoras(fecha, fechaObjeto){
        const contenedor = document.getElementById("calendar-hours");
        contenedor.innerHTML = `<p>Por favor espere un momento, cargando horas</p>`;

        fetch('../api/get-hours.php')
            .then(response => {
                if(!response.ok){
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json()
            })
            .then(horas =>{
                pintarHoras(horas, fechaObjeto);
            })
            .catch(error =>{
                console.error(`El error al traer las horas ${error}`);
                contenedor.innerHTML = `<p>Error al cargar las horas</p>`;
            })
    }


    // Saber el dia que ha escogido el cliente



    
    function pintarHoras(listaHoras, fechaObjeto){
        const contenedor = document.getElementById("calendar-hours");
        contenedor.innerHTML = "";
        

        let dateToday = new Date()
        let dayToday = String(dateToday.getDate()).padStart(2,'0');
        let monthToday = String(dateToday.getMonth() + 1).padStart(2,'0');
        let yearsToday = dateToday.getFullYear();
        let objectDateToday = `${yearsToday}-${monthToday}-${dayToday}`; 
        let objectDateTodayBool = false;


        if(objectDateToday == fechaObjeto){
            objectDateTodayBool = true;
        }
        if( objectDateTodayBool == true){
            contenedor.innerHTML = `<p class = "texto-horas-no-disponible">En el mismo día de hoy no se puede coger cita, disculpa las molestias</p>`;
            return;
        }

        
        let saveHoursId = [];
        let saveHours = [];
        listaHoras[1].forEach(dataClient =>{
            if(dataClient['fecha'] == fechaObjeto){
                saveHoursId.push(dataClient['id_hours_available']);
                saveHours.push(dataClient['hora']);
            }
        })  

        if(saveHoursId.length !== 0){
            const horasDisponibles = listaHoras[0].filter(hoursWrite => 
                !saveHoursId.includes(hoursWrite['id_hours_available'])
            );

            if(horasDisponibles.length === 0){
                contenedor.innerHTML = `<p class = "texto-horas-no-disponible">No hay horas disponibles, disculpa las molestias</p>`;
            }else{
                listaHoras[0].forEach(hoursWrite =>{

                
                    if(!saveHoursId.includes(hoursWrite['id_hours_available'])){
                        const button = document.createElement('button');
                        button.type = 'button';
                        button.classList.add('body-form-div-divx2-h2Div-divHours--button');
                        button.textContent = hoursWrite.hora;
                        button.value = hoursWrite.id_hours_available;
                        contenedor.appendChild(button);
                    }
                })
            }
            
            
        }else{
            
            listaHoras[0].forEach(element => {
                const button = document.createElement('button');
                button.type = 'button';
                button.classList.add('body-form-div-divx2-h2Div-divHours--button');
                button.textContent = element.hora;
                button.value = element.id_hours_available;
                contenedor.appendChild(button);
            });
            
        }

    }

}


// Para que al pinchar en una hora, se quede como fijado

export function selectedHours(e){
    
    if(e.target.matches(".body-form-div-divx2-h2Div-divHours--button")){
        const button = document.querySelectorAll(".body-form-div-divx2-h2Div-divHours--button");
        button.forEach((buttons) =>{
            buttons.classList.remove("button-select");
        })

        e.target.classList.add("button-select");
        horaSeleccionadaId = e.target.value;
        horaSeleccionadaTexto = e.target.textContent;
    }
}



export function saveInputHourDate(){
    const inputHourSelectId = document.getElementById('time'); 
    const inputHourSelectText = document.getElementById('timeText'); 
    const inputDateSelect = document.getElementById('date');

    
    inputDateSelect.value = fechaSeleccionada;
    inputHourSelectId.value = horaSeleccionadaId;
    inputHourSelectText.value = horaSeleccionadaTexto;


}
