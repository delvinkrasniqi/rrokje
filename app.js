let lettersButton = document.querySelector('#letters-button');
let frequencyButton = document.querySelector("#frequency-button");


let lettersTab = document.querySelector("#letters-panel");
let frequencyTab = document.querySelector("#frequency-panel");

lettersTab.classList.add("active-tab");
lettersButton.classList.add("active");


lettersButton.addEventListener("click",()=>{
    lettersButton.classList.add("active");
    lettersTab.classList.add("active-tab");
    frequencyTab.classList.remove("active-tab");
    frequencyButton.classList.remove("active");
})

frequencyButton.addEventListener("click",()=>{
    lettersTab.classList.remove("active-tab");
    frequencyTab.classList.add("active-tab");


    frequencyButton.classList.add("active");
    lettersButton.classList.remove("active");
})