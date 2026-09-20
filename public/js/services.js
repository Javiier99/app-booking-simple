



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
                    button.name = "service-select";
                    button.value = element.service_name;
                    button.id = element.service_id;
                    button.precio = element.precio;
                    button.innerHTML = `${element.service_name} ➨ ${element.precio}€`;
                    contenedor.appendChild(button);
                    
                });
            })
            .catch(error =>{
                console.error(`El error al traer las horas ${error}`);
                contenedor.innerHTML = `<p>Error al cargar los servicios</p>`;

        
})}


export function selectedService(event){

    const button = event.target;
    const buttonsNoSelect = "form-div-divx3Button-divx4-labelinput-services--button";
    const buttonsSelect = "form-div-divx3Button-divx4-labelinput-services--button__active";

    const buttonSelectService = document.querySelectorAll('button[name="service-select"]');
    const inputSelectService = document.getElementById('service-select');

    if (!button || button.name !== "service-select") {
        return;
    }
    
    if(button.classList.contains(buttonsNoSelect) || button.classList.contains(buttonsSelect)){
        button.classList.toggle(buttonsSelect);
        button.classList.toggle(buttonsNoSelect);
    }

    
    const inputService = document.querySelector(`input[name="service-select[]"][data-service="${button.value}"]`);
    const inputServicePrecio = document.querySelector(`#price`);

    if(inputService){
        inputService.remove();
        inputServicePrecio.remove();
    }else{
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "service-select[]";
        input.value = button.value;
        input.classList.add("button-pulsado-service");
        input.id = "service";
        input.dataset.service = button.value;

        document.querySelector("form").appendChild(input);



        const inputPrecio = document.createElement("input");
        inputPrecio.type = "hidden";
        inputPrecio.name = "price-service-select[]";
        inputPrecio.value = button.precio;
        inputPrecio.id = "price";
        inputPrecio.dataset.service = button.value;

        document.querySelector("form").appendChild(inputPrecio);

    }

}





