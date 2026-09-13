// Guardar todos los datos del formulario y posteriormente enviarlos


export async function sendForm(buttonSubmit) {
    const formData = new FormData(buttonSubmit);

    try{
        const response = await fetch('../../src/get-client-form.php',{
            method: 'POST',
            body: formData
        })

        return await response.json();
    }catch(error){
        console.log("Error en la petición fetch" , error);
        return{sucess: false, error: "Error en la conexión con el servidor "}
    }
}