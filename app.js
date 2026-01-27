let regionSelect = document.querySelector("#region");
let departementSelect = document.querySelector("#departement");
let villeSelect = document.querySelector("#ville");

regionSelect.addEventListener("change", function () {

    let regionID = this.value;

    fetch(`api/getAPI.php?region_id=${regionID}`)
        .then(response => response.json())
        .then(
            data => {
                departementSelect.innerHTML = "<option value='#'>Choississez votre département</option>";
                data.forEach(departement => {
                    let option = document.createElement("option");
                    option.value = departement.code;
                    option.innerText = departement.name
                    departementSelect.appendChild(option)
                })
            }
        )
        .catch(error => console.error("Erreur d'intétgration des données de l'API"));
});

departementSelect.addEventListener("change", function () {

    let departementID = this.value;

    fetch(`api/getAPI.php?departement_id=${departementID}`)
        .then(response => response.json())
        .then(
            data => {
                villeSelect.innerHTML = "<option value='#'>Choississez votre ville</option>";
                data.forEach(ville => {
                    let option = document.createElement("option");
                    option.value = ville.code;
                    option.innerText = ville.name
                    villeSelect.appendChild(option)
                })
            }
        )
        .catch(error => console.error("Erreur d'intétgration des données de l'API"));
});