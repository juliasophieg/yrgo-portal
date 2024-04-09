document.addEventListener("DOMContentLoaded", function () {
    const submitArrow = document.querySelector(".done");
    const backButtonforPopup = document.querySelector(".back");
    const rightArrowforPopup = document.querySelector(".arrow-right");
    const form = document.querySelector(".onboarding-form");
    const completedPopup = document.querySelector(".completed");

    rightArrowforPopup.addEventListener("click", () => {
        const input = document.querySelector(
            'input[name="technology_names_using"]'
        );
        if (input.value !== "") {
            completedPopup.classList.add("active");
        } else {
            const main = document.querySelector(".main");

            var newDiv = document.createElement("div");
            newDiv.className = "error-div";

            // Set the inner HTML of the new div
            newDiv.innerHTML =
                '<div class="error-close">x</div>' +
                '<p class="error">Vänligen välj teknologierna du/ni använder</p>';

            // Append the new div to the .main div
            main.appendChild(newDiv);
            //apply closing logic and event listener to the error div
            const errorClose = document.querySelector(".error-close");
            const errorDiv = document.querySelector(".error-div");
            if (errorClose) {
                errorClose.addEventListener("click", () => {
                    errorDiv.remove();
                });
            }
        }
    });
    backButtonforPopup.addEventListener("click", () => {
        completedPopup.classList.remove("active");
    });
    submitArrow.addEventListener("click", () => {
        form.submit();
    });

    document.querySelectorAll(".used-technology").forEach((item) => {
        item.addEventListener("click", (event) => {
            const value = event.target.getAttribute("data-value");
            const input = document.querySelector(
                'input[name="technology_names_using"]'
            );
            let existingValues = input.value.split(",");
            if (existingValues[0] === "") {
                existingValues.shift();
            }
            const index = existingValues.indexOf(value);
            if (index === -1) {
                existingValues.push(value);
                item.classList.add("selected");
            } else {
                existingValues.splice(index, 1);
                item.classList.remove("selected");
            }
            input.value = existingValues.join(",");
        });
    });
});
