<div class="slide-wrapper snaps-inline">
    <div class="landing-page">
        <div class="landing-page-content">
            <div class="desktop-middle">
                <div class="date-countdown">
                    <p class="body">24 april, kl. 15:00-17:00</p>
                    <div class="countdown">
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
                    <span id="yrgo-container"></span>
                </div>
                <div class="welcome-text">
                    <h2 class="title-2">Välkommen på event!</h2>
                    <p class="body">Välkommen till vårt evenemang där företag och studenter möts för att skapa framtida samarbeten och praktikplatser. Anmäl dig nu för att inte missa detta unika tillfälle!</p>
                    <a class="button button-primary-blue" href="{{ route('gdpr-consent') }}">Till anmälan</a>
                </div>
                <div class="arrow right"><img src="/images/icons/chevron-right-large.svg" alt=""></div>
            </div>

        </div>
    </div>
    <div class="event-page not-auth" id="event-page">
        <div class="event-info">
            <div class="event-title">
                <h1 class="title-2">När & var?</h1>
                <div class="divider"></div>
            </div>
            <div class="event-description">
                <div class="event-text">
                    <img src="/images/icons/date.svg">
                    <p class="body">24 april 2024 </p>
                </div>
                <div class="event-text">
                    <img src="/images/icons/clock.svg">
                    <p class="body">Kl. 15:00-17:00 </p>
                </div>
                <div class="event-text">
                    <img src="/images/icons/location.svg">
                    <p class="body">Visual Arena Lindholmen</p>
                </div>
                <div class="event-text box">
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
        <a class="button button-primary-red" href="{{ route('gdpr-consent') }}">Till anmälan</a>
    </div>
    <div class="slide-controls">
        <div class="slide-control-landing-page"></div>
        <div class="slide-control-event-page"></div>
    </div>
</div>