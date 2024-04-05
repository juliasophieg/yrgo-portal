@extends('layout')

@section('title', '- Onboarding')



@section('menu')
    @include('components.menu')
@endsection

@section('content')
    <div class="main">
        <div class="onboarding-page">
            <div class="header">
                <div class="numbers">
                    <div class="number-1 active">1</div>
                    <div class="number-2 active">2</div>
                    <div class="number-3 active">3</div>
                    <div class="number-4">4</div>
                </div>
                <div class="form-header">
                    @if ($user->role == 'student')
                        <div class="form-title">Student</div>
                        <div class="form-subtitle">Trevligt nu har du ett konto!</div>
                    @else
                        <div class="form-title">Företag</div>
                        <div class="form-subtitle">Trevligt nu har du ett konto!</div>
                    @endif

                </div>
            </div>
            <form action="/onboarding" method="post" class="onboarding-form">
                @csrf
                <div class="first-section active">
                    <div class="top-section">
                        <div class="text">Vad Brukar ni hålla på med?</div>
                        <div class="used-technologies-section">
                            @foreach ($technologies as $technology)
                                <div class="used-technology" data-value="{{ $technology->name }}">{{ $technology->name }}
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="technology_names_using">
                    </div>
                    <div class="arrows">
                        <div class="dummy-arrow"></div>
                        <div class="arrow-right"><img src="/images/icons/chevron-right-large.svg" alt=""></div>
                    </div>
                </div>
                <div class="second-section">
                    <div class="top-section">
                        <div class="text">Välj några nyckelord
                            som beskriver vad
                            @if ($user->role == 'student')
                                du
                            @else
                                ni
                            @endif
                            letar efter.
                        </div>
                        <div class="search-technologies-section">
                            @foreach ($technologies as $technology)
                                <div class="search-technology" data-value="{{ $technology->name }}">{{ $technology->name }}
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="technology_names_searching">
                    </div>
                    <div class="arrows">
                        <div class="arrow-left"><img src="/images/icons/chevron-left-large.svg" alt="">
                        </div>
                        <div class="arrow-right-submit"><img src="/images/icons/chevron-right-large.svg" alt="">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
    @include('components.error')
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const submitArrow = document.querySelector(".arrow-right-submit");
        const rightArrow = document.querySelector(".arrow-right");
        const leftArrow = document.querySelector(".arrow-left");
        const firstSection = document.querySelector(".first-section");
        const secondSection = document.querySelector(".second-section");
        const form = document.querySelector(".onboarding-form");
        const pageCounter4 = document.querySelector(".number-4");

        leftArrow.addEventListener("click", () => {
            if (secondSection.classList.contains("active")) {
                secondSection.classList.remove("active");
                firstSection.classList.add("active");
                pageCounter4.classList.remove("active");
            } else {
                secondSection.classList.add("active");
                firstSection.classList.remove("active");

            }
        })
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
        })
        submitArrow.addEventListener("click", () => {
            form.submit();
        })
        document.querySelectorAll('.used-technology').forEach((item) => {
            item.addEventListener('click', event => {
                const value = event.target.getAttribute('data-value');
                const input = document.querySelector(
                    'input[name="technology_names_using"]');
                let existingValues = input.value.split(',');
                if (existingValues[0] === '') {
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
                input.value = existingValues.join(',');
            });
        });
        document.querySelectorAll('.search-technology').forEach(item => {
            item.addEventListener('click', event => {
                const value = event.target.getAttribute('data-value');
                const input = document.querySelector(
                    'input[name="technology_names_searching"]');
                let existingValues = input.value.split(',');
                if (existingValues[0] === '') {
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
                input.value = existingValues.join(',');
            });
        });




    });
</script>
