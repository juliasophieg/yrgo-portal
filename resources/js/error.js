document.addEventListener("DOMContentLoaded", function () {
    const errorClose = document.querySelector(".error-close");
    const errorDiv = document.querySelector(".error-div");
    if (errorClose) {
        errorClose.addEventListener("click", () => {
            errorDiv.style.display = "none";
            console.log(errorClose);
        });
    }
});
