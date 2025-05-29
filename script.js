
document.getElementById("reportForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch("php/submit.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert("Item reported!");
        this.reset();
        loadItems();
    });
});

function loadItems() {
    fetch("php/fetch.php")
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById("itemsList");
        container.innerHTML = "";
        data.forEach(item => {
            const div = document.createElement("div");
            div.innerHTML = `<strong>${item.type.toUpperCase()}</strong>: ${item.item}<br>By: ${item.name}, Contact: ${item.contact}<hr>`;
            container.appendChild(div);
        });
    });
}

window.onload = loadItems;
