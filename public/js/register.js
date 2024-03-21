document.addEventListener("DOMContentLoaded", function () {
    let firstSection = document.querySelector(".first-section");
    let formSection = document.querySelector(".form-section");
    let studentButton = document.getElementById("studentButton");
    let companyButton = document.getElementById("companyButton");
    let title = document.querySelector(".form-title");

    studentButton.addEventListener("click", function () {
        formSection.style.display = "block";
        firstSection.style.display = "none";
        title.textContent = "Student";
        document.getElementById("role").value = "student";
    });

    companyButton.addEventListener("click", function () {
        formSection.style.display = "block";
        firstSection.style.display = "none";
        title.textContent = "Company";
        document.getElementById("role").value = "company";
    });
});
