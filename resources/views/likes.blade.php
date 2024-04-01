@extends('layout')

@section('title', '- Login')

@section('menu')
    @include('components.menu')
@endsection

@section('content')


    @if ($user->role === 'student')

        <div class="page-title">Dina sparade företag.</div>
        <div class="page-subtitle">Här kan du se de företag som du sparat!</div>
        <div class="cards-section">
            @if (count($likedUsers) <= 0)
                <div class="no-likes">You haven't liked any companies yet, head to our <a
                        href="{{ route('companies') }}">companies
                        page</a> to find some!</div>
            @else
                @foreach ($likedUsers as $company)
                    <div class="company-card">
                        <div class="image">
                            @if ($company->profile_picture == null)
                                <img src="/images/profiles/default_image_company.png" alt="">
                            @else
                                <img src="{{ $company->profile_picture }}" alt="">
                                {{-- TODO: check image type etc so that above renders correctly. --}}
                            @endif
                        </div>
                        <div class="info-section">
                            <div class="info">
                                <div class="name">{{ $company->name }}</div>
                                <div class="title">{{ $company->userable->location }}</div>
                            </div>
                            <div class="save">
                                <div class="save-image">
                                    <img src="/images/icons/like-icon.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @else
        <div class="page-title">Dina sparade Studenter.</div>
        <div class="page-subtitle">Här kan du se de studenter som du sparat!</div>
        <div class="cards-section">
            @if (count($likedUsers) <= 0)
                <div class="no-likes">You haven't liked any students yet, head to our <a
                        href="{{ route('students') }}">students
                        page</a> to find some!</div>
            @else
                @foreach ($likedUsers as $student)
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
                            </div>
                            <div class="save">
                                <div class="save-image">
                                    <img src="/images/icons/like-icon.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endif


@endsection
