document.addEventListener("DOMContentLoaded", function () {
    let firstSection = document.querySelector(".first-section");
    let formSection = document.querySelector(".form-section");
    let studentButton = document.getElementById("studentButton");
    let companyButton = document.getElementById("companyButton");
    let nameDiv = document.querySelector(".name");
    let inputName = document.querySelector("#name");
    let title = document.querySelector(".form-title");

    studentButton.addEventListener("click", function () {
        formSection.style.display = "flex";
        firstSection.style.display = "none";
        title.textContent = "Student";
        nameDiv.textContent = "Namn";
        document.getElementById("role").value = "student";
    });

    companyButton.addEventListener("click", function () {
        formSection.style.display = "flex";
        firstSection.style.display = "none";
        title.textContent = "Företag";
        nameDiv.textContent = "Företags Namn";
        inputName.placeholder = "ex. Företaget AB";
        document.getElementById("role").value = "company";
    });
});
