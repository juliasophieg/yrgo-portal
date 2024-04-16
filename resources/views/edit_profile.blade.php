@extends('layout')

@section('title', '- Edit')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
    <div class="edit-page">
        <form method="POST" action="{{ route('update-profile', ['user' => $user]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- STUDENT -->
            @if ($user->role === 'student')
                @include('components.edit_student_profile')
                <!-- COMPANY -->
            @elseif ($user->role === 'company')
                @include('components.edit_company_profile')
            @endif
            <div class="button-container">
                <button type=" submit" class="button button-primary-blue">Spara</button>
                <a href="{{ route('profile') }}" class="button button-secondary-transparent">Avbryt</a>
            </div>
        </form>
    </div>

    <script>
        //IMAGE PREVIEW

        document.getElementById('profile_picture').addEventListener('change', function(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const dataURL = reader.result;
                const userProfileImg = document.getElementById('user-profile-img');
                userProfileImg.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        });


        // SHOW MORE TECHNOLOGIES
        const moreTechnologies = document.querySelector('.more-technologies');
        const unselectedTechnologies = document.querySelector('.unselected-technologies');
        const technologyBtns = document.querySelectorAll('.technology-checkbox');

        moreTechnologies.addEventListener('click', () => {
            unselectedTechnologies.classList.toggle('show');
            moreTechnologies.style.display = 'none';
        });


        technologyBtns.forEach(technologyBtn => {
            technologyBtn.addEventListener('click', () => {
                technologyBtn.classList.toggle('selected');
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const technologyCheckboxes = document.querySelectorAll('.technology-checkbox input[type="checkbox"]');

            technologyCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('click', (event) => {
                    event.stopPropagation(); // Prevent click event from bubbling up to parent
                });

                checkbox.parentNode.addEventListener('click', () => {
                    checkbox.checked = !checkbox.checked;
                });
            });
        });
    </script>

@endsection
