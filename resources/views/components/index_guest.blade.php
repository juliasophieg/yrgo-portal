    <div class="landing-page">
        <div class="landing-page-content">
            <div class="date-countdown">
                <p class="body">15:00-17:00 Onsdag, 24 april, 2024</p>
                <div class="countdown">
                    <p class="body-small">Eventet startar om:</p>
                    <div class="button button-secondary-fill">
                        <p class="body-small" id="countdown"></p>
                    </div>
                </div>
            </div>
            <div id="animation">
                <span class="title-1" id="digital-designer">Digital Designer</span>
                <span class="title-2-desktop" id="x-first">×</span>
                <span class="title-1" id="web-developer">Webb-utvecklare</span>
                <span class="title-2-desktop" id="x-second">×</span>
                <span class="title-1" id="branch">Branchen</span>
                <span id="yrgo-container"><img src="/images/logo/yrgo-vit.svg" alt=""></span>
            </div>
            <div class="welcome-text">
                <h2 class="title-2">Välkommen på event</h2>
                <p class="body">Upptäck nya möjligheter! Välkommen till vårt evenemang där företag och studenter möts för att skapa framtida samarbeten och praktikplatser. Anmäl dig nu för att inte missa detta unika tillfälle!</p>
            </div>
        </div>
        <a class="button button-primary-blue" href="{{ route('register') }}">Anmäl dig nu!</a>

    </div>
    <div class="event-page not-auth" id="event-page">
        <div class="event-info">
            <div class="event-title">
                <h1 class="title-1">Välkommen</h1>

                <div class="divider"></div>
            </div>
            <div class="event-description">
                <div class="event-text">
                    <h2 class="title-3">När?</h2>
                    <p class="body">15:00-17:00 Onsdag, 24 april, 2024</p>
                </div>
                <div class="event-text">
                    <h2 class="title-3">Vart?</h2>
                    <p class="body">Visual Arena Lindholmen</p>
                    <p class="body">Lindholmspiren 3, 417 56 Göteborg</p>
                </div>
                <div class="event-text box">
                    <h2 class="title-3">Vad kan du förvänta dig?</h2>
                    <div class="text-box">
                        <p class="body">
                            Välkomna på mingelevent för att hitta framtida medarbetare i ert företag eller bara jobba tillsammans under LIA. Ni kommer att träffa Webbutvecklare och Digital Designers från Yrgo som vill visa vad de har jobbat med under året och vi hoppas att ni hittar en match.
                        </p>
                        <p class="body">
                            Ni som företag kan med fördel ta med någon form av identifikation för synlighet. Vi kommer att ha stationer där företag och studerande kan träffas.
                        </p>
                        <p class="body">
                            Varmt välkomna önskar Webbutvecklare och Digital Designer!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <a class="button button-primary-red" href="{{ route('register') }}">Anmäl dig nu!</a>

    </div>
    </div>
    <div class="slide-controls">
        <div class="slide-control-landing-page"></div>
        <div class="slide-control-event-page"></div>
    </div>


    <script>
        //SLIDE CONTROLLERS FUNCTIONALITY
        const slideControlLandingpage = document.querySelector('.slide-control-landing-page');
        const slideControlEventpage = document.querySelector('.slide-control-event-page');
        const landingPage = document.querySelector('.landing-page');
        const eventPage = document.querySelector('.event-page');

        // Function to handle intersection observer callback for event page
        function handleEventPageIntersection(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    slideControlEventpage.classList.add('active');
                } else {
                    slideControlEventpage.classList.remove('active');
                }
            });
        }

        // Function to handle intersection observer callback for landing page
        function handleLandingPageIntersection(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    slideControlLandingpage.classList.add('active');
                } else {
                    slideControlLandingpage.classList.remove('active');
                }
            });
        }

        const options = {
            threshold: 0.5
        };

        // Create a new intersection observer for event page
        const observerEventPage = new IntersectionObserver(handleEventPageIntersection, options);
        const targetEventPage = document.querySelector('.event-page');
        observerEventPage.observe(targetEventPage);

        // Create a new intersection observer for landing page
        const observerLandingPage = new IntersectionObserver(handleLandingPageIntersection, options);
        const targetLandingPage = document.querySelector('.landing-page');
        observerLandingPage.observe(targetLandingPage);

        // Function to handle intersection and update indicators
        function handleIntersection() {
            // Update indicator when the page loads
            handleEventPageIntersection(observerEventPage.takeRecords(), observerEventPage);
            handleLandingPageIntersection(observerLandingPage.takeRecords(), observerLandingPage);
        }

        // Update indicator when the page loads
        window.addEventListener('load', handleIntersection);



        //ANIMATION
        const animationElementIds = ["digital-designer", "x-first", "web-developer", "x-second", "branch", "yrgo-container"];
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
            const timeoutDuration = index === animationElementIds.length - 1 ? 2000 : 1000;
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

            document.querySelector("#countdown").textContent = `${days} dagar | ${hours} h | ${minutes} min`;
        }

        // Update the countdown every second
        setInterval(eventCountdown, 1000);
        eventCountdown();
    </script>