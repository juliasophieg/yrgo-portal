//IMAGE PREVIEW

document
    .getElementById("profile_picture")
    .addEventListener("change", function (event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function () {
            const dataURL = reader.result;
            const userProfileImg = document.getElementById("user-profile-img");
            userProfileImg.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    });

// SHOW MORE TECHNOLOGIES
const moreTechnologies = document.querySelector(".more-technologies");
const unselectedTechnologies = document.querySelector(
    ".unselected-technologies"
);
const technologyBtns = document.querySelectorAll(".technology-checkbox");

moreTechnologies.addEventListener("click", () => {
    unselectedTechnologies.classList.toggle("show");
    moreTechnologies.style.display = "none";
});

technologyBtns.forEach((technologyBtn) => {
    technologyBtn.addEventListener("click", () => {
        technologyBtn.classList.toggle("selected");
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const technologyCheckboxes = document.querySelectorAll(
        '.technology-checkbox input[type="checkbox"]'
    );

    technologyCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevent click event from bubbling up to parent
        });

        checkbox.parentNode.addEventListener("click", () => {
            checkbox.checked = !checkbox.checked;
        });
    });
});
