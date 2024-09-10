document.addEventListener('DOMContentLoaded', (event) => {
    fetchTires();
});

function fetchTires() {
    fetch('php/fetch_tires.php')
        .then(response => response.json())
        .then(data => {
            displayTires(data);
        });
}

function displayTires(tires) {
    const tiresDiv = document.getElementById('tires');
    tiresDiv.innerHTML = '';

    tires.forEach((tire, index) => {
        const tireDiv = document.createElement('div');
        tireDiv.className = 'tire';
        const price = `<p class="price">$${tire.price}</p>`;
        const name = `<p class="name">${tire.name}</p>`;
        const size = `<p class="size">${tire.size}</p>`;
        const img = `<img src="${tire.image_url}" alt="${tire.name}" class="tire-image">`;

        tireDiv.innerHTML = `
           
            ${size}
            ${price}
            ${img}
        `;

        tiresDiv.appendChild(tireDiv);

      
        if ((index + 1) % 2 === 0) {
            const clearfixDiv = document.createElement('div');
            clearfixDiv.className = 'clearfix';
            tiresDiv.appendChild(clearfixDiv);
        }
    });
}




function filterTires() {
    const size = document.getElementById('size').value;
    const price = document.getElementById('price').value;
    fetch(`php/fetch_tires.php?size=${size}&price=${price}`)
        .then(response => response.json())
        .then(data => {
            displayTires(data);
        });
}
document.addEventListener('DOMContentLoaded', (event) => {
    fetchSizes(); 
});

function fetchSizes() {
    fetch('php/fetch_sizes.php')
        .then(response => response.json())
        .then(data => {
            populateSizesDropdown(data);
        });
}

function populateSizesDropdown(sizes) {
    const sizeDropdown = document.getElementById('size');
    sizeDropdown.innerHTML = '<option value="">Select Size</option>'; 
    sizes.forEach(size => {
        const option = document.createElement('option');
        option.value = size;
        option.textContent = size;
        sizeDropdown.appendChild(option);
    });
}
