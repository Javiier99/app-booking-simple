// Toda la lógica del calendario

import "./flatpickr.min.js";
import "./es.js";

const agendaHoras = ["10:00", "11:00", "12:00", "13:00", "18:00", "19:00", "20:00"];

let horaSeleccionada = null;
let fechaSeleccionada = null;


export function inicializarCalendar(){
    flatpickr("#calendar", {
        inline: true,        // Calendario visible en pantalla
        locale: flatpickr.l10ns.es,     // Asignamos el idioma español importado
        minDate: "today",    // Bloquear días pasados
        dateFormat: "d-m-Y", // Formato de fecha
    
        // onChange: function(selectedDates, dateStr){
        //     fechaSeleccionada = dateStr;
        //     horaSeleccionada = null;
        //     cargarHorasDinamicas(dateStr);
        // }
    })

    // Listener para el botón de confirmar

    // const btnConfirmar = document.querySelector('.btn-confirmar');
    // if(btnConfirmar){
    //     btnConfirmar.addEventListener('click', validarReserva);
    // }

    // async function cargarHorasDinamicas(fecha) {
    //     const contenedor = document.getElementById("calendar-hours");
    //     contenedor.className = "body-form-div-divx2-h2Div-divHours";
    //     contenedor.innerHTML = 'Cargando disponibilidad, porfavor espere....'

    //     try{
    //         const respuesta = await fetch('/api/get-hours.php?fecha={fecha}');
    //         const horasOcupadas = await respuesta.json();

    //         const bloques = HORARIOS_DISPONIBLES.map(hora => ({
    //             hora : hora,
    //             disponible : !horasOcupadas.includes(hora)
    //         }));
    //         renderizarHoras(bloques);s
    //     }catch(error){
    //         console.error('Error al obtener las horas: ', error);

    //     }
    // }

    // function renderizarHoras(bloques){
    //     const contenerdor = document.getElementById("calendar-hours");
    //     contenerdor.className = "grid-horas";

    //     contenerdor.innerHTML = bloques.map(b=>{
    //         if(b.disponible){
    //             return `<button type="button" class="bloque-hora disponible" data-hora="${b.hora}">
    //                         ${b.hora}
    //                     </button>`;
    //         }else{
    //             return `
    //                 <button type="button" class="bloque-hora no-disponible" disabled title="Hora ocupada">
    //                     ${b.hora}
    //                 </button>`;
    //         }
    //     }).join('');

    //     // Event listener para seleccionar hora
    //     contenerdor.querySelectorAll

        
    // }


}









