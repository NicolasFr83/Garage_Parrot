document.addEventListener('DOMContentLoaded', function () {
    const registrationDone = document.getElementById('js_registration_done');
    const opinionSent = document.getElementById('js_opinion_sent'); 
    const formContactSent = document.getElementById('js_formContact_sent');
    const formContactSentFromCars = document.getElementById('js_formContact_sent_from_cars');

    if (registrationDone) {
        setTimeout(() => {
            registrationDone.classList.add('hide')
        }, 3000);
    }

    if (opinionSent) {
        setTimeout(() => {
            opinionSent.classList.add('hide')
        }, 3000);
    }

    if (formContactSent) {
        setTimeout(() => {
            formContactSent.classList.add('hide')
        }, 3000);
    }

    if (formContactSentFromCars) {
        setTimeout(() => {
            formContactSentFromCars.classList.add('hide')
        }, 3000);
    }

});