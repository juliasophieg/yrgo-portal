@extends('layout')

@section('title', '- Students')

@section('menu')
    @include('components.menu')
@endsection

@section('content')

    <div class="main">
        <div class="students-page">
            <div class="search-section">
                <div class="text">
                    <div class="title">Sök i arkivet</div>
                    <div class="subtitle">Hitta dina framtida kollegor här.
                        Filtrera för att hitta det du söker!</div>
                </div>
                <div class="search">
                    <form action="{{ route('students.searchByTechnologies') }}" method="get" id="searchForm">
                        @csrf
                        <div class="search-bar">

                            <div id="selectedTechnologiesContainer" class="selected-technologies-container">
                                <!-- Selected technologies will be displayed here -->
                            </div>
                            <div class="category-button"><img src="/images/icons/filter-small.svg" alt=""></div>
                        </div>
                        <div class="dark-background"></div>
                        <div class="custom-select">
                            <div class="select-items">
                                @foreach ($technologies as $technology)
                                    <div class="select-item" data-value="{{ $technology->name }}">{{ $technology->name }}
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="technology_names" id="selectedTechnologies">
                        </div>
                    </form>
                </div>
            </div>
            <div class="cards-section">
                @if (count($students) <= 0)
                    Inga studenter jobbar med detta, testa en annan kategori eller färre.
                @else
                    @foreach ($students as $student)
                        <div class="student-card">
                            <div class="image">
                                @if ($student->profile_picture == null)
                                    <img src="/images/profiles/default_image_user.png" alt="">
                                @else
                                    <img src="/storage/{{ $student->profile_picture }}" alt="">
                                    {{-- TODO: check image type etc so that above renders correctly. --}}
                                @endif
                            </div>
                            <div class="info-section">
                                <a href="/students/{{ $student->id }}">
                                    <div class="info">
                                        <div class="name">{{ $student->name }}</div>
                                        <div class="title">{{ $student->userable->program }}</div>
                                    </div>
                                </a>
                                <div class="save">
                                    <livewire:like-button :userId="$student->id" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection

@vite(['resources/js/searchStudents.js'])
