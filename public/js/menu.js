//Show and hide menu items
const menuTitle = document.querySelector(".menu-title");
const menuItems = document.querySelector(".menu-items");

menuTitle.addEventListener("click", function () {
    menuItems.classList.toggle("active");
});
