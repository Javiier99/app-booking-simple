// Es lo que me ayudará a realizar los hover de las selection
import 'https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js';

export function startChoices(selector){
    const element = document.querySelector(selector);
    if(element){
        const choices = new Choices(element, {
            searchEnabled: false,
            itemSelectText: '',
        });
    }else{
        console.error("No se encontró el select")
    }

}










