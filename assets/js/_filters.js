const watchSubmit = () => {
    const form = document.querySelector('.js-filters-form')
    form.addEventListener('submit', (event) => {
        event.preventDefault()
        const formData = new FormData(form)
        backCall(formData)
    })
}

const backCall = (dataToSend) => {
    const url = new URL(window.location.href);
    fetch(url.pathname + "?" + "&ajax=1", {
        method: "POST",
        body: dataToSend})
    .then((response) => response.json())
    .then((data) => {
        const filteredCars = document.querySelector('#filtered_cars');
        filteredCars.innerHTML = data.content;
        }).catch(error => alert(error));
}

document.addEventListener('DOMContentLoaded', function () {
    watchSubmit()
});