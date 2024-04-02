@extends('layout')

@section('title', '- Students')

<!-- CSS styles for the custom select -->
<style>
    .custom-select {
        display: none;
        position: relative;
        border: 1px solid #ccc;
        border-radius: 4px;
        overflow: hidden;
    }

    .select-items {
        display: flex;
        flex-wrap: wrap;
        padding: 5px;
    }

    .active {
        display: flex;
    }

    .select-item {
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px 10px;
        margin: 2px;
        cursor: pointer;
    }

    .selected {
        background-color: red;
    }

    .main {
        display: flex;
        flex-direction: column;
    }

    .student-card {
        display: flex;
        gap: 16px;
    }

    .info-section {
        display: flex;
        justify-content: space-between;
        flex-grow: 1;
    }

    .student-card img {
        border-radius: 20px;
    }

    .cards-section {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .search-bar {
        display: flex;
        justify-content: space-between;
        gap: 8px;
    }

    .search-section {
        display: flex;
        flex-direction: column;
        gap: 32px;
    }

    .title {
        color: var(rgba(0, 0, 0, 0.87));
        text-align: center;
        font-feature-settings: 'clig' off, 'liga' off;
        font-family: Inter;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        line-height: 26.4px;
        /* 110% */
        letter-spacing: 0.18px;
    }

    .subtitle {
        color: var(--00-on-surface-high-emphasis, rgba(0, 0, 0, 0.87));
        text-align: center;
        font-feature-settings: 'clig' off, 'liga' off;
        /* sub1 */
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        /* 150% */
        letter-spacing: 0.15px;
    }

    .search-data-unavailable {
        display: flex;
        padding: var(--base-units-unit-1, 8px) 16px;
        justify-content: center;
        align-items: center;
        gap: var(--base-units-unit-1, 8px);
        border-radius: 20px;
        height: fit-content;
    }

    .search-data {
        display: flex;
        padding: var(--base-units-unit-1, 8px) 16px;
        justify-content: center;
        align-items: center;
        gap: var(--base-units-unit-1, 8px);
        border-radius: 20px;
        background: var(--button-fill-red, #F52A3B);
        color: white;
        height: fit-content;
    }

    .search-data-text {
        text-wrap: nowrap;
    }

    .selected-technologies-container {
        padding: 0px 8px;
        gap: 8px;
        display: flex;
        flex-grow: 1;
        border-radius: var(--base-units-unit-5, 48px);
        background: #FFF;
        /* Drop Shadow */
        box-shadow: 0px 0px var(--base-units-unit-1, 8px) 0px var(--ekoland-ekoland-layout-effects-black, rgba(32, 32, 32, 0.25));
        align-items: center;
        overflow: scroll;

    }

    .category-button {
        display: flex;
        padding: var(--base-units-unit-1, 8px);
        align-items: flex-start;
        gap: 16px;
        border-radius: var(--base-units-unit-5, 48px);
        background: #FFF;

        /* Drop Shadow */
        box-shadow: 0px 0px var(--base-units-unit-1, 8px) 0px var(--ekoland-ekoland-layout-effects-black, rgba(32, 32, 32, 0.25));
    }
</style>



@section('menu')
    @include('components.menu')
@endsection

@section('content')

    <div class="main">
        <div class="search-section">
            <div class="text">
                <div class="title">Search through
                    Yrgos archive!</div>
                <div class="subtitle">Find your future colleagues here.
                    Simply search by Category using the button below</div>
            </div>
            <div class="search">
                <form action="{{ route('students.searchByTechnologies') }}" method="get" id="searchForm">
                    @csrf
                    <div class="search-bar">

                        <div id="selectedTechnologiesContainer" class="selected-technologies-container">
                            <!-- Selected technologies will be displayed here -->
                        </div>
                        <div class="category-button"><img src="/images/icons/category.svg" alt=""></div>
                    </div>

                    <div class="custom-select">
                        <div class="select-items">
                            @foreach ($technologies as $technology)
                                <div class="select-item" data-value="{{ $technology->name }}">{{ $technology->name }}</div>
                            @endforeach
                        </div>
                        <input type="hidden" name="technology_names" id="selectedTechnologies">
                    </div>
                </form>
            </div>
        </div>
        <div class="cards-section">
            @if (count($students) <= 0)
                No students meet those criteria, try a different one, or not as many.
            @else
                @foreach ($students as $student)
                    <div class="student-card">
                        <div class="image">
                            @if ($student->profile_picture == null)
                                <img src="/images/profiles/default_image_user.png" alt="">
                            @else
                                <img src="{{ $student->profile_picture }}" alt="">
                                {{-- TODO: check image type etc so that above renders correctly. --}}
                            @endif
                        </div>
                        <div class="info-section">
                            <div class="info">
                                <div class="name">{{ $student->name }}</div>
                                <div class="title">Student at Yrgo</div>
                                @if ($student->technologies->isEmpty())
                                    test
                                @else
                                    @foreach ($student->technologies as $technology)
                                        {{ $technology->name }}
                                    @endforeach
                                @endif
                            </div>
                            <div class="save">
                                <livewire:like-button :userId="$student->id" />
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const categoryButton = document.querySelector(".category-button");
        const customSelect = document.querySelector(".custom-select");
        const selectItems = document.querySelectorAll(".select-item");
        const searchContainer = document.querySelector(".selected-technologies-container");
        const searchBar = document.querySelector(".search-bar");
        let hiddenFormTechnologies = document.getElementById("selectedTechnologies");


        renderSearchContainer();
        applyActiveClass();

        categoryButton.addEventListener("click", () => {
            if (customSelect.classList.contains("active")) {
                customSelect.classList.remove("active")
            } else {
                customSelect.classList.add("active")
            }
        })

        selectItems.forEach(item => {
            item.addEventListener("click", (event) => {
                const value = event.target.getAttribute("data-value");
                updateLocalStorage(value);
                clickedButton(event);
                renderSearchContainer();

                submitForm();
            })
        });


        function clickedButton(event) {
            if (event.target.classList.contains("selected")) {
                event.target.classList.remove("selected");
            } else {
                event.target.classList.add("selected");
            }

        }

        function renderSearchContainer() {
            // Clear the existing content of the searchContainer
            let localStorageItems = JSON.parse(localStorage.getItem("selectedTechnologies")) || [];
            console.log(localStorageItems);
            if (!localStorageItems || localStorageItems.length === 0) {
                const searchDiv = document.createElement("div");
                searchDiv.classList.add("search-data-unavailable")
                searchDiv.innerHTML = "Select a category from the menu";
                searchContainer.appendChild(searchDiv);
            } else {
                searchContainer.innerHTML = "";

                // Retrieve the array from local storage

                // Loop through each item in the array and create a div for it
                localStorageItems.forEach(value => {
                    const searchDiv = document.createElement("div");
                    const textSearchDiv = document.createElement("div");
                    const image = document.createElement("img");
                    image.src = "/images/icons/white-x.svg"
                    textSearchDiv.innerHTML = value;
                    textSearchDiv.setAttribute("data-value", value);
                    searchDiv.setAttribute("data-value", value);
                    image.setAttribute("data-value", value);
                    textSearchDiv.classList.add("search-data-text");
                    searchDiv.appendChild(textSearchDiv);
                    searchDiv.appendChild(image);
                    searchDiv.classList.add("search-data")
                    searchContainer.appendChild(searchDiv);

                    searchDiv.addEventListener("click", (event) => {
                        const value = event.target.getAttribute("data-value");
                        updateLocalStorage(value);
                        renderSearchContainer();
                        applyActiveClass();
                        submitForm();
                    })
                });
            }
        }

        function updateLocalStorage(value) {
            // Get the existing items from local storage or initialize an empty array if it doesn't exist yet
            let localStorageItems = JSON.parse(localStorage.getItem("selectedTechnologies")) || [];

            // Check if the value is already present in the array
            const index = localStorageItems.indexOf(value);
            if (value != null) {
                if (index !== -1) {
                    // Remove the value if it exists
                    localStorageItems.splice(index, 1);
                } else {
                    // Add the value to the array if it's not already present
                    localStorageItems.push(value);
                }
            }


            // Update the local storage with the modified array
            localStorage.setItem("selectedTechnologies", JSON.stringify(localStorageItems));
        }


        function submitForm() {
            const searchForm = document.getElementById('searchForm');
            let localStorageItems = JSON.parse(localStorage.getItem("selectedTechnologies")) || [];
            let technologiesParam = localStorageItems.join(

                ','); // Join array items into a comma-separated string
            hiddenFormTechnologies.value = technologiesParam;

            console.log(hiddenFormTechnologies);

            searchForm.submit();

        }


        function applyActiveClass() {
            // Retrieve the array from local storage
            let localStorageItems = JSON.parse(localStorage.getItem("selectedTechnologies")) || [];

            // Get all div elements that you want to apply the 'active' class to
            const divs = document.querySelectorAll(".select-item");

            // Loop through each div
            divs.forEach(div => {
                const value = div.getAttribute("data-value");
                // Check if the value is in local storage, if so, add the 'active' class
                if (localStorageItems.includes(value)) {
                    div.classList.add("selected");
                } else {
                    // Otherwise, remove the 'active' class
                    div.classList.remove("selected");
                }
            });
        }

    });
</script>
