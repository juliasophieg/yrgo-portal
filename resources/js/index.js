//SLIDE CONTROLLERS & ARROWS FUNCTIONALITY
const slideControlLandingpage = document.querySelector(
    ".slide-control-landing-page"
);
const slideControlEventpage = document.querySelector(
    ".slide-control-event-page"
);
const landingPage = document.querySelector(".landing-page");
const eventPage = document.querySelector(".event-page");
const arrow = document.querySelector(".arrow");

// Function to scroll to the event page or landing page
arrow.addEventListener("click", () => {
    if (arrow.classList.contains("right")) {
        eventPage.scrollIntoView({
            behavior: "smooth",
        });
    } else {
        landingPage.scrollIntoView({
            behavior: "smooth",
        });
    }
});

// Function to handle intersection observer callback for event page
function handleEventPageIntersection(entries, observer) {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            slideControlEventpage.classList.add("active");
            arrow.classList.add("left");
            arrow.classList.remove("right");
        } else {
            slideControlEventpage.classList.remove("active");
            arrow.classList.remove("left");
            arrow.classList.add("right");
        }
    });
}

// Function to handle intersection observer callback for landing page
function handleLandingPageIntersection(entries, observer) {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            slideControlLandingpage.classList.add("active");
            arrow.classList.remove("left");
            arrow.classList.add("right");
        } else {
            slideControlLandingpage.classList.remove("active");
            arrow.classList.add("left");
            arrow.classList.remove("right");
        }
    });
}

const options = {
    threshold: 0.5,
};

// Create a new intersection observer for event page
const observerEventPage = new IntersectionObserver(
    handleEventPageIntersection,
    options
);
const targetEventPage = document.querySelector(".event-page");
observerEventPage.observe(targetEventPage);

// Create a new intersection observer for landing page
const observerLandingPage = new IntersectionObserver(
    handleLandingPageIntersection,
    options
);
const targetLandingPage = document.querySelector(".landing-page");
observerLandingPage.observe(targetLandingPage);

// Function to handle intersection and update indicators
function handleIntersection() {
    // Update indicator when the page loads
    handleEventPageIntersection(
        observerEventPage.takeRecords(),
        observerEventPage
    );
    handleLandingPageIntersection(
        observerLandingPage.takeRecords(),
        observerLandingPage
    );
}

// Update indicator when the page loads
window.addEventListener("load", handleIntersection);

//ANIMATION
const animationElementIds = [
    "digital-designer",
    "x-first",
    "web-developer",
    "x-second",
    "branch",
    "yrgo-container",
];
const animation = document.getElementById("animation");

// Function to rotate elements
function rotateAnimation(index) {
    animationElementIds.forEach((id, i) => {
        const animationElement = document.getElementById(id);
        if (i === index) {
            animationElement.style.display = "inline";
        } else {
            animationElement.style.display = "none";
        }
    });

    //Last element (Yrgo logo) shows for two seconds
    const timeoutDuration =
        index === animationElementIds.length - 1 ? 2000 : 1000;
    setTimeout(() => {
        rotateAnimation((index + 1) % animationElementIds.length); // Continue rotating to the next word
    }, timeoutDuration);
}
rotateAnimation(0);

// COUNTDOWN TIMER
function eventCountdown() {
    const eventDate = new Date("2024-04-24T15:00:00");
    const currentDate = new Date();
    const difference = eventDate.getTime() - currentDate.getTime();
    // Convert the difference to seconds
    const differenceInSeconds = Math.floor(difference / 1000);

    let days = Math.floor(differenceInSeconds / (24 * 3600));
    let hours = Math.floor((differenceInSeconds % (24 * 3600)) / 3600);
    let minutes = Math.floor((differenceInSeconds % 3600) / 60);
    let seconds = Math.floor(differenceInSeconds % 60);

    document.querySelector(
        "#countdown"
    ).textContent = `${days} dagar | ${hours} h | ${minutes} min`;
}

// Update the countdown every second
setInterval(eventCountdown, 1000);
eventCountdown();
