document.addEventListener('DOMContentLoaded', function() {
    console.log('wouf');
    fetch('/back-get-content', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            const tabButtons = document.querySelectorAll('.nav-link');
            // Utilisez les données retournées pour effectuer les actions souhaitées
            console.log(data, tabButtons);

            // Remplir les inputs pour l'onglet h1 (ou l'onglet par défaut)
            const h1ColorInput = document.querySelector('#nav-h1 form #create-form-gestion-front-color');
            const h1PoliceInput = document.querySelector('#nav-h1 form #create-form-gestion-front-police');
            const h1SizeInput = document.querySelector('#nav-h1 form #create-form-gestion-front-size');
            h1ColorInput.value = data.h1.color;
            h1PoliceInput.value = data.h1.police;
            h1SizeInput.value = data.h1.size;

            // Parcourez chaque bouton d'onglet
            tabButtons.forEach(function(button) {
                // Ajoutez un gestionnaire d'événement pour l'événement "shown.bs.tab"
                button.addEventListener('shown.bs.tab', function(event) {
                    const targetId = event.target.getAttribute('data-bs-target');
                    let colorInput, policeInput, sizeInput; // Déclaration des variables à l'intérieur de la fonction d'événement

                    if (targetId === '#nav-h1') {
                        colorInput = document.querySelector('#nav-h1 form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-h1 form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-h1 form #create-form-gestion-front-size');
                        colorInput.value = data.h1.color;
                        policeInput.value = data.h1.police;
                        sizeInput.value = data.h1.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-h1');
                    } else if (targetId === '#nav-h2') {
                        colorInput = document.querySelector('#nav-h2 form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-h2 form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-h2 form #create-form-gestion-front-size');
                        colorInput.value = data.h2.color;
                        policeInput.value = data.h2.police;
                        sizeInput.value = data.h2.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-h2');
                    } else if (targetId === '#nav-h3') {
                        colorInput = document.querySelector('#nav-h3 form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-h3 form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-h3 form #create-form-gestion-front-size');
                        colorInput.value = data.h3.color;
                        policeInput.value = data.h3.police;
                        sizeInput.value = data.h3.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-h3');
                    } else if (targetId === '#nav-h4') {
                        colorInput = document.querySelector('#nav-h4 form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-h4 form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-h4 form #create-form-gestion-front-size');
                        colorInput.value = data.h4.color;
                        policeInput.value = data.h4.police;
                        sizeInput.value = data.h4.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-h4');
                    } else if (targetId === '#nav-h5') {
                        colorInput = document.querySelector('#nav-h5 form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-h5 form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-h5 form #create-form-gestion-front-size');
                        colorInput.value = data.h5.color;
                        policeInput.value = data.h5.police;
                        sizeInput.value = data.h5.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-h5');
                    } else if (targetId === '#nav-h6') {
                        colorInput = document.querySelector('#nav-h6 form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-h6 form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-h6 form #create-form-gestion-front-size');
                        colorInput.value = data.h6.color;
                        policeInput.value = data.h6.police;
                        sizeInput.value = data.h6.size
                        console.log('Changement d\'onglet : targetId est égal à #nav-h6');
                    } else if (targetId === '#nav-text') {
                        colorInput = document.querySelector('#nav-text form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-text form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-text form #create-form-gestion-front-size');
                        colorInput.value = data.text.color;
                        policeInput.value = data.text.police;
                        sizeInput.value = data.text.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-text');
                    } else if (targetId === '#nav-link') {
                        colorInput = document.querySelector('#nav-link form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-link form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-link form #create-form-gestion-front-size');
                        colorInput.value = data.link.color;
                        policeInput.value = data.link.police;
                        sizeInput.value = data.link.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-link');
                    } else if (targetId === '#nav-background') {
                        colorInput = document.querySelector('#nav-background form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-background form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-background form #create-form-gestion-front-size');
                        colorInput.value = data.background.color;
                        policeInput.value = data.background.police;
                        sizeInput.value = data.background.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-background');
                    } else if (targetId === '#nav-strong') {
                        colorInput = document.querySelector('#nav-strong form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-strong form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-strong form #create-form-gestion-front-size');
                        colorInput.value = data.strong.color;
                        policeInput.value = data.strong.police;
                        sizeInput.value = data.strong.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-strong');
                    }else if (targetId === '#nav-span') {
                        colorInput = document.querySelector('#nav-span form #create-form-gestion-front-color');
                        policeInput = document.querySelector('#nav-span form #create-form-gestion-front-police');
                        sizeInput = document.querySelector('#nav-span form #create-form-gestion-front-size');
                        colorInput.value = data.span.color;
                        policeInput.value = data.span.police;
                        sizeInput.value = data.span.size;
                        console.log('Changement d\'onglet : targetId est égal à #nav-span');
                    }
                });
            });
        });
});
