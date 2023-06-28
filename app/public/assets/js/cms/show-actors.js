import  CreateElement  from "./create-element.js";

// Définition des variables globales d'acteurs + options
const actorsCount = document.getElementById("admin-cms-form-actors");
const actorsContainer = document.getElementById("actorsList");
var options = actorsCount.querySelectorAll("option");

// On liste l'ensemble des boutons et Inputs présents dans le formulaire
const listOfButtons = document.getElementsByClassName("button-actor");
const listOfInputs = document.getElementsByClassName("actor")

// Event Listener sur le selecteur du nombre d'acteurs
actorsCount.addEventListener("change", function(){
    if (actorsCount.value === "Nombre d'acteurs à montrer") {
        actorsCount.value = 0;
    }
    var existingElements = document.getElementsByClassName("actor-element");
    var actualElements = existingElements.length;
    totalToAdd = actorsCount.value - actualElements;

    console.log("Valeur d'input : " + actorsCount.value + " / " + "Actuel : " + actualElements);

    if (totalToAdd > 0) {
        console.log("Addition");
        for(i = actualElements; i < actorsCount.value; i++) {
            CreateElement(i+1);
        }
    } else {
        console.log("Remove");
        for(i = actualElements-1; i >= actorsCount.value; i--) {
            existingElements[i].outerHTML = "";
            listOfButtons[i].outerHTML = "";
            listOfInputs[i].outerHTML = "";
        }
    }
});
