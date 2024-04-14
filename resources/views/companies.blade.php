@extends('layout')

@section('title', '- Companies')

@section('menu')
@include('components.menu')
@endsection

@section('content')

<div class="main">
    <div class="companies-page">
        <div class="search-section">
            <div class="text">
                <div class="title">Sök i arkivet</div>
                <div class="subtitle">Hitta din framtida arbetsplats här.
                    Filtrera för att hitta det du söker!</div>
            </div>
            <div class="search">
                <form action="{{ route('companies.searchByTechnologies') }}" method="get" id="searchForm">
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
            @if (count($companies) <= 0) Inga företag jobbar med detta, testa en annan kategori eller färre. @else @foreach ($companies as $company) <div class="company-card">
                <div class="image">
                    @if ($company->profile_picture == null)
                    <img src="/images/profiles/default_image_company.png" alt="">
                    @else
                    <img src="/storage/{{ $company->profile_picture }}" alt="">
                    {{-- TODO: check image type etc so that above renders correctly. --}}
                    @endif
                </div>
                <div class="info-section">
                    <a href="/companies/{{ $company->id }}">
                        <div class="info">
                            <div class="name">{{ $company->name }}</div>
                            <div class="title">{{ $company->userable->location }}</div>
                        </div>
                    </a>
                    <div class="save">
                        <livewire:like-button :userId="$company->id" />
                    </div>
                </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
</div>

@endsection

@vite(['resources/js/searchCompanies.js'])