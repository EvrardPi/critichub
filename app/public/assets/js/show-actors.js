const actorsCount = document.getElementById("admin-cms-form-actors");
const actorsContainer = document.getElementById("actorsList");
var options = actorsCount.querySelectorAll("option");


console.log(actorsContainer);

console.log(options);

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
            console.log(i);
            var htmlContent = "<div class=\"actor-element image-preview-container new-admin-actor-preview\"><img class=\"banner-image\" src=\"/assets/images/white-font.png\" alt=\"\"></div>"
            actorsContainer.innerHTML += htmlContent;
        }
    } else {
        console.log("Remove");
        for(i = actualElements-1; i >= actorsCount.value; i--) {
            existingElements[i].outerHTML = "";
        }
    }
});