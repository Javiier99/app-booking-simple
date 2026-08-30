// * Hacer lo mismo que en service pero en localización, debo de colocar el name, los distintos values y que solo se pueda seleccionar 1






// export function localization(){
    
//     const buttonsPlaceCite = document.querySelectorAll('button[name="place_cite"]');
//     const inputPlaceCitie = document.getElementById('place_cite');

//     buttonsPlaceCite.forEach(button =>{
//         button.addEventListener("click", ()=>{
//             inputPlaceCitie.value = button.value;
//             console.log(inputPlaceCitie.value) // Este es el codigo que debe de recoger
//         })
//     })
// }


export function localization(){
    
    const buttonsPlaceCite = document.querySelectorAll('button[name="place_cite"]');
    const inputPlaceCitie = document.getElementById('place_cite');

    buttonsPlaceCite.forEach(button =>{
        button.addEventListener("click", ()=>{

            const oldInput = document.querySelector('input[name="place_cite"]');

            
            inputPlaceCitie.value = button.value;
            

            
        })
    })
}

