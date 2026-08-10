// Toda la lógica del calendario

import "./flatpickr.min.js";
import "./es.js";

let horaSeleccionada = null;
let fechaSeleccionada = null;


export function inicializarCalendar(){
    flatpickr("#calendar", {
        inline: true,        // Calendario visible en pantalla
        locale: flatpickr.l10ns.es,     // Asignamos el idioma español importado
        minDate: "today",    // Bloquear días pasados
        dateFormat: "d-m-Y", // Formato de fecha
    
        onChange: function(selectedDates, dateStr){
            if(dateStr){
                obtenerHoras(dateStr)
            }
        }
    })

    function obtenerHoras(fecha){
        const contenedor = document.getElementById("calendar-hours");
        contenedor.innerHTML = `Por favor espere un momento, cargando horas`;

        fetch('../api/get-hours.php')
            .then(response => {
                if(!response.ok){
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json()
            })
            .then(horas =>{
                pintarHoras(horas);
            })
            .catch(error =>{
                console.error(`El error al traer las horas ${error}`);
                contenedor.innerHTML = `<p>Error al cargar las horas</p>`;
            })
    }
    
    function pintarHoras(listaHoras){
        const contenedor = document.getElementById("calendar-hours");
        contenedor.innerHTML = "";


        if(!listaHoras || listaHoras.length === 0){
            contenedor.innerHTML = `No hay horas disponibles`;
        }

        listaHoras.forEach(element => {
            const button = document.createElement('button');
            button.type = 'button';
            button.classList.add('body-form-div-divx2-h2Div-divHours--button');
            button.textContent = element.hora;
            contenedor.appendChild(button);
        });
    }

}







