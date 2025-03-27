let countries = [];
let currentIndex = 0;

function fetchCountries() {
    fetch("https://restcountries.com/v3.1/all")
        .then(response => response.json())
        .then(data => {
            countries = data;
            displayCountry(currentIndex);
        })
        .catch(error => console.error("Error fetching countries:", error));
}

function displayCountry(index) {
    if (countries.length === 0) return;

    let country = countries[index];
    let tableBody = document.querySelector("#countryTable tbody");
    tableBody.innerHTML = "";

    let row = `<tr>
        <td><img src="${country.flags.svg}" width="80"></td>
        <td>${country.name.common}</td>
        <td>${country.capital ? country.capital[0] : "N/A"}</td>
        <td>${country.population.toLocaleString()}</td>
    </tr>`;
    tableBody.innerHTML = row;
}

function nextCountry() {
    if (currentIndex < countries.length - 1) {
        currentIndex++;
        displayCountry(currentIndex);
    } else {
        alert("No more countries to show!");
    }
}

function prevCountry() {
    if (currentIndex > 0) {
        currentIndex--;
        displayCountry(currentIndex);
    } else {
        alert("This is the first country!");
    }
}

fetchCountries();
