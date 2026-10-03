


export function localization(){
    
    const buttonsPlaceCite = document.querySelectorAll('button[name="place_cite"]');
    const inputPlaceCitie = document.getElementById('place_cite');

    buttonsPlaceCite.forEach(button =>{
        button.addEventListener("click", ()=>{

            const oldInput = document.querySelector('input[name="place_cite_send"]');

            
            inputPlaceCitie.value = button.value;
            

            
        })
    })



}




export function localizationActive(event) {
    const buttons = document.querySelectorAll('button[name="place_cite"]');
    const buttonSelect = event.currentTarget;

    buttons.forEach(button => {
        button.classList.remove(
            "body-form-div-divx3button-labelDiv-divx2-divx2__active"
        );

        button.classList.add(
            "body-form-div-divx3button-labelDiv-divx2-divx2"
        );
    });

    buttonSelect.classList.remove(
        "body-form-div-divx3button-labelDiv-divx2-divx2"
    );

    buttonSelect.classList.add(
        "body-form-div-divx3button-labelDiv-divx2-divx2__active"
    );
}