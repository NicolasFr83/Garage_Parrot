// Je veux :
// - récupérer les données du formulaire
const watchSubmit = () => {
    const form = document.querySelector('.js-filters-form')
    console.log(form)
    form.addEventListener('submit', (event) => {
        event.preventDefault()
        const formData = new FormData(form)
        backCall(formData)
        console.log('formulaire soumis')
        console.log(form)
        console.log(formData)

        const prixMax = formData.get('price_max');
        const kmMax = formData.get('kms_max');
        const anneeMin = formData.get('year');

        // Utiliser les valeurs récupérées
        console.log('Prix maximum:', prixMax);
        console.log('Kilomètres maximum:', kmMax);
        console.log('Année minimum de mise en circulation:', anneeMin)
    })
}





// - les envoyer à mon back
const backCall = (dataToSend) => {
    console.log('dataToSend', dataToSend)
    const url = new URL(window.location.href);
    fetch(url.pathname + "?" + "&ajax=1", {
        method: "POST",
        body: dataToSend})
    .then((response) => response.json())
    .then((data) => {
        console.log('data', data)
        const minYearValue = data.debug;
        console.log('Min Year:', minYearValue);
        const maxKmsValue = data.maxKms;
        console.log('Kms Max : ', maxKmsValue);
        const maxPrice = data.maxPrice;
        console.log('maxPrice : ', maxPrice);
        // Afficher les voitures renvoyées par le controller.
        const filteredCars = document.querySelector('#filtered_cars');
        filteredCars.innerHTML = data.content;
        }).catch(error => alert(error));
}


watchSubmit()
