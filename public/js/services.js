



export function obtenerServicios(){
        const contenedor = document.getElementById("form-div-divx3Button-divx4-labelinput-services");
        contenedor.innerHTML = `Por favor espere un momento, cargando servicios`;

        fetch('../api/get-services.php')
            .then(response => {
                if(!response.ok){
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json()
            })
            .then(services =>{
                if(!services || services.length === 0){
                    contenedor.innerHTML = "<p>Actualmente No tenemos servicios disponibles</p>";  
                    return
                }

                contenedor.innerHTML = ``;
                services.forEach(element => {
                    const button = document.createElement("button");
                    button.type = 'button';
                    button.classList.add("form-div-divx3Button-divx4-labelinput-services--button");
                    button.name = element.service_id;
                    button.id = element.service_id;
                    button.innerHTML = `<p>${element.service_name} ➨ ${element.precio}€</p>`;
                    contenedor.appendChild(button);
                    
                });
            })
            .catch(error =>{
                console.error(`El error al traer las horas ${error}`);
                contenedor.innerHTML = `<p>Error al cargar los servicios</p>`;

        
})}




// ! No funciona la función de seleccionar el evento, por lo tanto toca corregirlo, basicamente no selecciona bien, es importante tambíen tener en cuenta que la función debe de poder seleccionar y deseleccionar sin problema eso se hará con un if, en caso de que por ejemplo esté activado se llamará true, si está true y el cliente lo vuelve a pulsar se pasará a llamar false y al revés si es false y así se selecciona los elementos

// ! Otra cuestión a arreglar es colocar el mismo name a los botones pero distintos value para que así podamos recoger todos los datos relacionado a los usuarios


export function selectedService(e){
    if(e.target.matches(".form-div-divx3Button-divx4-labelinput-services--button")){
        const buttonSelect = document.querySelectorAll("form-div-divx3Button-divx4-labelinput-services--button");
        buttonSelect.forEach((buttons) =>{
            buttonSelect.classList.remove("form-div-divx3Button-divx4-labelinput-services--button")
            
        })
        
        e.classList.add("gola");
    }
    console.log("Funciona")
}