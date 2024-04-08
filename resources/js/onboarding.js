document.addEventListener("DOMContentLoaded", function () {
    const submitArrow = document.querySelector(".done");
    const backArrowforPopup = document.querySelector(".back");
    const rightArrow = document.querySelector(".arrow-right");
    const leftArrow = document.querySelector(".arrow-left");
    const firstSection = document.querySelector(".first-section");
    const secondSection = document.querySelector(".second-section");
    const form = document.querySelector(".onboarding-form");
    const pageCounter4 = document.querySelector(".number-4");
    const completedPopup = document.querySelector(".completed");
    const rightArrowforPopup = document.querySelector(".arrow-right-submit");

    leftArrow.addEventListener("click", () => {
        if (secondSection.classList.contains("active")) {
            secondSection.classList.remove("active");
            firstSection.classList.add("active");
            pageCounter4.classList.remove("active");
        } else {
            secondSection.classList.add("active");
            firstSection.classList.remove("active");
        }
    });
    rightArrow.addEventListener("click", () => {
        console.log(pageCounter4);
        if (secondSection.classList.contains("active")) {
            secondSection.classList.remove("active");
            firstSection.classList.add("active");
        } else {
            secondSection.classList.add("active");
            firstSection.classList.remove("active");
            pageCounter4.classList.add("active");
        }
    });
    rightArrowforPopup.addEventListener("click", () => {
        completedPopup.classList.add("active");
    });
    backArrowforPopup.addEventListener("click", () => {
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
    document.querySelectorAll(".search-technology").forEach((item) => {
        item.addEventListener("click", (event) => {
            const value = event.target.getAttribute("data-value");
            const input = document.querySelector(
                'input[name="technology_names_searching"]'
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
