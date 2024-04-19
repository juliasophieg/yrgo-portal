//IMAGE PREVIEW & SIZE CHECK

document
    .getElementById("profile_picture")
    .addEventListener("change", function (event) {
        const input = event.target;
        const file = input.files[0];

        // Check if file size is greater than 2MB, and display error if it is
        if (file.size > 2 * 1024 * 1024) {
            const errorDiv = document.createElement("div");
            errorDiv.classList.add("error-div");

            const errorMessage = document.createElement("p");
            errorMessage.classList.add("error");
            errorMessage.textContent = "Bilden får vara max 2MB stor.";

            errorDiv.appendChild(errorMessage);

            const editPageDiv = document.querySelector(".edit-page");
            const errorContainer =
                editPageDiv.querySelector(".error-container");
            if (!errorContainer) {
                const newErrorContainer = document.createElement("div");
                newErrorContainer.classList.add("error-container");
                newErrorContainer.appendChild(errorDiv);
                editPageDiv.appendChild(newErrorContainer);
            } else {
                errorContainer.innerHTML = "";
                errorContainer.appendChild(errorDiv);
            }

            input.value = "";
            return;
        }

        // If no error, remove any existing error container
        const editPageDiv = document.querySelector(".edit-page");
        const errorContainer = editPageDiv.querySelector(".error-container");
        if (errorContainer) {
            editPageDiv.removeChild(errorContainer);
        }

        // If no error, continue with image processing
        const reader = new FileReader();
        reader.onload = function () {
            const dataURL = reader.result;
            const userProfileImg = document.getElementById("user-profile-img");
            userProfileImg.src = dataURL;
        };
        reader.readAsDataURL(file);
    });

// DESCRIPTION CHARACTER COUNT

document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.getElementById("description");
    const charCount = document.getElementById("charCount");

    // Function to update character count
    function updateCharCount() {
        const length = textarea.value.length;
        charCount.textContent = length + "/900";
    }

    textarea.addEventListener("input", updateCharCount);

    // Call the function initially to count characters on page load
    updateCharCount();
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
