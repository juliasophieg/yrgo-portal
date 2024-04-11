@extends('layout')

@section('title', '- Index')

@section('menu')
@include('components.menu')
@endsection

@section('content')
<div class="index-page">
    <div class="slide-wrapper snaps-inline">
        <!-- If guest display slide with two pages (langing and event page)-->
        @guest
        <div class="landing-page">
            <div class="landing-page-content">
                <div class="date-countdown">
                    <p class="body">15:00-17:00 Onsdag, 24 april, 2024</p>
                    <div class="countdown">
                        <p class="body-small">Eventet startar om:</p>
                        <div class="button button-secondary-fill">10:21:36</div>
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
        @endguest
        <!-- If auth user display red event confirmation, if guest display blue event info -->
        <div class="event-page {{ auth()->check() ? 'auth' : 'not-auth' }}">
            <div class="event-info">
                <div class="event-title">
                    <h1 class="title-1">Välkommen</h1>
                    @auth
                    <p class="body-small">Du är registrerad!</p>
                    @endauth
                    <div class="divider"></div>
                </div>
                <div class="event-description">
                    <div class="event-text">
                        <h2 class="title-3">När?</h2>
                        <p class="body">15:00-17:00 Måndag, 15 april, 2024</p>
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
            <!-- If auth user show "Min profil", if guest display register button-->
            @auth
            <a href="{{ route('profile') }}" class="button button-secondary-fill">Min profil</a>
            @endauth
            @guest
            <a class="button button-primary-red" href="{{ route('register') }}">Anmäl dig nu!</a>
            @endguest
        </div>
    </div>

    <!-- If guest display slide controls-->
    @guest
    <div class="slide-controls">
        <div class="slide-control active"></div>
        <div class="slide-control"></div>
    </div>
    @endguest
</div>


<script>
    //SLIDE FUNCTIONALITY
    const slides = document.querySelectorAll('.slide-wrapper > div');

    // Function to check which slide is currently in view
    const checkSlideInView = () => {
        const viewportHeight = window.innerHeight;
        const slidePositions = Array.from(slides).map(slide => {
            const rect = slide.getBoundingClientRect();
            return rect.top < viewportHeight && rect.bottom >= 0;
        });
        return slidePositions.indexOf(true);
    };

    // Function to update the slide indicator
    const updateSlideIndicator = () => {
        const index = checkSlideInView();
        const controls = document.querySelectorAll('.slide-control');
        controls.forEach((control, i) => {
            if (i === index) {
                control.classList.add('active');
            } else {
                control.classList.remove('active');
            }
        });
    };

    // Callback function to be executed when the slide intersects with the viewport
    const handleIntersect = (entries, observer) => {
        entries.forEach(entry => {
            // Find the index of the intersecting slide
            const index = Array.from(slides).indexOf(entry.target);

            // Update the indicator
            const controls = document.querySelectorAll('.slide-control');
            controls.forEach((control, i) => {
                if (i === index) {
                    control.classList.add('active');
                } else {
                    control.classList.remove('active');
                }
            });
        });
    };

    // Create the Intersection Observer
    const observer = new IntersectionObserver(handleIntersect, {
        threshold: 0.5
    });

    // Observe each slide
    slides.forEach(slide => {
        observer.observe(slide);
    });

    // Update indicator when the page loads
    window.addEventListener('load', updateSlideIndicator);

    // Update indicator when the window is resized
    window.addEventListener('resize', updateSlideIndicator);


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
</script>

@endsection